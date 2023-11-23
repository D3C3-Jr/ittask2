<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\GroupUsersModel;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Myth\Auth\Password;

class UserController extends BaseController
{
    protected $dbUser;
    protected $dbGroupUsers;
    public function __construct()
    {
        $this->dbUser = new UserModel();
        $this->dbGroupUsers = new GroupUsersModel();
    }
    public function index()
    {
        $data = [
            'title' => 'User',
        ];
        return view('master/user', $data);
    }

    public function readUser()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbUser->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbUser->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbUser->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbUser->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailUser(' . $temp['id'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editUser(' . $temp['id'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteUser(' . $temp['id'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['email'];
            $row[] = $temp['username'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function readGroupUsers()
    {
        $draw = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start = $_REQUEST['start'];
        $search = $_REQUEST['search']['value'];

        $total = $this->dbGroupUsers->ajaxGetTotal();
        $output = [
            'length' => $length,
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
        ];

        if ($search !== "") {
            $list = $this->dbGroupUsers->ajaxGetDataSearch($search, $start, $length);
        } else {
            $list = $this->dbGroupUsers->ajaxGetData($start, $length);
        }

        if ($search !== "") {
            $total_search = $this->dbGroupUsers->ajaxGetTotalSearch($search);
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
                    <a href="javascript:void(0)" onclick="detailGroupUsers(' . $temp['id_group_users'] . ')"><i class="btn btn-sm btn-primary fas fa-eye"> </i></a>
                    <a href="javascript:void(0)" onclick="editGroupUsers(' . $temp['id_group_users'] . ')"><i class="btn btn-sm btn-success fas fa-edit"> </i></a>
                    <a href="javascript:void(0)" onclick="deleteGroupUsers(' . $temp['id_group_users'] . ')"><i class="btn btn-sm btn-danger fas fa-trash"> </i></a>
            </div>
                    ';

            $row = [];
            $row[] = $no;
            $row[] = $temp['name'];
            $row[] = $temp['username'];
            $row[] = $aksi;

            $data[] = $row;
            $no++;
        }

        $output['data'] = $data;

        echo json_encode($output);
        exit();
    }

    public function detailUser($id)
    {
        $data = $this->dbUser->find($id);
        echo json_encode($data);
    }

    public function editUser($id)
    {
        $data = $this->dbUser->find($id);
        echo json_encode($data);
    }

    public function updateUser()
    {
        $this->_validateUser('update');
        $id = $this->request->getVar('id');
        $user = $this->dbUser->find($id);

        $data = [
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => Password::hash($this->request->getVar('password_hash')),
            'active' => 1,
        ];

        if ($this->dbUser->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function deleteUser($id)
    {
        if ($this->dbUser->delete($id)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveUser()
    {
        $this->_validateUser('save');
        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => Password::hash($this->request->getVar('password_hash')),
            'active' => 1,
        ];

        if ($this->dbUser->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function saveGroupUsers()
    {
        $this->_validateGroupUsers('save');
        $data = [
            'group_id' => $this->request->getVar('group_id'),
            'user_id' => $this->request->getVar('user_id'),
        ];

        if ($this->dbGroupUsers->save($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function exportExcel()
    {
        $dataUser = $this->dbUser->findAll();
        $filename = 'DataUser.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Email');
        $sheet->setCellValue('B1', 'Username');
        $sheet->setCellValue('C1', 'Status');

        $column = 2;

        foreach ($dataUser as $data) {
            $sheet->setCellValue('A' . $column, $data['email']);
            $sheet->setCellValue('B' . $column, $data['username']);
            $sheet->setCellValue('C' . $column, $data['active']);
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

    public function _validateUser($method)
    {
        if (!$this->validate($this->dbUser->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('email')) {
                $data['inputerror'][] = 'email';
                $data['error_string'][] = $validation->getError('email');
                $data['status'] = false;
            }
            if ($validation->hasError('username')) {
                $data['inputerror'][] = 'username';
                $data['error_string'][] = $validation->getError('username');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }

    public function _validateGroupUsers($method)
    {
        if (!$this->validate($this->dbUser->getRulesValidation($method))) {
            $validation = \Config\Services::validation();
            $data = [];
            $data['error_string'] = [];
            $data['inputerror'] = [];
            $data['status'] = true;

            if ($validation->hasError('group_id')) {
                $data['inputerror'][] = 'group_id';
                $data['error_string'][] = $validation->getError('group_id');
                $data['status'] = false;
            }
            if ($validation->hasError('user_id')) {
                $data['inputerror'][] = 'user_id';
                $data['error_string'][] = $validation->getError('user_id');
                $data['status'] = false;
            }

            if ($data['status'] === false) {
                echo json_encode($data);
                exit();
            }
        }
    }
}
