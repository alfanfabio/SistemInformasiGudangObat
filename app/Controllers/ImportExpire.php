<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\modelExpire;
use CodeIgniter\HTTP\RequestInterface;

class ImportExpire extends BaseController
{


    public function jumlahMasuk()
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,204800]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data);
        } else {
            if ($file = $this->request->getFile('file')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('../public/fileImportTanggal', $newName);
                    $file = fopen("../public/fileImportTanggal/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 5;
                    $csvArr = array();

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        if ($i > 0 && $num == $numberOfFields) {
                            $csvArr[$i]['id'] = $filedata[0];
                            $csvArr[$i]['nama'] = $filedata[1];
                            $csvArr[$i]['jumlah_masuk'] = $filedata[2];
                            $csvArr[$i]['tanggal_masuk'] = $filedata[3];
                            $csvArr[$i]['tanggal_expire'] = $filedata[4];
                        }
                        $i++;
                    }
                    fclose($file);
                    $count = 0;
                    foreach ($csvArr as $dataJumlahMasuk) {
                        $modelJumlahMasuk = new modelExpire();
                        $findRecord = $modelJumlahMasuk->where('id', $dataJumlahMasuk['id'])->countAllResults();
                        if ($findRecord == 0) {
                            if ($modelJumlahMasuk->insert($dataJumlahMasuk)) {
                                $count++;
                            }
                        }
                    }
                    session()->setFlashdata('message', $count . ' rows successfully added.');
                    session()->setFlashdata('alert-class', 'alert-success');
                } else {
                    session()->setFlashdata('message', 'CSV file coud not be imported.');
                    session()->setFlashdata('alert-class', 'alert-danger');
                }
            } else {
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->route('pages/import-obat-masuk');
    }
}
