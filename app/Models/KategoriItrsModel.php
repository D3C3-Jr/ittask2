<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriItrsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kategori_itrs';
    protected $primaryKey       = 'id_kategori_itrs';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_kategori_itrs', 'nama_kategori_itrs'];

    // Dates
    protected $useTimestamps = false;
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
        $result = $this->orderBy('kode_kategori_itrs', 'ASC')->findAll($length, $start);
        return $result;
    }

    public function ajaxGetDataSearch($search, $start, $length)
    {
        $result = $this->like('kode_kategori_itrs', $search)->orLike('nama_kategori_itrs', $search)->findAll($start, $length);
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
        $result = $this->like('id_kategori_itrs', $search)->countAllResults();
        return $result;
    }

    public function getRulesValidation($method = null)
    {
        if ($method == 'save') {
            $kode_kategori_itrs = 'required|is_unique[kategori_itrs.kode_kategori_itrs]';
        } else {
            $kode_kategori_itrs = 'required';
        }

        $rulesValidation = [
            'kode_kategori_itrs' => [
                'rules' => $kode_kategori_itrs,
                'label' => 'Kode Kategori',
                'errors' => [
                    'required' => '{field} Harus di isi',
                    'is_unique' => '{field} Sudah ada',
                ],
            ],
            'nama_kategori_itrs' => [
                'rules' => 'required',
                'label' => 'Nama Kategori',
                'errors' => [
                    'required' => '{field} Harus di isi',
                ],
            ],
        ];

        return $rulesValidation;
    }
}
