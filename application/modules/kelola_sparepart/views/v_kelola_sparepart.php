<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mt-4 mb-4 text-gray-800">Kelola Sparepart</h1>
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
              <th>Nama Sparepart</th>
              <th>Harga Beli</th>
              <th>Harga Jual</th>
              <th>Stok</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($view->result() as $res) : ?>
            <tr>
              <td><?= $res->nama_sparepart ?></td>
              <td><?= number_format($res->harga_beli, 0, ',', '.') ?></td>
              <td><?= number_format($res->harga_jual, 0, ',', '.') ?></td>
              <td><?= $res->stok ?></td>
              <td><?= $res->jenis_sparepart ?></td>
              <td align="center">
                <button type="button" data-toggle="modal" 
                data-target="#ubahModal<?= $res->id_sparepart ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#hapusModal<?= $res->id_sparepart ?>" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#tambahStokModal<?= $res->id_sparepart ?>" class="btn btn-info btn-sm">
                  <i class="fas fa-plus-circle"></i>
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Sparepart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_sparepart/tambahDataSparepart')?>" method="POST" >
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_sparepart">Nama Sparepart</label>
            <input type="text" class="form-control" id="nama_sparepart" name="nama_sparepart" required>
          </div>

          <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="text" class="form-control" id="harga_beli" name="harga_beli" required>
          </div>

          <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" class="form-control" id="harga_jual" name="harga_jual" required>
          </div>
          
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" required>
          </div>

          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
              <option>--Pilih Kategori--</option>
              <?php foreach ($kategori->result() as $jenis) : ?>
              <option value="<?= $jenis->id_jenis_sparepart; ?>"><?= $jenis->jenis_sparepart; ?></option>
              <?php endforeach; ?>
            </select>
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
<div class="modal fade" id="ubahModal<?= $res->id_sparepart ?>" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Sparepart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_sparepart/ubahDataSparepart')?>" method="POST" >
        <div class="modal-body">
        <input type="hidden" name="id_sparepart" id="id_sparepart" value="<?= $res->id_sparepart ?>">

          <div class="form-group">
            <label for="nama_sparepart">Nama Sparepart</label>
            <input type="text" class="form-control" id="nama_sparepart" 
            name="nama_sparepart" value="<?= $res->nama_sparepart ?>" required>
          </div>

          <div class="form-group">
            <label for="harga_beli">Harga Beli</label>
            <input type="text" class="form-control" id="harga_beli"
            name="harga_beli" value="<?= $res->harga_beli ?>" required>
          </div>

          <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" class="form-control" id="harga_jual"
            name="harga_jual" value="<?= $res->harga_jual ?>" required>
          </div>
          
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" id="stok"
            name="stok" value="<?= $res->stok ?>" readonly>
          </div>

          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
              <option>--Pilih Kategori--</option>
              
              <?php foreach ($kategori->result() as $jenis) : ?>
                <?php if ($jenis->id_jenis_sparepart == $res->id_jenis_sparepart) : ?>
                  <option value="<?= $jenis->id_jenis_sparepart; ?>" selected="selected">
                    <?= $jenis->jenis_sparepart; ?>
                  </option>
                <?php else : ?>
                  <option value="<?= $jenis->id_jenis_sparepart; ?>">
                    <?= $jenis->jenis_sparepart; ?>
                  </option>
                <?php endif; ?>
              <?php endforeach; ?>
              
            </select>
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
<div class="modal fade" id="hapusModal<?= $res->id_sparepart ?>" tabindex="-1" role="dialog" 
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
        Apakah Anda yakin ingin menghapus <b> <?= $res->nama_sparepart ?> </b> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url("kelola_sparepart/hapusDataSparepart/$res->id_sparepart") ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Tambah Stok Modal-->
<div class="modal fade" id="tambahStokModal<?= $res->id_sparepart ?>" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Stok Sparepart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" action="<?= base_url('kelola_sparepart/tambahStokSparepart')?>" method="POST" >
          <div class="modal-body">
          <input type="hidden" name="id_sparepart" id="id_sparepart" value="<?= $res->id_sparepart ?>">
            <div class="form-group">
              <input type="number" class="form-control" id="tambah_stok"
              name="tambah_stok" value="1" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah Stok</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>