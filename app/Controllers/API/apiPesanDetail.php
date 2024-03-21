<?php

namespace App\Controllers\API;

use App\Models\TPesan;
use App\Models\TPesanGrup;
use App\Models\TSanggar;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class apiPesanDetail extends ResourceController
{
    use ResponseTrait;
    // all users

    public function __construct()
    {
        $this->tsanggar = new TSanggar();
        $this->tpesangrup = new TPesanGrup();
        $this->tpesan = new TPesan();
    }

    public function index()
    {
        $data = $this->tpesangrup->orderBy('Id_PesanGrup', 'DESC')->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'data' => $data,
            ]);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // create
    public function create()
    {
        $data = [
            'Id_PesanGrup' => $this->request->getVar('idg'),
            'Pengirim' => $this->request->getVar('id'),
            'Pesan' => $this->request->getVar('pesan'),

        ];
        $this->tpesan->insert($data);
        $response = [
            'status' => 'sukses',
            'messages' => [
                'success' => 'Pesan berhasil terkirim.'
            ]
        ];
        return $this->respond($response);
    }
    // single user
    public function show($id = null)
    {

        $data = $this->tpesan->where('Id_PesanGrup', $id)->orderBy('dibuat', 'DESC')->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'pro' => $this->tpesangrup
                    ->select('tsanggar.Id_Sanggar')
                    ->join('tsanggar', 'tsanggar.Id_Sanggar = tpesangrup.Id_Pihak2', 'left')
                    ->find($id),
                'pesandetail' => $data,
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