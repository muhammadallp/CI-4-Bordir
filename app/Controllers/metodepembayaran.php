<?php

namespace App\Controllers;
use App\Models\pembayaranModel;


class metodepembayaran extends BaseController
{
    protected $pembayaranModel;
    public function __construct()
    {
   
        //membuat user model untuk konek ke database 
        $this->pembayaranModel = new pembayaranModel();
        
        //meload validation
        // $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
        
    }
    
    public function index()
    {

        
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        // $pulau= $this->pulauModel->findAll();
        $title=[
            'title' =>'Pembayaran | Putti-Bordir',
            'pembayaran' =>$this->pembayaranModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        //menampilkan halaman 
        return view('pembayaran/index',$title);
    }

    public function save()
    {
        // $slug=url_title($this->request->getVar('nama_req'), '_',true);
       $this->pembayaranModel->save([
           'nama_req' => $this->request->getVar('nama_req'),
           'no_req' => $this->request->getVar('no_req'),
           'nama_bank' => $this->request->getVar('nama_bank'),
        //    'slug'=>$slug,
       ]);

       session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Tambahkan!
      </div>');
       return redirect()->to('metodepembayaran/');
    }

    public function edit($id)
    {
        $data=[
            'nama_req' => $this->request->getVar('nama_req'),
            'no_req' => $this->request->getVar('no_req'),
            'nama_bank' => $this->request->getVar('nama_bank')

        ];
        $this->pembayaranModel->edit_data($data,$id);
        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Diedit!
      </div>');
       return redirect()->to('metodepembayaran/');
        
    }








    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

         $this->pembayaranModel->delete($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('metodepembayaran/');
    }

 
}