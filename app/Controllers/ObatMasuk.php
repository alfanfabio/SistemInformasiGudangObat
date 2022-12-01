<?php

namespace App\Controllers;

use App\Models\modelExpire;
use Dompdf\Dompdf;

class ObatMasuk extends BaseController
{
    public function __construct()
    {
        $this->modelObatExpire = new modelExpire();
    }
    public function index()
    {
        $expire = $this->modelObatExpire->findAll();

        $data = [
            'title' => 'Daftar Obat Masuk',
            'expire' => $expire
        ];

        return view('layout/obatExpire', $data);
    }

    public function printpdf()
    {
        $dompdf = new Dompdf();
        $expire = $this->modelObatExpire->findAll();

        $data = [
            'title' => 'Daftar Obat Masuk',
            'expire' => $expire
        ];

        $html = view('layout/obatExpirePDF', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function delete($id)
    {
        $this->modelObatExpire->delete($id);
        return redirect()->to('/pages/obatMasuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubat Data Obat Masuk',
            'validation' => \Config\Services::validation(),
            'expire' => $this->modelObatExpire->getExpire($id)
        ];

        return view('layout/editObatMasuk', $data);
    }

    public function update($id)
    {
        $this->modelObatExpire->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'jumlah_masuk' => $this->request->getVar('jumlah_masuk'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'tanggal_expire' => $this->request->getVar('tanggal_expire')
        ]);

        return redirect()->to('/pages/obatMasuk');
    }
}
