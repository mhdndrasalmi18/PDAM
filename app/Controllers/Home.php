<?php

namespace App\Controllers;

use PSpell\Config;

class Home extends BaseController
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
    public function lihat(){
            $db = \Config\Database::connect();
            $builder = $db->table('sppd');
            $query = $builder->get();
            $data['sppdok'] = $query->getResultArray();
            return view('tampilsppd');
    }
    public function plane(){
    $kd = $this->request->getPost('kode');
    $agend = $this->request->getPost('agenda');
    $trans = $this->request->getPost('transportasi');
    $nginap = $this->request->getPost('penginapan');
    $pkok = $this->request->getPost('pokok');
    $ttl = $this->request->getPost('total');
    echo "Kode : $kd <br>";
    echo "Agenda : $agend <br>";
    echo "Transportasi : $trans <br>";
    echo "Penginapan : $nginap <br>";
    echo "Pokok : $pkok <br>";
    echo "Total : $ttl <br>";
    }
    public function news(){
        return view ('pembayaran');
    }
    public function bayar(){
        $db = \Config\Database::connect();
            $builder = $db->table('transaksi');
            $query = $builder->get();
            $data['sppdok'] = $query->getResultArray();
            return view('tampilbayar',$data);
        }
        public function simpan(){
            $db = \Config\Database::connect();
            $data = [
                'kode' => $this->request->getPost('kode'),
                'agenda' => $this->request->getPost('agenda'),
                'btransportasi' => $this->request->getPost('transportasi'),
                'bpenginapan' => $this->request->getPost('penginapan'),
                'bpokok' => $this->request->getPost('pokok'),
                'total' => $this->request->getPost('total'),
            ];
            $simpan = $db->table('sppd')->insert($data);
            if($simpan = TRUE){
                echo "<script>
                alert('data berhasil di simpan');
                window.location='/home/tampil';
                </script>";
            }else{
                echo "<script>
                alert('data gagal di simpan');
                window.location='/home/transaksi';
                </script>";
            }
        }
        function tampil(){
            $db = \Config\Database::connect();
            $builder = $db->table('sppd');
            $query = $builder->get();
            $data['sppdok'] = $query->getResultArray();
            return view('tampilsppd',$data);
        }
        public function save(){
            $db = \Config\Database::connect();
            $data = [
                'bakso' => $this->request->getPost('bakso'),
                'siomay' => $this->request->getPost('siomay'),
                'mieayam' => $this->request->getPost('mie'),
                'teh' => $this->request->getPost('teh'),
                'member' => $this->request->getPost('member'),
                'total' => $this->request->getPost('total'),
            ];
            $simpan = $db->table('transaksi')->insert($data);
            if($simpan = TRUE){
                echo "<script>
                alert('data berhasil di simpan');
                window.location='/home/bayar';
                </script>";
            }else{
                echo "<script>
                alert('data gagal di simpan');
                window.location='/home/sppd';
                </script>";
            }
        }
}
