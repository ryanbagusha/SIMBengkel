<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mt-4 mb-4 text-gray-800">Kelola Transaksi</h1>
  <div class="card shadow mb-4">
    <div class="card-body">

      <!-- Header -->
      <div class="text-right">
        <button type="button" data-toggle="modal" data-target="#cetakModal" class="btn btn-success btn-icon-split mb-3">
          <span class="icon text-white-50">
            <i class="fas fa-print"></i>
          </span>
          <span class="text">Cetak Laporan</span>
        </button>
      </div>
      
      <!-- Alert -->
      <?= $this->session->flashdata('message'); ?>
      
      <!-- Tabel -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Kode Transaksi</th>
              <th>Tanggal</th>
              <th>Nama Kasir</th>
              <th>Nama Mekanik</th>
              <th>Nama Pembeli</th>
              <th>Harga Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($transaksi->result() as $res) : ?>
            <tr>
              <td><?= $res->kode_transaksi ?></td>
              <td><?= date('d/m/Y', strtotime($res->tanggal)) ?></td></td>
              <td><?= $res->nama_user ?></td>
              <td><?= $res->nama_mekanik ?></td>
              <td><?= $res->nama_pembeli ?></td>
              <td>Rp. <?= number_format($res->harga_total, 0, ',', '.') ?></td>
              <td align="center">
                <!-- <button type="button" data-toggle="modal" 
                data-target="#ubahModal<?= $res->kode_transaksi ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-edit"></i>
                </button> -->
                <button type="button" data-toggle="modal" 
                data-target="#hapusModal<?= $res->kode_transaksi ?>" class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i>
                </button>
                <button type="button" data-toggle="modal" 
                data-target="#lihatDetail<?= $res->kode_transaksi ?>" class="btn btn-info btn-sm">
                  <i class="fas fa-eye"></i>
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

<!-- Cetak Modal-->
<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Cetak Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_transaksi/cetak_laporan')?>" method="POST" target="_blank">
        <div class="modal-body">
          
          <div class="form-group">
            <label for="pembeli">Tanggal</label>
            <input type="date" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="tgl_awal" id="tgl_awal">
          </div>

          <div class="form-group">
            <label for="mekanik">S.d.</label>
            <input type="date" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="tgl_akhir" id="tgl_akhir">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($transaksi->result() as $res) : ?>

<!-- Hapus Modal-->
<div class="modal fade" id="hapusModal<?= $res->kode_transaksi ?>" tabindex="-1" role="dialog" 
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
        Apakah Anda yakin ingin menghapus transaksi <?= $res->kode_transaksi ?> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="<?= base_url("kelola_transaksi/hapusDataTransaksi/$res->kode_transaksi") ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- Lihat Detail Transaksi Modal-->
<div class="modal fade" id="lihatDetail<?= $res->kode_transaksi ?>" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
          <h1 class="h4 mb-2 text-gray-800">Transaksi</h1>
          <table class="table">
            <tr>
              <th scope="row">ID Transaksi</th>
              <td>:</td>
              <td><?= $res->kode_transaksi ?></td>
            </tr>
            <tr>
              <th scope="row">Tanggal</th>
              <td>:</td>
              <td><?= date('d/m/Y', strtotime($res->tanggal)) ?></td>
            </tr>
            <tr>
              <th scope="row">Nama Kasir</th>
              <td>:</td>
              <td><?= $res->nama_user ?></td>
            </tr>
            <tr>
              <th scope="row">Nama Mekanik</th>
              <td>:</td>
              <td><?= $res->nama_mekanik ?></td>
            </tr>
            <tr>
              <th scope="row">Nama Pembeli</th>
              <td>:</td>
              <td><?= $res->nama_pembeli ?></td>
            </tr>
            <tr>
              <th scope="row">No HP Pembeli</th>
              <td>:</td>
              <td><?= $res->nohp_pembeli ?></td>
            </tr>
            <tr>
              <th scope="row">Merk Motor</th>
              <td>:</td>
              <td><?= $res->merk_motor ?></td>
            </tr>
            <tr>
              <th scope="row">Plat Nomor</th>
              <td>:</td>
              <td><?= $res->plat_nomor ?></td>
            </tr>
            <tr>
              <th scope="row">Keterangan</th>
              <td>:</td>
              <td><?= $res->keterangan ?></td>
            </tr>
          </table>
          
          <h1 class="h4 mb-2 text-gray-800">Total</h1>
          <table class="table">
            <?php foreach ($detail->result() as $det) : ?>
              <?php if ($det->kode_transaksi == $res->kode_transaksi) : ?>
              <tr>
                <td><?= $det->nama_sparepart ?></td>
                <td>:</td>
                <td>Rp. <?= number_format($det->harga, 0, ',', '.') ?></td>
                <td>x</td>
                <td><?= $det->jumlah ?></td>
                <td>:</td>
                <td>Rp. <?= number_format($det->subtotal, 0, ',', '.') ?></td>
              </tr>
              <?php endif; ?>
            <?php endforeach; ?>

            <tr>
              <th colspan="5" scope="row">Harga Total</th>
              <td>:</td>
              <td>Rp. <?= number_format($res->harga_total, 0, ',', '.') ?></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a href="<?= base_url('kelola_transaksi/cetak_nota/') . $res->kode_transaksi ?>" class="btn btn-primary" target="_blank">
            <i class="fas fa-file"></i> Cetak Nota
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>
