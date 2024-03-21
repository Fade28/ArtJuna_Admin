<?php

namespace App\Controllers\API;

use App\Models\TProduk;
use App\Models\TSanggar;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiProduk extends ResourceController
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
        $barang = $this->tproduk->select('tproduk.*, tsanggar.Nama_Sanggar,tsanggar.Alamat_Sanggar,tsanggar.Nohp_Sanggar,tsanggar.Foto_Sanggar')->join('tsanggar', 'tproduk.Id_Sanggar = tsanggar.Id_Sanggar')->where('Jenis', 'Barang')->findAll();
        $jasa = $this->tproduk->select('tproduk.*, tsanggar.Nama_Sanggar,tsanggar.Alamat_Sanggar,tsanggar.Nohp_Sanggar,tsanggar.Foto_Sanggar')->join('tsanggar', 'tproduk.Id_Sanggar = tsanggar.Id_Sanggar')->where('Jenis', 'Jasa')->findAll();
        return $this->respond([
            'status' => 'sukses',
            'barang' => $barang,
            'jasa' => $jasa,
        ]);
    }
    // single user
    public function show($id = null, $kol = null, $kunci = null)
    {
        $data = $this->tproduk->select('tproduk.*, tsanggar.Nama_Sanggar,tsanggar.Alamat_Sanggar,tsanggar.Nohp_Sanggar,tsanggar.Foto_Sanggar')->join('tsanggar', 'tproduk.Id_Sanggar = tsanggar.Id_Sanggar')->where('tproduk.Id_Sanggar', $id)->orderBy('dibuat', 'DESC')->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'produk' => $data,
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