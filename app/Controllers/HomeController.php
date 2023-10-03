<?php

namespace App\Controllers;

use App\Models\ComputerModel;
use App\Models\PrinterModel;
use App\Models\ProyektorModel;
use App\Models\TaskModel;

class HomeController extends BaseController
{
    protected $dbComputer;
    protected $dbPrinter;
    protected $dbProyektor;
    protected $dbTask;
    public function __construct()
    {
        $this->dbComputer = new ComputerModel();
        $this->dbPrinter = new PrinterModel();
        $this->dbProyektor = new ProyektorModel();
        $this->dbTask = new TaskModel();
    }
    public function index(): string
    {
        $jumlahBagianComputerAktif = $this->dbComputer->like('status', '1')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerAktif = $jumlahBagianComputerAktif / $jumlahTotalComputer * 100;

        $taskClose = $this->dbTask->like('status', '0')->find();

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
            'taskClose' => $taskClose,
        ];
        return view('home', $data);
    }
}
