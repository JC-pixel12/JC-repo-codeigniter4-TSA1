<?php 

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->findAll();

        return view('users/users', ['users' => $users]);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        helper(['form']);

        $rules = [
            'username' => [
            'label' => 'Username',
            'rules' => 'required|is_unique[users.username]',
            ],
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required',
            ],
            'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[8]'
            ]
        ];

        if(!$this->validate($rules)){
            return view('users/new', ['validation' => $this->validator]);
        }

        $this->userModel->insert([
            'username'  => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'full_name' => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')->with('success', 'User account created successfully.');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
        };

        return view('users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        helper(['form']);

        $user = $this->userModel->find($id);

        if (!$user)
            {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found.');
            } 

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => "required|is_unique[users.username,id,{$id}]",
            ],
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required',
            ],
            'avatar' => [
                'label' => 'Avatar',
                'rules' => 'permit_empty|is_image[avatar]|
                            max_size[avatar,2048]|
                            mime_in[avatar,image/jpg,image/jpeg,image/png]',
            ]
        ];

        if (!$this->validate($rules))
            {
                return view('users/edit', ['user' => $user, 'validation' => $this->validator]);
            }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved())
            {
                $uploadPath = FCPATH . 'uploads/avatars/';

                if (!is_dir($uploadPath)){
                    mkdir($uploadPath, 0777, true);
                }
                
                $filename = $avatar->getRandomName();

                $avatar->move($uploadPath, 'thumb_' . $filename);


                // $image = service('image');

                // $image->withFile($uploadPath . $filename)
                //     ->fit(200, 200, 'center')
                //     ->save($uploadPath . 'thumb_' . $filename);

                $thumbnailFilename = 'thumb_' . $filename;

                $data['avatar'] = $thumbnailFilename;
                
                if (file_exists($uploadPath . $filename)){
                    unlink($uploadPath . $filename);
                }
            }

            $this->userModel->update($id, $data);

            return redirect()->to('/users')->with('success', 'User account updated successfully.');
    }
}