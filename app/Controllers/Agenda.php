<?php

namespace App\Controllers;

use App\Models\ModelAgenda;

class Agenda extends BaseController
{
    public function index()
    {
        if (session()->get('masuk')==true) {
            if (session()->get('level')==1) 
            {
        $model = new ModelAgenda();
        $data['Agenda'] = $model->getAgenda()->getResultArray();
        echo view ('Agenda/v_Agenda',$data);
    }else{
        echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
    }
        
}else{
    echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
}
    }
    public function save()
    {
        $model = new ModelAgenda();
        $data = array(
            'idagenda' => $this->request->getPost('id'),
            'namakegiatan' => $this->request->getPost('namakegiatan'),
            'tgl' => $this->request->getPost('tanggal'),
            'jam' => $this->request->getPost('jam'),
            'jenis_kas' => $this->request->getPost('jeniskas'),
        );
        if (!$this->validate([
            'id' => [
            'rules' => 'required|is_unique[tbl_Agenda.idagenda]',
            'errors' => [
            'required' => '{field) Harus diisi',
            'is_unique' => '{field} Sudah ada'
            ]
            ]
            ])) {
            session()->setFlashdata('error', $this->validator->listErrors()); return redirect()->back()->withInput();
            } else {
            print_r($this->request->getVar());
            }
        $model->insertData($data);
    return redirect()->to('/Agenda');
    }
    public function delete(){
        $model = new ModelAgenda();
        $id = $this->request->getPost('id');
        $model->deleteAgenda($id);
        return redirect()->to('/Agenda/index');
    }
    function update()
{
$model = new ModelAgenda();
$id = $this->request->getPost('id');
$data = array(
'namakegiatan' => $this->request->getPost('namakegiatan'),
'tgl' => $this->request->getPost('tanggal'),
'jam' => $this->request->getPost('jam'),
'jenis_kas' => $this->request->getPost('jeniskas'),
);
$model->updateAgenda ($data, $id);
return redirect()->to('/Agenda/index');
}
}