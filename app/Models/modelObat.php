<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class modelObat extends Model
{
    protected $table = 'obat';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'jenis',
        'jumlah',
        'obat_keluar'
    ];

    public function getObat($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
