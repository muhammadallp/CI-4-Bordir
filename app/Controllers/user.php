<?php

namespace App\Controllers;
use App\Models\Product_model;
class user extends BaseController
{
    protected $product_model;
    public function __construct()
    {
        $this->session = session();
        
        // $this->session = session()->get('isLogin');
        $this->product_model = new Product_model();
    }
    
    public function index() 
    {

        //cek apakah ada session bernama isLogin
        if(!$this->session->get('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        $model = new Product_model();
        $data=[
        'title' =>'Home | Putti-Bordir',
        'cart' => \Config\Services::cart(),
        'product' => $model->getProduct()->getResult(),
         'category'=> $model->getCategory()->getResult()
        ];
        return view('user/index',$data);
    }
}           