<?php

namespace App\Controllers;

class TebakHewan extends BaseController
{
    protected $db;
    protected $tebakHewan;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->tebakHewan = new \App\Models\TebakHewanModel();
    }

    public function index()
    {
        return view('tebak-hewan');
    }

    public function getData()
    {
        $builder = $this->db->table('tebak_hewan');
        $result = $builder->get()->getResultArray();

        echo json_encode($result);
    }
}
