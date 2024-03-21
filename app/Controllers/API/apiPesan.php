<?php

namespace App\Controllers\API;

use App\Models\TPesan;
use App\Models\TPesanGrup;
use App\Models\TSanggar;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class apiPesan extends ResourceController
{
    use ResponseTrait;
    // all users

    public function __construct()
    {
        $this->tsanggar = new TSanggar();
        $this->tpesangrup = new TPesanGrup();
    }

    public function index()
    {
        $data = $this->tpesangrup->orderBy('Id_PesanGrup', 'DESC')->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'pesan' => $data,
            ]);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
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
    public function show($id = null)
    {
        $data = $this->tpesangrup
            ->select('Id_PesanGrup, tsanggar.Foto_Sanggar as foto, tsanggar.Nama_Sanggar as nama, (
        select pesan from tpesan where tpesan.Id_PesanGrup = tpesangrup.Id_PesanGrup ORDER BY dibuat DESC limit 1) as pesan')
            ->where('Id_Pihak1', $id)
            ->join('tsanggar', 'tsanggar.Id_Sanggar = tpesangrup.Id_Pihak2', 'left')
            ->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'pesan' => $data,
            ]);
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