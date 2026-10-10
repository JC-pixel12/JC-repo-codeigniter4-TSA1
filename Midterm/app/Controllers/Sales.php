<?php

namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;

class Sales extends BaseController
{
    protected $saleModel;
    protected $productModel;
    protected $customerModel;

    public function __construct()
    {
        $this->saleModel = new SaleModel();
        $this->productModel = new ProductModel();
        $this->customerModel = new CustomerModel();
    }

    public function new()
    {
        return view('sales/new', [
            'products' => $this->productModel
                ->where('stock_quantity >', 0)
                ->orderBy('name', 'ASC')
                ->findAll(),

            'customers' => $this->customerModel
                ->orderBy('full_name', 'ASC')
                ->findAll()
        ]);
    }

    public function create()
    {
        $rules = [
            'product_id' => 'required|integer',
            'customer_id' => 'permit_empty|integer',
            'quantity' => 'required|integer|greater_than[0]'
        ];

        if (!$this->validate($rules)) {
            return view('sales/new', [
                'products' => $this->productModel
                    ->where('stock_quantity >', 0)
                    ->orderBy('name', 'ASC')
                    ->findAll(),

                'customers' => $this->customerModel
                    ->orderBy('full_name', 'ASC')
                    ->findAll(),

                'validation' => $this->validator
            ]);
        }

        $productId = (int) $this->request->getPost('product_id');
        $customerId = $this->request->getPost('customer_id');
        $quantity = (int) $this->request->getPost('quantity');

        $product = $this->productModel->find($productId);

        if (!$product) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'The selected product does not exist.');
        }

        if ($quantity > $product['stock_quantity']) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Sale rejected. Only ' .
                    $product['stock_quantity'] .
                    ' unit(s) of ' .
                    $product['name'] .
                    ' are available.'
                );
        }

        if (!empty($customerId)) {

            $customer = $this->customerModel->find($customerId);

            if (!$customer) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'The selected customer does not exist.');
            }
        } else {
            $customerId = null;
        }

        $totalPrice = $product['price'] * $quantity;

        $db = \Config\Database::connect();

        $db->transStart();

        $builder = $db->table('products');

        $builder
            ->set(
                'stock_quantity',
                'stock_quantity - ' . $quantity,
                false
            )
            ->where('id', $productId)
            ->where('stock_quantity >=', $quantity)
            ->update();

        if ($db->affectedRows() !== 1) {

            $db->transRollback();

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Sale rejected. There is not enough stock available.'
                );
        }

        $this->saleModel->insert([
            'product_id' => $productId,
            'customer_id' => $customerId,
            'sold_by' => session()->get('user_id'),
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'The sale could not be recorded. No stock was deducted.'
                );
        }

        return redirect()
            ->to('/sales')
            ->with('success', 'Sale recorded successfully.');
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $sales = $db->table('sales')
            ->select(
                'sales.id,
                 products.name AS product_name,
                 customers.full_name AS customer_name,
                 users.full_name AS staff_name,
                 sales.quantity,
                 sales.total_price,
                 sales.created_at'
            )
            ->join(
                'products',
                'products.id = sales.product_id'
            )
            ->join(
                'customers',
                'customers.id = sales.customer_id',
                'left'
            )
            ->join(
                'users',
                'users.id = sales.sold_by'
            )
            ->orderBy('sales.created_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('sales/index', [
            'sales' => $sales
        ]);
    }
}