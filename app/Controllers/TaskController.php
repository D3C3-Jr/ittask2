<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;

class TaskController extends BaseController
{
    protected $dbTask;
    public function __construct()
    {
        $this->dbTask = new TaskModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Task'
        ];
        return view('task', $data);
    }

    public function readTask()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbTask->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbTask->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbTask->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbTask->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailTask(' . $temp['id_task'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editTask(' . $temp['id_task'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteTask(' . $temp['id_task'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';
            $status = $temp['status'];
            if ($status == 0) {
                $status = '<badge class="badge badge-danger"> Open </badge>';
            } else if ($status == 1) {
                $status = '<badge class="badge badge-info"> Proses </badge>';
            } else {
                $status = '<badge class="badge badge-success"> Close </badge>';
            }
            $row = [];
            $row[] = $no;
            $row[] = $temp['tanggal'];
            $row[] = $temp['id_departemen'];
            $row[] = $temp['keterangan'];
            $row[] = $status;
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function deleteTask($id_task)
    {
        if ($this->dbTask->delete($id_task)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveTask()
    {
        $this->_validateTask('save');
        $data = [
            'tanggal' => $this->request->getVar('tanggal'),
            'id_departemen' => $this->request->getVar('id_departemen'),
            'plant' => $this->request->getVar('plant'),
            'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
            'status' => 0,
            'frekuensi' => $this->request->getVar('frekuensi'),
            'start' => $this->request->getVar('start'),
            'end' => $this->request->getVar('end'),
            'total' => $this->request->getVar('total'),
        ];

        if ($this->dbTask->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function _validateTask($method)
    {
        if (!$this->validate($this->dbTask->getRulesValidation($method))) {
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
            if ($validation->hasError('id_departemen')) {
                $data['inputerror'][] = 'id_departemen';
                $data['error_string'][] = $validation->getError('id_departemen');
                $data['status'] = false;
            }
            if ($validation->hasError('plant')) {
                $data['inputerror'][] = 'plant';
                $data['error_string'][] = $validation->getError('plant');
                $data['status'] = false;
            }
            if ($validation->hasError('keterangan')) {
                $data['inputerror'][] = 'keterangan';
                $data['error_string'][] = $validation->getError('keterangan');
                $data['status'] = false;
            }
            if ($validation->hasError('status')) {
                $data['inputerror'][] = 'status';
                $data['error_string'][] = $validation->getError('status');
                $data['status'] = false;
            }
            if ($validation->hasError('frekuensi')) {
                $data['inputerror'][] = 'frekuensi';
                $data['error_string'][] = $validation->getError('frekuensi');
                $data['status'] = false;
            }
            if ($validation->hasError('start')) {
                $data['inputerror'][] = 'start';
                $data['error_string'][] = $validation->getError('start');
                $data['status'] = false;
            }
            if ($validation->hasError('end')) {
                $data['inputerror'][] = 'end';
                $data['error_string'][] = $validation->getError('end');
                $data['status'] = false;
            }
            if ($validation->hasError('total')) {
                $data['inputerror'][] = 'total';
                $data['error_string'][] = $validation->getError('total');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
