<?php

namespace App\Controllers;

use App\Models\laporanModel;
use App\Models\UserModel;
use CodeIgniter\Config\Config;

class Laporan extends BaseController
{
    protected $laporanModel;
    protected $userModel;
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->userModel = new UserModel();
    }
    public function data()
    {
        $ids = session()->get('id');
        $lap = $this->laporanModel->where('id_user =', $ids)->findAll();
        $data = array(
            'title' => 'Laporan Kegiatan',
            'data' => $lap,
            'isi' => 'master/laporan/data'
        );
        return view('layout/wrapper', $data);
    }
    public function datalaporan()
    {
        $laporan = $this->laporanModel->findAll();
        $data = array(
            'title' => 'Lapora Kegiatan',
            'data' => $laporan,
            'isi' => 'master/laporan/datalaporan'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Laporan Kegiatan',
            'title' => 'Tambah Laporan Kegiatan',
            'isi' => 'master/laporan/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong.',
                    'alpha_space' => 'Judul harus huruf dan spasi.'
                ]
            ],
            'manfaat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat dan Tujuan harus diisi.',
                ]
            ],
            'sasaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sasaran dan Capaian harus diisi.',
                ]
            ],
            'tglk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kegiatan harus diisi.',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg]|max_size[foto,500]',
                'errors' => [
                    'uploaded' => 'Foto Kegiatan harus diupload.',
                    'mime_in' => 'File extention hanya jpg, jpeg.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran gambar maksimal 500kb.'
                ]
            ],
        ])) {
            return redirect()->to('/tambah-laporan-kegiatan')->withInput();
        }
        $file_foto   = $this->request->getFile('foto');
        $fileNamefoto = $file_foto->getRandomName();
        $file_foto->move(ROOTPATH . 'public/media/foto-kegiatan/', $fileNamefoto);
        $data = [
            'id_user'        => session()->get('id'),
            'judul'         => $this->request->getPost('judul'),
            'manfaat'       => $this->request->getPost('manfaat'),
            'sasaran'       => $this->request->getPost('sasaran'),
            'tgl_kegiatan'  => $this->request->getPost('tglk'),
            'foto_kegiatan' => $fileNamefoto,
            'pokja'          => session()->get('pokja'),
        ];
        $this->laporanModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('laporan-kegiatan'));
    }
    public function delete($id)
    {
        $data = $this->laporanModel->find($id);
        $file_foto = $data['foto_kegiatan'];
        if (file_exists(ROOTPATH . 'public/media/foto-kegiatan/' . $file_foto)) {
            unlink(ROOTPATH . 'public/media/foto-kegiatan/' . $file_foto);
        }
        $this->laporanModel->delete($id);
        if (session()->get('level') == 1) {
            session()->setFlashdata('m', 'Data berhasil dihapus');
            return redirect()->to(base_url('data-laporan-kegiatan'));
        } else {
            session()->setFlashdata('m', 'Data berhasil dihapus');
            return redirect()->to(base_url('laporan-kegiatan'));
        }
    }
    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Laporan Kegiatan',
            'title' => 'Edit Laporan Kegiatan',
            'isi' => 'master/laporan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->laporanModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong.',
                    'alpha_space' => 'Judul harus huruf dan spasi.'
                ]
            ],
            'manfaat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Manfaat dan Tujuan harus diisi.',
                ]
            ],
            'sasaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sasaran dan Capaian harus diisi.',
                ]
            ],
            'tglk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Kegiatan harus diisi.',
                ]
            ],
            'foto' => [
                'rules' => 'mime_in[foto,image/jpg,image/jpeg]|max_size[foto,500]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran gambar maksimal 500kb.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('laporan-kegiatan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $file_foto   = $this->request->getFile('foto');
        if ($file_foto->getError() == 4) {
            $r = $this->laporanModel->find($id);
            $fileNamefoto = $r['foto_kegiatan'];
        } else {
            $fileNamefoto = $file_foto->getRandomName();
            //move file
            $file_foto->move(ROOTPATH . 'public/media/foto-kegiatan/', $fileNamefoto);
            //if file found then replace file
            $f = $this->laporanModel->find($id);
            $replacefoto = $f['foto_kegiatan'];
            if (file_exists(ROOTPATH . 'public/media/foto-kegiatan/' . $replacefoto)) {
                unlink(ROOTPATH . 'public/media/foto-kegiatan/' . $replacefoto);
            }
        }
        $data = [
            'id_user'       => session()->get('id'),
            'id'            => $id,
            'judul'         => $this->request->getPost('judul'),
            'manfaat'       => $this->request->getPost('manfaat'),
            'sasaran'       => $this->request->getPost('sasaran'),
            'tgl_kegiatan'  => $this->request->getPost('tglk'),
            'foto_kegiatan' => $fileNamefoto,
            'pokja'          => session()->get('pokja'),
        ];
        $this->laporanModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('laporan-kegiatan'));
    }
    public function detail($id)
    {
        $detail = $this->userModel->join('mod_laporan', 'mod_laporan.id_user = mod_user.id', 'left')->where('mod_laporan.id =', $id)->first();
        $data = array(
            'title' => 'Detail Laporan Kegiatan',
            'data' => $detail,
            'isi' => 'master/laporan/detail',
        );
        // dd($detail);
        return view('layout/wrapper', $data);
    }
}
