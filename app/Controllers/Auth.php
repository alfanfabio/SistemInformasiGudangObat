<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function register()
    {
        $val = $this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi',
                    ]

                ],
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'is_unique' => '{field} telah digunakan'
                    ]

                ],
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'min_length' => '{field} harus lebih dari 5 karakter'
                    ]
                ],
                'level' => 'required',
            ],
        );

        if (!$val) {
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validate', $pesanvalidasi);
        }
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        );
        $model = new UsersModel;
        $model->insert($data);
        session()->setFlashdata('pesan', 'Akun berhasil dibuat.');
        return redirect()->to('/');
    }

    public function login()
    {
        $model = new AuthModel;
        $table = 'user';
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $row = $model->get_data_login($username, $table);
        if ($row == NULL) {
            session()->setFlashdata('pesan', 'wrong username');
            return redirect()->to('/');
        }
        if (password_verify($password, $row->password)) {
            $data = array(
                'log' => TRUE,
                'nama' => $row->nama,
                'username' => $row->username,
                'level' => $row->level,
            );
            session()->set($data);
            session()->setFlashdata('pesan', 'login success');
            return redirect()->to('/pages/dashboard');
        }
        session()->setFlashdata('pesan', 'wrong password');
        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('pesan', 'Log out succesfully');
        return redirect()->to('/');
    }
}
