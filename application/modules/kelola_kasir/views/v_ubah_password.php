<!-- Begin Page Content -->
<div class="container-fluid">

  <h1 class="h3 mt-4 mb-4 text-gray-800">Ubah Password</h1>

  <div class="card shadow mb-4">
    <div class="card-body">

      <!-- Alert -->
      <?= $this->session->flashdata('message'); ?>

      <!-- Form -->
      <form class="user" action="<?= base_url('kelola_kasir/ubah_password')?>" method="POST">

        <div class="form-group">
          <label for="nama">Password Sekarang</label>
          <input type="password" class="form-control" id="password_lama" name="password_lama">
          <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <label for="nama">Password Baru</label>
          <input type="password" class="form-control" id="password" name="password">
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        
        <div class="form-group">
          <label for="username">Ulangi Password Baru</label>
          <input type="password" class="form-control" id="ulangiPassword" name="ulangiPassword">
          <?= form_error('ulangiPassword', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

          <div class="text-right">
            <button type="submit" class="btn btn-danger">Ubah</button>
          </div>

      </form>

    </div>
  </div>

</div>
<!-- /.container-fluid -->