<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class Home extends BaseController
{
    protected $userModel;
    protected $suratmasukModel;
    protected $suratkeluarModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->suratmasukModel = new SuratMasukModel();
        $this->suratkeluarModel = new SuratKeluarModel();
    }
    public function index()
    {
        $pokja = session()->get('pokja');
        $data = array(
            'title'         => 'Dashboard',
            'appname'       => 'Aplikasi Management Surat',
            'users'         => $this->userModel->where('level !=', 1)->countAllResults(),
            'sekretariat'   => $this->suratmasukModel->where('pokja =', null)->countAllResults(),
            'pokjaI'        => $this->suratmasukModel->where('pokja =', 'Pokja I')->countAllResults(),
            'pokjaII'       => $this->suratmasukModel->where('pokja =', 'Pokja II')->countAllResults(),
            'pokjaIII'      => $this->suratmasukModel->where('pokja =', 'Pokja III')->countAllResults(),
            'pokjaIV'       => $this->suratmasukModel->where('pokja =', 'Pokja IV')->countAllResults(),
            'isi'           => 'home',
        );
        return view('layout/wrapper', $data);
    }
}
