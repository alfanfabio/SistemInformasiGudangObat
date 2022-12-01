<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class modelView extends Model
{
    protected $table = 'expiredays';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'jumlah_obat',
        'tanggal_masuk',
        'tanggal_expire'
    ];
}
