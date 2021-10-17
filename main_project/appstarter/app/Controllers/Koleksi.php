<?php

namespace App\Controllers;

class Koleksi extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function listBinatang()
    {
        return view('koleksi');
    }

    public function koleksiDetil($id)
    {
        $id = $id;
        $table = $this->db->table('koleksi');
        $query = $table->select('*')->where('binatang_id = ' . $id)->get();

        $result = [
            "dataHewan" => $query->getResultArray()[0]
        ];

        return view('koleksi-detail', $result);
    }
}
