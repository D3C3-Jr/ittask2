<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stok';
    protected $primaryKey       = 'id_stok';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'kode_barang', 'nama_barang', 'jenis_barang', 'stok', 'satuan'];

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
        $result = $this->orderBy('tanggal', 'DESC')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('kode_barang', $search)->orLike('nama_barang', $search)->orLike('jenis_barang', $search)->findAll($start, $length);
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
        $result = $this->like('id_stok', $search)->countAllResults();
        return $result;
    }

    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $kode_barang = 'required|is_unique[stok.kode_barang]';
        } else {
            $kode_barang = 'required';
        }

        $rulesValidation = [
            'kode_barang' => [
                'rules' => $kode_barang,
                'label' => 'Kode Barang',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} Sudah ada',
                ],
            ],
            'nama_barang' => [
                'rules' => 'required',
                'label' => 'Nama Barang',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'jenis_barang' => [
                'rules' => 'required',
                'label' => 'Jenis Barang',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'stok' => [
                'rules' => 'required',
                'label' => 'Stok',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
            'satuan' => [
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
