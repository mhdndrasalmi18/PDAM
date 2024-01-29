<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDonatur extends Model
{
    public function getDonatur()
    {
       $builder = $this->db->table('donatur');
       return $builder->get();
    }
   public function insertData($data)
   {
    $this->db->table('donatur')->insert($data);
   }
   public function deletedonatur($id)
   {
    $query = $this->db->table('donatur')->delete(array('iddonatur' => $id));
    return $query;
   }
   public function updatedonatur ($data, $id)
   { 
      $query = $this->db->table('donatur')->update($data, array('iddonatur' => $id));
   }
}