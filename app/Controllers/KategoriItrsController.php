<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriItrsModel;
use App\Models\TaskModel;
use App\Models\StokModel;
use App\Models\LisensiModel;

class KategoriItrsController extends BaseController
{
    protected $dbKategoriItrs;
    protected $dbTask;
    protected $dbStok;
    protected $dbLisensi;
    public function __construct()
    {
        $this->dbTask = new TaskModel();
        $this->dbKategoriItrs = new KategoriItrsModel();
        $this->dbStok = new StokModel();
        $this->dbLisensi = new LisensiModel();
    }
    public function index()
    {
        $data = [
            'title'                     => 'Kategori ITRS',
            'countClose'                => $this->dbTask->where('task_status', '0')->countAllResults(),
            'stockMinimAngka'           => $this->dbStok->orderBy('stok', 'ASC')->where('jenis_barang', 'Cair')->where('stok <', 3)->countAllResults(),
            'totalLisensiExpired'       => $this->dbLisensi->getTotalDataKurangDariTanggalSekarang(),

        ];
        return view('master/kategori_itrs', $data);
    }

    public function readKategoriItrs()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbKategoriItrs->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbKategoriItrs->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbKategoriItrs->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbKategoriItrs->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailKategoriItrs(' . $temp['id_kategori_itrs'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editKategoriItrs(' . $temp['id_kategori_itrs'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteKategoriItrs(' . $temp['id_kategori_itrs'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['kode_kategori_itrs'];
            $row[] = $temp['nama_kategori_itrs'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function detailKategoriItrs($id_kategori_itrs)
    {
        $data = $this->dbKategoriItrs->find($id_kategori_itrs);
        echo json_encode($data);
    }

    public function editKategoriItrs($id_kategori_itrs)
    {
        $data = $this->dbKategoriItrs->find($id_kategori_itrs);
        echo json_encode($data);
    }

    public function updateKategoriItrs()
    {
        $this->_validateKategoriItrs('update');
        $id_kategori_itrs = $this->request->getVar('id_kategori_itrs');
        $task = $this->dbKategoriItrs->find($id_kategori_itrs);

        $data = [
            'id_kategori_itrs' => $id_kategori_itrs,
            'kode_epartemen' => $this->request->getVar('kode_epartemen'),
            'nama_kategori_itrs' => $this->request->getVar('nama_kategori_itrs'),
        ];

        if ($this->dbKategoriItrs->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteKategoriItrs($id_kategori_itrs)
    {
        if ($this->dbKategoriItrs->delete($id_kategori_itrs)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveKategoriItrs()
    {
        $this->_validateKategoriItrs('save');
        $data = [
            'kode_kategori_itrs' => $this->request->getVar('kode_kategori_itrs'),
            'nama_kategori_itrs' => $this->request->getVar('nama_kategori_itrs'),
        ];

        if ($this->dbKategoriItrs->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateKategoriItrs($method)
    {
        if (!$this->validate($this->dbKategoriItrs->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('kode_kategori_itrs')) {
                $data['inputerror'][] = 'kode_kategori_itrs';
                $data['error_string'][] = $validation->getError('kode_kategori_itrs');
                $data['status'] = false;
            }
            if ($validation->hasError('nama_kategori_itrs')) {
                $data['inputerror'][] = 'nama_kategori_itrs';
                $data['error_string'][] = $validation->getError('nama_kategori_itrs');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
