<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Models\TSanggar;


class Home extends BaseController
{
    protected $helpers = ['form', 'url'];
    public $ruleSanggar = [
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
        'induk' => [
            'rules' => [
                'required',
                'is_unique[tpeserta.NoInduk]',

            ],
            'errors' => [
                'required' => 'Induk Harus Diisi',
                'is_unique' => 'No Induk sudah di Terdaftar !'
            ]
        ],
        'nohp' => [
            'rules' => [
                'regex_match[/^[0][8][0-9]{8}|^$/]'

            ],
            'errors' => ['regex_match' => 'Isi Nomor yang benar dengan format 08xxxxxxxx',
            ]
        ],
        'status' => [
            'rules' => [
                'in_list[Mahasiswa,Dosen,Umum]'
            ],
            'errors' => [
                'in_list' => 'Pilihan Tidak Sesuai'
            ]
        ],
    ];

    public function __construct()
    {

        // $this->Tpeserta = new TPeserta();
        // $this->jPes = $this->Tpeserta->where('dihapus', null)->countAllResults();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->route('masuk');
        }
        echo "dashbord";
        // $data = [
        //     'aktif' => 'home',
        //     'judul' => 'PKKM - 2023',
        //     'jPes' => $this->jPes,
        // ];
        // return view('pages/home_v', $data);
    }
    public function Peserta()
    {
        $data = [
            'aktif' => 'Peserta',
            'judul' => 'Data Peserta',
            'jPes' => $this->jPes,
            'table' => $this->Tpeserta->where('dihapus', null)->findAll(),
        ];
        return view('pages/peserta_v', $data);
    }
    public function tambahPeserta()
    {
        $data = [
            'aktif' => 'Peserta',
            'judul' => 'Tambah Peserta',
            'aksi' => 'tambah',
        ];
        return view('form/peserta_v', $data);
    }

    public function simpanPeserta()
    {
        if (!$this->validate($this->rulePeserta)) {
            // dd(validation_list_Errors());
            return redirect()->route('tampes')->withInput();
        }
        // dd($this->request->getVar());
        $this->Tpeserta->save(
            [
                'NoInduk' => $this->request->getVar('induk'),
                'Nama' => $this->request->getVar('nama'),
                'No_HP' => $this->request->getVar('nohp'),
                'Status' => $this->request->getVar('status'),
                'Foto' => $this->request->getVar('foto'),
                'Ket' => 1,
            ]
        );
        return redirect()->route('Peserta')->with('sukses', 'Data Berhasil Ditambahkan !');
    }

    public function ubahPeserta($id)
    {
        $data = [
            'aktif' => 'Peserta',
            'judul' => 'Ubah Data Peserta',
            'aksi' => 'ubah',
            'peserta' => $this->Tpeserta->where('dihapus', null)->where('NoInduk', $id)->findAll(),
        ];
        return view('form/peserta_v', $data);
    }

    public function simubahPeserta()
    {
        if (!$this->validate($this->rulePeserta)) {
            return redirect()->route('tampes')->withInput();
        }
        $this->Tpeserta->save(
            [
                'Id_peserta' => $this->request->getVar('idpes'),
                'NoInduk' => $this->request->getVar('induk'),
                'Nama' => $this->request->getVar('nama'),
                'No_HP' => $this->request->getVar('nohp'),
                'Status' => $this->request->getVar('status'),
                'Foto' => $this->request->getVar('foto'),
                'Ket' => 1,
            ]
        );
        return redirect()->route('Peserta')->with('sukses', 'Data Berhasil Diubah !');
    }

    public function hapusPeserta()
    {
        $this->Tpeserta->delete($this->request->getVar('idpes'));
        return redirect()->route('Peserta')->with('sukses', 'Data Berhasil Dihapus !');
    }

    public function uploadFoto()
    {
        $dest_folder = base_url("assets/img/foto/");

        if (!empty($_FILES)) {
            $file = $this->request->getFile('file');
            if (!$file->hasMoved() || $file) {
                $file->move('assets/img/foto/', $file->getName(), true);
            }
            exit();

        }
    }
    public function setPesan($tipe, $pesan)
    {
        return redirect()->to(base_url('Peserta'))->with($tipe, $pesan);
    }
    public function Industri()
    {
        $data = ['aktif' => 'home'];
        return view('pages/home_v', $data);
    }
    public function Praktisi()
    {
        $data = ['aktif' => 'home'];
        return view('pages/home_v', $data);
    }
    public function Lokakarya()
    {
        $data = ['aktif' => 'home'];
        return view('pages/home_v', $data);
    }
    public function Pelatihan()
    {
        $data = ['aktif' => 'home'];
        return view('pages/home_v', $data);
    }
    public function Kewirausahaan()
    {
        $data = ['aktif' => 'home'];
        return view('pages/home_v', $data);
    }
    public function Inovasi()
    {
        $data = ['aktif' => 'home'];
        return view('pages/home_v', $data);
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