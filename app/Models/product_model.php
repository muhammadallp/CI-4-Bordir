<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Product_model extends Model
{ 
    protected $table = "product";
    protected $primaryKey = "product_id";
    protected $allowedFields = ["product_name", "product_price","product_category_id", "deskripsi","image"];
    protected $useTimestamps = false;
     
    public function getCategory()
    {
        $builder = $this->db->table('category');
        return $builder->get();
    }
 
    public function getProduct()
    {
        $builder = $this->db->table('product');
        $builder->select('*');
        $builder->join('category', 'category_id = product_category_id','left');
        return $builder->get();
        
    }
 
    public function saveProduct($data){
        return $this->db->table('product')->insert($data);
        
    }
 
    public function updateProduct($data, $id)
    {   
        
        return $this->db->table('product')->update($data, array('product_id' => $id));
        
    }
 
    public function deleteProduct($id)
    {
        $query = $this->db->table('product')->delete(array('product_id' => $id));
        return $query;
    } 

    // category
    
    public function savekategori($data){
        return $this->db->table('category')->insert($data);
        
    }
 
    public function updatekatagori($data, $id)
    {
        return $this->db->table('category')->update($data, array('category_id' => $id));
        
    }
 
    public function deletekatagori($id)
    {
        $query = $this->db->table('category')->delete(array('category_id' => $id));
        return $query;
    }  

    public function tambah_pelanggan($data)
	{
		return $this->db->table('tbl_pelanggan')->insert($data);
        
		
	}
	
	public function tambah_order($data)
	{
		return $this->db->table('tbl_order')->insert($data);
         
        
	}
	
	public function tambah_detail_order($data)
	{
        return $this->db->table('tbl_detail_order')->insert($data);
	}
    


    public function getpembayaran()
    {
        $builder = $this->db->table('pembayaran');
        return $builder->get();
    }
    public function getdetailorder()
    {
        $builder = $this->db->table('tbl_detail_order');
        $builder->select('tbl_detail_order.id as detailid, qty, harga, product_name, image, tanggal, nama, telp, alamat');
        $builder->join('product', 'product.product_id = produk');
        $builder->join('tbl_order', 'tbl_order.id = order_id');
        $builder->join('tbl_pelanggan', 'tbl_pelanggan.id = tbl_order.pelanggan','left');
        return $builder->get();
    }
    public function getpelanggan()
    {
        $builder = $this->db->table('tbl_pelanggan');
        return $builder->get();
    }
    public function getorder()
    {
        $builder = $this->db->table('tbl_order');
        return $builder->get();
    }
    

    
}