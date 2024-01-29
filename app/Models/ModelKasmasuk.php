<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKasmasuk extends Model
{
    public function getKasmasuk()
    {
      $b = $this->db->query("select id_kas_masjid,iddonaturmasjid,nama,tanggal,ket,kas_masuk,jenis_kas from tbl_kas_masjid join donatur on tbl_kas_masjid.iddonaturmasjid=donatur.iddonatur");
      return $b;
    }
   public function insertData($data)
   {
    $this->db->table('tbl_kas_masjid')->insert($data);
   }
   public function deleteKasmasuk($id)
   {
    $query = $this->db->table('tbl_kas_masjid')->delete(array('id_kas_masjid' => $id));
    return $query;
   }
   public function updateKasmasuk ($data, $id)
   { 
      $query = $this->db->table('tbl_kas_masjid')->update($data, array('id_kas_masjid' => $id));
   }
   public function gethitunganakyatimmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Anak Yatim'");
      return $b;
   }
   public function gethitungmasjidmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Masjid'");
      return $b;
   }
   public function gethitungtpqmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'TPQ'");
      return $b;
   }
   public function gethitungsosialmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Sosial'");
      return $b;
   }
   public function getLaporanUangMasuk ()
   { 
      $b = $this->db->query("select id_kas_masjid,nama,tanggal,ket,kas_masuk,jenis_kas from tbl_kas_masjid join donatur on tbl_kas_masjid.iddonaturmasjid=donatur.iddonatur ");
      return $b;
   }
   public function getLaporanperperiode($tgla,$tglb){
      $b = $this->db->query("select id_kas_masjid,nama,tanggal,ket,kas_masuk,jenis_kas from tbl_kas_masjid join donatur on tbl_kas_masjid.iddonaturmasjid=donatur.iddonatur where tanggal >='$tgla' and tanggal <='$tglb'");
      return $b;
   }
   public function laporanperperiodeperjeniskas(){
      echo view ('/Kasmasuk/vlaporanperjeniskas');
   }
   public function getLaporanperperiodeperjenis($tgla,$tglb,$jenis){
      $b = $this->db->query("select id_kas_masjid,nama,tanggal,ket,kas_masuk,jenis_kas from tbl_kas_masjid join donatur on tbl_kas_masjid.iddonaturmasjid=donatur.iddonatur where tanggal >='$tgla' and tanggal <='$tglb' and jenis_kas='$jenis'");
      return $b;
   }
   public function getDonatur(){
      $builder = $this->db->table('donatur');
      return $builder->get();
   }
}