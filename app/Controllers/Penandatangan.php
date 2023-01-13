<?php

namespace App\Controllers;

use App\Models\PenandatanganModel;
use CodeIgniter\Config\Config;

class Penandatangan extends BaseController
{
    protected $penandatanganModel;
    public function __construct()
    {
        $this->penandatanganModel = new PenandatanganModel();
    }
    public function data()
    {
        $datauser = $this->penandatanganModel->findAll();
        $data = array(
            'title' => 'Penandatangan',
            'data' => $datauser,
            'isi' => 'master/penandatangan/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Penandatangan',
            'title' => 'Tambah Penandatangan',
            'isi' => 'master/penandatangan/add',
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
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan tidak boleh kosong.',
                ]
            ],
            'ttd' => [
                'rules' => 'uploaded[ttd]|mime_in[ttd,image/jpg,image/jpeg,image/png]|max_size[ttd,500]',
                'errors' => [
                    'uploaded' => 'Scan TTD harus diupload.',
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran gambar maksimal 500kb.'
                ]
            ],
        ])) {
            return redirect()->to('add')->withInput();
        }
        $file_ttd   = $this->request->getFile('ttd');
        $fileNamettd = $file_ttd->getRandomName();
        $file_ttd->move(ROOTPATH . 'public/media/ttd/', $fileNamettd);
        $data = [
            'nama'          => $this->request->getPost('nama'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'ttd'           => $fileNamettd,
        ];
        $this->penandatanganModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('penandatangan'));
    }
    public function delete($id)
    {
        $data = $this->penandatanganModel->find($id);
        $file_ttd = $data['ttd'];
        if (file_exists(ROOTPATH . 'public/media/ttd/' . $file_ttd)) {
            unlink(ROOTPATH . 'public/media/ttd/' . $file_ttd);
        }
        $this->penandatanganModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('penandatangan'));
    }
    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Penandatangan',
            'title' => 'Edit Penandatangan',
            'isi' => 'master/penandatangan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->penandatanganModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
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
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan tidak boleh kosong.',
                ]
            ],
            'ttd' => [
                'rules' => 'mime_in[ttd,image/jpg,image/jpeg,image/png]|max_size[ttd,500]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran gambar maksimal 500kb.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('penandatangan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $file_ttd   = $this->request->getFile('ttd');
        if ($file_ttd->getError() == 4) {
            $r = $this->penandatanganModel->find($id);
            $fileNamettd = $r['ttd'];
        } else {
            $fileNamettd = $file_ttd->getRandomName();
            //move file
            $file_ttd->move(ROOTPATH . 'public/media/ttd/', $fileNamettd);
            //if file found then replace file
            $f = $this->penandatanganModel->find($id);
            $replacettd = $f['ttd'];
            if (file_exists(ROOTPATH . 'public/media/ttd/' . $replacettd)) {
                unlink(ROOTPATH . 'public/media/ttd/' . $replacettd);
            }
        }
        $data = [
            'id'            => $id,
            'nama'          => $this->request->getPost('nama'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'ttd'           => $fileNamettd,
        ];
        $this->penandatanganModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('penandatangan'));
    }
}
