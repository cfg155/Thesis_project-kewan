<?php

namespace App\Controllers;

class Quiz extends BaseController
{
    protected $db;
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
    }
}
