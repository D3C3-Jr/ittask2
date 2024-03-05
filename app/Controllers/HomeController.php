<?php

namespace App\Controllers;

use App\Models\ComputerModel;
use App\Models\PrinterModel;
use App\Models\ProyektorModel;
use App\Models\TaskModel;
use App\Models\StokModel;
use App\Models\LisensiModel;

class HomeController extends BaseController
{
    protected $dbComputer;
    protected $dbPrinter;
    protected $dbProyektor;
    protected $dbTask;
    protected $dbStok;
    protected $dbLisensi;
    public function __construct()
    {
        $this->dbComputer = new ComputerModel();
        $this->dbPrinter = new PrinterModel();
        $this->dbProyektor = new ProyektorModel();
        $this->dbTask = new TaskModel();
        $this->dbStok = new StokModel();
        $this->dbLisensi = new LisensiModel();
    }
    public function index(): string
    {
        $jumlahBagianLisensiValid = $this->dbLisensi->countAllResults();
        $jumlahTotalLisensi = $this->dbLisensi->countAllResults();
        $persentaseLisensiValid = $jumlahBagianLisensiValid / $jumlahTotalLisensi * 100;


        $data = [
            'title'                     => 'Home',
            'stockMinimAngka'           => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->countAllResults(),
            'stockMinimData'            => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->find(),
            'lisensi'                   => $this->dbLisensi->countAllResults(),
            'totalLisensiExpired'       => $this->dbLisensi->getTotalDataKurangDariTanggalSekarang(),
            'countClose'                => $this->dbTask->where('status', '0')->countAllResults(),
            'countStok'                => $this->dbStok->where('stok', '0')->countAllResults(),
        ];
        return view('home', $data);
    }

    public function pageError()
    {
        return view('errors/html/page_error');
    }
}
