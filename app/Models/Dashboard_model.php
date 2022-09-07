<?php namespace App\Models;
use CodeIgniter\Model;
 
class Dashboard_model extends Model
{
    protected $table = 'product';

    // hitung total data pada transaction
    public function getCountpembayaran()
    {
        return $this->db->table("pembayaran")->countAll();
    }

    // hitung total data pada category
    public function getCountCategory()
    {
        return $this->db->table("category")->countAll();
    }

    // hitung total data pada product
    public function getCountProduct()
    {
        return $this->db->table("product")->countAll();
    }

    // hitung total data pada user
    public function getCountUser()
    {
        return $this->db->table("user")->countAll();
    }

    public function getCountPesanan()
    {
        return $this->db->table("tbl_detail_order")->countAll();
    }
}