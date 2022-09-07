<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\product_Model;
use App\Models\Dashboard_model;
use \Dompdf\Dompdf;


class admin extends BaseController
{
    
    protected $userModal;
    public function __construct()
    {
        $this->userModel = new UserModel();
 
        $this->dashboard_model = new Dashboard_model();

     
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {

        if(!$this->session->get('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        //cek role dari session
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
    

        $title=[
            'title' =>'Dashboard | Putti-Bordir',
            'total_pembayaran' =>$this->dashboard_model->getCountpembayaran(),
            'total_product' =>$this->dashboard_model->getCountProduct(),
            'total_category'=>$this->dashboard_model->getCountCategory(),
            'total_user' =>$this->dashboard_model->getCountUser(),
            'total_pesanan' =>$this->dashboard_model->getCountPesanan(),
        ];       
        return view('admin/index',$title);
        
    }

    public function datauser()
    {

        
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $user= $this->userModel->findAll();
        $title=[
            'title' =>'data User | Putti-Bordir ',
            'user' =>$user
        ];
        //menampilkan halaman login
        return view('admin/datauser',$title);
    }
    

    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

         $this->userModel->delete($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('admin/datauser');
    }
   

    public function pesanan()
    {
        $this->userModel = new product_Model();

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $model = new Product_model();
        $data=[
        'title' =>'Data Pesanan | Putti-Bordir',
        'product' => $model->getProduct()->getResult(),
        'pesanan' => $model->getdetailorder()->getResult(),
         'pelanggan'=> $model->getpelanggan()->getResult(),
         'order'=> $model->getorder()->getResult(),
        ];
        return view('admin/pesanan', $data);
    }

    public function printpdf(){
        $dompdf=new Dompdf();
        $this->userModel = new product_Model();

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $model = new Product_model();
        $data=[
        'title' =>'Print PDF| Putti-Bordir',
        'product' => $model->getProduct()->getResult(),
        'pesanan' => $model->getdetailorder()->getResult(),
         'pelanggan'=> $model->getpelanggan()->getResult(),
         'order'=> $model->getorder()->getResult(),
        ];
        $html= view('admin/printpdf',$data);
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->render();
        $dompdf->stream('Laporan Pesanan.pdf', array(
            "Attachment" =>false
        ));

    }
        
    
    
}