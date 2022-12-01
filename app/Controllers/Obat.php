<?php

namespace App\Controllers;

use App\Models\modelObat;
use Dompdf\Dompdf;

class Obat extends BaseController
{
    public function __construct()
    {
        $this->modelObat = new modelObat();
    }
    public function index()
    {
        $obat = $this->modelObat->findAll();

        $data = [
            'title' => 'Daftar Obat',
            'obat' => $obat
        ];

        return view('layout/table', $data);
    }
    public function printpdf()
    {
        $dompdf = new Dompdf();
        $obat = $this->modelObat->findAll();

        $data = [
            'title' => 'Daftar Obat',
            'obat' => $obat
        ];

        $html = view('layout/tablePDF', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
    }

    public function delete($id)
    {
        $this->modelObat->delete($id);
        return redirect()->to('/pages/table');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubat Data Obat',
            'validation' => \Config\Services::validation(),
            'obat' => $this->modelObat->getObat($id)
        ];

        return view('layout/edit', $data);
    }

    public function update($id)
    {
        $this->modelObat->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'jumlah' => $this->request->getVar('jumlah'),
            'obat_keluar' => $this->request->getVar('obat_keluar')
        ]);

        return redirect()->to('/pages/table');
    }


    public function show_sum()
    {
        $data['sum'] = $this->modelObat->get_sum();
    }
}
