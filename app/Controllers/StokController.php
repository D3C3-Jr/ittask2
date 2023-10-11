<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StokModel;

class StokController extends BaseController
{
    protected $dbStok;
    public function __construct()
    {
        $this->dbStok = new StokModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Stok',
        ];
        return view('stok', $data);
    }

    public function readStok()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbStok->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbStok->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbStok->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbStok->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailStok(' . $temp['id_stok'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editStok(' . $temp['id_stok'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteStok(' . $temp['id_stok'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['tanggal'];
            $row[] = $temp['kode_barang'];
            $row[] = $temp['nama_barang'];
            $row[] = $temp['stok'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function detailStok($id_stok)
    {
        $data = $this->dbStok->find($id_stok);
        echo json_encode($data);
    }

    public function editStok($id_stok)
    {
        $data = $this->dbStok->find($id_stok);
        echo json_encode($data);
    }

    public function updateStok()
    {
        $this->_validateStok('update');
        $id_stok = $this->request->getVar('id_stok');
        $stok = $this->dbStok->find($id_stok);

        $data = [
            'id_stok' => $id_stok,
            'tanggal' => $this->request->getVar('tanggal'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jenis_barang' => $this->request->getVar('jenis_barang'),
            'stok' => $this->request->getVar('stok'),
            'satuan' => $this->request->getVar('satuan'),
        ];

        if ($this->dbStok->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteStok($id_stok)
    {
        if ($this->dbStok->delete($id_stok)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveStok()
    {
        $this->_validateStok('save');
        $data = [
            'tanggal' => $this->request->getVar('tanggal'),
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'jenis_barang' => htmlspecialchars($this->request->getVar('jenis_barang')),
            'stok' => $this->request->getVar('stok'),
            'satuan' => $this->request->getVar('satuan'),
        ];

        if ($this->dbStok->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateStok($method)
    {
        if (!$this->validate($this->dbStok->getRulesValidation($method))) {
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
            if ($validation->hasError('kode_barang')) {
                $data['inputerror'][] = 'kode_barang';
                $data['error_string'][] = $validation->getError('kode_barang');
                $data['status'] = false;
            }
            if ($validation->hasError('nama_barang')) {
                $data['inputerror'][] = 'nama_barang';
                $data['error_string'][] = $validation->getError('nama_barang');
                $data['status'] = false;
            }
            if ($validation->hasError('jenis_barang')) {
                $data['inputerror'][] = 'jenis_barang';
                $data['error_string'][] = $validation->getError('jenis_barang');
                $data['status'] = false;
            }
            if ($validation->hasError('stok')) {
                $data['inputerror'][] = 'stok';
                $data['error_string'][] = $validation->getError('stok');
                $data['status'] = false;
            }
            if ($validation->hasError('satuan')) {
                $data['inputerror'][] = 'satuan';
                $data['error_string'][] = $validation->getError('satuan');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
