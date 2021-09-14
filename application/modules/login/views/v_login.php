<body class="bg-gradient-danger">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-3">Bengkel Bakir</h1>
                    <span style="font-size: 72px; color: #E74A3B;">
                      <i class="fas fa-motorcycle mb-4 rotate-n-15"></i>
                    </span>
                    <?= $this->session->flashdata('message'); ?>
                  </div>

                  <form class="user" action="<?= base_url('login') ?>" method="POST">

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user"
                        id="username" name="username" placeholder="Masukkan Username..."
                        value="<?= set_value('username') ?>">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user"
                        id="password" name="password" placeholder="Masukkan Kata Sandi...">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-danger btn-user btn-block mt-5">
                      Masuk
                    </button>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>