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
}
