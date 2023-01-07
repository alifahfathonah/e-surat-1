<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratMasukModel extends Model
{
    protected $table      = 'mod_surat_masuk';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'no_surat', 'sifat_surat', 'kategori_surat', 'perihal', 'asal_surat', 'file', 'lampiran', 'pokja'];
}
