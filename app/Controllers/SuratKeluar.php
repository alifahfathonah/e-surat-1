<?php

namespace App\Controllers;

use App\Models\SuratKeluarModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class SuratKeluar extends BaseController
{
    protected $suratkeluarModel;
    protected $userModel;
    public function __construct()
    {
        $this->suratkeluarModel = new SuratKeluarModel();
        $this->userModel = new UserModel();
    }
    public function data()
    {
        $surat = $this->suratkeluarModel->findAll();
        $data = array(
            'title' => 'Surat Keluar',
            'data' => $surat,
            'isi' => 'master/surat-keluar/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Surat Keluar',
            'title' => 'Tambah Surat Keluar',
            'isi' => 'master/surat-keluar/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'nosurat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Surat harus diisi.',
                ]
            ],
            'sifat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sifat Surat harus dipilih.',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Surat harus dipilih.',
                ]
            ],
            'perihal' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Perihal harus diisi.',
                    'alpha_numeric_punct' => 'Dasar Hukum berisi karakter yang tidak didukung.'
                ]
            ],
            'penandatangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penandatangan harus diisi.',
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi surat harus diisi.',
                ]
            ],
            'file_lampiran' => [
                'rules' => 'mime_in[file_lampiran,application/pdf]|max_size[file_lampiran,2000]',
                'errors' => [
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 2MB.'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/tambah-surat-keluar')->withInput();
        }
        $lampiran   = $this->request->getFile('file_lampiran');
        if ($lampiran->getError() == 4) {
            $fileNamelampiran = null;
        } else {
            $fileNamelampiran = $lampiran->getRandomName();
            $lampiran->move(ROOTPATH . 'public/media/lampiran-surat/', $fileNamelampiran);
        }
        $data = [
            'id_user'        => session()->get('id'),
            'no_surat'       => $this->request->getPost('nosurat'),
            'kategori_surat' => $this->request->getPost('kategori'),
            'sifat_surat'    => $this->request->getPost('sifat'),
            'perihal'        => $this->request->getPost('perihal'),
            'penandatangan'  => $this->request->getPost('penandatangan'),
            'isi'            => $this->request->getPost('isi'),
            'jlh_lampiran'   => $this->request->getPost('jlhlampiran'),
            'satuan'         => $this->request->getPost('satuan'),
            'tujuan'         => $this->request->getPost('tujuan'),
            'file_lampiran'  => $fileNamelampiran,
            'pokja'          => session()->get('pokja'),
        ];
        $this->suratkeluarModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('surat-keluar'));
    }

    public function delete($id)
    {
        // Drop file
        $data = $this->suratkeluarModel->where('id =', $id)->first();
        $lampiran = $data['file_lampiran'];
        if (file_exists(ROOTPATH . 'public/media/lampiran-surat/' . $lampiran)) {
            if ($lampiran != null) {
                unlink(ROOTPATH . 'public/media/lampiran-surat/' . $lampiran);
            }
        }
        $this->suratkeluarModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('surat-keluar'));
    }

    public function edit($id)
    {
        $ids = session()->get('id');
        $data = array(
            'titlebar' => 'Surat Keluar',
            'title' => 'Edit Surat Keluar',
            'isi' => 'master/surat-keluar/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->suratkeluarModel->where('id =', $id)->where('id_user =', $ids)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'nosurat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Surat harus diisi.',
                ]
            ],
            'sifat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sifat Surat harus dipilih.',
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Surat harus dipilih.',
                ]
            ],
            'perihal' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Perihal harus diisi.',
                    'alpha_numeric_punct' => 'Dasar Hukum berisi karakter yang tidak didukung.'
                ]
            ],
            'penandatangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Penandatangan harus diisi.',
                ]
            ],
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi surat harus diisi.',
                ]
            ],
            'file_lampiran' => [
                'rules' => 'mime_in[file_lampiran,application/pdf]|max_size[file_lampiran,2000]',
                'errors' => [
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 2MB.'
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('surat-keluar/edit/' . $this->request->getPost('id')))->withInput();
        }
        $lampiran   = $this->request->getFile('file_lampiran');
        if ($lampiran->getError() == 4) {
            $r = $this->suratkeluarModel->find($id);
            $fileNamelampiran = $r['file_lampiran'];
        } else {
            $fileNamelampiran = $lampiran->getRandomName();
            //move file
            $lampiran->move(ROOTPATH . 'public/media/lampiran-surat/', $fileNamelampiran);
            //if file found then replace file
            $f = $this->suratkeluarModel->find($id);
            $replacelampiran = $f['file_lampiran'];
            if (file_exists(ROOTPATH . 'public/media/lampiran-surat/' . $replacelampiran)) {
                if ($replacelampiran != null) {
                    unlink(ROOTPATH . 'public/media/lampiran-surat/' . $replacelampiran);
                }
            }
        }
        $data = [
            'id'             => $id,
            'no_surat'       => $this->request->getPost('nosurat'),
            'kategori_surat' => $this->request->getPost('kategori'),
            'sifat_surat'    => $this->request->getPost('sifat'),
            'perihal'        => $this->request->getPost('perihal'),
            'penandatangan'  => $this->request->getPost('penandatangan'),
            'isi'            => $this->request->getPost('isi'),
            'jlh_lampiran'   => $this->request->getPost('jlhlampiran'),
            'satuan'         => $this->request->getPost('satuan'),
            'tujuan'         => $this->request->getPost('tujuan'),
            'file_lampiran'  => $fileNamelampiran,
        ];
        $this->suratkeluarModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('surat-keluar'));
    }
    public function detail($id)
    {
        $detail = $this->userModel->join('mod_surat_keluar', 'mod_surat_keluar.id_user = mod_user.id', 'left')->where('mod_surat_keluar.id =', $id)->first();
        $data = array(
            'title' => 'Detail Surat Keluar',
            'data' => $detail,
            'isi' => 'master/surat-keluar/detail',
        );
        return view('layout/wrapper', $data);
    }
}
