<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    public function getPelanggan()
    {
       $builder = $this->db->table('pelanggan');
       return $builder->get();
    }
   public function insertData($data)
   {
    $this->db->table('pelanggan')->insert($data);
   }
   public function deletePelanggan($id)
   {
    $query = $this->db->table('tbl_Pelanggan')->delete(array('id_Pelanggan' => $id));
    return $query;
   }
   public function updatePelanggan ($data, $id)
   { 
      $query = $this->db->table('tbl_Pelanggan')->update($data, array('id_Pelanggan' => $id));
   }
}