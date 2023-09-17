<?php

namespace App\Models;

use CodeIgniter\Model;

class PrinterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'printer';
    protected $primaryKey       = 'id_printer';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['device_id', 'jenis', 'merk', 'model', 'mac_sn', 'plant', 'lokasi'];

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

    public function ajaxGetData($start, $length)
    {
        $result = $this->orderBy('device_id', 'ASC')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('device_id', $search)->orLike('model', $search)->orLike('model', $search)->findAll($start, $length);
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
        $result = $this->like('device_id', $search)->countAllResults();
        return $result;
    }

    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $device_id = 'required|is_unique[printer.device_id]';
            $mac_sn = 'required|is_unique[printer.mac_sn]';
        } else {
            $device_id = 'required';
            $mac_sn = 'required';
        }

        $rulesValidation = [
            'device_id' => [
                'rules' => $device_id,
                'label' => 'Device ID',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'merk' => [
                'rules' => 'required',
                'label' => 'Merk',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'model' => [
                'rules' => 'required',
                'label' => 'Model',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'mac_sn' => [
                'rules' => $mac_sn,
                'label' => 'MAC / SN',
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
            'lokasi' => [
                'rules' => 'required',
                'label' => 'Lokasi',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
        ];

        return $rulesValidation;
    }
}
