<?php

namespace App\Controllers;

use App\Models\ModelTarif;

class Tarif extends BaseController
{
    public function index()
    {
        
        $model = new ModelTarif();
        $data['Tarif'] = $model->getTarif()->getResultArray();
        echo view ('Tarif/v_Tarif',$data);
    }
    public function save()
    {
        $model = new ModelTarif();
        $data = array(
            'idtarif' => $this->request->getPost('id'),
            'klass' => $this->request->getPost('klass'),
            'tarif' => $this->request->getPost('tarif'),
        );
        $model->insertData($data);
        return redirect()->to('/Tarif');
    }
    public function delete(){
        $model = new ModelTarif();
        $id = $this->request->getPost('id');
        $model->deleteTarif($id);
        return redirect()->to('/Tarif/index');
    }
    function update()
{
$model = new ModelTarif();
$id = $this->request->getPost('id');
$data = array(
'nama_Tarif' => $this->request->getPost('namaTarif'),
'jabatan' => $this->request->getPost('jabatan'),
'alamat' => $this->request->getPost('alamat'),
'no_hp' => $this->request->getPost('nohp'),
);
$model->updateTarif ($data, $id);
return redirect()->to('/Tarif/index');
}
}