<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgenda extends Model
{
    public function getAgenda()
    {
       $builder = $this->db->table('tbl_agenda');
       return $builder->get();
    }
   public function insertData($data)
   {
    $this->db->table('tbl_agenda')->insert($data);
   }
   public function deleteAgenda($id)
   {
    $query = $this->db->table('tbl_agenda')->delete(array('idagenda' => $id));
    return $query;
   }
   public function updateAgenda ($data, $id)
   { 
      $query = $this->db->table('tbl_agenda')->update($data, array('idagenda' => $id));
   }
}