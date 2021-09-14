<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mt-4 mb-4 text-gray-800">Kelola Kasir</h1>
  <div class="card shadow mb-4">
    <div class="card-body">

      <!-- Header -->
      <div class="text-right">
        <button type="button" data-toggle="modal" data-target="#tambahModal" class="btn btn-success btn-icon-split mb-3">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah</span>
        </button>
      </div>

      <!-- Alert -->
      <?= $this->session->flashdata('message'); ?>
      
      <!-- Tabel -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Gambar</th>
              <th>Username</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Nomor Handphone</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($view->result() as $res) : ?>
          <?php if ($res->id_level_user != 0) : ?>
            <tr>
              <td align="center"><img style="height: 30px;" class="img-profile rounded-circle" src="<?=base_url('assets/img/profile/') . $res->gambar ?>"></td>
              <td><?= $res->username ?></td>
              <td><?= $res->nama_user ?></td>
              <td><?= $res->jenis_kelamin ?></td>
              <td><?= $res->nohp_user ?></td>
              <td align="center">
                <button type="button" data-toggle="modal" 
                data-target="#ubahModal<?= $res->id_user ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#hapusModal<?= $res->id_user ?>" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#ubahPassModal<?= $res->id_user ?>" class="btn btn-info btn-sm">
                  <i class="fas fa-key"></i>
                </button>
              </td>
            </tr>
          <?php endif; ?>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Kasir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_kasir/tambahDataKasir')?>" method="POST" >
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="form-check ml-2">
              <label class="form-check-label" for="jenisKelamin1">
              <input class="form-check-input" type="radio" name="jenisKelamin"
              id="jenisKelamin1" value="Laki-Laki" required>
                Laki-Laki
              </label>
            </div>
            <div class="form-check ml-2">
              <label class="form-check-label" for="jenisKelamin2">
              <input class="form-check-input" type="radio" name="jenisKelamin"
              id="jenisKelamin2" value="Perempuan">
                Perempuan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="nohp">Nomor Handphone</label>
            <input type="text" class="form-control" id="nohp" name="nohp" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($view->result() as $res) : ?>
  <?php if ($res->id_level_user != 0) : ?>
    <!-- Ubah Modal -->
    <div class="modal fade" id="ubahModal<?= $res->id_user ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Kasir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="user" action="<?= base_url('kelola_kasir/ubahDataKasir')?>" method="POST" >

            <div class="modal-body">
            <input type="hidden" name="idUser" id="idUser" value="<?= $res->id_user ?>">

              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama"
                value="<?= $res->nama_user ?>" required>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                value="<?= $res->username ?>" required>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check ml-2">
                  <label class="form-check-label" for="jenisKelamin1">
                  <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin1"
                  value="Laki-Laki" checked required>
                    Laki-Laki
                  </label>
                </div>
                <div class="form-check ml-2">
                  <label class="form-check-label" for="jenisKelamin2">
                  <?php if ($res->jenis_kelamin == "Perempuan") : ?>
                    <input class="form-check-input" type="radio" name="jenisKelamin"
                    id="jenisKelamin2" value="Perempuan" checked>
                  <?php else : ?>
                    <input class="form-check-input" type="radio" name="jenisKelamin"
                    id="jenisKelamin2" value="Perempuan">
                  <?php endif; ?>
                    Perempuan
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="nohp">Nomor Handphone</label>
                <input type="text" class="form-control" id="nohp" name="nohp"
                value="<?= $res->nohp_user ?>" required>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>

    <!-- Hapus Modal-->
    <div class="modal fade" id="hapusModal<?= $res->id_user ?>" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <span style="font-size: 20px;">
              <i class="fas fa-exclamation-circle mr-2"></i>
            </span>
            <h5 class="modal-title" id="exampleModalCenterTitle">Peringatan!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin ingin menghapus kasir <b> <?= $res->nama_user ?> </b> ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <a href="<?= base_url("kelola_kasir/hapusDataKasir/$res->id_user") ?>" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Ubash Password Modal -->
    <div class="modal fade" id="ubahPassModal<?= $res->id_user ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Password Kasir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="user" action="<?= base_url('kelola_kasir/ubahPassKasir')?>" method="POST" >
            <input type="hidden" name="idUser" id="idUser" value="<?= $res->id_user ?>">
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="username">Ulangi Password</label>
                <input type="password" class="form-control" id="ulangiPassword" name="ulangiPassword">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endforeach; ?>