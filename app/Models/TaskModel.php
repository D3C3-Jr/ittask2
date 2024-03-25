<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'task';
    protected $primaryKey       = 'id_task';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'tanggal', 'id_departemen', 'plant', 'masalah', 'penyelesaian', 'task_status', 'frekuensi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getDepartemen()
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->find();
        return $result;
    }
    public function getDepartemenHome()
    {
        if (in_groups('Administrator')) {
            $result = $this->where('task_status', '0')->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->orderBy('tanggal', 'ASC')->findAll();
        } else {
            $result = $this->where('task_status', '0')->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('id_user', user_id())->orderBy('tanggal', 'ASC')->findAll();
        }
        return $result;
    }
    public function getDepartemenHomeProses()
    {
        if (in_groups('Administrator')) {
            $result = $this->where('task_status', '1')->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->orderBy('tanggal', 'ASC')->findAll();
        } else {
            $result = $this->where('task_status', '1')->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('id_user', user_id())->orderBy('tanggal', 'ASC')->findAll();
        }
        return $result;
    }

    // TICKET OPEN
    public function ajaxGetDataTicketOpen($start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('task_status', '0')->orderBy('tanggal', 'DESC')->findAll($length, $start);
        return $result;
    }
    public function ajaxGetDataSearchTicketOpen($search, $start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('task_status', '0')->findAll($start, $length);
        return $result;
    }
    public function ajaxGetTotalTicketOpen()
    {
        $result = $this->where('task_status', '0')->countAllResults();
        if (isset($result)) {
            return $result;
        }
        return 0;
    }


    // TICKET PROSES
    public function ajaxGetDataTicketProses($start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('task_status', '1')->orderBy('tanggal', 'DESC')->findAll($length, $start);
        return $result;
    }
    public function ajaxGetDataSearchTicketProses($search, $start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('task_status', '1')->findAll($start, $length);
        return $result;
    }
    public function ajaxGetTotalTicketProses()
    {
        $result = $this->where('task_status', '1')->countAllResults();
        if (isset($result)) {
            return $result;
        }
        return 0;
    }



    public function ajaxGetData($start, $length)
    {
        if (in_groups('Administrator')) {
            $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->orderBy('tanggal', 'DESC')->findAll($length, $start);
        } else {
            $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('id_user', user_id())->orderBy('tanggal', 'DESC')->findAll($length, $start);
        }
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        if (in_groups('Administrator')) {
            $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->like('tanggal', $search)->orLike('nama_departemen', $search)->orLike('masalah', $search)->findAll($start, $length);
        } else {
            $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('id_user', user_id())->orderBy('tanggal', 'DESC')->findAll($length, $start);
        }
        return $result;
    }

    public function ajaxGetTotal()
    {
        if (in_groups('Administrator')) {
            $result = $this->countAllResults();
        } else {
            $result = $this->where('id_user', user_id())->countAllResults();
        }
        if (isset($result)) {
            return $result;
        }
        return 0;
    }

    public function ajaxGetTotalSearch($search)
    {
        if (in_groups('Administrator')) {
            $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->like('tanggal', $search)->orLike('nama_departemen', $search)->orLike('masalah', $search)->countAllResults();
        } else {
            $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->where('id_user', user_id())->orderBy('tanggal', 'DESC')->countAllResults();
        }
        return $result;
    }

    public function getRulesValidation($method = null)
    {
        // if ($method == 'save') {
        //     $device_id = 'required|is_unique[proyektor.device_id]';
        //     $serial_number = 'required|is_unique[proyektor.serial_number]';
        // } else {
        //     $device_id = 'required';
        //     $serial_number = 'required';
        // }

        $rulesValidation = [
            'device_id' => [
                'rules' => 'required',
                'label' => 'Tanggal',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'id_departemen' => [
                'rules' => 'required',
                'label' => 'Departemen',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'plant' => [
                'rules' => 'required',
                'label' => 'Plant',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'masalah' => [
                'rules' => 'required',
                'label' => 'Masalah',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            // 'penyelesaian' => [
            //     'rules' => 'required',
            //     'label' => 'Penyelesaian',
            //     'errors' => [
            //         'required' => '{field} Harus di isi',
            //     ],
            // ],
            'plant' => [
                'rules' => 'required',
                'label' => 'Plant',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            // 'status' => [
            //     'rules' => 'required',
            //     'label' => 'Status',
            //     'errors' => [
            //         'required' => '{field} Harus di isi',
            //     ],
            // ],
            // 'frekuensi' => [
            //     'rules' => 'required',
            //     'label' => 'Frekuensi',
            //     'errors' => [
            //         'required' => '{field} Harus di isi',
            //     ],
            // ],
        ];

        return $rulesValidation;
    }
}
