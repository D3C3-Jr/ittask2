<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComputerModel;

class AssetController extends BaseController
{
    protected $computerModel;
    public function __construct()
    {
        $this->computerModel = new ComputerModel();
    }

    public function index()
    {
        $data = [
            'computers' => $this->computerModel->findAll(),
            'title' => 'Data Asset IT',
            'computer' => '<button class="btn btn-sm btn-primary tambahComputer my-3">Tambah Data Computer</button>',
            'printer' => '<button class="btn btn-sm btn-primary tambahPrinter my-3">Tambah Data Printer</button>',
            'proyektor' => '<button class="btn btn-sm btn-primary tambahProyektor my-3">Tambah Data Proyektor</button>'
        ];
        return view('asset/index', $data);
    }
}
