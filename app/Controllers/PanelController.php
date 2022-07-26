<?php

namespace App\Controllers;

use App\Models\MahasiswaModel as MahasiswaModel;

class PanelController extends BaseController
{

    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Panel',
            'jumlahMahasiswa' => $this->MahasiswaModel->countAll(),
            'mahasiswa' => $this->MahasiswaModel->findAll(),
        ];
        return view('panel/index', $data);
    }

    public function mahasiswa()
    {
        $data = [
            'judul' => 'Data Mahasiswa',
            'mahasiswa' => $this->MahasiswaModel->findAll(),
        ];

        return view('panel/mahasiswa', $data);
    }

    public function tambahMahasiswa()
    {
        //    get post
        if ($this->request->getMethod() == 'post') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'nim' => $this->request->getPost('nim'),
                'email' => $this->request->getPost('email'),
            ];

            $rules = [
                'nama' => 'required|min_length[3]|max_length[50]',
                'nim' => 'required|min_length[3]|max_length[50]|is_unique[mahasiswa.nim]',
                'email' => 'required|min_length[3]|max_length[50]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            } else {
                $this->MahasiswaModel->insert($data);
                return redirect()->to('panel/mahasiswa')->with('success', 'Data berhasil ditambahkan');
            }
        }
        $data = [
            'judul' => 'Tambah Data Mahasiswa',
        ];
        return view('panel/modals/tambah-mahasiswa', $data);
    }

   

    public function hapusMahasiswa($id)
    {
        $this->MahasiswaModel->delete($id);
        return redirect()->to('panel/mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}
