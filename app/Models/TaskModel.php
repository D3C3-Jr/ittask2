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
    protected $allowedFields    = ['tanggal', 'id_departemen', 'plant', 'masalah', 'penyelesaian', 'status', 'frekuensi'];

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
        $result = $this->where('status', '0')->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->findAll();
        return $result;
    }

    public function ajaxGetData($start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->orderBy('tanggal', 'DESC')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->like('tanggal', $search)->orLike('nama_departemen', $search)->orLike('masalah', $search)->findAll($start, $length);
        return $result;
    }

    public function ajaxGetTotal()
    {
        $result = $this->countAllResults();
        if (isset($result)) {
            return $result;
        }
        return 0;
    }

    public function ajaxGetTotalSearch($search)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = task.id_departemen', 'left')->like('tanggal', $search)->orLike('nama_departemen', $search)->orLike('masalah', $search)->countAllResults();
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
            'penyelesaian' => [
                'rules' => 'required',
                'label' => 'Penyelesaian',
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
            'status' => [
                'rules' => 'required',
                'label' => 'Status',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'frekuensi' => [
                'rules' => 'required',
                'label' => 'Frekuensi',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
        ];

        return $rulesValidation;
    }
}
