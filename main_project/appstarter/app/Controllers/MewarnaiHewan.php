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

        $data = [
            'dataHewan' => $this->mewarnaiModel->find($id)
        ];

        // d($data);

        return view('mewarnai-hewan-detail', $data);
    }

    public function getData()
    {
        $builder = $this->db->table('mewarnai_hewan');
        $builder->select('binatang_id,nama_binatang,gambar_validasi');
        $query = $builder->get();

        $result = array();

        foreach ($query->getResultArray() as $data) {
            $result[] = array(
                "binatang_id" => $data['binatang_id'],
                "nama_binatang" => $data['nama_binatang'],
                "gambar_validasi" => $data['gambar_validasi']
            );
        };

        echo json_encode($result);
    }
}
