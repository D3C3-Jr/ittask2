<?php

namespace App\Models;

use CodeIgniter\Model;

class LisensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'lisensi';
    protected $primaryKey       = 'id_lisensi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_lisensi', 'nama_produk', 'product_key', 'jenis', 'status'];

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
        $result = $this->orderBy('id_lisensi', 'ASC')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('kode_lisensi', $search)->orLike('nama_produk', $search)->findAll($start, $length);
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
        $result = $this->like('id_lisensi', $search)->orLike('nama_produk', $search)->countAllResults();
        return $result;
    }

    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $kode_lisensi = 'required|is_unique[lisensi.kode_lisensi]';
            $product_key = 'required|is_unique[lisensi.product_key]';
        } else {
            $kode_lisensi = 'required';
            $product_key = 'required';
        }

        $rulesValidation = [
            'kode_lisensi' => [
                'rules' => $kode_lisensi,
                'label' => 'Kode Lisensi',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} Sudah ada',
                ],
            ],
            'nama_lisensi' => [
                'rules' => 'required',
                'label' => 'Nama Produk',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'produk_key' => [
                'rules' => $product_key,
                'label' => 'Product Key',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'jenis' => [
                'rules' => 'required',
                'label' => 'Jenis',
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
