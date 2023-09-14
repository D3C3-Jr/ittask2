<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComputerModel;
use App\Models\PrinterModel;
use App\Models\ProyektorModel;

class AssetController extends BaseController
{
    protected $dbComputer;
    protected $dbPrinter;
    protected $dbProyektor;
    public function __construct()
    {
        $this->dbComputer = new ComputerModel();
        $this->dbPrinter = new PrinterModel();
        $this->dbProyektor = new ProyektorModel();
    }

    public function index()
    {
        $data = [
            'printers' => $this->dbPrinter->findAll(),
            'proyektors' => $this->dbProyektor->findAll(),
            'title' => 'Data Asset',
        ];
        return view('asset/index', $data);
    }

    public function readComputer()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbComputer->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbComputer->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbComputer->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbComputer->ajaxGetTotalSearch($search);
            $output = [
                'recordsTotal' => $total_search,
                'recordsFiltered' => $total_search
            ];
        }

        $data = [];
        $no = $start + 1;

        foreach ($list as $temp) {
            $aksi = '
                    <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editData(' . $temp['id_computer'] . ')"><i class="fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="hapusData(' . $temp['id_computer'] . ')"><i class="fas fa-trash"> </i></a>
            ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['asset_number'];
            $row[] = $temp['device_id'];
            $row[] = $temp['jenis'];
            $row[] = $temp['login_user'];
            $row[] = $temp['serial_number'];
            $row[] = $temp['user'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function saveComputer()
    {
        $this->_validate('save');
        $data = [
            'asset_number' => $this->request->getVar('asset_number'),
            'device_id' => $this->request->getVar('device_id'),
            'login_user' => $this->request->getVar('login_user'),
            'jenis' => $this->request->getVar('jenis'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'mac_address' => $this->request->getVar('mac_address'),
            'processor' => $this->request->getVar('processor'),
            'ram' => $this->request->getVar('ram'),
            'rom' => $this->request->getVar('rom'),
            'user' => $this->request->getVar('user'),
        ];

        if ($this->dbComputer->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validate($method)
    {
        if (!$this->validate($this->dbComputer->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
        }
    }
}
