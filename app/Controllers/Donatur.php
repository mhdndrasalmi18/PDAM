<?php

namespace App\Controllers;

use App\Models\Modeldonatur;

class Donatur extends BaseController
{
    public function index()
    {
        if (session()->get('masuk')==true) {
            if (session()->get('level')==1) 
            {
        $model = new Modeldonatur();
        $data['donatur'] = $model->getdonatur()->getResultArray();
        echo view ('Donatur/v_donatur',$data);
    }else{
        echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
    }
        
}else{
    echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
}
    }
    public function save()
    {
        $model = new Modeldonatur();
        $data = array(
            'iddonatur' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'nohp' => $this->request->getPost('nohp')
        );
        // if (!$this->validate([
        //     'iddonatur' => [
        //     'rules' => 'required|is_unique[tbl_donatur.iddonatur]',
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
    return redirect()->to('/Donatur');
    }
    public function delete(){
        $model = new Modeldonatur();
        $id = $this->request->getPost('id');
        $model->deletedonatur($id);
        return redirect()->to('/donatur/index');
    }
    function update()
{
$model = new Modeldonatur();
$id = $this->request->getPost('id');
$data = array(
'nama' => $this->request->getPost('nama'),
'alamat' => $this->request->getPost('alamat'),
'nohp' => $this->request->getPost('nohp'),
);
$model->updatedonatur ($data, $id);
return redirect()->to('/donatur/index');
}
}