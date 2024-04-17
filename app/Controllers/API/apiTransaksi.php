<?php

namespace App\Controllers\API;

use App\Models\TPesan;
use App\Models\TPesanGrup;
use App\Models\TTransaksi;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class apiTransaksi extends ResourceController
{
    use ResponseTrait;
    // all users

    public function __construct()
    {
        $this->ttrans = new TTransaksi();
        $this->tpg = new TPesanGrup();
        $this->tp = new TPesan();
    }

    public function index()
    {
        $data = $this->ttrans->orderBy('dibuat', 'DESC')->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'transaksi' => $data,
            ]);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // create
    public function create()
    {
        $data = [
            'Id_Sanggar' => $this->request->getVar('Id_san'),
            'Id_User' => $this->request->getVar('Id_user'),
            'Id_Produk' => $this->request->getVar('Id_pro'),
            'Tgl_Mulai' => $this->request->getVar('tgl_mulai'),
            'Tgl_Akhir' => $this->request->getVar('tgl_akhir'),
            'Harga_Jadi' => $this->request->getVar('harga'),

        ];
        $this->ttrans->insert($data);
        $tpg = $this->tpg->where('Id_Pihak1', $this->request->getVar('Id_user'))->where('Id_Pihak2', $this->request->getVar('Id_san'))->findAll(1);
        if($tpg){
          $this->tp->insert([
                'Id_PesanGrup' => $tpg[0]['Id_PesanGrup'],
                'Pengirim' => $this->request->getVar('Id_san'),
                'Pesan' => 'Terima Kasih sudah berTransaksi Bersama Kami'
            ]);
        }
        else{
            $this->tpg->insert([
                'Id_Pihak1' => $this->request->getVar('Id_user'),
                'Id_Pihak2' => $this->request->getVar('Id_san'),
            ]);
            $this->tp->insert([
                'Id_PesanGrup' => $this->tpg->getInsertID(),
                'Pengirim' => $this->request->getVar('Id_san'),
                'Pesan' => 'Terima Kasih sudah berTransaksi Bersama Kami. Anda juga dapat membeli barang yang kami sediakan dengan mengkonfirmasi kepada Admin'
            ]);
        }
        $response = [
            'status' => 'sukses',
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respond($response);
    }
    // single user
    public function show($id = null)
    {
        $data = $this->ttrans->orderBy('ttransaksi.dibuat', 'DESC')->where('Id_User', $id)->join('tproduk', 'ttransaksi.Id_Produk=tproduk.Id_Produk')->findAll();
        if ($data) {
            return $this->respond([
                'status' => 'sukses',
                'transaksi' => $data,
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