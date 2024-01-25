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
        $jumlahBagianComputerAktif = $this->dbComputer->like('status', '1')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerAktif = $jumlahBagianComputerAktif / $jumlahTotalComputer * 100;

        $jumlahBagianComputerSpare = $this->dbComputer->like('status', '0')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerSpare = $jumlahBagianComputerSpare / $jumlahTotalComputer * 100;

        $jumlahBagianLisensiValid = $this->dbLisensi->countAllResults();
        $jumlahTotalLisensi = $this->dbLisensi->countAllResults();
        $persentaseLisensiValid = $jumlahBagianLisensiValid / $jumlahTotalLisensi * 100;

        $jumlahBagianPrinterAktif = $this->dbPrinter->like('status', '1')->countAllResults();
        $jumlahTotalPrinter = $this->dbPrinter->countAllResults();
        $persentasePrinterAktif = $jumlahBagianPrinterAktif / $jumlahTotalPrinter * 100;

        $jumlahBagianPrinterSpare = $this->dbPrinter->like('status', '0')->countAllResults();
        $jumlahTotalPrinter = $this->dbPrinter->countAllResults();
        $persentasePrinterSpare = $jumlahBagianPrinterSpare / $jumlahTotalPrinter * 100;


        $data = [
            'title'                     => 'Home',
            'computerPersentaseAktif'   => ceil($persentaseComputerAktif),
            'computerAktif'             => $this->dbComputer->like('status', '1')->countAllResults(),
            'computerPersentaseSpare'   => floor($persentaseComputerSpare),
            'computerSpare'             => $this->dbComputer->like('status', '0')->countAllResults(),
            'computerTotal'             => $this->dbComputer->countAllResults(),

            'printerPersentaseAktif'   => ceil($persentasePrinterAktif),
            'printerAktif'             => $this->dbPrinter->like('status', '1')->countAllResults(),
            'printerPersentaseSpare'   => floor($persentasePrinterSpare),
            'printerSpare'             => $this->dbPrinter->like('status', '0')->countAllResults(),
            'printerTotal'             => $this->dbPrinter->countAllResults(),

            'printer'                   => $this->dbPrinter->countAllResults(),
            'proyektor'                 => $this->dbProyektor->countAllResults(),
            'taskClose'                 => $this->dbTask->getDepartemenHome(),
            'taskProses'                => $this->dbTask->getDepartemenHomeProses(),
            'stockMinimAngka'           => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->countAllResults(),
            'stockMinimData'            => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->find(),
            'lisensi'                   => $this->dbLisensi->countAllResults(),
            'lisensiValid'              => $this->dbLisensi->getDataKurangDariTanggalSekarang(),
            'totalLisensiExpired'       => $this->dbLisensi->getTotalDataKurangDariTanggalSekarang(),
            'countClose'                => $this->dbTask->where('status', '0')->countAllResults(),
        ];
        return view('home', $data);
    }

    public function pageError()
    {
        return view('errors/html/page_error');
    }
}
