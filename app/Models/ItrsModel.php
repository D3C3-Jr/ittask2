<?php

namespace App\Models;

use CodeIgniter\Model;

class ItrsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'itrs';
    protected $primaryKey       = 'id_itrs';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'tanggal', 'plant', 'id_kategori_itrs', 'id_departemen', 'purpose', 'itrs_status', 'approve_mgr'];

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


    public function ajaxGetData($start, $length)
    {
        if (in_groups('Administrator')) {
            $result = $this->join('users', 'users.id = itrs.id_user')->join('departemen', 'departemen.id_departemen = users.id_departemen')->join('kategori_itrs', 'kategori_itrs.id_kategori_itrs = itrs.id_kategori_itrs')->orderBy('tanggal', 'DESC')->findAll($length, $start);
        } else {
            $result = $this->join('users', 'users.id = itrs.id_user')->join('departemen', 'departemen.id_departemen = users.id_departemen')->join('kategori_itrs', 'kategori_itrs.id_kategori_itrs = itrs.id_kategori_itrs')->where('itrs.id_departemen', user()->id_departemen)->orderBy('tanggal', 'DESC')->findAll($length, $start);
        }
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        if (in_groups('Administrator')) {
            $result = $this->join('users', 'users.id = itrs.id_user', 'left')->like('tanggal', $search)->orLike('nama_departemen', $search)->orLike('masalah', $search)->findAll($start, $length);
        } else {
            $result = $this->join('users', 'users.id = itrs.id_user', 'left')->where('id_user', user_id())->orderBy('tanggal', 'DESC')->findAll($length, $start);
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
            $result = $this->join('users', 'users.id = itrs.id_user', 'left')->like('tanggal', $search)->orLike('nama_departemen', $search)->orLike('masalah', $search)->countAllResults();
        } else {
            $result = $this->join('users', 'users.id = itrs.id_user', 'left')->where('id_user', user_id())->orderBy('tanggal', 'DESC')->countAllResults();
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
            'plant' => [
                'rules' => 'required',
                'label' => 'Plant',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
        ];

        return $rulesValidation;
    }
}
