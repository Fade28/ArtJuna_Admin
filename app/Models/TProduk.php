<?php

namespace App\Models;

use CodeIgniter\Model;

class TProduk extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tproduk';
    protected $primaryKey = 'Id_Produk';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['Nama_Produk', 'Desc_Produk', 'Harga', 'Foto_Produk', 'Jenis', 'Id_Sanggar', 'dibuat', 'diubah', 'dihapus'];


    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'dibuat';
    protected $updatedField = 'diubah';
    protected $deletedField = 'dihapus';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
