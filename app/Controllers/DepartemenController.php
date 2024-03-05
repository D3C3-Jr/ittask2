<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\TaskModel;
use App\Models\StokModel;
use App\Models\LisensiModel;

class DepartemenController extends BaseController
{
    protected $dbDepartemen;
    protected $dbTask;
    protected $dbStok;
    protected $dbLisensi;
    public function __construct()
    {
        $this->dbTask = new TaskModel();
        $this->dbDepartemen = new DepartemenModel();
        $this->dbStok = new StokModel();
        $this->dbLisensi = new LisensiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Departemen',
            'countClose'    => $this->dbTask->where('status', '0')->countAllResults(),
            'stockMinimAngka'           => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->countAllResults(),
            'totalLisensiExpired'       => $this->dbLisensi->getTotalDataKurangDariTanggalSekarang(),

        ];
        return view('master/departemen', $data);
    }

    public function readDepartemen()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbDepartemen->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbDepartemen->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbDepartemen->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbDepartemen->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailDepartemen(' . $temp['id_departemen'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editDepartemen(' . $temp['id_departemen'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteDepartemen(' . $temp['id_departemen'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['kode_departemen'];
            $row[] = $temp['nama_departemen'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function detailDepartemen($id_departemen)
    {
        $data = $this->dbDepartemen->find($id_departemen);
        echo json_encode($data);
    }

    public function editDepartemen($id_departemen)
    {
        $data = $this->dbDepartemen->find($id_departemen);
        echo json_encode($data);
    }

    public function updateDepartemen()
    {
        $this->_validateDepartemen('update');
        $id_departemen = $this->request->getVar('id_departemen');
        $task = $this->dbDepartemen->find($id_departemen);

        $data = [
            'id_departemen' => $id_departemen,
            'kode_epartemen' => $this->request->getVar('kode_epartemen'),
            'nama_departemen' => $this->request->getVar('nama_departemen'),
        ];

        if ($this->dbDepartemen->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteDepartemen($id_departemen)
    {
        if ($this->dbDepartemen->delete($id_departemen)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveDepartemen()
    {
        $this->_validateDepartemen('save');
        $data = [
            'kode_departemen' => $this->request->getVar('kode_departemen'),
            'nama_departemen' => $this->request->getVar('nama_departemen'),
        ];

        if ($this->dbDepartemen->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateDepartemen($method)
    {
        if (!$this->validate($this->dbDepartemen->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('kode_departemen')) {
                $data['inputerror'][] = 'kode_departemen';
                $data['error_string'][] = $validation->getError('kode_departemen');
                $data['status'] = false;
            }
            if ($validation->hasError('nama_departemen')) {
                $data['inputerror'][] = 'nama_departemen';
                $data['error_string'][] = $validation->getError('nama_departemen');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
