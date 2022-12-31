<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Config\Config;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function user()
    {
        // jika tidak ingin menampilkan data superadmin
        $datauser = $this->userModel->where('level !=', 1)->findAll();
        $data = array(
            'title' => 'Daftar User',
            'data' => $datauser,
            'isi' => 'master/user/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Tambah Data User',
            'isi' => 'master/user/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
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
                'rules' => 'required|valid_email|is_unique[mod_user.email]',
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
            'username' => [
                'rules' => 'required|max_length[25]|min_length[8]|is_unique[mod_user.username]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'max_length' => 'Username maximal 25 digit.',
                    'min_length' => 'Username minimal 8 digit.',

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Re-Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to('add')->withInput();
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'nama'                 => $this->request->getPost('nama'),
            'nohp'                 => $this->request->getPost('nohp'),
            'email'                => $this->request->getPost('email'),
            'username'             => $this->request->getPost('username'),
            'foto'                 => 'blank.png',
            'password'             => $password,
            'level'                => $this->request->getPost('level'),
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-user'));
    }
    public function delete($id)
    {
        $data = $this->userModel->find($id);
        $foto = $data['foto'];
        if (file_exists(ROOTPATH . 'public/media/fotouser/' . $foto)) {
            if ($data['foto'] != 'blank.png') {
                unlink(ROOTPATH . 'public/media/fotouser/' . $foto);
            }
        }
        $this->userModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-user'));
    }
    public function edit($id)
    {
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Form Edit User',
            'isi' => 'master/user/edit',
            'validation' => \Config\Services::validation(),
            'bagian' => $bagian,
            'data' => $this->userModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $nipLama = $this->userModel->where(['id' => $id])->first();
        if ($nipLama['nip'] == $this->request->getPost('nip')) {
            $rule_nip = 'required|numeric|max_length[18]|min_length[18]';
        } else {
            $rule_nip = 'required|numeric|max_length[18]|min_length[18]|is_unique[mod_user.nip]';
        }
        $emailLama = $this->userModel->where(['id' => $id])->first();
        if ($emailLama['email'] == $this->request->getPost('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[mod_user.email]';
        }
        $usernameLama = $this->userModel->where(['id' => $id])->first();
        if ($usernameLama['username'] == $this->request->getPost('username')) {
            $rule_username = 'required|max_length[25]|min_length[8]';
        } else {
            $rule_username = 'required|max_length[25]|min_length[8]|is_unique[mod_user.username]';
        }
        //Validasi input
        if (!$this->validate([
            'idbagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Bagian.',
                ]
            ],
            'nip' => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => 'NIP tidak boleh kosong.',
                    'numeric' => 'NIP harus angka.',
                    'max_length' => 'NIP maximal 18 digit.',
                    'min_length' => 'NIP minimal 18 digit.',
                    'is_unique' => 'NIP sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
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
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'max_length' => 'Username maximal 25 digit.',
                    'min_length' => 'Username minimal 8 digit.',

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-user/edit/' . $this->request->getPost('id')))->withInput();
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'id'                   => $id,
            'id_bagian'            => $this->request->getPost('idbagian'),
            'nama_bagian'          => $this->request->getPost('bagian'),
            'nip'                  => $this->request->getPost('nip'),
            'nama'                 => $this->request->getPost('nama'),
            'nohp'                 => $this->request->getPost('nohp'),
            'email'                => $this->request->getPost('email'),
            'username'             => $this->request->getPost('username'),
            'password'             => $password,
            'level'                => $this->request->getPost('level'),
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-user'));
    }
}
