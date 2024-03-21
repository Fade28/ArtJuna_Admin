<?php

namespace App\Models;

use CodeIgniter\Model;

class TTransaksi extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'ttransaksi';
    protected $primaryKey = 'Id_Transaksi';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['Id_User', 'Id_Sanggar', 'Id_Produk', 'Ket', 'Harga_Jadi', 'Tgl_Mulai', 'Tgl_Akhir', 'dibuat', 'diubah', 'dihapus'];

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
