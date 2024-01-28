<?php

namespace App\Models;

use CodeIgniter\Model;

class TSanggar extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tsanggar';
    protected $primaryKey = 'Id_Sanggar';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['Email_Sanggar', 'Nama_Sanggar', 'Desc_Sanggar', 'Alamat_Sanggar', 'Nohp_Sanggar', 'Foto_Sanggar', 'Id_Userkey', 'dibuat', 'diubah', 'dihapus'];

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
