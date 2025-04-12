<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    private $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        echo view('layout/header');
        $data['user'] = $this->UserModel->findAll();
        echo view('user', $data);
        echo view('layout/footer');
    }
    public function create()
    {
        echo view('layout/header');
        echo view('create_user');
        $data = $this->request->getPost();
        echo view('layout/footer');
    }

    public function store()
    {
        echo view('layout/header');
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->UserModel->save($data);
        return redirect()->to('admin/user');
        echo view('layout/footer');
    }
    public function edit($id)
    {
        echo view('layout/header');
        $data['user'] = $this->UserModel->find($id);
        echo view('edit_user', $data);
        echo view('layout/footer');
    }

    public function update($id)
    {
        echo view('layout/header');
        $data = $this->request->getPost();
        $this->UserModel->update($id, $data);
        return redirect()->to('admin/user');
        echo view('layout/footer');
    }
    public function delete($id)
    {
        echo view('layout/header');
        $this->UserModel->delete($id);
        return redirect()->to('admin/user');
        echo view('layout/footer');
    }
}