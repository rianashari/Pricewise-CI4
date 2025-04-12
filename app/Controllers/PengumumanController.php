<?php

namespace App\Controllers;

use App\Models\PengumumanModel;
use CodeIgniter\Controller;

class PengumumanController extends Controller
{
    private $PengumumanModel;

    public function __construct()
    {
        $this->PengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        echo view('layout/header');
        $data['pengumuman'] = $this->PengumumanModel->findAll();
        echo view('pengumuman', $data);
        echo view('layout/footer');
    }
    public function create()
    {
        echo view('layout/header');
        echo view('create_pengumuman');
        echo view('layout/footer');
    }

    public function store()
    {
        echo view('layout/header');
        $data = $this->request->getPost();
        $this->PengumumanModel->save($data);
        return redirect()->to('/pengumuman');
        echo view('layout/footer');
    }
    public function edit($id)
    {
        echo view('layout/header');
        $data['pengumuman'] = $this->PengumumanModel->find($id);
        echo view('edit_pengumuman', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        echo view('layout/header');
        $data = $this->request->getPost();
        $this->PengumumanModel->update($id, $data);
        return redirect()->to('/pengumuman');
        echo view('layout/footer');
    }
    public function delete($id)
    {
        echo view('layout/header');
        $this->PengumumanModel->delete($id);
        return redirect()->to('/pengumuman');
        echo view('layout/footer');
    }
}