<!-- Begin Page Content -->
<div class="container-fluid m-0 p-0">

  <div class="row">

    <div class="col-9">

      <!-- Header -->
      <div class="row">
        <div class="col-8">
          <h1 class="h3 ml-4 mt-4 mb-4 text-gray-800">Halaman Kasir</h1>
        </div>
        <div class="col-auto">
          <form action="<?= base_url('kelola_transaksi/halaman_kasir') ?>" method="post">
          <div class="form-group">
            <input type="text" name="key" id="key" placeholder="Cari menu?" autocomplete="off" autofocus class="mt-4 ml-5">
            <button type="submit" name="cari" class="btn btn-danger btn-sm">Cari</button>
          </div>
          </form>
        </div>
      </div>

      <!-- Alert -->
      <?= $this->session->flashdata('message'); ?>
      

      <!-- Tabel -->
      <?php foreach($sparepart->result() as $res) : ?>
        <div class="col-xl-3 col-md-6 mb-4 float-left">
          <div class="card border-left-danger shadow">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs text-uppercase font-weight-bold text-gray-800"><?= $res->nama_sparepart; ?></div>
                  <div class="text-s text-danger mb-1">
                    Rp. <?= number_format($res->harga_jual, 0, ',', '.') ?></div>
                </div>
                <div class="col-auto">
                  <a href="<?= base_url("kelola_transaksi/tambahCart/$res->id_sparepart") ?>">
                    <i class="fas fa-plus-circle fa-2x text-danger"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <!-- Cart -->
    <div class="col-3 bg-gradient-dark h-auto d-inline-block p-0" style="min-height: 690px;">
      <div class="text-center" style="margin-bottom:65px;">
        <h1 class="h5 mt-3 text-gray-100">
          <i class="fas fa-shopping-cart"></i> Cart
        </h1>
        <hr class="sidebar-divider ml-4 mr-4">
        <?php if ($this->cart->contents() == NULL) : ?>
          <span style="font-size: 72px; ">
            <i class="fas fa-ban"></i>
          </span>
          <div class="h6 text-gray-300">
            Cart Kosong
          </div>
        </div>
          <div class="position-absolute mb-3 mr-4 mt-5" style="bottom: 0; right: 0;">
            <button type="button" data-toggle="modal" data-target="#checkoutModal" class="btn btn-success" disabled>
              <i class="fas fa-cart-arrow-down"></i> Checkout
            </button>
          </div>
        <?php else : ?>
          <table class="table table-borderless text-gray-300">
            <?php foreach ($this->cart->contents() as $item) : ?>
              <tr align="left">
                <td>
                  <div class="">
                    <div class="font-weight-bold">
                      <?= $item['name'] ?>
                    </div>
                    <div class="text-xs">
                      <?= $item['qty'] ?> x Rp. <?= number_format($item['price'], 0, ',', '.') ?>
                    </div>
                  </div>
                </td>
                <td align="left" valign="middle">Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                <td>
                  <a href="<?= base_url('kelola_transaksi/hapusCart/'.$item['rowid']) ?>">
                    <span class="text-gray-100">
                      <i class="fas fa-trash"></i>
                    </span>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td align="left" class="font-weight-bold"> TOTAL </td>
              <td align="left">Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
            </tr>
          </table>
          </div>
          <div class="position-absolute mb-3 mr-4 mt-5" style="bottom: 0; right: 0;">
            <button type="button" data-toggle="modal" data-target="#checkoutModal" class="btn btn-success">
              <i class="fas fa-cart-arrow-down"></i> Checkout
            </button>
          </div>
        <?php endif; ?>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

<!-- Checkout Modal-->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Checkout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="user" action="<?= base_url('kelola_transaksi/checkoutTransaksi')?>" method="POST">
        <div class="modal-body">

          <input type="hidden" name="user" value="<?= $user['id_user']?>">
          
          <div class="form-group">
            <label for="pembeli">Pembeli</label>
            <select class="form-control" id="pembeli" name="pembeli">
              <option>--Pilih Pembeli--</option>
              <?php foreach ($pembeli->result() as $value) : ?>
              <option value="<?= $value->id_pembeli; ?>"><?= $value->nama_pembeli; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="mekanik">Mekanik</label>
            <select class="form-control" id="mekanik" name="mekanik">
              <option>--Pilih Mekanik--</option>
              <?php foreach ($mekanik->result() as $value) : ?>
              <option value="<?= $value->id_mekanik; ?>"><?= $value->nama_mekanik; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
      </form>
    </div>
  </div>
</div>