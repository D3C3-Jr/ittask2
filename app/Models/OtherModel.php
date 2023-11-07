<?php

namespace App\Models;

use CodeIgniter\Model;

class OtherModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'other';
    protected $primaryKey       = 'id_other';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['device_id', 'jenis', 'nama_produk', 'serial_number', 'plant', 'lokasi', 'ip', 'keterangan'];

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
        $result = $this->like('device_id', $search)->orLike('nama_produk', $search)->orLike('jenis', $search)->findAll($start, $length);
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
        $result = $this->like('device_id', $search)->orLike('nama_produk', $search)->orLike('jenis', $search)->countAllResults();
        return $result;
    }


    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $device_id = 'required|is_unique[other.device_id]';
            $serial_number = 'required|is_unique[other.serial_number]';
        } else {
            $device_id = 'required';
            $serial_number = 'required';
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
            'nama_produk' => [
                'rules' => 'required',
                'label' => 'Nama Produk',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'serial_number' => [
                'rules' => $serial_number,
                'label' => 'Serial Number',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} sudah ada',
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
            'ip' => [
                'rules' => 'required',
                'label' => 'IP Address',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'keterangan' => [
                'rules' => 'required',
                'label' => 'Keterangan',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
        ];

        return $rulesValidation;
    }
}
