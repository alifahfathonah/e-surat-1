<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table      = 'mod_laporan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_user', 'id_desa', 'judul', 'manfaat', 'sasaran', 'tgl_kegiatan', 'foto_kegiatan', 'pokja'];
}
