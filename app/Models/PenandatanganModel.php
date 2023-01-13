<?php

namespace App\Models;

use CodeIgniter\Model;

class PenandatanganModel extends Model
{
    protected $table      = 'mod_penandatangan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'jabatan', 'ttd'];
}
