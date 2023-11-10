<?php

namespace App\Controllers;

use App\Models\ComputerModel;
use App\Models\PrinterModel;
use App\Models\ProyektorModel;
use App\Models\TaskModel;
use App\Models\StokModel;

class HomeController extends BaseController
{
    protected $dbComputer;
    protected $dbPrinter;
    protected $dbProyektor;
    protected $dbTask;
    protected $dbStok;
    public function __construct()
    {
        $this->dbComputer = new ComputerModel();
        $this->dbPrinter = new PrinterModel();
        $this->dbProyektor = new ProyektorModel();
        $this->dbTask = new TaskModel();
        $this->dbStok = new StokModel();
    }
    public function index(): string
    {
        $jumlahBagianComputerAktif = $this->dbComputer->like('status', '1')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerAktif = $jumlahBagianComputerAktif / $jumlahTotalComputer * 100;

        $jumlahBagianComputerSpare = $this->dbComputer->like('status', '0')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerSpare = $jumlahBagianComputerSpare / $jumlahTotalComputer * 100;
        $data = [
            'title' => 'Home',
            'computerPersentaseAktif' => ceil($persentaseComputerAktif),
            'computerAktif' => $this->dbComputer->like('status', '1')->countAllResults(),
            'computerPersentaseSpare' => floor($persentaseComputerSpare),
            'computerSpare' => $this->dbComputer->like('status', '0')->countAllResults(),
            'computerTotal' => $this->dbComputer->countAllResults(),
            'printer' => $this->dbPrinter->countAllResults(),
            'proyektor' => $this->dbProyektor->countAllResults(),
            'taskClose' => $this->dbTask->getDepartemenHome(),
            'taskProses' => $this->dbTask->getDepartemenHomeProses(),
            'stockMinim' => $this->dbStok->orderBy('stok', 'ASC')->where('stok <', 3)->find(),
        ];
        return view('home', $data);
    }

    public function pageError()
    {
        return view('errors/html/page_error');
    }
}
