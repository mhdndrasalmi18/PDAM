<?php

namespace App\Controllers;

use App\Models\ModelKaskeluar;

class Kaskeluar extends BaseController
{
    public function index()
    {
        if (session()->get('masuk')==true) {
            if (session()->get('level')==1) 
            {
        $model = new ModelKaskeluar();
        $data['Kaskeluar'] = $model->getKaskeluar()->getResultArray();
        $data['dataanakyatim'] = $model->getAnakYatim()->getResult();
        $data['datamasjid'] = $model->getMasjid()->getResult();
        $data['datatpq'] = $model->getTPQ()->getResult();
        $data['datasosial'] = $model->getSosial()->getResult();

        $data['hitungkasmasukanakyatim'] = $model->gethitunganakyatimmasuk()->getResultArray();
        $data['hitungkaskeluaranakyatim'] = $model->gethitunganakyatimkeluar()->getResultArray();

        $data['hitungkasmasukmasjid'] = $model->gethitungmasjidmasuk()->getResultArray();
        $data['hitungkaskeluarmasjid'] = $model->gethitungmasjidkeluar()->getResultArray();

        $data['hitungkasmasuktpq'] = $model->gethitungtpqmasuk()->getResultArray();
        $data['hitungkaskeluartpq'] = $model->gethitungtpqkeluar()->getResultArray();

        $data['hitungkasmasuksosial'] = $model->gethitungsosialmasuk()->getResultArray();
        $data['hitungkaskeluarsosial'] = $model->gethitungsosialkeluar()->getResultArray();


        echo view ('Kaskeluar/v_Kaskeluar',$data);
    }else{
        echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
    }
        
    }else{
        echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }
    }
    public function save()
    {
        $model = new ModelKaskeluar();
        $jumlah = $this->request->getPost('Kaskeluar');
        $sisa = $this->request->getPost('tot');
        if($sisa < $jumlah){
            echo"<script>alert('Dana Kurang');
            window.location.href='/Kaskeluar';</script>";

        } else {
            $data = array(
                'tanggal' => $this->request->getPost('tanggal'),
                'idagendakeluar' => $this->request->getPost('idagenda'),
                'kas_keluar' => $this->request->getPost('Kaskeluar'),
                'jenis_kas' => $this->request->getPost('jeniskas'),
            );
            $model->insertData($data);
            return redirect()->to('/Kaskeluar');
        }
    }
    public function delete(){
        $model = new ModelKaskeluar();
        $id = $this->request->getPost('id');
        $model->deleteKaskeluar($id);
        return redirect()->to('/Kaskeluar/index');
    }
    function update()
{
$model = new ModelKaskeluar();
$id = $this->request->getPost('id');
$data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_keluar' => $this->request->getPost('Kaskeluar'),
            // 'kas_masuk' => 0,
            'jenis_kas' => $this->request->getPost('jeniskas'),
            // 'status' => 'Keluar',
);
$model->updateKaskeluar ($data, $id);
return redirect()->to('/Kaskeluar/index');
}
public function laporankaskeluar()
{
    if (session()->get('masuk')==true) {
        if (session()->get('level')==1) 
        {
    $model = new ModelKaskeluar();
    $data['data'] = $model->getLaporanUangKeluar()->getResultArray();
    echo view('/kaskeluar/cetak_laporan',$data);
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
    echo view('/Kaskeluar/vlaporankaskeluar');
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
    echo view('/Kaskeluar/vlaporanperjeniskas');
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
$model = new ModelKaskeluar();
$tgla = $this->request->getPost('tanggal_awal');
$tglb = $this->request->getPost('tanggal_akhir');
$query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
$data = [
'tgla' =>$tgla,
'tglb' => $tglb,
'data' => $query
];
echo view('/Kaskeluar/vcetaklaporanperperiode', $data);
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
$model = new Modelkaskeluar();
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
echo view('/Kaskeluar/v_cetaklaporanperperiodeperjeniskas', $data);
}else{
    echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
}
    
}else{
echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
}
}
}