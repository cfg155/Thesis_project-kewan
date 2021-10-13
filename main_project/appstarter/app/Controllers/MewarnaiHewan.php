<?php

namespace App\Controllers;

use App\Models\MewarnaiModel;
use Config\App;

class MewarnaiHewan extends BaseController
{

    protected $mewarnaiModel;
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->mewarnaiModel = new \App\Models\MewarnaiModel();
    }

    public function index()
    {

        return view('mewarnai-hewan');
    }

    public function detail($id)
    {

        // echo $id;
        $data = [
            'dataHewan' => $this->mewarnaiModel->find($id)
        ];

        return view('mewarnai-hewan-detail', $data);
    }

    public function getData()
    {
        $builder = $this->db->table('mewarnai_hewan');
        $builder->select('binatang_id,nama_binatang');
        $query = $builder->get();

        $result = array();

        foreach ($query->getResultArray() as $data) {
            $result[] = array(
                "binatang_id" => $data['binatang_id'],
                "nama_binatang" => $data['nama_binatang']
            );
        };

        echo json_encode($result);


        // echo json_encode($data);

        // // Setup encrypter
        // $encrypter = \Config\Services::encrypter();
        // $encryptedData = $encrypter->encrypt($data['nama_binatang']);

        // $encoded = bin2hex(\CodeIgniter\Encryption\Encryption::createKey(32));

        // $encoded = base64_encode($encrypter->encrypt($data['svg_code']));

        // echo $encoded . '<br>';

        // echo $encrypter->decrypt(base64_decode($encoded));

        // // echo $data['nama_binatang'] . '<br>';
        // // echo $encryptedData . '<br>';
        // // echo $encrypter->decrypt($encryptedData);
        // // echo json_encode($encryptedData);
    }
}
