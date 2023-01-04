<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Controllers\BaseController;
use CodeIgniter\Config\Config;

class Auth extends BaseController
{
    protected $authModel;
    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $data = array(
            'title' => 'e-surat',
            'validation' => \Config\Services::validation()
        );
        return view('auth/login', $data);
    }
    public function cek()
    {
        if ($this->validate([
            'username' =>  [
                'rules' => 'max_length[25]',
                'errors' => [
                    'max_length' => 'Username melebihi batas maksimal.',
                ],
            ],
            'password' =>  [
                'rules' => 'max_length[8]',
                'errors' => [
                    'max_length' => 'Password maximal 8 digit.',
                ],
            ],
        ])) {
            // Jika Valid Form
            $username = $this->request->getPost('username');
            $passwordFill = $this->request->getPost('password');
            $password = md5($passwordFill);
            $cek = $this->authModel->login($username, $password);
            if ($cek) {
                if (password_verify($password, $cek['password'])) {
                    //jika data cocok
                    session()->set('log', true);
                    session()->set('id', $cek['id']);
                    session()->set('nama', $cek['nama']);
                    session()->set('email', $cek['email']);
                    session()->set('nohp', $cek['nohp']);
                    session()->set('username', $cek['username']);
                    session()->set('foto', $cek['foto']);
                    session()->set('level', $cek['level']);
                    return redirect()->to(base_url('/home'));
                } else {
                    //jika tidak data cocok
                    session()->setFlashdata('m', 'PASSWORD SALAH.');
                    return redirect()->to(base_url('/'));
                }
            } else {
                //jika tidak data cocok
                session()->setFlashdata('m', 'USERNAME & PASSWORD SALAH.');
                return redirect()->to(base_url('/'));
            }
        } else {
            //Jika tidak valid
            $validation = \Config\Services::validation();
            return redirect()->to('/')->withInput()->with('validation', $validation);
        }
    }
    public function logout()
    {
        session()->remove('log');
        session()->remove('id');
        session()->remove('nama');
        session()->remove('nohp');
        session()->remove('email');
        session()->remove('username');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('ml', 'LOGOUT BERHASIL');
        return redirect()->to(base_url('/'));
    }

    //--------------------------------------------------------------------
}
