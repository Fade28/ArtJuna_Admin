<?php

namespace App\Controllers\API;

use App\Models\TUser;
use App\Models\TUserkey;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class apiUser extends ResourceController
{
    use ResponseTrait;
    // all users

    protected $helpers = ['form', 'url'];

    public $rulePengguna = [
        'id' => [],
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
        'email' => [
            'rules' => [
                'required',
                "is_unique[tuser.Email,Id_User,{id}]",

            ],
            'errors' => [
                'required' => 'Email Harus Diisi',
                'is_unique' => 'Email sudah Terdaftar !'
            ]
        ],
        'nohp' => [
            'rules' => [
                'required',
                'regex_match[/^[0][8][0-9]{8}|^$/]',
                'is_unique[tuser.Nohp,Id_User,{id}]',

            ],
            'errors' => [
                'required' => 'No Handphone Harus Diisi',
                'regex_match' => 'Isi Nomor yang benar dengan format 08xxxxxxxx',
                'is_unique' => 'No Handphone sudah Terdaftar !'
            ]
        ],
    ];

    public function __construct()
    {
        $this->TUserKey = new TUserkey();
        $this->TUser = new TUser();
    }

    public function index()
    {
        $data = $this->TUser->findAll();
        return $this->respond([
            'status' => 'sukses',
            'user' => $data,
        ]);
    }
    // create
    public function create()
    {
        if (!$this->validate($this->rulePengguna)) {
            return $this->respond([
                'status' => 'Gagal',
                'massage' => $this->validator->getErrors(),
            ]
            );
        }
        $this->TUserKey->save(
            [
                'Pass' => password_hash($this->request->getVar('pass'), true),
                'Status' => 0,
            ]
        );
        $userkey = $this->TUserKey->getInsertID();
        $this->TUser->save(
            [
                'Nama_Lengkap' => $this->request->getVar('nama'),
                'Alamat' => $this->request->getVar('alamat'),
                'Email' => $this->request->getVar('email'),
                'Nohp' => $this->request->getVar('nohp'),
                'Foto' => 'favicon.png',
                'Id_Userkey' => $userkey,
            ]
        );
        return $this->respond([
            'status' => 'sukses',
            'massage' => [
                'berhasil'=> 'Berhasil Di tambahkan',
                
            ],
        ]
        );
    }
    // single user
    public function show($id = null)
    {
        $model = new ProductModel();
        $data = $model->where('id', $id)->first();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new ProductModel();
        $id = $this->request->getVar('id');
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
        ];
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
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