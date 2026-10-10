<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->productModel->orderBy('id', 'DESC')->findAll();

        return view('products/index', $data);
    }

    public function new()
    {
        return view('products/new');
    }

    public function create()
    {
        $rules = [
            'name' => [
                'label' => 'Product Name',
                'rules' => 'required|max_length[100]'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required|decimal|greater_than_equal_to[0]'
            ],
            'stock_quantity' => [
                'label' => 'Stock Quantity',
                'rules' => 'required|integer|greater_than_equal_to[0]'
            ],
            'image' => [
                'label' => 'Product Image',
                'rules' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]'
            ]
        ];

        if (!$this->validate($rules)) {
            return view('products/new', ['validation' => $this->validator]);
        }

        $imageName = null;

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/products/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = $image->getRandomName();

            $image->move($uploadPath, $imageName);

            // Prepare display-ready thumbnail
            // service('image')
            //     ->withFile($uploadPath . $imageName)
            //     ->fit(300, 300, 'center')
            //     ->save($uploadPath . $imageName);
        }

        $this->productModel->insert([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image' => $imageName,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/products')
            ->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Product not found.'
            );
        }

        return view('products/edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Product not found.'
            );
        }

        $rules = [
            'name' => [
                'label' => 'Product Name',
                'rules' => 'required|max_length[100]'
            ],
            'price' => [
                'label' => 'Price',
                'rules' => 'required|decimal|greater_than_equal_to[0]'
            ],
            'stock_quantity' => [
                'label' => 'Stock Quantity',
                'rules' => 'required|integer|greater_than_equal_to[0]'
            ],
            'image' => [
                'label' => 'Product Image',
                'rules' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]'
            ]
        ];

        if (!$this->validate($rules)) {
            return view('products/edit', [
                'product' => $product,
                'validation' => $this->validator
            ]);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity')
        ];

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && !$image->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/products/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if (!empty($product['image'])) {
                $oldImage = $uploadPath . $product['image'];

                if (is_file($oldImage)) {
                    unlink($oldImage);
                }
            }

            $imageName = $image->getRandomName();

            $image->move($uploadPath, $imageName);

            // service('image')
            //     ->withFile($uploadPath . $imageName)
            //     ->fit(300, 300, 'center')
            //     ->save($uploadPath . $imageName);

            $data['image'] = $imageName;
        }

        $this->productModel->update($id, $data);

        return redirect()
            ->to('/products')
            ->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()
                ->to('/products')
                ->with('error', 'Product not found.');
        }

        try {
            $this->productModel->delete($id);

            if (!empty($product['image'])) {
                $imagePath = FCPATH . 'uploads/products/' . $product['image'];

                if (is_file($imagePath)) {
                    unlink($imagePath);
                }
            }

            return redirect()
                ->to('/products')
                ->with('success', 'Product deleted successfully.');

        } catch (\Throwable $e) {

            return redirect()
                ->to('/products')
                ->with(
                    'error',
                    'This product cannot be deleted because it already has sales records.'
                );
        }
    }
}