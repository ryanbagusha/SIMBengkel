<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mt-4 mb-4 text-gray-800">Kelola Mekanik</h1>
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
              <th>Nama Mekanik</th>
              <th>Nomor Handphone</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($view->result() as $res) : ?>
            <tr>
              <td><?= $res->nama_mekanik ?></td>
              <td><?= $res->nohp_mekanik ?></td>
              <td align="center">
                <button type="button" data-toggle="modal" 
                data-target="#ubahModal<?= $res->id_mekanik ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#hapusModal<?= $res->id_mekanik ?>" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Mekanik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_mekanik/tambahDatamekanik')?>" method="POST" >
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_mekanik">Nama mekanik</label>
            <input type="text" class="form-control" id="nama_mekanik" name="nama_mekanik" required>
          </div>

          <div class="form-group">
            <label for="nohp_mekanik">Nomor Handphone</label>
            <input type="text" class="form-control" id="nohp_mekanik" name="nohp_mekanik" required>
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

<!-- Ubah Modal -->
<div class="modal fade" id="ubahModal<?= $res->id_mekanik ?>" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Mekanik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_mekanik/ubahDataMekanik')?>" method="POST" >
        <div class="modal-body">
        <input type="hidden" name="id_mekanik" id="id_mekanik" value="<?= $res->id_mekanik ?>">

          <div class="form-group">
            <label for="nama_mekanik">Nama mekanik</label>
            <input type="text" class="form-control" id="nama_mekanik"name="nama_mekanik"
            value="<?= $res->nama_mekanik ?>" required>
          </div>

          <div class="form-group">
            <label for="nohp_mekanik">Nomor Handphone</label>
            <input type="text" class="form-control" id="nohp_mekanik" name="nohp_mekanik" 
            value="<?= $res->nohp_mekanik ?>" required>
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
<div class="modal fade" id="hapusModal<?= $res->id_mekanik ?>" tabindex="-1" role="dialog" 
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
        Apakah Anda yakin ingin menghapus <b> <?= $res->nama_mekanik ?> </b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url("kelola_mekanik/hapusDataMekanik/$res->id_mekanik") ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>