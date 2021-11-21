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

    public function editData()
    {
        d($_POST);
        $table = $this->db->table('pengguna');
        $query = $table->where('pengguna_id = ' . $_POST['pengguna_id'])->update($_POST);

        echo '<script>alert("Data telah diperbaharui")</script>';
        echo '<script>window.location.href = "' . base_url() . '";</script>';
    }

    public function myAccount($penggunaId)
    {
        $table = $this->db->table('pengguna');
        $query = $table->where('pengguna_id = ' . $penggunaId)->get();

        $data = [
            'my_data' => $query->getResultArray()[0]
        ];

        return view('akun-saya', $data);
    }

    public function listSekolah()
    {
        $table = $this->db->table('sekolah');
        $query = $table->get();

        echo json_encode($query->getResultArray());
    }

    public function insertNewAcc()
    {
        $table = $this->db->table('sekolah');
        $query = $table->select('nama_sekolah, sekolah_id')->get();

        $nama_sekolah = $_POST['r-sekolah'];
        $sekolahExist = false;
        $sekolahId = 0;

        for ($i = 0; $i < count($query->getResultArray()); $i++) {
            if ($nama_sekolah == $query->getResultArray()[$i]['nama_sekolah']) {
                $sekolahExist = true;
                $sekolahId = $query->getResultArray()[$i]['sekolah_id'];
            }
        }

        $postedData = [
            'nama' => $_POST['r-nama'] ?? 'test',
            'email' => $_POST['r-email'] ?? 'test',
            'tanggal_lahir' => $_POST['r-bod'] ?? 'test',
            'sekolah_id' => $sekolahId,
            'kelas' => $_POST['r-kelas'] ?? 'test',
            'jenis_kelamin' =>  $_POST['r-gender'] ?? 'test',
            'password' => $_POST['r-password'] ?? 'test'
        ];

        $table = $this->db->table('pengguna');

        $tmp_msg = '';

        if ($table->insert($postedData) && $sekolahExist == true) {
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

    public function forgetPassword()
    {
        return view('forget-password');
    }

    public function sendPassword()
    {
        function msg($status, $msg)
        {
            return json_encode(['status' => $status, 'msg' => $msg]);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            parse_str(file_get_contents("php://input"), $post_vars);
            $email = $post_vars['email'];

            $table = $this->db->table('pengguna');
            try {
                $query = $table->select('email, password')->where('email = "' . $email . '"')->get();
                $result = $query->getResultArray()[0];
            } catch (Exception $e) {
                return msg(false, 'Maaf email tersebut tidak terdaftar');
            }

            // $email = \Config\Services::email();
            // $email->setTo('leonardolouis2@gmail.com');
            // $email->setFrom('louis.leonardo@uisproject.xyz', 'info');
            // $email->setSubject('Email Test');
            // $email->setMessage('Password Kewan mu adalah ' . $result['password']);

            // if (!$email->send()) {
            //     $data = $email->printDebugger(['headers']);
            //     // print_r($data);
            //     return  msg(false, 'Gagal mengirimkan ke email');
            // }

            return  msg(true, 'Password telah dikirimkan ke email mu');
        }
    }
}
