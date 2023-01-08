<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SuratMasukModel;

class Home extends BaseController
{
    protected $userModel;
    protected $suratmasukModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->suratmasukModel = new SuratMasukModel();
    }
    public function index()
    {
        $data = array(
            'title'         => 'Dashboard',
            'appname'       => 'Aplikasi Management Surat',
            'suratmasuk'    => $this->suratmasukModel->countAllResults(),
            // 'suratkeluar'   => $this->suratkeluarModel->countAllResults(),
            'users'         => $this->userModel->where('level !=', 1)->countAllResults(),
            'isi'           => 'home',
        );
        return view('layout/wrapper', $data);
    }
}
