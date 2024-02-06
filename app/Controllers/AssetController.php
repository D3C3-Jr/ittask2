<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComputerModel;
use App\Models\PrinterModel;
use App\Models\ProyektorModel;
use App\Models\OtherModel;
use App\Models\TaskModel;
use App\Models\DepartemenModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AssetController extends BaseController
{
    protected $dbComputer;
    protected $dbPrinter;
    protected $dbProyektor;
    protected $dbOther;
    protected $dbTask;
    protected $dbDepartemen;
    public function __construct()
    {
        $this->dbComputer = new ComputerModel();
        $this->dbPrinter = new PrinterModel();
        $this->dbProyektor = new ProyektorModel();
        $this->dbOther = new OtherModel();
        $this->dbTask = new TaskModel();
        $this->dbDepartemen = new DepartemenModel();
    }

    public function index()
    {
        $jumlahBagianComputerAktif = $this->dbComputer->like('status', '1')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerAktif = $jumlahBagianComputerAktif / $jumlahTotalComputer * 100;

        $jumlahBagianComputerSpare = $this->dbComputer->like('status', '0')->countAllResults();
        $jumlahTotalComputer = $this->dbComputer->countAllResults();
        $persentaseComputerSpare = $jumlahBagianComputerSpare / $jumlahTotalComputer * 100;

        $jumlahBagianPrinterAktif = $this->dbPrinter->like('status', '1')->countAllResults();
        $jumlahTotalPrinter = $this->dbPrinter->countAllResults();
        $persentasePrinterAktif = $jumlahBagianPrinterAktif / $jumlahTotalPrinter * 100;

        $jumlahBagianPrinterSpare = $this->dbPrinter->like('status', '0')->countAllResults();
        $jumlahTotalPrinter = $this->dbPrinter->countAllResults();
        $persentasePrinterSpare = $jumlahBagianPrinterSpare / $jumlahTotalPrinter * 100;

        $jumlahBagianProyektorAktif = $this->dbProyektor->like('status', '1')->countAllResults();
        $jumlahTotalProyektor = $this->dbProyektor->countAllResults();
        $persentaseProyektorAktif = $jumlahBagianProyektorAktif / $jumlahTotalProyektor * 100;

        $jumlahBagianProyektorSpare = $this->dbProyektor->like('status', '0')->countAllResults();
        $jumlahTotalProyektor = $this->dbProyektor->countAllResults();
        $persentaseProyektorSpare = $jumlahBagianProyektorSpare / $jumlahTotalProyektor * 100;
        $data = [
            'title' => 'Data Asset',
            'countClose'    => $this->dbTask->where('status', '0')->countAllResults(),
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

            'proyektorPersentaseAktif'   => ceil($persentaseProyektorAktif),
            'proyektorAktif'             => $this->dbProyektor->like('status', '1')->countAllResults(),
            'proyektorPersentaseSpare'   => floor($persentaseProyektorSpare),
            'proyektorSpare'             => $this->dbProyektor->like('status', '0')->countAllResults(),
            'proyektorTotal'             => $this->dbProyektor->countAllResults(),

            'printer'                   => $this->dbPrinter->countAllResults(),
            'proyektor'                 => $this->dbProyektor->countAllResults(),

            'departemens'               => $this->dbDepartemen->findAll(),
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
            $row[] = $temp['nama_departemen'];
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
            $status = $temp['status'];
            if ($status == 0) {
                $status = '<badge class="badge badge-danger"> Rusak </badge>';
            } else {
                $status = '<badge class="badge badge-info"> Aktif </badge>';
            }
            $row = [];
            $row[] = $no;
            $row[] = $temp['device_id'];
            $row[] = $temp['jenis'];
            $row[] = $temp['merk'];
            $row[] = $temp['model'];
            $row[] = $temp['mac_sn'];
            $row[] = $status;
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
            $status = $temp['status'];
            if ($status == 0) {
                $status = '<badge class="badge badge-danger"> Rusak </badge>';
            } else {
                $status = '<badge class="badge badge-info"> Aktif </badge>';
            }
            $row = [];
            $row[] = $no;
            $row[] = $temp['device_id'];
            $row[] = $temp['jenis'];
            $row[] = $temp['nama_produk'];
            $row[] = $temp['serial_number'];
            // $row[] = $temp['plant'];
            // $row[] = $temp['lokasi'];
            $row[] = $status;
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function readOther()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbOther->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbOther->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbOther->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbOther->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailOther(' . $temp['id_other'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editOther(' . $temp['id_other'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteOther(' . $temp['id_other'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';
            $row = [];
            $row[] = $no;
            $row[] = $temp['device_id'];
            $row[] = $temp['jenis'];
            $row[] = $temp['nama_produk'];
            $row[] = $temp['keterangan'];
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
            'id_departemen' => $this->request->getVar('id_departemen'),
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
            'status' => $this->request->getVar('status'),
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
            'status' => $this->request->getVar('status'),
        ];

        if ($this->dbProyektor->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveOther()
    {
        $this->_validateOther('save');
        $data = [
            'device_id' => $this->request->getVar('device_id'),
            'jenis' => $this->request->getVar('jenis'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'plant' => $this->request->getVar('plant'),
            'lokasi' => $this->request->getVar('lokasi'),
            'ip' => $this->request->getVar('ip'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        if ($this->dbOther->save($data)) {
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

    public function editOther($id_other)
    {
        $data = $this->dbOther->find($id_other);
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

    public function detailOther($id_other)
    {
        $data = $this->dbOther->find($id_other);
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
            'id_departemen' => $this->request->getVar('id_departemen'),
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
            'status' => $this->request->getVar('status'),
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
            'status' => $this->request->getVar('status'),
        ];

        if ($this->dbProyektor->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function updateOther()
    {
        $this->_validateOther('update');
        $id_other = $this->request->getVar('id_other');
        $other = $this->dbOther->find($id_other);

        $data = [
            'id_other' => $id_other,
            'device_id' => $this->request->getVar('device_id'),
            'jenis' => $this->request->getVar('jenis'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'serial_number' => $this->request->getVar('serial_number'),
            'plant' => $this->request->getVar('plant'),
            'lokasi' => $this->request->getVar('lokasi'),
            'ip' => $this->request->getVar('ip'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];

        if ($this->dbOther->save($data)) {
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

    public function deleteOther($id_other)
    {
        if ($this->dbOther->delete($id_other)) {
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
            if ($validation->hasError('id_departemen')) {
                $data['inputerror'][] = 'id_departemen';
                $data['error_string'][] = $validation->getError('id_departemen');
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

    public function _validateOther($method)
    {
        if (!$this->validate($this->dbOther->getRulesValidation($method))) {
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
            if ($validation->hasError('ip')) {
                $data['inputerror'][] = 'ip';
                $data['error_string'][] = $validation->getError('ip');
                $data['status'] = false;
            }
            if ($validation->hasError('keterangan')) {
                $data['inputerror'][] = 'keterangan';
                $data['error_string'][] = $validation->getError('keterangan');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }


    public function generateComputer()
    {
        $data = [
            "computers" =>  $this->dbComputer->findAll()
        ];
        return view('asset/pdf/computer', $data);
    }


    // Export Excel

    public function exportExcelComputer()
    {
        $dataComputer = $this->dbComputer->join('departemen', 'departemen.id_departemen = computer.id_departemen')->findAll();
        $filename = 'DataComputer' . date('ymd') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Asset Number');
        $sheet->setCellValue('B1', 'Device ID');
        $sheet->setCellValue('C1', 'Login User');
        $sheet->setCellValue('D1', 'Jenis');
        $sheet->setCellValue('E1', 'Nama Produk');
        $sheet->setCellValue('F1', 'Serial Number');
        $sheet->setCellValue('G1', 'MAC Address');
        $sheet->setCellValue('H1', 'Processor');
        $sheet->setCellValue('I1', 'RAM');
        $sheet->setCellValue('J1', 'ROM');
        $sheet->setCellValue('K1', 'User');
        $sheet->setCellValue('L1', 'Departemen');
        $sheet->setCellValue('M1', 'Status');

        $column = 2;

        foreach ($dataComputer as $data) {
            if ($data['status'] == "1") {
                $status = "Active";
            } else {
                $status = "Spare";
            };
            $sheet->setCellValue('A' . $column, $data['asset_number']);
            $sheet->setCellValue('B' . $column, $data['device_id']);
            $sheet->setCellValue('C' . $column, $data['login_user']);
            $sheet->setCellValue('D' . $column, $data['jenis']);
            $sheet->setCellValue('E' . $column, $data['nama_produk']);
            $sheet->setCellValue('F' . $column, $data['serial_number']);
            $sheet->setCellValue('G' . $column, $data['mac_address']);
            $sheet->setCellValue('H' . $column, $data['prosesor']);
            $sheet->setCellValue('I' . $column, $data['ram']);
            $sheet->setCellValue('J' . $column, $data['rom']);
            $sheet->setCellValue('K' . $column, $data['user']);
            $sheet->setCellValue('L' . $column, $data['nama_departemen']);
            $sheet->setCellValue('M' . $column, $status);
            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($filename));
        flush();
        readfile($filename);
        exit();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        // header('Cache-Control: max-age=0');

        // $writer->save('php://output');
    }

    public function exportExcelPrinter()
    {
        $dataPrinter = $this->dbPrinter->findAll();
        $filename = 'DataPrinter' . date('ymd') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Device ID');
        $sheet->setCellValue('B1', 'Jenis');
        $sheet->setCellValue('C1', 'Merk');
        $sheet->setCellValue('D1', 'Model');
        $sheet->setCellValue('E1', 'MAC / SN');
        $sheet->setCellValue('F1', 'Plant');
        $sheet->setCellValue('G1', 'Lokasi');
        $sheet->setCellValue('H1', 'IP Address');
        $sheet->setCellValue('I1', 'Status');

        $column = 2;

        foreach ($dataPrinter as $data) {
            $sheet->setCellValue('A' . $column, $data['device_id']);
            $sheet->setCellValue('B' . $column, $data['jenis']);
            $sheet->setCellValue('C' . $column, $data['merk']);
            $sheet->setCellValue('D' . $column, $data['model']);
            $sheet->setCellValue('E' . $column, $data['mac_sn']);
            $sheet->setCellValue('F' . $column, $data['plant']);
            $sheet->setCellValue('G' . $column, $data['lokasi']);
            $sheet->setCellValue('H' . $column, $data['ip_address']);
            $sheet->setCellValue('I' . $column, $data['status']);
            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($filename));
        flush();
        readfile($filename);
        exit();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        // header('Cache-Control: max-age=0');

        // $writer->save('php://output');
    }

    public function exportExcelProyektor()
    {
        $dataProyektor = $this->dbProyektor->findAll();
        $filename = 'DataProyektor' . date('ymd') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Device ID');
        $sheet->setCellValue('B1', 'Jenis');
        $sheet->setCellValue('C1', 'Nama Produk');
        $sheet->setCellValue('D1', 'Serial Number');
        $sheet->setCellValue('E1', 'Plant');
        $sheet->setCellValue('F1', 'Lokasi');
        $sheet->setCellValue('G1', 'Status');

        $column = 2;

        foreach ($dataProyektor as $data) {
            $sheet->setCellValue('A' . $column, $data['device_id']);
            $sheet->setCellValue('B' . $column, $data['jenis']);
            $sheet->setCellValue('C' . $column, $data['nama_produk']);
            $sheet->setCellValue('D' . $column, $data['serial_number']);
            $sheet->setCellValue('E' . $column, $data['plant']);
            $sheet->setCellValue('G' . $column, $data['status']);
            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($filename));
        flush();
        readfile($filename);
        exit();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        // header('Cache-Control: max-age=0');

        // $writer->save('php://output');
    }

    public function exportExcelOther()
    {
        $dataOther = $this->dbOther->findAll();
        $filename = 'DataOther' . date('ymd') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Device ID');
        $sheet->setCellValue('B1', 'Jenis');
        $sheet->setCellValue('C1', 'Nama Produk');
        $sheet->setCellValue('D1', 'Serial Number');
        $sheet->setCellValue('E1', 'Plant');
        $sheet->setCellValue('F1', 'Lokasi');
        $sheet->setCellValue('G1', 'IP Address');
        $sheet->setCellValue('H1', 'Keterangan');

        $column = 2;

        foreach ($dataOther as $data) {
            $sheet->setCellValue('A' . $column, $data['device_id']);
            $sheet->setCellValue('B' . $column, $data['jenis']);
            $sheet->setCellValue('C' . $column, $data['nama_produk']);
            $sheet->setCellValue('D' . $column, $data['serial_number']);
            $sheet->setCellValue('E' . $column, $data['plant']);
            $sheet->setCellValue('F' . $column, $data['lokasi']);
            $sheet->setCellValue('G' . $column, $data['ip']);
            $sheet->setCellValue('H' . $column, $data['keterangan']);
            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length:' . filesize($filename));
        flush();
        readfile($filename);
        exit();
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        // header('Cache-Control: max-age=0');

        // $writer->save('php://output');
    }




    // Export PDF
    public function pdfComputer()
    {
        $data = [
            "computers" =>  $this->dbComputer->orderBy('device_id', 'ASC')->find()
        ];
        $filename = date('ymdHis');
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('asset/pdf/computer', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream($filename);
    }
}
