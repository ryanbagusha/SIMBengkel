        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; SIM Bengkel 2021</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <span style="font-size: 20px;">
              <i class="fas fa-exclamation-circle mr-2"></i>
            </span>
            <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Apakah Anda yakin ingin keluar? Pilih "Keluar" jika Anda ingin keluar.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-danger" href="<?= base_url('login/logout') ?>">Keluar</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->    
    <script src="<?= base_url('assets/vendors/sbadmin2/') ?>js/demo/datatables-demo.js"></script>

    <!-- sweetalert2 -->
    <script src="<?= base_url('assets/vendors/sweetalert2/') ?>sweetalert2.all.min.js"></script>
</body>

</html>