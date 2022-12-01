<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\modelObat;
use App\Models\modelExpire;
use CodeIgniter\HTTP\RequestInterface;

class Import extends BaseController
{

    public function __construct()
    {
        $this->db = db_connect();
    }
    public function jumlah()
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
                    $this->db->query("TRUNCATE TABLE obat");
                    $newName = $file->getRandomName();
                    $file->move('../public/fileImportObat', $newName);
                    $file = fopen("../public/fileImportObat/" . $newName, "r");
                    $i = 0;
                    $numberOfFields = 5;
                    $csvArr = array();

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        if ($i > 0 && $num == $numberOfFields) {
                            $csvArr[$i]['id'] = $filedata[0];
                            $csvArr[$i]['nama'] = $filedata[1];
                            $csvArr[$i]['jenis'] = $filedata[2];
                            $csvArr[$i]['jumlah'] = $filedata[3];
                            $csvArr[$i]['obat_keluar'] = $filedata[4];
                        }
                        $i++;
                    }
                    fclose($file);
                    $count = 0;
                    foreach ($csvArr as $dataJumlah) {
                        $modelJumlah = new modelObat();
                        $findRecord = $modelJumlah->where('id', $dataJumlah['id'])->countAllResults();
                        if ($findRecord == 0) {
                            if ($modelJumlah->insert($dataJumlah)) {
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
        return redirect()->route('pages/import-jumlah-obat');
    }
}
