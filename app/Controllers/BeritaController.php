<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use CodeIgniter\Controller;

class BeritaController extends Controller
{
    private $BeritaModel;

    public function __construct()
    {
        $this->BeritaModel = new BeritaModel();
    }

    public function index()
    {
        echo view('layout/header');
        $data['berita'] = $this->BeritaModel->findAll();
        echo view('berita', $data);
        echo view('layout/footer');
    }


    public function create()
    {
        echo view('layout/header');
        echo view('create_berita');
        echo view('layout/footer');
    }

    public function store()
    {
        echo view('layout/header');
        $data = $this->request->getPost();
        $this->BeritaModel->save($data);
        return redirect()->to('admin');
        echo view('layout/footer');
    }

    public function edit($id)
    {
        echo view('layout/header');
        $data['berita'] = $this->BeritaModel->find($id);
        echo view('edit_berita', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        echo view('layout/header');
        $data = $this->request->getPost();
        $this->BeritaModel->update($id, $data);
        return redirect()->to('admin');
        echo view('layout/footer');
    }

    public function delete($id)
    {
        echo view('layout/header');
        $this->BeritaModel->delete($id);
        return redirect()->to('admin');
        echo view('layout/footer');
    }
    public function dashboard()
    {
        echo view('layout/header');
        echo view('dashboard');
        echo view('layout/footer');
    }
}