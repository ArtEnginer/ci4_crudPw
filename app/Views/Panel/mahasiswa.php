<?= $this->extend('Panel/Layouts/base') ?>
<?= $this->section('isi') ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Master Data Mahasiswa</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
            <!-- a button modal to tambah data -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahMahasiswa">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <!-- session flash data -->
            <?php if (session()->getFlashData('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('success') ?>
                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['email'] ?></td>
                                <td>
                                    <!-- button edit send data using modal -->
                                    <button type="button" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#editMahasiswa<?= $mhs['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="<?= base_url() . route_to('hapus-mahasiswa', $mhs['id']) ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- modal edit -->
<?php foreach ($mahasiswa as $mhs) : ?>
    <div class="modal fade" id="editMahasiswa<?= $mhs['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url() . route_to('edit-mahasiswa', $mhs['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs['nim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $mhs['email'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->include('Panel/Modals/tambah-mahasiswa') ?>
<?= $this->endSection(); ?>