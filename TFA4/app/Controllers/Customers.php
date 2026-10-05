<?php 

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{

    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {   
        $customers = $this->customerModel->findAll();
        
        return view('customers/customers', ['customers' => $customers]);
    }


    public function new()
    { 
        return view('customers/new');
    }

    public function create()
    {
        helper(['form']);
            
        $rules = [
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required',
            ],
            'email'     => [
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            'phone'     => [
                'label' => 'Phone',
                'rules' => 'required'
            ]
        ];

        if (!$this->validate($rules))
            {
                return view('customers/new', ['validation' => $this->validator]);
            }
        
        $this->customerModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer account created successfully.');
    }


    public function edit($id)
        {
            helper(['form']);

            $customer = $this->customerModel->find($id);

            if (!$customer){
                {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
                }
            }

            return view('customers/edit', ['customer' => $customer]);
        }

        public function update($id)
        {
            $customer = $this->customerModel->find($id);
        
            if(!$customer){
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
            }

            $rules = [
                'full_name' => [
                    'label' => 'Full Name',
                    'rules' => 'required',
                ],
                'email'     => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ],
                'phone'     => [
                    'label' => 'Phone',
                    'rules' => 'required'
                ]
            ];

            if (!$this->validate($rules)) {
                return view('customers/edit', ['customer' => $customer, 'validation' => $this->validator]);
            }

            $this->customerModel->update($id, [
                'full_name' => $this->request->getPost('full_name'),
                'email'     => $this->request->getPost('email'),
                'phone'     => $this->request->getPost('phone'),
            ]);

            return redirect()->to('/customers')->with('success', 'Customer account updated successfully.');
        }
}