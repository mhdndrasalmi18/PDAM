<?php

namespace App\Controllers;

use App\Models\ModelKasmasuk;

class Kasmasuk extends BaseController
{
    public function index()
    {
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
            $model = new ModelKasmasuk();
            $data['Kasmasuk'] = $model->getKasmasuk()->getResultArray();
            $data['data_donatur'] = $model->getDonatur()->getResult();
            $data['hitungkasmasukanakyatim'] = $model->gethitunganakyatimmasuk()->getResultArray();
            $data['hitungkasmasukmasjid'] = $model->gethitungmasjidmasuk()->getResultArray();
            $data['hitungkasmasuktpq'] = $model->gethitungtpqmasuk()->getResultArray();
            $data['hitungkasmasuksosial'] = $model->gethitungsosialmasuk()->getResultArray();
        echo view ('Kasmasuk/v_kasmasuk',$data);
        }else{
            echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
        }
    }else{
        echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }    
    }
    public function save()
    {
        $model = new ModelKasmasuk();
        $data = array(
            // 'id_kas_masjid' => $this->request->getPost('id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kasmasuk'),
            // 'kas_keluar' => 0,
            'jenis_kas' => $this->request->getPost('jeniskas'),
            // 'status' => 'Masuk',
            'iddonaturmasjid'=>$this->request->getPost('iddonatur'),
        );
        // if (!$this->validate([
        //     'id' => [
        //     'rules' => 'required|is_unique[tbl_kas_masjid.id_kas_masjid]',
        //     'errors' => [
        //     'required' => '{field) Harus diisi',
        //     'is_unique' => '{field} Sudah ada'
        //     ]
        //     ]
        //     ])) {
        //     session()->setFlashdata('error', $this->validator->listErrors()); return redirect()->back()->withInput();
        //     } else {
        //     print_r($this->request->getVar());
        //     }
        $model->insertData($data);
    return redirect()->to('/Kasmasuk');
    }
    public function delete(){
        $model = new ModelKasmasuk();
        $id = $this->request->getPost('id');
        $model->deleteKasmasuk($id);
        return redirect()->to('/Kasmasuk/index');
    }
    function update()
{
$model = new ModelKasmasuk();
$id = $this->request->getPost('id');
$data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('kasmasuk'),
            // 'kas_keluar' => 0,
            'jenis_kas' => $this->request->getPost('jeniskas'),
            // 'status' => 'Masuk',
            'iddonaturmasjid'=>$this->request->getPost('iddonatur1'),
);
$model->updateKasmasuk ($data, $id);
return redirect()->to('/Kasmasuk/index');
}
public function laporankasmasuk()
{
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
    $model = new ModelKasmasuk();
    $data['data'] = $model->getLaporanUangMasuk()->getResultArray();
    echo view('/Kasmasuk/cetak_laporan',$data);
    }else{
        echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
    }

    }else{
    echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    } 
}
public function laporanperperiode(){
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
            echo view('/Kasmasuk/vlaporankasmasuk');
        }else{
            echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
        }

        }else{
        echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
}
public function laporanperjenis(){
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
            echo view('/Kasmasuk/vlaporanperjeniskas');
        }else{
            echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
        }   
        }else{
        echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
}
public function cetaklaporanperperiode()
{
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
    $model = new ModelKasmasuk();
    $tgla = $this->request->getPost('tanggal_awal');
    $tglb = $this->request->getPost('tanggal_akhir');
    $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
    $data = [
        'tgla' =>$tgla,
        'tglb' => $tglb,
        'data' => $query
    ];
    echo view('/Kasmasuk/vcetaklaporanperperiode', $data);
    }else{
            echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
        }
       	 
    }else{
        echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    } 
}
public function cetaklaporanperperiodeperjeniskas()
{
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
            $model = new Modelkasmasuk();
            $tgla = $this->request->getPost('tanggal_awal');
            $tglb = $this->request->getPost('tanggal_akhir');
            $jenis = $this->request->getPost('jeniskas');
            $query = $model->getLaporanperperiodeperjenis ($tgla, $tglb, $jenis)->getResultArray();
            $data = [
            'tgla' => $tglb,
            'tglb' => $tgla,
            'jenis' => $jenis,
            'data' => $query
            ];
    echo view('/Kasmasuk/v_cetaklaporanperperiodeperjeniskas', $data);
    }else{
        echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
    }
        
    }else{
    echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }
}
}
