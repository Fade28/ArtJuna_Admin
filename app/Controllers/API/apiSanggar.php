<?php

namespace App\Controllers\API;

use App\Models\TProduk;
use App\Models\TSanggar;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiSanggar extends ResourceController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->tproduk = new TProduk();
        $this->tsanggar = new TSanggar();
    }
    // all users
    public function index()
    {
        $sanggar = $this->tsanggar->select('tsanggar.Id_Sanggar,tsanggar.Nama_Sanggar,tsanggar.Alamat_Sanggar,tsanggar.Nohp_Sanggar,tsanggar.Foto_Sanggar')->where('Id_Sanggar !=', '1')->findAll();
        return $this->respond([
            'status' => 'sukses',
            'sanggar' => $sanggar,
        ]);
    }
    // create
    public function create()
    {
        $model = new ProductModel();
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'harga' => $this->request->getVar('harga'),
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($key = '*')
    {
        $model = new ProductModel();
        $data = $model->where($key)->first();
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