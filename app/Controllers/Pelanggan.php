<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        
        $model = new ModelPelanggan();
        $data['Pelanggan'] = $model->getPelanggan()->getResultArray();
        echo view ('Pelanggan/v_Pelanggan',$data);
    }
    public function save()
    {
        $model = new ModelPelanggan();
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'nohp' => $this->request->getPost('nohp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->insertData($data);
        return redirect()->to('/Pelanggan');
    }
    public function delete(){
        $model = new ModelPelanggan();
        $id = $this->request->getPost('id');
        $model->deletePelanggan($id);
        return redirect()->to('/Pelanggan/index');
    }
    function update()
{
$model = new ModelPelanggan();
$id = $this->request->getPost('id');
$data = array(
'nama_Pelanggan' => $this->request->getPost('namaPelanggan'),
'jabatan' => $this->request->getPost('jabatan'),
'alamat' => $this->request->getPost('alamat'),
'no_hp' => $this->request->getPost('nohp'),
);
$model->updatePelanggan ($data, $id);
return redirect()->to('/Pelanggan/index');
}
}