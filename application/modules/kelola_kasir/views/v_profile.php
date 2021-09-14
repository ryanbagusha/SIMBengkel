<!-- Begin Page Content -->
<div class="container-fluid">

  <h1 class="h3 mt-4 mb-4 text-gray-800">Profile</h1>
  <div class="card shadow mb-4">
    <div class="card-body">

      <!-- Alert -->
      <?= $this->session->flashdata('message'); ?>

      <!-- Foto Profile -->
      <div class="text-center">
        <div class="w-25 d-inline-block">
          <img class="img-profile rounded-circle img-thumbnail"
            src="<?=base_url('assets/img/profile/') . $user['gambar']; ?>">
        </div>
      </div>

      <!-- Form -->
      <?= form_open_multipart('kelola_kasir/ubahProfile') ?>

        <input type="hidden" id="username" name="username" value="<?= $user['username'] ?>">
        <input type="hidden" id="idUser" name="idUser" value="<?= $user['id_user'] ?>">

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" value="<?= $user['username'] ?>" disabled>
        </div>

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama"
          value="<?= $user['nama_user'] ?>" required>
        </div>

        <div class="form-group">
          <label for="nohp">Nomor Handphone</label>
          <input type="text" class="form-control" id="nohp" name="nohp"
          value="<?= $user['nohp_user'] ?>" required>
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
            <?php if ($user['jenis_kelamin'] == "Perempuan") : ?>
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
          <label for="exampleInputFile">Foto profil</label>
          <div class="input-group">
            <div class="custom-file">
              <!-- Untuk mengupload gambar -->
              <input type="file" class="custom-fileinput" id="exampleInputFile" name="foto">
            </div>
          </div>
        </div>
        
        <div class="text-right">
          <button type="submit" class="btn btn-danger">Ubah</button>
        </div>

      <?= form_close() ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->