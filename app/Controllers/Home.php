<?php

namespace App\Controllers;

use App\Models\TBudaya;
use App\Models\TTransaksi;
use CodeIgniter\Files\File;
use App\Models\TSanggar;
use App\Models\TUserkey;
use App\Models\TUser;


class Home extends BaseController
{
    protected $helpers = ['form', 'url'];
    public $ruleSanggar = [
        'id' => [],
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
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
    ];
    public $ruleAdmin = [
        'id' => [],
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
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
        'pass' => [
            'errors' => ['required' => 'Password Harus Diisi']
        ],
        'co-pass' => [
            'rules' => 'matches[pass]',
            'errors' => ['matches' => 'Password dan Confirm Password tidak sama']
        ],
    ];

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

    public $ruleBudaya = [
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
        'desc' => [
            'rules' => [
                'required',

            ],
            'errors' => [
                'required' => 'Keterangan Harus Diisi',
            ]
        ],
    ];


    public function __construct()
    {
        $this->session = session();
        $this->TUserKey = new TUserkey();
        $this->TUser = new TUser();
        $this->TSanggar = new TSanggar();
        $this->TTransaksi = new TTransaksi();
        $this->TBudaya = new TBudaya();
        $this->jSanggar = $this->TSanggar->where('dihapus', null)->countAllResults();
        $this->juser = $this->TUser->where('dihapus', null)->countAllResults();
        $this->jtrans = $this->TTransaksi->where('dihapus', null)->countAllResults();
        $this->data = [
            'profil' => $this->TSanggar->find($this->session->get('id')),
        ];
    }

    public function index()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'home',
            'judul' => 'ArtJuna',
            'jsanggar' => $this->jSanggar,
            'juser' => $this->juser,
            'jtrans' => $this->jtrans,
            'dUser' => $this->TUser->join('tuserkey', 'tuser.Id_Userkey = tuserkey.Id_Userkey')->orderBy('tuser.dibuat', 'DESC')->findAll(5),
            'dSanggar' => $this->TSanggar->join('tuserkey', 'tsanggar.Id_Userkey = tuserkey.Id_Userkey')->orderBy('tsanggar.dibuat', 'DESC')->where('tsanggar.Id_Sanggar !=', '1')->findAll(5),

            'session' => $this->session,
        ];
        // dd($this->data);
        return view('Pages/Admin/home_v', $this->data);
    }
    public function Sanggar()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Sanggar',
            'judul' => 'Data Sanggar',
            'table' => $this->TSanggar->join('tuserkey', 'tsanggar.Id_Userkey = tuserkey.Id_Userkey')->where('tuserkey.Status !=', 1)->orderBy('tuserkey.Status', 'DESC')->paginate(8),
            'pager' => $this->TSanggar->pager,
            'session' => $this->session,
        ];
        // dd($this->data['pager']->links());
        return view('Pages/Admin/sanggar_v', $this->data);
    }
    public function tambahSanggar()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Sanggar',
            'judul' => 'Tambah Sanggar',
            'aksi' => 'tambah',
            'session' => $this->session,
        ];
        return view('Form/Admin/sanggar_v', $this->data);
    }

    public function simpanSanggar()
    {
        if (!$this->validate($this->ruleSanggar)) {
            dd(validation_list_Errors());
            // return redirect()->route('tamsanggar')->withInput();
        }
        // dd($this->request->getVar());
        $this->TUserKey->save(
            [
                'Pass' => password_hash('Sanggar', true),
                'Status' => $this->request->getVar('status') == "on" ? 2 : 0,
            ]
        );
        $userkey = $this->TUserKey->getInsertID();
        $this->TSanggar->save(
            [
                'Nama_Sanggar' => $this->request->getVar('nama'),
                'Desc_Sanggar' => $this->request->getVar('desc'),
                'Alamat_Sanggar' => $this->request->getVar('alamat'),
                'Email_Sanggar' => $this->request->getVar('email'),
                'Nohp_Sanggar' => $this->request->getVar('nohp'),
                'Foto_Sanggar' => $this->request->getVar('foto'),
                'Id_Userkey' => $userkey,
            ]
        );
        return redirect()->route('data-Sanggar')->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function ubahSanggar($id)
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Sanggar',
            'judul' => 'Ubah Data Sanggar',
            'aksi' => 'ubah',
            'sanggar' => $this->TSanggar->join('tuserkey', 'tsanggar.Id_Userkey = tuserkey.Id_Userkey')->find($id),
            'session' => $this->session,
        ];
        // dd($this->data['sanggar']);
        return view('Form/Admin/sanggar_v', $this->data);
    }

    public function simubahSanggar()
    {
        if (!$this->validate($this->ruleSanggar)) {
            return redirect()->to(site_url("ubsanggar/{$this->request->getVar('id')}"))->withInput();
        }
        // dd($this->request->getVar());
        $this->TUserKey->save(
            [
                'Id_Userkey' => $this->request->getVar('idkey'),
                'Status' => $this->request->getVar('status') != null ? 2 : 0,
            ]
        );
        $this->TSanggar->save(
            [
                'Id_Sanggar' => $this->request->getVar('id'),
                'Nama_Sanggar' => $this->request->getVar('nama'),
                'Desc_Sanggar' => $this->request->getVar('desc'),
                'Alamat_Sanggar' => $this->request->getVar('alamat'),
                'Email_Sanggar' => $this->request->getVar('email'),
                'Nohp_Sanggar' => $this->request->getVar('nohp'),
                'Foto_Sanggar' => $this->request->getVar('foto'),
            ]
        );
        return redirect()->route('data-Sanggar')->with('sukses', 'Data Berhasil Diubah !');
    }

    public function hapusSanggar()
    {
        $this->TSanggar->delete($this->request->getVar('id'));
        return redirect()->route('data-Sanggar')->with('sukses', 'Data Berhasil Dihapus !');
    }

    public function Pengguna()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Pengguna',
            'judul' => 'Data Pengguna',
            'table' => $this->TUser->join('tuserkey', 'tuser.Id_Userkey = tuserkey.Id_Userkey')->where('tuserkey.Status !=', 1)->orderBy('tuserkey.Status', 'DESC')->paginate(8),
            'pager' => $this->TUser->pager,
            'session' => $this->session,
        ];
        // dd($this->data['table']);
        return view('Pages/Admin/pengguna_v', $this->data);
    }
    public function tambahPengguna()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Pengguna',
            'judul' => 'Tambah Pengguna',
            'aksi' => 'tambah',
            'session' => $this->session,
        ];
        return view('Form/Admin/pengguna_v', $this->data);
    }

    public function simpanPengguna()
    {
        if (!$this->validate($this->rulePengguna)) {
            dd(validation_list_Errors());
            // return redirect()->route('tamsanggar')->withInput();
        }
        // dd($this->request->getVar());
        $this->TUserKey->save(
            [
                'Pass' => password_hash('Pengguna', true),
                'Status' => $this->request->getVar('status') == "on" ? 3 : 0,
            ]
        );
        $userkey = $this->TUserKey->getInsertID();
        // dd($userkey);
        $this->TUser->save(
            [
                'Nama_Lengkap' => $this->request->getVar('nama'),
                'Alamat' => $this->request->getVar('alamat'),
                'Email' => $this->request->getVar('email'),
                'Nohp' => $this->request->getVar('nohp'),
                'Foto' => $this->request->getVar('foto'),
                'Id_Userkey' => $userkey,
            ]
        );
        return redirect()->route('data-Pengguna')->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function ubahPengguna($id)
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Pengguna',
            'judul' => 'Ubah Data Pengguna',
            'aksi' => 'ubah',
            'data' => $this->TUser->join('tuserkey', 'tuser.Id_Userkey = tuserkey.Id_Userkey')->find($id),
            'session' => $this->session,
        ];
        // dd($this->data['sanggar']);
        return view('Form/Admin/pengguna_v', $this->data);
    }

    public function simubahPengguna()
    {
        if (!$this->validate($this->ruleSanggar)) {
            return redirect()->to(site_url("ubsanggar/{$this->request->getVar('id')}"))->withInput();
        }
        // dd($this->request->getVar());
        $this->TUserKey->save(
            [
                'Id_Userkey' => $this->request->getVar('idkey'),
                'Status' => $this->request->getVar('status') != null ? 3 : 0,
            ]
        );
        $this->TUser->save(
            [
                'Id_User' => $this->request->getVar('id'),
                'Nama_Lengkap' => $this->request->getVar('nama'),
                'Alamat' => $this->request->getVar('alamat'),
                'Email' => $this->request->getVar('email'),
                'Nohp' => $this->request->getVar('nohp'),
                'Foto' => $this->request->getVar('foto'),
            ]
        );
        return redirect()->route('data-Pengguna')->with('sukses', 'Data Berhasil Diubah !');
    }

    public function hapusPengguna()
    {
        $this->TUser->delete($this->request->getVar('id'));
        return redirect()->route('data-Pengguna')->with('sukses', 'Data Berhasil Dihapus !');
    }

    public function Transaksi()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Transaksi',
            'judul' => 'Data Transaksi',
            'table' => $this->TTransaksi->join('tsanggar', 'ttransaksi.Id_Sanggar=tsanggar.Id_Sanggar')->join('tproduk', 'ttransaksi.Id_Produk=tproduk.Id_Produk')->join('tuser', 'ttransaksi.Id_User=tuser.Id_User')->orderBy('ttransaksi.dibuat', 'DESC')->paginate(8),
            'pager' => $this->TTransaksi->pager,
            'session' => $this->session,
        ];
        // dd($this->data['pager']->links());
        return view('Pages/Admin/transaksi_v', $this->data);
    }
    public function Budaya()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Budaya',
            'judul' => 'Data Budaya',
            'table' => $this->TBudaya->orderBy('dibuat', 'DESC')->paginate(8),
            'pager' => $this->TBudaya->pager,
            'session' => $this->session,
        ];
        // dd($this->data['pager']->links());
        return view('Pages/Admin/budaya_v', $this->data);
    }

    public function tambahBudaya()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Budaya',
            'judul' => 'Tambah Budaya',
            'aksi' => 'tambah',
            'session' => $this->session,
        ];
        return view('Form/Admin/budaya_v', $this->data);
    }
    public function ubahBudaya($id)
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Budaya',
            'judul' => 'Ubah Data Budaya',
            'aksi' => 'ubah',
            'data' => $this->TBudaya->find($id),
            'session' => $this->session,
        ];
        // dd($this->data['sanggar']);
        return view('Form/Admin/budaya_v', $this->data);
    }

    public function simpanBudaya()
    {
        if (!$this->validate($this->ruleBudaya)) {
            // dd(validation_list_Errors());
            return redirect()->route('tambudaya')->withInput();
        }
        // dd($this->request->getVar());
        $this->TBudaya->save(
            [
                'Id_Budaya' => $this->request->getVar('id'),
                'Nama_Budaya' => $this->request->getVar('nama'),
                'Ket_Budaya' => $this->request->getVar('desc'),
                'Foto_Budaya' => $this->request->getVar('foto'),
            ]
        );
        return redirect()->route('Budaya')->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function hapusBudaya()
    {
        $this->TBudaya->delete($this->request->getVar('id'));
        return redirect()->route('Budaya')->with('sukses', 'Data Berhasil Dihapus !');
    }

    public function SetAdmin()
    {
        if ($this->session->get('status') != 1) {
            return redirect()->route('/');
        }
        $this->data += [
            'aktif' => 'Profil',
            'judul' => 'Setings Profil',
            'aksi' => 'tambah',
            'session' => $this->session,
        ];
        return view('Form/Admin/settings_v', $this->data);
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
                return redirect()->to('setAdmin')->with('success', 'Foto profil berhasil diperbarui.');
            } else {
                // Handle error
                return redirect()->to('setAdmin')->with('error', 'Gagal mengunggah foto profil.');
            }
        } else {
            // Validasi gagal, handle error
            dd(validation_list_Errors());
        }
    }
    public function ubahProfil()
    {
        if (!$this->validate($this->ruleAdmin)) {
            // dd(validation_list_Errors());
            return redirect()->back()->withInput();
        }
        // dd($this->request->getVar());
        $this->TSanggar->save(
            [
                'Id_Sanggar' => $this->request->getVar('id'),
                'Nama_Sanggar' => $this->request->getVar('nama'),
                'Email_Sanggar' => $this->request->getVar('email'),
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
        return redirect()->route("Admin");
    }


    public function uploadFoto()
    {

        if (!empty($_FILES)) {
            $file = $this->request->getFile('file');
            if (!$file->hasMoved() || $file) {
                $file->move('assets/img/profil/', $file->getName(), true);
            }
            exit();

        }
    }
    public function uploadFotoBudaya()
    {

        if (!empty($_FILES)) {
            $file = $this->request->getFile('file');
            if (!$file->hasMoved() || $file) {
                $file->move('assets/img/Budaya/', $file->getName(), true);
            }
            exit();

        }
    }
}

// function console_log($output, $with_script_tags = true)
// {
//     $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
//         ');';
//     if ($with_script_tags) {
//         $js_code = '<script>' . $js_code . '</script>';
//     }
//     echo $js_code;
// }
// console_log($this->request->getPost('file'));
// if (!empty($_FILES)) {

//     console_log($_FILES["file"]);
//     console_log("tidak ad file");
// } else {
//     console_log("ada file");
// }