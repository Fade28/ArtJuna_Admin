<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\TPesan;
use App\Models\TPesanGrup;
use App\Models\TProduk;
use App\Models\TSanggar;
use App\Models\TTransaksi;
use App\Models\TUserkey;
use CodeIgniter\Database\MySQLi\Builder;

class Sanggar extends BaseController
{

    protected $helpers = ['form'];
    public $ruleProduk = [
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
        'harga' => [
            'rules' => [
                'required',
            ],
            'errors' => [
                'required' => 'Harga Harus Diisi',
            ]
        ],
        'jenis' => [
            'rules' => ['in_list[Barang,Jasa]'],
            'errors' => ['in_list' => 'Pilih yang di pilihan']
        ],
    ];
    public $ruleTransaksi = [
        'desc' => [
            'rules' => 'required',
            'errors' => ['required' => 'Keterangan Harus Diisi']
        ],
        'harga' => [
            'rules' => [
                'required',
            ],
            'errors' => [
                'required' => 'Harga Harus Diisi',
            ]
        ],
        'tgl_mulai' => [
            'rules' => [
                'required',
                'valid_date[Y-m-d]',
            ],
            'errors' => [
                'required' => 'Tanggal Harus di Isi',
                'valid_date' => 'Format Tanggal Tidak sesuai'
            ]
        ],
        'tgl_akhir' => [
            'rules' => [
                'required',
                'valid_date[Y-m-d]',
                'even[{tgl_mulai}]',
            ],
            'errors' => [
                'required' => 'Tanggal Harus di Isi',
                'valid_date' => 'Format Tanggal Tidak sesuai',
                'even' => 'Tanggal Berakhir sebelum Tanggal Mulai'
            ]
        ],
    ];
    public $ruleSanggar = [
        'id' => [],
        'email' => [
            'rules' => [
                'required',
                "is_unique[tsanggar.Email_Sanggar,Id_Sanggar,{id}]",

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
                'is_unique[tsanggar.Nohp_Sanggar,Id_Sanggar,{id}]',

            ],
            'errors' => [
                'required' => 'No Handphone Harus Diisi',
                'regex_match' => 'Isi Nomor yang benar dengan format 08xxxxxxxx',
                'is_unique' => 'No Handphone sudah Terdaftar !'
            ]
        ],
        'pass' => [
            'errors' => ['required' => 'Password Harus Diisi']
        ],
        'co-pass' => [
            'rules' => 'matches[pass]',
            'errors' => ['matches' => 'Password dan Confirm Password tidak sama']
        ],
    ];


    public function __construct()
    {
        $this->session = session();
        $this->TSanggar = new TSanggar();
        $this->TProduk = new TProduk();
        $this->TTransaksi = new TTransaksi();
        $this->TPesan = new TPesan();
        $this->TPesanGrup = new TPesanGrup();
        $this->TUserKey = new TUserkey();
        $this->data = [
            'profil' => $this->TSanggar->find($this->session->get('id')),
        ];
    }
    public function index()
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'home',
            'judul' => 'ArtJuna',
            'session' => $this->session,
            'produk' => $this->TProduk->where('Id_Sanggar',$this->session->get('id'))->findAll(),
            'pesan' => $this->TPesanGrup
                ->select('Id_PesanGrup, tuser.Foto as foto, tuser.Nama_Lengkap as nama, (
                    select pesan from tpesan where tpesan.Id_PesanGrup = tpesangrup.Id_PesanGrup ORDER BY dibuat DESC limit 1) as pesan')
                ->where('Id_Pihak2', $this->session->get('id'))
                ->join('tuser', 'tuser.Id_User = tpesangrup.Id_Pihak1', 'left')
                ->findAll()
        ];
        // dd($data['profil']);
        return view('Pages/Sanggar/home_v', $this->data);
    }
    public function Produk()
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Produk',
            'judul' => 'Data Produk',
            'table' => $this->TProduk->where('Id_Sanggar',$this->session->get('id'))->paginate(8),
            'pager' => $this->TProduk->pager,
            'session' => $this->session,
        ];
        // dd($this->data['pager']->links());
        return view('Pages/Sanggar/produk_v', $this->data);
    }

    public function tambahProduk()
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Produk',
            'judul' => 'Tambah Produk',
            'aksi' => 'tambah',
            'session' => $this->session,
        ];
        return view('Form/Sanggar/produk_v', $this->data);
    }

    public function simpanProduk()
    {
        if (!$this->validate($this->ruleProduk)) {
            dd(validation_list_Errors());
            // return redirect()->route('tamproduk')->withInput();
        }
        // dd($this->request->getVar());
        $this->TProduk->save(
            [
                'Id_Produk' => $this->request->getVar('id'),
                'Nama_Produk' => $this->request->getVar('nama'),
                'Desc_Produk' => $this->request->getVar('desc'),
                'Harga' => $this->request->getVar('harga'),
                'Jenis' => $this->request->getVar('jenis'),
                'Foto_Produk' => $this->request->getVar('foto'),
                'Id_Sanggar' => $this->session->get('id'),
            ]
        );
        return redirect()->route('Produk')->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function ubahProduk($id)
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Produk',
            'judul' => 'Ubah Data Produk',
            'aksi' => 'ubah',
            'data' => $this->TProduk->find($id),
            'session' => $this->session,
        ];
        // dd($this->data['data']);
        return view('Form/Sanggar/produk_v', $this->data);
    }

    public function hapusProduk()
    {
        $this->TProduk->delete($this->request->getVar('id'));
        return redirect()->route('Produk')->with('sukses', 'Data Berhasil Dihapus !');
    }

    public function Transaksi()
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Transaksi',
            'judul' => 'Data Transaksi',
            'table' => $this->TTransaksi->join('tproduk', 'ttransaksi.Id_Produk=tproduk.Id_Produk')->join('tuser', 'ttransaksi.Id_User=tuser.Id_User')->where('tproduk.Id_Sanggar', $this->session->get('id'))->paginate(8),
            'pager' => $this->TTransaksi->pager,
            'session' => $this->session,
        ];
        // dd($this->data['table']);
        return view('Pages/Sanggar/transaksi_v', $this->data);
    }


    public function simpanTransaksi()
    {
        if (!$this->validate($this->ruleTransaksi)) {
            // dd(validation_list_Errors());
            return redirect()->back()->withInput();
        }
        // dd($this->request->getVar());
        $this->TTransaksi->save(
            [
                'Id_Transaksi' => $this->request->getVar('id'),
                'Ket' => $this->request->getVar('desc'),
                'Harga_Jadi' => $this->request->getVar('harga'),
                'Tgl_Mulai' => $this->request->getVar('tgl_mulai'),
                'Tgl_Akhir' => $this->request->getVar('tgl_akhir'),
            ]
        );
        return redirect()->route('Transaksi')->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function ubahTransaksi($id)
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Transaksi',
            'judul' => 'Ubah Detail Transaksi',
            'aksi' => 'ubah',
            'data' => $this->TTransaksi->join('tproduk', 'ttransaksi.Id_Produk=tproduk.Id_Produk')->join('tuser', 'ttransaksi.Id_User=tuser.Id_User')->find($id),
            'session' => $this->session,
        ];
        // dd($this->data['data']);
        return view('Form/Sanggar/transaksi_v', $this->data);
    }

    public function hapusTransaksi()
    {
        $this->TProduk->delete($this->request->getVar('id'));
        return redirect()->route('Produk')->with('sukses', 'Data Berhasil Dihapus !');
    }

    public function Pesan()
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }

        $this->data += [
            'aktif' => 'Pesan',
            'judul' => 'Data Pesan',
            'table' => $this->TPesanGrup
                ->select('Id_PesanGrup, tuser.Foto as foto, tuser.Nama_Lengkap as nama, (
                    select pesan from tpesan where tpesan.Id_PesanGrup = tpesangrup.Id_PesanGrup ORDER BY dibuat DESC limit 1) as pesan')
                ->where('Id_Pihak2', $this->session->get('id'))
                ->join('tuser', 'tuser.Id_User = tpesangrup.Id_Pihak1', 'left')
                ->findAll()
        ];
        // dd($this->data['table']);
        return view('Pages/Sanggar/pesan_v', $this->data);
    }

    public function detailPesan($id)
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Pesan',
            'judul' => '',
            'pro' => $this->TPesanGrup
                ->select('tuser.Foto as foto, tuser.Nama_Lengkap as nama')
                ->join('tuser', 'tuser.Id_User = tpesangrup.Id_Pihak1', 'left')
                ->find($id),
            'pesan' => $this->TPesan->where('Id_PesanGrup', $id)->orderBy('dibuat', 'ASC')->findAll(),
            'session' => $this->session,
        ];
        // dd($this->data['pesan']);
        return view('Pages/Sanggar/detailpesan_v', $this->data);
    }
    public function kirimPesan()
    {
        if (!$this->validate(['pesan' => 'required'])) {
            // dd(validation_list_Errors());
            return redirect()->back()->withInput();
        }
        // dd($this->request->getVar());
        $this->TPesan->save(
            [
                'Id_PesanGrup' => $this->request->getVar('id'),
                'Pengirim' => $this->session->get('id'),
                'Pesan' => $this->request->getVar('pesan'),
            ]
        );
        return redirect()->to("detailpesan/{$this->request->getVar('id')}")->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function SetProfil()
    {
        if ($this->session->get('status') != 2) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Profil',
            'judul' => 'Setings Profil',
            'aksi' => 'tambah',
            'session' => $this->session,
        ];
        return view('Form/Sanggar/settings_v', $this->data);
    }
    public function ubahFoto()
    {
        // dd($_FILES); // Sesuaikan dengan nama model Anda
        $user_id = session()->get('id'); // Sesuaikan dengan cara Anda mendapatkan user_id

        $validation = \Config\Services::validation();

        $rules = [
            'profile_picture' => 'uploaded[profile_picture]|max_size[profile_picture,2048]|mime_in[profile_picture,image/jpg,image/jpeg,image/png,image/gif]',
        ];

        if ($this->validate($rules)) {
            $file = $this->request->getFile('profile_picture');

            if ($file->isValid() && !$file->hasMoved()) {
                // Pindahkan file ke direktori yang diinginkan
                $newName = $file->getRandomName();
                $file->move('assets/img/profil/', $newName);

                $this->TSanggar->save(
                    [
                        'Id_Sanggar' => $this->session->get('id'),
                        'Foto_Sanggar' => $newName,
                    ]
                );
                return redirect()->to('setProfil')->with('success', 'Foto profil berhasil diperbarui.');
            } else {
                // Handle error
                return redirect()->to('setProfil')->with('error', 'Gagal mengunggah foto profil.');
            }
        } else {
            // Validasi gagal, handle error
            dd(validation_list_Errors());
        }
    }
    public function ubahProfil()
    {
        if (!$this->validate($this->ruleSanggar)) {
            // dd(validation_list_Errors());
            return redirect()->back()->withInput();
        }
        // dd($this->request->getVar());
        $this->TSanggar->save(
            [
                'Id_Sanggar' => $this->request->getVar('id'),
                'Nama_Sanggar' => $this->request->getVar('nama'),
                'Desc_Sanggar' => $this->request->getVar('desc'),
                'Alamat_Sanggar' => $this->request->getVar('alamat'),
                'Email_Sanggar' => $this->request->getVar('email'),
                'Nohp_Sanggar' => $this->request->getVar('nohp'),
            ]
        );
        if ($this->request->getVar('pass') != '') {
            // dd($this->request->getVar());
            $this->TUserKey->save(
                [
                    'Id_Userkey' => $this->request->getVar('idkey'),
                    'Pass' => password_hash($this->request->getVar('pass'), true),
                ]
            );
        }
        return redirect()->route("Sanggar");
    }


    public function uploadFoto()
    {

        if (!empty($_FILES)) {
            $file = $this->request->getFile('file');
            if (!$file->hasMoved() || $file) {
                $file->move('assets/img/produk/', $file->getName(), true);
            }
            exit();

        }
    }
}

