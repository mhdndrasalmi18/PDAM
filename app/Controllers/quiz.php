<?php

namespace App\Controllers;

use PSpell\Config;

class quiz extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function mhs()
    {
        return view ('tabelmhs');
    }
    public function baru(){
        return view ('pesawat');
    }
   public function quiz(){
    return view('entriquiz');
   }
   public function simpan1()
   {
    $db = \Config\Database::connect();
            $data = [
                'kodebaju' => $this->request->getPost('kode'),
                'jenis' => $this->request->getPost('jenis'),
                'harga' => $this->request->getPost('harga'),
                'jumlah' => $this->request->getPost('jumlah'),
                'total' => $this->request->getPost('total'),
            ];
            $simpan = $db->table('baju')->insert($data);
            if($simpan = TRUE){
                echo "<script>
                alert('data berhasil di simpan');
                window.location='/quiz/tampil1';
                </script>";
            }else{
                echo "<script>
                alert('data gagal di simpan');
                window.location='/quiz/quiz';
                </script>";
            }
        }
        function tampil1(){
            $db = \Config\Database::connect();
            $builder = $db->table('baju');
            $query = $builder->get();
            $data['bajudok'] = $query->getResultArray();
            return view('tampilquiz',$data);
        }
   }

