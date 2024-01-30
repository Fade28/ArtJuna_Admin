<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TSanggar;
use App\Models\TUserkey;

class AuthController extends BaseController
{
    protected $helpers = ['form', 'url'];
    public $ruleVer = [
        'email' => [
            'rules' => 'required',
            'errors' => ['required' => 'Email Harus Diisi']
        ],
        'pass' => [
            'rules' => 'required',
            'errors' => ['required' => 'Password Harus Diisi']
        ],
    ];
    public $ruleSanggar = [
        'nama' => [
            'rules' => 'required',
            'errors' => ['required' => 'Nama Harus Diisi']
        ],
        'email' => [
            'rules' => 'required',
            'errors' => ['required' => 'Email Harus Diisi']
        ],
        'pass' => [
            'rules' => 'required',
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
        $this->TUserKey = new TUserkey();
        // $this->jPes = $this->Tpeserta->where('dihapus', null)->countAllResults();
    }
    public function index()
    {
        return view('Auth_Page/masuk_v');
    }

    public function verSanggar()
    {
        if (!$this->validate($this->ruleVer)) {
            // dd(validation_list_Errors());
            return redirect()->route('masuk')->withInput();
        }
        $data = $this->TSanggar->where('Email_Sanggar', $this->request->getVar('email'))->first();
        // dd($data);
        if ($data) {
            $key = $this->TUserKey->find($data['Id_Userkey']);
            $pass = $key['Pass'];
            $verify_pass = password_verify($this->request->getVar('pass'), $pass);
            if ($verify_pass) {
                $ses_data = [
                    'name' => $data['Nama_Sanggar'],
                    'email' => $data['Email_Sanggar'],
                    'logged_in' => TRUE
                ];
                $this->session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->route('masuk')->with('gagal', 'Password yang anda masukkan Salah !');
            }
        } else {
            return redirect()->route('masuk')->with('gagal', 'Email anda tidak terdaftar !');
        }
    }

    public function daftar()
    {
        return view('Auth_Page/daftar_v');
    }

    public function tambahSanggar()
    {
        if (!$this->validate($this->ruleSanggar)) {
            // dd(validation_list_Errors());
            return redirect()->route('daftar')->withInput();
        }
        // dd($this->request->getVar());
        $this->TUserKey->save(
            [
                'Pass' => password_hash($this->request->getVar('pass'), true),
                'Status' => 0,
            ]
        );
        $userkey = $this->TUserKey->getInsertID();
        $this->TSanggar->save(
            [
                'Nama_Sanggar' => $this->request->getVar('nama'),
                'Email_Sanggar' => $this->request->getVar('email'),
                'Id_Userkey' => $userkey,
            ]
        );
        return redirect()->route('masuk');
    }
}
