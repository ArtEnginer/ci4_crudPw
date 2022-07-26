<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->mahasiswa        = model('App\Models\MahasiswaModel');
    }

    public function index()
    {
    }

    public function hapus($id)
    {
        $this->mahasiswa->delete($id);
        return redirect()->to('panel/mahasiswa')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        //  get post
        $data = $this->request->getPost();
        if ($this->request->getMethod() == 'post') {
            $this->mahasiswa->update($id, $data);
            return redirect()->to('panel/mahasiswa')->with('success', 'Data berhasil diubah');
        }
    }
}
