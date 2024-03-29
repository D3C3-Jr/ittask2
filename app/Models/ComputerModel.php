<?php

namespace App\Models;

use CodeIgniter\Model;

class ComputerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'computer';
    protected $primaryKey       = 'id_computer';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['asset_number', 'device_id', 'login_user', 'serial_number', 'jenis', 'nama_produk', 'os', 'mac_address', 'prosesor', 'ram', 'rom', 'user', 'plant', 'id_departemen', 'status'];

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
        $result = $this->join('departemen', 'departemen.id_departemen = computer.id_departemen', 'left')->orderBy('device_id', 'ASC')->findAll($length, $start);
        return $result;
    }


    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->join('departemen', 'departemen.id_departemen = computer.id_departemen', 'left')->like('nama_departemen', $search)->orLike('device_id', $search)->orLike('login_user', $search)->orLike('user', $search)->orLike('jenis', $search)->findAll($start, $length);
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
        $result = $this->join('departemen', 'departemen.id_departemen = computer.id_departemen', 'left')->like('nama_departemen', $search)->orLike('device_id', $search)->orLike('login_user', $search)->orLike('user', $search)->orLike('jenis', $search)->countAllResults();
        return $result;
    }

    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $asset_number = 'required|is_unique[computer.asset_number]';
            $device_id = 'required|is_unique[computer.device_id]';
            $login_user = 'required|is_unique[computer.login_user]';
            $serial_number = 'required|is_unique[computer.serial_number]';
            $mac_address = 'required|is_unique[computer.mac_address]';
        } else {
            $asset_number = 'required';
            $device_id = 'required';
            $login_user = 'required';
            $serial_number = 'required';
            $mac_address = 'required';
        }

        $rulesValidation = [
            'asset_number' => [
                'rules' => $asset_number,
                'label' => 'Nomor Asset',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'device_id' => [
                'rules' => $device_id,
                'label' => 'Device ID',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} sudah ada',
                ],
            ],
            'login_user' => [
                'rules' => $login_user,
                'label' => 'Login User',
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
            'os' => [
                'rules' => 'required',
                'label' => 'OS',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'serial_number' => [
                'rules' => $serial_number,
                'label' => 'Serial Number',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'mac_address' => [
                'rules' => $mac_address,
                'label' => 'MAC Address',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'prosesor' => [
                'rules' => 'required',
                'label' => 'Prosesor',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'ram' => [
                'rules' => 'required',
                'label' => 'RAM',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'rom' => [
                'rules' => 'required',
                'label' => 'ROM',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'user' => [
                'rules' => 'required',
                'label' => 'User',
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
            'id_departemen' => [
                'rules' => 'required',
                'label' => 'Departemen',
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

        ];

        return $rulesValidation;
    }
}
