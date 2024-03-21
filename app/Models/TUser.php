<?php

namespace App\Models;

use CodeIgniter\Model;

class TUser extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tuser';
    protected $primaryKey = 'Id_User';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['Nama_Lengkap', 'Email', 'Nohp', 'Alamat', 'Foto', 'Id_Userkey', 'dibuat', 'diubah', 'dihapus'];


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
