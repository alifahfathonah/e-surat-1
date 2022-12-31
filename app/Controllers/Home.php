<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        // $idb = session()->get('id_bagian');
        // $profil = $this->userModel->where('id_bagian =', $idb)->first();
        $data = array(
            'title'          => 'Dashboard',
            'appname'        => 'Sistem Informasi Penatausahaan Keuangan Berbasis Online (SIPENAKU)',
            // 'data'           => $profil,
            // 'spjsppd'        => $this->sppdModel->where('id_bagian', $idb)->countAllResults(),
            // 'spjkegiatan'    => $this->spjkegModel->where('id_bagian', $idb)->countAllResults(),
            // 'bagian'         => $this->bagianModel->countAllResults(),
            // 'account'        => $this->userModel->where('level !=', 1)->countAllResults(),
            // 'spjsppdall'     => $this->sppdModel->countAllResults(),
            // 'spjkegiatanall' => $this->spjkegModel->countAllResults(),
            // 'anggaran'       => $this->anggaranModel->where('id_bagian', $idb)->first(),
            // 'gu'             =>  $this->guModel->first(),
            'isi'            => 'home',
        );
        return view('layout/wrapper', $data);
    }
}
