<?php

namespace App\Controllers;

use App\Models\SuratKeluarModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use TCPDF;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Tcpdf as PdfTcpdf;

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
        $ids = session()->get('id');
        $surat = $this->suratkeluarModel->where('id_user =', $ids)->findAll();
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
    // public function print($id)
    // {
    //     $mpdf = new \Mpdf\Mpdf();
    //     $html = '<table width="100%" border="0" cellpadding="1">
    //     <tr>
    //     <td align="center"><img src="' . ROOTPATH . 'public/media/logo/logopkk.png"></td>
    //     </tr>
    //     <tr>
    //     <td><div align="center"><font><b>Test</b></font></div></td>
    //     </tr>
    //     </table>';
    //     // $html = ROOTPATH . 'public/media/logo/logopkk.png';
    //     $mpdf->SetHeader('Document Title|Center Text|{PAGENO}');
    //     $mpdf->SetFooter('Document Title');
    //     $this->response->setContentType('application/pdf');
    //     $mpdf->WriteHTML($html);
    //     return redirect()->to($mpdf->Output('Filename.pdf', 'I'));
    //     // $mpdf->Output();
    // }
    public function print($id)
    {
        $q = $this->suratkeluarModel->where('id =', $id)->first();
        $no_surat = $q['no_surat'];
        $sifat = $q['sifat_surat'];
        $jlh_lampiran = $q['jlh_lampiran'];
        $satuan = $q['satuan'];
        $perihal = $q['perihal'];
        $isi = $q['isi'];
        $tujuan = $q['tujuan'];
        $tgl = $q['created_at'];
        $penandatangan = $q['penandatangan'];

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        //initialize document
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetMargins(20, 15, 20, true);
        $pdf->SetAutoPageBreak(TRUE, 2);
        $pdf->AddPage("P", "A4");
        $pdf->SetFont("helvetica", "", 12);
        $this->response->setContentType('application/pdf');


        $html = '<table width="100%" border="0" cellpadding="1">
        <tr>
        <td width="20%" rowspan="5" align="center"><img src="' . ROOTPATH . 'public/media/logo/logopkk.png" width="80" height="80"></td>
        <td width="80%" align="center"><font size="+2"><b>PEMBERDAYAAN DAN KESEJAHTERAAN KELUARGA</b></font></td>
        </tr>
        <tr>
        <td align="center"><font size="+4"><b>-PKK-</b></font></td>
        </tr>
        <tr>
        <td align="center"><font size="+2"><b>DESA MANGKAI BARU</b></font></td>
        </tr>
        <tr>
        <td align="center"><font size="+2"><b>KECAMATAN LIMA PULUH</b></font></td>
        </tr>
        <tr>
        <td align="center"><font size="-3">Jalan Besar Dusun V Desa Mangkai Baru Kode Pos 21255</font></td>
        </tr>
        <tr>
        <td colspan="2"><hr height="2px"></td>
        </tr>
        </table>';

        $html .= '<table width="100%" border="0" cellpadding="0">
        <tr>
        <td width="45%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="45%">&nbsp;</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>Mangkai Baru, ' . format_tgl_surat($tgl) . ' </td>
        </tr>
        <br>
        
        <tr>
        <td valign="top">
        <table width="100%" border="0" cellpadding="0">
        <tr>
        <td width="25%">Nomor</td>
        <td width="5%">:</td>
        <td width="70%"><font size="-1">' . $no_surat . '</font></td>
        </tr>
        <tr>
        <td>Sifat</td>
        <td>:</td>
        <td>' . $sifat . '</td>
        </tr>
        <tr>
        <td>Lampiran</td>
        <td>:</td>
        <td>' . $jlh_lampiran . ' ' . $satuan . ' </td>
        </tr>
        <tr>
        <td>Perihal</td>
        <td>:</td>
        <td><b>' . $perihal . '</b></td>
        </tr>
        </table>
        </td>

        <td valign="top" colspan="2">
        <table width="100%" border="0" cellpadding="1">
        <tr>
        <td width="16%">&nbsp;</td>
        <td colspan="2" width="84%">Kepada yth :</td>
        </tr>
        <tr>
        <td width="16%" align="right">&nbsp;</td>
        <td width="84%" colspan="2" valign="top"><font size="-1">Ketua ' . $tujuan . '</font></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td colspan="2">di -</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="68%"><font size="-1"><b>Tempat</b></font></td>
        </tr>
        </table>
        </td>
        </tr>
        </table>';

        $html .= '
        <table width="100%" border="0" cellpadding="2">
        <tr>
        <td width="8%"></td>
        <td width="92%"></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td>' . $isi . '</td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        </tr>
        </table>';

        $html .= '<table width="100%" border="0" cellpadding="2">
        <tr>
        <td width="50%">&nbsp;</td>
        <td width="10%">&nbsp;</td>
        <td width="40%">&nbsp;</td>
        </tr>
        <tr>
        <td width="6%">&nbsp;</td>
        <td colspan="2" width="44%" valign="top">
        </td>
        <td valign="top" width="50%" >
        <table width="100%" border="0" cellpadding="0">
        
        <tr>
        <td width="22%">&nbsp;</td>
        <td width="78%" align="left"><b>KETUA PKK</b></td>
        </tr>
        
        <tr>
        <td align="center"></td>
        </tr>
        <tr>
        <td align="center"></td>
        </tr>
        <tr>
        <td align="center"></td>
        </tr>
        <tr>
        <td align="center"></td>
        </tr>
        
        <tr>
        <td width="22%">&nbsp;</td>
        <td width="78%" align="left"><u><font size="-1"><b>' . $penandatangan . '</b></font></u></td>
        </tr>
        
        </table>
        </td>
        </tr>
        </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $filename = "surat_keluar/" . $no_surat . ".pdf";
        $pdf->Output($filename, 'I');
    }
}
