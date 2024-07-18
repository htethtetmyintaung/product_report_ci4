<?php
namespace App\Controllers;
use App\Models\ProductModel; 
use App\Models\BranchModel; 

class Product extends BaseController {

    // public function index(): string
    // {
    //     return view('product_list');
    // }

    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->branchModel = new BranchModel();
    }

    public function index()
    {
        // return view('product_list');
        $data['branches'] = $this->branchModel->findAll();
        return view('product_list', $data);
    }

    public function getProductsByBranch()
    {
        // $products = $this->productModel->findAll();

        // return $this->response->setJSON($products);

        $branchId = $this->request->getPost('branch_id');
        $products = $this->productModel->getProductsByBranch($branchId);
        return $this->response->setJSON(['data' => $products]);
    }



}


    

