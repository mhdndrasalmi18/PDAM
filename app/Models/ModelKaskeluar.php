<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKaskeluar extends Model
{
    public function getKaskeluar()
    {
      $b = $this->db->query("select id_kas_keluar,idagendakeluar,namakegiatan,tgl,jam,kas_keluar,tbl_kas_keluar.jenis_kas FROM tbl_kas_keluar JOIN tbl_agenda ON idagendakeluar=idagenda");
      return $b;
    }
    public function getAnakYatim(){
      $builder = $this->db->table('tbl_agenda')->where(array('jenis_kas'=>'Anak Yatim'));
      return $builder->get();
    }
    public function getMasjid(){
      $builder = $this->db->table('tbl_agenda')->where(array('jenis_kas'=>'Masjid'));
      return $builder->get();
    }
    public function getTPQ(){
      $builder = $this->db->table('tbl_agenda')->where(array('jenis_kas'=>'TPQ'));
      return $builder->get();
    }
    public function getSosial(){
      $builder = $this->db->table('tbl_agenda')->where(array('jenis_kas'=>'Sosial'));
      return $builder->get();
    }

   public function gethitunganakyatimmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid = iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Anak Yatim'");
      return $b;
   }
   public function gethitunganakyatimkeluar(){
      $b = $this->db->query("select SUM(kas_keluar) AS total FROM tbl_kas_keluar JOIN tbl_agenda ON idagendakeluar =idagenda WHERE tbl_kas_keluar.jenis_kas = 'Anak Yatim'");
      return $b;
   }
   public function gethitungmasjidmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Masjid'");
      return $b;
   }
   public function gethitungmasjidkeluar(){
      $b = $this->db->query("select SUM(kas_keluar) AS total FROM tbl_kas_keluar JOIN tbl_agenda ON idagendakeluar = idagenda WHERE tbl_kas_keluar.jenis_kas = 'Masjid'");
      return $b;
   }
   public function gethitungtpqmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'TPQ'");
      return $b;
   }
   public function gethitungtpqkeluar(){
      $b = $this->db->query("select SUM(kas_keluar) AS total FROM tbl_kas_keluar JOIN tbl_agenda ON idagendakeluar =idagenda WHERE tbl_kas_keluar.jenis_kas = 'TPQ'");
      return $b;
   }
   public function gethitungsosialmasuk(){
      $b = $this->db->query("select SUM(kas_masuk) AS total FROM tbl_kas_masjid JOIN donatur ON iddonaturmasjid =iddonatur WHERE tbl_kas_masjid.jenis_kas = 'Sosial'");
      return $b;
   }
   public function gethitungsosialkeluar(){
      $b = $this->db->query("select SUM(kas_keluar) AS total FROM tbl_kas_keluar JOIN tbl_agenda ON idagendakeluar =idagenda WHERE tbl_kas_keluar.jenis_kas = 'Sosial'");
      return $b;
   }
   public function insertData($data)
   {
    $this->db->table('tbl_kas_keluar')->insert($data);
   }
   public function deleteKaskeluar($id)
   {
    $query = $this->db->table('tbl_kas_keluar')->delete(array('id_kas_keluar' => $id));
    return $query;
   }
   public function updateKaskeluar ($data, $id)
   { 
      $query = $this->db->table('tbl_kas_keluar')->update($data, array('id_kas_keluar' => $id));
   }
   public function getLaporanUangKeluar ()
   { 
      $builder = $this->db->table('tbl_kas_keluar');
      return $builder->get();
   }
   public function getLaporanperperiode($tgla,$tglb){
      $b = $this->db->query("select * from tbl_kas_keluar where tanggal >='$tgla' and tanggal <='$tglb' and ");
      return $b;
   }
   public function laporanperperiodeperjeniskas(){
      echo view ('Kaskeluar/vlaporanperjeniskas');
   }
   public function getLaporanperperiodeperjenis($tgla,$tglb,$jenis){
      $b = $this->db->query("select * from tbl_kas_keluar where tanggal >='$tgla' and tanggal <='$tglb' and jenis_kas='$jenis'");
      return $b;
   }
}