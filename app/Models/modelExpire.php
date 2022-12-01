<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class modelExpire extends Model
{
    protected $table = 'notexpiredays';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'jumlah_masuk',
        'tanggal_masuk',
        'tanggal_expire'
    ];


    public function get_sum()
    {
        $sql = "SELECT sum(jumlah) as jumlah FROM obat";
        $result = $this->db->query($sql);
        return $result;
    }
}
