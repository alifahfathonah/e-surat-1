<?php

namespace App\Models;

use CodeIgniter\Model;

class PenandatanganModel extends Model
{
    protected $table      = 'mod_penandatangan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_desa', 'nama', 'jabatan', 'ttd'];
}
