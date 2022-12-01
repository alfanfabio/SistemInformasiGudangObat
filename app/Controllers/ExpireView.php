<?php

namespace App\Controllers;

use App\Models\modelView;

class ExpireView extends BaseController
{
    public function __construct()
    {
        $this->modelView = new modelView();
    }
    public function index()
    {
        $view = $this->modelView->findAll();

        $data = [
            'title' => 'Daftar View Expire',
            'view' => $view
        ];

        return view('layout/viewExpire', $data);
    }

    public function delete($id)
    {
        $this->modelView->delete($id);
        return redirect()->to('/pages/table');
    }
}
