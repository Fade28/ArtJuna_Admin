<?php

namespace App\Models;

use CodeIgniter\Model;

class TPesan extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tpesan';
    protected $primaryKey = 'Id_Pesan';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['Id_PesanGrup', 'Pengirim', 'Pesan', 'dibuat', 'diubah', 'dihapus'];

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
