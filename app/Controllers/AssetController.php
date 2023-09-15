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
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary " onclick="detailComputer(' . $temp['id_computer'] . ')"><i class="fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-success " onclick="editComputer(' . $temp['id_computer'] . ')"><i class="fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger " onclick="deleteComputer(' . $temp['id_computer'] . ')"><i class="fas fa-trash"> </i></a>
            ';
            $row = [];
            $row[] = $no;
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
            'prosesor' => $this->request->getVar('prosesor'),
            'ram' => $this->request->getVar('ram'),
            'rom' => $this->request->getVar('rom'),
            'user' => $this->request->getVar('user'),
            'status' => $this->request->getVar('status'),
        ];

        if ($this->dbComputer->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function editComputer($id_computer)
    {
        $data = $this->dbComputer->find($id_computer);
        echo json_encode($data);
    }

    public function detailComputer($id_computer)
    {
        $data = $this->dbComputer->find($id_computer);
        echo json_encode($data);
    }

    public function updateComputer()
    {
        $this->_validate('update');
        $id_computer = $this->request->getVar('id_computer');
        $computer = $this->dbComputer->find($id_computer);

        $data = [
            'id_computer' => $id_computer,
            'asset_number' => $this->request->getVar('asset_number'),
            'device_id' => $this->request->getVar('device_id'),
            'login_user' => $this->request->getVar('login_user'),
            'jenis' => $this->request->getVar('jenis'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'mac_address' => $this->request->getVar('mac_address'),
            'prosesor' => $this->request->getVar('prosesor'),
            'ram' => $this->request->getVar('ram'),
            'rom' => $this->request->getVar('rom'),
            'user' => $this->request->getVar('user'),
            'status' => $this->request->getVar('status'),
        ];

        if ($this->dbComputer->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteComputer($id_computer)
    {
        if ($this->dbComputer->delete($id_computer)) {
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
            $data['status'] = true;

            if ($validation->hasError('asset_number')) {
                $data['inputerror'][] = 'asset_number';
                $data['error_string'][] = $validation->getError('asset_number');
                $data['status'] = false;
            }
            if ($validation->hasError('device_id')) {
                $data['inputerror'][] = 'device_id';
                $data['error_string'][] = $validation->getError('device_id');
                $data['status'] = false;
            }
            if ($validation->hasError('login_user')) {
                $data['inputerror'][] = 'login_user';
                $data['error_string'][] = $validation->getError('login_user');
                $data['status'] = false;
            }
            if ($validation->hasError('jenis')) {
                $data['inputerror'][] = 'jenis';
                $data['error_string'][] = $validation->getError('jenis');
                $data['status'] = false;
            }
            if ($validation->hasError('nama_produk')) {
                $data['inputerror'][] = 'nama_produk';
                $data['error_string'][] = $validation->getError('nama_produk');
                $data['status'] = false;
            }
            if ($validation->hasError('serial_number')) {
                $data['inputerror'][] = 'serial_number';
                $data['error_string'][] = $validation->getError('serial_number');
                $data['status'] = false;
            }
            if ($validation->hasError('mac_address')) {
                $data['inputerror'][] = 'mac_address';
                $data['error_string'][] = $validation->getError('mac_address');
                $data['status'] = false;
            }
            if ($validation->hasError('prosesor')) {
                $data['inputerror'][] = 'prosesor';
                $data['error_string'][] = $validation->getError('prosesor');
                $data['status'] = false;
            }
            if ($validation->hasError('ram')) {
                $data['inputerror'][] = 'ram';
                $data['error_string'][] = $validation->getError('ram');
                $data['status'] = false;
            }
            if ($validation->hasError('rom')) {
                $data['inputerror'][] = 'rom';
                $data['error_string'][] = $validation->getError('rom');
                $data['status'] = false;
            }
            if ($validation->hasError('user')) {
                $data['inputerror'][] = 'user';
                $data['error_string'][] = $validation->getError('user');
                $data['status'] = false;
            }
            if ($validation->hasError('status')) {
                $data['inputerror'][] = 'status';
                $data['error_string'][] = $validation->getError('status');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
