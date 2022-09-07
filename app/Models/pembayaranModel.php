<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = "pembayaran";
    protected $primaryKey = "id_pem";
    protected $allowedFields = ["nama_req", "no_req","nama_bank"];
    protected $useTimestamps = false;
    
    // public function getpembayaran($slug = false)
    // {
    //     if($slug==false){
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug'=>$slug])->first();
    // }
    public function edit_data($data,$id)
    {
        return $this->db->table('pembayaran')->update($data, array('id_pem'=>$id));
    }


    
}