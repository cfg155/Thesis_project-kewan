<?php

namespace App\Controllers;

use Exception;

class Pengguna extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function registrasi()
    {
        return view('masuk-akun.php');
    }

    public function insertNewAcc()
    {
        $postedData = [
            'nama' => $_POST['r-nama'] ?? 'test',
            'email' => $_POST['r-email'] ?? 'test',
            'tanggal_lahir' => $_POST['r-bod'] ?? 'test',
            'sekolah_id' => $_POST['r-sekolah'],
            'kelas' => $_POST['r-kelas'] ?? 'test',
            'jenis_kelamin' =>  $_POST['r-gender'] ?? 'test',
            'password' => $_POST['r-password'] ?? 'test'
        ];

        d($postedData);

        $table = $this->db->table('pengguna');

        $tmp_msg = '';

        if ($table->insert($postedData)) {
            $tmp_msg = "Akun telah berhasil dibuat";
        } else {
            $tmp_msg = "Gagal membuat akun";
        }

        $session = \Config\Services::session();
        $session->setFlashdata('register_msg', $tmp_msg);
        $session->setFlashdata('email', $postedData['email']);

        return redirect()->to(base_url());
    }

    public function login()
    {
        $loginData = [
            'email' => $_POST['login-email'],
            'password' => $_POST['login-password']
        ];

        d($loginData);
        $table = $this->db->table('pengguna');
        $query = $table->select('pengguna_id, email, password')->where('email = "' . $loginData['email'] . '"')->get();

        $failedMsg = '<script>alert("Email atau Password salah")</script>';
        $session = \Config\Services::session();

        try {
            d($query->getResultArray()[0]);
            if ($loginData['email'] == $query->getResultArray()[0]['email'] && $loginData['password'] == $query->getResultArray()[0]['password']) {

                $session->setFlashdata('pengguna_id', $query->getResultArray()[0]['pengguna_id']);
                $session->setFlashdata('login_msg', 'Login telah berhasil');
            } else {
                $session->setFlashdata('login_msg', 'Email atau password salah');
                $session->setFlashdata('pengguna_id', false);
            }
        } catch (Exception $e) {
            echo $failedMsg;
        }

        return redirect()->to(base_url());
    }
}
