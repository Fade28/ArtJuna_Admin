<?php

namespace App\Controllers\API;

use App\Models\TUser;
use App\Models\TUserkey;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class apiLogin extends ResourceController
{
    use ResponseTrait;
    public function __construct()
    {
        $this->tuser = new TUser();
        $this->tuserkey = new TUserkey();
        // $this->jPes = $this->Tpeserta->where('dihapus', null)->countAllResults();
    }
    // all users
    public function index()
    {
        $data['user'] = $this->tuser->orderBy('Id_User', 'ASC')->findAll();
        return $this->respond($data);
    }
    // create

    public function apimasuk()
    {
        $data = $this->tuser->where('Email', $this->request->getVar('email'))->first();
        if ($data) {
            $verifikasi = $this->tuserkey->where('Id_Userkey', $data['Id_Userkey'])->first();
            if (password_verify($this->request->getVar('pass'), $verifikasi['Pass'])) {
                return $this->respond([
                    'status' => 'sukses',
                    'user' => $data,
                ]
                );
            } else
                return $this->failNotFound('Password Salah');
        } else {
            return $this->failNotFound('Email Belum Terdaftar');
        }
    }
    // delete
    public function delete($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}