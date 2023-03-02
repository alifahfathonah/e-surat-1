<?php

namespace App\Controllers;

use App\Models\SettingModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;


class SettingProfil extends BaseController
{
    protected $settingModel;
    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Profil Desa',
            'title' => 'Tambah Profil Desa',
            'isi' => 'master/setting-profil/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nmdesa' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Desa tidak boleh kosong.',
                    'alpha_space' => 'Nama Desa harus huruf dan spasi.'
                ]
            ],
            'nmkecamatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kecamatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Kecamatan harus huruf dan spasi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                    'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                ]
            ],
            'kdpos' => [
                'rules' => 'required|numeric|max_length[5]',
                'errors' => [
                    'required' => 'Kode Pos harus diisi.',
                    'max_length' => 'Kode Pos maksimal 5 digit.',
                    'numeric' => 'Kode Pos harus angka.',
                ]
            ]
        ])) {
            return redirect()->to('add')->withInput();
        }
        $data = [
            'id_desa'        => session()->get('id_desa'),
            'nama_desa'      => $this->request->getPost('nmdesa'),
            'nama_kecamatan' => $this->request->getPost('nmkecamatan'),
            'alamat'         => $this->request->getPost('alamat'),
            'kode_pos'       => $this->request->getPost('kdpos'),
        ];
        $this->settingModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('my-profil'));
    }
    public function edit($id)
    {
        $idd = session()->get('id_desa');
        $data = array(
            'titlebar' => 'Profil Desa',
            'title' => 'Edit Profil Desa',
            'isi' => 'master/setting-profil/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->settingModel->where('id', $id)->where('id_desa', $idd)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nmdesa' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Desa tidak boleh kosong.',
                    'alpha_space' => 'Nama Desa harus huruf dan spasi.'
                ]
            ],
            'nmkecamatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kecamatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Kecamatan harus huruf dan spasi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                    'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                ]
            ],
            'kdpos' => [
                'rules' => 'required|numeric|max_length[5]',
                'errors' => [
                    'required' => 'Kode Pos harus diisi.',
                    'max_length' => 'Kode Pos maksimal 5 digit.',
                    'numeric' => 'Kode Pos harus angka.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('/setting-profil/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'id_desa'        => session()->get('id_desa'),
            'nama_desa'      => $this->request->getPost('nmdesa'),
            'nama_kecamatan' => $this->request->getPost('nmkecamatan'),
            'alamat'         => $this->request->getPost('alamat'),
            'kode_pos'       => $this->request->getPost('kdpos'),
        ];
        $this->settingModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('my-profil'));
    }
}
