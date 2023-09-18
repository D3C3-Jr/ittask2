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
            'title' => 'Data Asset',
        ];
        return view('asset/index', $data);
    }


    // READ
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
            <div class="text-center">
                    <a href="javascript:void(0)" onclick="detailComputer(' . $temp['id_computer'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editComputer(' . $temp['id_computer'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteComputer(' . $temp['id_computer'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';
            $status = $temp['status'];
            if ($status == 0) {
                $status = '<badge class="badge badge-danger"> Spare </badge>';
            } else {
                $status = '<badge class="badge badge-info"> Aktif </badge>';
            }
            $row = [];
            $row[] = $no;
            $row[] = $temp['device_id'];
            $row[] = $temp['login_user'];
            $row[] = $temp['serial_number'];
            $row[] = $temp['user'];
            $row[] = $status;
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function readPrinter()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbPrinter->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbPrinter->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbPrinter->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbPrinter->ajaxGetTotalSearch($search);
            $output = [
                'recordsTotal' => $total_search,
                'recordsFiltered' => $total_search
            ];
        }

        $data = [];
        $no = $start + 1;

        foreach ($list as $temp) {
            $aksi = '
            <div class="text-center">
                    <a href="javascript:void(0)" onclick="detailPrinter(' . $temp['id_printer'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editPrinter(' . $temp['id_printer'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deletePrinter(' . $temp['id_printer'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['device_id'];
            $row[] = $temp['jenis'];
            $row[] = $temp['merk'];
            $row[] = $temp['model'];
            // $row[] = $temp['mac_sn'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function readProyektor()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbProyektor->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbProyektor->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbProyektor->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbProyektor->ajaxGetTotalSearch($search);
            $output = [
                'recordsTotal' => $total_search,
                'recordsFiltered' => $total_search
            ];
        }

        $data = [];
        $no = $start + 1;

        foreach ($list as $temp) {
            $aksi = '
            <div class="text-center">
                    <a href="javascript:void(0)" onclick="detailProyektor(' . $temp['id_proyektor'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editProyektor(' . $temp['id_proyektor'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteProyektor(' . $temp['id_proyektor'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['device_id'];
            $row[] = $temp['jenis'];
            $row[] = $temp['nama_produk'];
            $row[] = $temp['serial_number'];
            // $row[] = $temp['plant'];
            // $row[] = $temp['lokasi'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();  
    }


    // SAVE
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

    public function savePrinter()
    {
        $this->_validatePrinter('save');
        $data = [
            'device_id' => $this->request->getVar('device_id'),
            'jenis' => $this->request->getVar('jenis'),
            'merk' => $this->request->getVar('merk'),
            'model' => $this->request->getVar('model'),
            'mac_sn' => $this->request->getVar('mac_sn'),
            'plant' => $this->request->getVar('plant'),
            'lokasi' => $this->request->getVar('lokasi'),
            'ip_address' => $this->request->getVar('ip_address'),
        ];

        if ($this->dbPrinter->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveProyektor()
    {
        $this->_validateProyektor('save');
        $data = [
            'device_id' => $this->request->getVar('device_id'),
            'jenis' => $this->request->getVar('jenis'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'plant' => $this->request->getVar('plant'),
            'lokasi' => $this->request->getVar('lokasi'),
        ];

        if ($this->dbProyektor->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        } 
    }


    // EDIT
    public function editComputer($id_computer)
    {
        $data = $this->dbComputer->find($id_computer);
        echo json_encode($data);
    }

    public function editPrinter($id_printer)
    {
        $data = $this->dbPrinter->find($id_printer);
        echo json_encode($data);
    }

    public function editProyektor($id_proyektor)
    {
        $data = $this->dbProyektor->find($id_proyektor);
        echo json_encode($data);
    }


    // DETAIL
    public function detailComputer($id_computer)
    {
        $data = $this->dbComputer->find($id_computer);
        echo json_encode($data);
    }

    public function detailPrinter($id_printer)
    {
        $data = $this->dbPrinter->find($id_printer);
        echo json_encode($data);
    }

    public function detailProyektor($id_proyektor)
    {
        $data = $this->dbProyektor->find($id_proyektor);
        echo json_encode($data);
    }


    // UPDATE
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

    public function updatePrinter()
    {
        $this->_validatePrinter('update');
        $id_printer = $this->request->getVar('id_printer');
        $printer = $this->dbPrinter->find($id_printer);

        $data = [
            'id_printer' => $id_printer,
            'device_id' => $this->request->getVar('device_id'),
            'jenis' => $this->request->getVar('jenis'),
            'merk' => $this->request->getVar('merk'),
            'model' => $this->request->getVar('model'),
            'mac_sn' => $this->request->getVar('mac_sn'),
            'plant' => $this->request->getVar('plant'),
            'lokasi' => $this->request->getVar('lokasi'),
        ];

        if ($this->dbPrinter->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function updateProyektor()
    {
        $this->_validateProyektor('update');
        $id_proyektor = $this->request->getVar('id_proyektor');
        $proyektor = $this->dbProyektor->find($id_proyektor);

        $data = [
            'id_proyektor' => $id_proyektor,
            'device_id' => $this->request->getVar('device_id'),
            'jenis' => $this->request->getVar('jenis'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'plant' => $this->request->getVar('plant'),
            'lokasi' => $this->request->getVar('lokasi'),
        ];

        if ($this->dbProyektor->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    // DELETE
    public function deleteComputer($id_computer)
    {
        if ($this->dbComputer->delete($id_computer)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deletePrinter($id_printer)
    {
        if ($this->dbPrinter->delete($id_printer)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteProyektor($id_proyektor)
    {
        if ($this->dbProyektor->delete($id_proyektor)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }  
    }


    // VALIDATION
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

    public function _validatePrinter($method)
    {
        if (!$this->validate($this->dbPrinter->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('device_id')) {
                $data['inputerror'][] = 'device_id';
                $data['error_string'][] = $validation->getError('device_id');
                $data['status'] = false;
            }
            if ($validation->hasError('jenis')) {
                $data['inputerror'][] = 'jenis';
                $data['error_string'][] = $validation->getError('jenis');
                $data['status'] = false;
            }
            if ($validation->hasError('merk')) {
                $data['inputerror'][] = 'merk';
                $data['error_string'][] = $validation->getError('merk');
                $data['status'] = false;
            }
            if ($validation->hasError('model')) {
                $data['inputerror'][] = 'model';
                $data['error_string'][] = $validation->getError('model');
                $data['status'] = false;
            }
            if ($validation->hasError('mac_sn')) {
                $data['inputerror'][] = 'mac_sn';
                $data['error_string'][] = $validation->getError('mac_sn');
                $data['status'] = false;
            }
            if ($validation->hasError('plant')) {
                $data['inputerror'][] = 'plant';
                $data['error_string'][] = $validation->getError('plant');
                $data['status'] = false;
            }
            if ($validation->hasError('lokasi')) {
                $data['inputerror'][] = 'lokasi';
                $data['error_string'][] = $validation->getError('lokasi');
                $data['status'] = false;
            }
            if ($validation->hasError('ip_address')) {
                $data['inputerror'][] = 'ip_address';
                $data['error_string'][] = $validation->getError('ip_address');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }

    public function _validateProyektor($method)
    {
        if (!$this->validate($this->dbProyektor->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('device_id')) {
                $data['inputerror'][] = 'device_id';
                $data['error_string'][] = $validation->getError('device_id');
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
            if ($validation->hasError('plant')) {
                $data['inputerror'][] = 'plant';
                $data['error_string'][] = $validation->getError('plant');
                $data['status'] = false;
            }
            if ($validation->hasError('lokasi')) {
                $data['inputerror'][] = 'lokasi';
                $data['error_string'][] = $validation->getError('lokasi');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
