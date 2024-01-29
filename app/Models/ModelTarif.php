<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTarif extends Model
{
    public function getTarif()
    {
       $builder = $this->db->table('Tarif');
       return $builder->get();
    }
   public function insertData($data)
   {
    $this->db->table('Tarif')->insert($data);
   }
   public function deleteTarif($id)
   {
    $query = $this->db->table('tbl_Tarif')->delete(array('id_Tarif' => $id));
    return $query;
   }
   public function updateTarif ($data, $id)
   { 
      $query = $this->db->table('tbl_Tarif')->update($data, array('id_Tarif' => $id));
   }
}