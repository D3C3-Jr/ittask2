<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LisensiModel;

class LisensiController extends BaseController
{
    protected $dbLisensi;
    public function __construct()
    {
        $this->dbLisensi = new LisensiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Lisensi'
        ];
        return view('lisensi', $data);
    }

    public function readLisensi()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbLisensi->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbLisensi->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbLisensi->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbLisensi->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailLisensi(' . $temp['id_lisensi'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editLisensi(' . $temp['id_lisensi'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteLisensi(' . $temp['id_lisensi'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['kode_lisensi'];
            $row[] = $temp['nama_produk'];
            $row[] = $temp['status'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function detailLisensi($id_lisensi)
    {
        $data = $this->dbLisensi->find($id_lisensi);
        echo json_encode($data);
    }

    public function editLisensi($id_lisensi)
    {
        $data = $this->dbLisensi->find($id_lisensi);
        echo json_encode($data);
    }

    public function updateLisensi()
    {
        $this->_validateLisensi('update');
        $id_lisensi = $this->request->getVar('id_lisensi');
        $lisensi = $this->dbLisensi->find($id_lisensi);

        $data = [
            'id_lisensi' => $id_lisensi,
            'kode_lisensi' => $this->request->getVar('kode_lisensi'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'product_key' => $this->request->getVar('product_key'),
            'jenis' => $this->request->getVar('jenis'),
            'status' => $this->request->getVar('status'),
        ];

        if ($this->dbLisensi->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteLisensi($id_lisensi)
    {
        if ($this->dbLisensi->delete($id_lisensi)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveLisensi()
    {
        $this->_validateLisensi('save');
        $data = [
            'kode_lisensi' => $this->request->getVar('kode_lisensi'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'product_key' => $this->request->getVar('product_key'),
            'jenis' => $this->request->getVar('jenis'),
            'status' => $this->request->getVar('status'),
        ];

        if ($this->dbLisensi->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateLisensi($method)
    {
        if (!$this->validate($this->dbLisensi->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('kode_lisensi')) {
                $data['inputerror'][] = 'kode_lisensi';
                $data['error_string'][] = $validation->getError('kode_lisensi');
                $data['status'] = false;
            }
            if ($validation->hasError('nama_produk')) {
                $data['inputerror'][] = 'nama_produk';
                $data['error_string'][] = $validation->getError('nama_produk');
                $data['status'] = false;
            }
            if ($validation->hasError('product_key')) {
                $data['inputerror'][] = 'product_key';
                $data['error_string'][] = $validation->getError('product_key');
                $data['status'] = false;
            }
            if ($validation->hasError('jenis')) {
                $data['inputerror'][] = 'jenis';
                $data['error_string'][] = $validation->getError('jenis');
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
