<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\StokModel;
use App\Models\LisensiModel;
use App\Models\ItrsModel;
use App\Models\TaskModel;
use App\Models\KategoriItrsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ItrsController extends BaseController
{
    protected $dbDepartemen;
    protected $dbStok;
    protected $dbLisensi;
    protected $dbItrs;
    protected $dbKategoriItrs;
    protected $dbTask;
    public function __construct()
    {
        $this->dbItrs = new ItrsModel();
        $this->dbDepartemen = new DepartemenModel();
        $this->dbStok = new StokModel();
        $this->dbLisensi = new LisensiModel();
        $this->dbItrs = new ItrsModel();
        $this->dbTask = new TaskModel();
        $this->dbKategoriItrs = new KategoriItrsModel();
    }
    public function index()
    {
        $data = [
            'title'                     => 'ITRS',
            'countClose'                => $this->dbTask->where('task_status', '0')->countAllResults(),
            'stockMinimAngka'           => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->countAllResults(),
            'totalLisensiExpired'       => $this->dbLisensi->getTotalDataKurangDariTanggalSekarang(),
            'kategoriItrs'              => $this->dbKategoriItrs->findAll(),
        ];
        return view('itrs', $data);
    }

    public function readItrs()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbItrs->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbItrs->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbItrs->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbItrs->ajaxGetTotalSearch($search);
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
                <button type="button" class="badge badge-secondary badge-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-offset="10,20">
                    Action
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" onclick="detailItrs(' . $temp['id_itrs'] . ')">Detail</a>
                    <a class="dropdown-item" href="#" onclick="editItrs(' . $temp['id_itrs'] . ')">Edit</a>
                    <a class="dropdown-item" href="#" onclick="deleteItrs(' . $temp['id_itrs'] . ')">Delete</a>
                </div>
            </div>
                    ';
            $status = $temp['itrs_status'];
            if ($status == 0) {
                if (in_groups('Administrator')) {
                    $status = '<badge onclick="editItrsStatus(' . $temp['id_itrs'] . ')" class="badge badge-danger"> Open </badge>';
                } else {
                    $status = '<badge class="badge badge-danger"> Open </badge>';
                }
            } else if ($status == 1) {
                if (in_groups('Administrator')) {
                    $status = '<badge onclick="editItrsStatus(' . $temp['id_itrs'] . ')" class="badge badge-warning"> Proses </badge>';
                } else {
                    $status = '<badge class="badge badge-warning"> Proses </badge>';
                }
            } else {
                if (in_groups('Administrator')) {
                    $status = '<badge onclick="editItrsStatus(' . $temp['id_itrs'] . ')" class="badge badge-success"> Close </badge>';
                } else {
                    $status = '<badge class="badge badge-success"> Close </badge>';
                }
            }

            $approve_mgr = $temp['approve_mgr'];
            if ($approve_mgr == 0) {
                if (in_groups('Manager')) {
                    $approve_mgr = '<badge onclick="editApproveMgr(' . $temp['id_itrs'] . ')" class="badge badge-danger"> Not Approve </badge>';
                } else {
                    $approve_mgr = '<badge class="badge badge-danger"> Not Approve </badge>';
                }
            } else if ($approve_mgr == 1) {
                if (in_groups('Manager')) {
                    $approve_mgr = '<badge onclick="editApproveMgr(' . $temp['id_itrs'] . ')" class="badge badge-success"> Apprrove </badge>';
                } else {
                    $approve_mgr = '<badge class="badge badge-success"> Apprrove </badge>';
                }
            } else {
                if (in_groups('Manager')) {
                    $approve_mgr = '<badge onclick="editApproveMgr(' . $temp['id_itrs'] . ')" class="badge badge-warning"> Waiting </badge>';
                } else {
                    $approve_mgr = '<badge class="badge badge-warning"> Waiting </badge>';
                }
            }

            $tanggal = date('l, d-M-y', strtotime($temp['tanggal']));

            $row = [];
            $row[] = $no;
            $row[] = $temp['username'];
            $row[] = $tanggal;
            $row[] = $temp['plant'];
            $row[] = $temp['nama_departemen'];
            $row[] = $temp['nama_kategori_itrs'];
            $row[] = $temp['purpose'];
            $row[] = $approve_mgr;
            $row[] = $status;
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }


    public function detailItrs($id_itrs)
    {
        $data = $this->dbItrs->find($id_itrs);
        echo json_encode($data);
    }


    public function editItrs($id_itrs)
    {
        $data = $this->dbItrs->find($id_itrs);
        echo json_encode($data);
    }

    public function updateItrs()
    {
        $this->_validateItrs('update');
        $id_itrs = $this->request->getVar('id_itrs');
        $id_user = user_id();
        $itrs = $this->dbItrs->find($id_itrs);

        $data = [
            'id_itrs' => $id_itrs,
            'id_user' => $this->request->getVar('id_user'),
            'tanggal' => $this->request->getVar('tanggal'),
            'plant' => $this->request->getVar('plant'),
            'id_departemen' => $this->request->getVar('id_departemen'),
            'id_kategori_itrs' => $this->request->getVar('id_kategori_itrs'),
            'purpose' => $this->request->getVar('purpose'),
            'itrs_status' => $this->request->getVar('itrs_status'),
            'approve_mgr' => $this->request->getVar('approve_mgr'),
        ];

        if ($this->dbItrs->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    public function deleteItrs($id_itrs)
    {
        if ($this->dbItrs->delete($id_itrs)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveItrs()
    {
        $this->_validateItrs('save');
        if (in_groups('Administrator')) {
            $itrs_status = $this->request->getVar('itrs_status');
        } else {
            $itrs_status = 0;
        };

        if (in_groups('Manager')) {
            $approve_mgr = $this->request->getVar('approve_mgr');
        } else {
            $approve_mgr = 0;
        };

        $data = [
            'id_user'           => $this->request->getVar('id_user'),
            'tanggal'           => $this->request->getVar('tanggal'),
            'id_departemen'     => $this->request->getVar('id_departemen'),
            'plant'             => $this->request->getVar('plant'),
            'id_kategori_itrs'  => $this->request->getVar('id_kategori_itrs'),
            'purpose'           => htmlspecialchars($this->request->getVar('purpose')),
            'approve_mgr'       => $approve_mgr,
            'itrs_status'       => $itrs_status,
        ];

        if ($this->dbItrs->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateItrs($method)
    {
        if (!$this->validate($this->dbItrs->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('tanggal')) {
                $data['inputerror'][] = 'tanggal';
                $data['error_string'][] = $validation->getError('tanggal');
                $data['status'] = false;
            }
            if ($validation->hasError('plant')) {
                $data['inputerror'][] = 'plant';
                $data['error_string'][] = $validation->getError('plant');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }

    public function exportExcelItrs()
    {
        $dataItrs = $this->dbItrs->getDepartemen();
        $filename = 'DataItrs' . date('ymd') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Tanggal');
        $sheet->setCellValue('B1', 'Departement');
        $sheet->setCellValue('C1', 'Plant');
        $sheet->setCellValue('D1', 'Masalah');
        $sheet->setCellValue('E1', 'Penyelesaian');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Frekuensi');

        $column = 2;

        foreach ($dataItrs as $data) {
            if ($data['status'] == "0") {
                $status = "Open";
            } elseif ($data['status'] == "1") {
                $status = "On Proccess";
            } else {
                $status = "Done";
            }
            $sheet->setCellValue('A' . $column, $data['tanggal']);
            $sheet->setCellValue('B' . $column, $data['nama_departemen']);
            $sheet->setCellValue('C' . $column, $data['plant']);
            $sheet->setCellValue('D' . $column, $data['masalah']);
            $sheet->setCellValue('E' . $column, $data['penyelesaian']);
            $sheet->setCellValue('F' . $column, $status);
            $sheet->setCellValue('G' . $column, $data['frekuensi']);
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
}
