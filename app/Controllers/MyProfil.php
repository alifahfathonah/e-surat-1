<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;


class MyProfil extends BaseController
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
    public function myprofil()
    {
        $ids = session()->get('id');
        $profil = $this->userModel->where('id =', $ids)->first();
        $data = array(
            'titlebar' => 'Profil Saya',
            'title' => 'Profil Saya',
            'suratmasuk'    => $this->suratmasukModel->where('id_user =', $ids)->countAllResults(),
            'suratkeluar'   => $this->suratkeluarModel->where('id_user =', $ids)->countAllResults(),
            'suratmasukall'    => $this->suratmasukModel->countAllResults(),
            'suratkeluarall'   => $this->suratkeluarModel->countAllResults(),
            'suratkeluar_s'   => $this->suratkeluarModel->where('id_user =', $ids)->countAllResults(),
            'data' => $profil,
            'isi' => 'master/myprofil/data',
        );
        return view('layout/wrapper', $data);
    }
    public function edit($id)
    {
        $ids = session()->get('id');
        $data = array(
            'titlebar' => 'Profil Saya',
            'title' => 'Edit Profil',
            'isi' => 'master/myprofil/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->userModel->where('id', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $emailLama = $this->userModel->where(['id' => $id])->first();
        if ($emailLama['email'] == $this->request->getPost('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[mod_user.email]';
        }
        //Validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ]
            ],
            'nohp' => [
                'rules' => 'required|max_length[12]|min_length[11]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maximal 12 digit.',
                    'min_length' => 'Nomor Handphone manimal 11 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Mohon konfirmasi password.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Mohon konfirmasi password.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'foto' => [
                'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,500]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran gambar maksimal 500kb.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/my-profil/edit/' . $this->request->getPost('id')))->withInput();
        }
        $foto   = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $data = $this->userModel->find($id);
            $fileName = $data['foto'];
        } else {
            $fileName = $foto->getRandomName();
            //move foto
            $foto->move(ROOTPATH . 'public/media/fotouser/', $fileName);
            $data = $this->userModel->find($id);
            $replace = $data['foto'];
            if (file_exists(ROOTPATH . 'public/media/fotouser/' . $replace)) {
                if ($data['foto'] != 'blank.png') {
                    unlink(ROOTPATH . 'public/media/fotouser/' . $replace);
                }
            }
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'id'                   => $id,
            'nama'                 => $this->request->getPost('nama'),
            'email'                => $this->request->getPost('email'),
            'nohp'                 => $this->request->getPost('nohp'),
            'password'             => $password,
            'foto'                 => $fileName,
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Data berhasil di update');
        return redirect()->to(base_url('my-profil'));
    }
}
