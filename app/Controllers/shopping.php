<?php

namespace App\Controllers;
use App\Models\Product_model;
 
 
class Shopping extends BaseController {

 protected $Product_model;
 
    public function __construct()
    {
        $this->product_model = new Product_model();
    }
 
    public function pesanan()
    {
        $model = new Product_model();
        $data=[
            'title' =>'Pesanan | Putti-Bordir',
            'cart' => \Config\Services::cart(),
            'product' => $model->getProduct()->getResult(),
            'category'=> $model->getCategory()->getResult(),
            'pembayaran'=> $model->getpembayaran()->getResult()
            ];
            return view('shopping\pesanan',$data);
    }

 
 public function tambah()
    {
        $cart = \Config\Services::cart();
    
        $data_produk= array('id' => $this->request->getPost('product_id'),
                             'name' => $this->request->getPost('product_name'),
                             'price' => $this->request->getPost('product_price'),
                             'image' => $this->request->getPost('image'),
                             'qty' =>$this->request->getpost('qty')
                            );
        $cart->insert($data_produk);
       return redirect()->to('user');
    }
 
 public function hapus($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
       return redirect()->to('/shopping/pesanan');
    }

    public function clear(){
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('/shopping/pesanan');

    }
 
   public function ubah_cart()
    {
        $cart_info = $_POST['cart'] ;
        $cart = \Config\Services::cart();
        foreach( $cart_info as $value)
        {
            $rowid = $value['rowid'];
            $price = $value['price'];
            $gambar = $value['image'];
            $amount = $price * $value['qty'];
            $qty = $value['qty'];
            $data = array('rowid' => $rowid,
                            'price' => $price,
                            'image' => $gambar,
                            'amount' => $amount,
                            'qty' => $qty);
                            $cart->update($data);
        }
       return redirect()->to('/shopping/pesanan');
    }
 
    public function proses_order()
    {   
        $model = new Product_model();
        $cart = \Config\Services::cart();
        //-------------------------Input data pelanggan--------------------------
        $data_pelanggan = array(
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'telp' => $this->request->getPost('telp'),
                        );
         $model->tambah_pelanggan($data_pelanggan);
         $id_pelanggan =$model->insertID(); 
        //-------------------------Input data order------------------------------
        $data_order = array(
            'tanggal' => date('Y-m-d'),
            'pelanggan' => $id_pelanggan);
         $model->tambah_order($data_order);
         $id_order =$model->insertID();
        //-------------------------Input data detail order-----------------------
        if ($cart = $cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data_detail = array(
                            'order_id'=>$id_order,
                            'produk' => $item['id'],
                            'qty' => $item['qty'],
                            'harga' => $item['price']);
                        $model->tambah_detail_order($data_detail);
                    }
            }
        //-------------------------Hapus shopping cart--------------------------
        $cart = \Config\Services::cart();
        $cart->destroy();
        $data=[
        'title' =>'Orderan | Putti-Bordir',
        'cart' => \Config\Services::cart(),
        'product' => $model->getProduct()->getResult(),
         'category'=> $model->getCategory()->getResult()
        ];

        return view('shopping/sukses',$data);
    }
}