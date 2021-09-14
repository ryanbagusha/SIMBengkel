<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mt-4 mb-4 text-gray-800">Kelola Pembeli</h1>
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
              <th>Nama Pembeli</th>
              <th>Nomor Handphone</th>
              <th>Merk Motor</th>
              <th>Plat Nomor</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($view->result() as $res) : ?>
            <tr>
              <td><?= $res->nama_pembeli ?></td>
              <td><?= $res->nohp_pembeli ?></td>
              <td><?= $res->merk_motor ?></td>
              <td><?= $res->plat_nomor ?></td>
              <td align="center">
                <button type="button" data-toggle="modal" 
                data-target="#ubahModal<?= $res->id_pembeli ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#hapusModal<?= $res->id_pembeli ?>" class="btn btn-danger btn-sm">
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Pembeli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_pembeli/tambahDataPembeli')?>" method="POST" >
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_pembeli">Nama Pembeli</label>
            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required>
          </div>

          <div class="form-group">
            <label for="nohp_pembeli">Nomor Handphone</label>
            <input type="text" class="form-control" id="nohp_pembeli" name="nohp_pembeli" required>
          </div>

          <div class="form-group">
            <label for="merk_motor">Merk Motor</label>
            <input type="text" class="form-control" id="merk_motor" name="merk_motor" required>
          </div>
          
          <div class="form-group">
            <label for="plat_nomor">Plat Motor</label>
            <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" required>
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
<div class="modal fade" id="ubahModal<?= $res->id_pembeli ?>" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data Pembeli</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_pembeli/ubahDataPembeli')?>" method="POST" >
        <div class="modal-body">
        <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?= $res->id_pembeli ?>">

          <div class="form-group">
            <label for="nama_pembeli">Nama Pembeli</label>
            <input type="text" class="form-control" id="nama_pembeli"name="nama_pembeli"
            value="<?= $res->nama_pembeli ?>" required>
          </div>

          <div class="form-group">
            <label for="nohp_pembeli">Nomor Handphone</label>
            <input type="text" class="form-control" id="nohp_pembeli" name="nohp_pembeli" 
            value="<?= $res->nohp_pembeli ?>" required>
          </div>

          <div class="form-group">
            <label for="merk_motor">Merk Motor</label>
            <input type="text" class="form-control" id="merk_motor" name="merk_motor" 
            value="<?= $res->merk_motor ?>" required>
          </div>
          
          <div class="form-group">
            <label for="plat_nomor">Plat Motor</label>
            <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" 
            value="<?= $res->plat_nomor ?>" required>
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
<div class="modal fade" id="hapusModal<?= $res->id_pembeli ?>" tabindex="-1" role="dialog" 
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
        Apakah Anda yakin ingin menghapus <b> <?= $res->nama_pembeli ?> </b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url("kelola_pembeli/hapusDataPembeli/$res->id_pembeli") ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>