<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cetak Laporan</title>
      <link rel="stylesheet" href="<?= base_url('assets/vendors/css/laporan.css') ?>">
   </head>
   <body>

      <!-- Header -->
      <div id="title">
         LAPORAN DATA TRANSAKSI
      </div>
      <div id="title-tanggal">
         Tanggal <?= $tgl_awal; ?> s.d. <?= $tgl_akhir; ?>
      </div>

      <br>

      <div id="isi">
         <!-- Tabel/Main -->
         <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
            <thead style="background:#e8ecee">
               <tr class="tr-title">
                  <th height="20" align="center" valign="middle">NO.</th>
                  <th height="20" align="center" valign="middle">KODE TRANSAKSI</th>
                  <th height="20" align="center" valign="middle">TANGGAL</th>
                  <th height="20" align="center" valign="middle">NAMA KASIR</th>
                  <th height="20" align="center" valign="middle">NAMA MEKANIK</th>
                  <th height="20" align="center" valign="middle">NAMA PEMBELI</th>
                  <th height="20" align="center" valign="middle">HARGA TOTAL</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $no = 1;
                  $harga = 0;
                  foreach ($transaksi->result() as $res) : 
               ?>
                  <tr>
                     <td><?= $no++ ?></td>
                     <td><?= $res->kode_transaksi ?></td>
                     <td><?= $res->tanggal ?></td></td>
                     <td><?= $res->nama_user ?></td>
                     <td><?= $res->nama_mekanik ?></td>
                     <td><?= $res->nama_pembeli ?></td>
                     <td>Rp. <?= $res->harga_total ?></td>
                     <?php $harga += $res->harga_total ?>
                  </tr>
               <?php endforeach; ?>
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="6"><b>Total</b></td>
                  <td>Rp. <?= $harga; ?></td>
               </tr>
            </tfoot>
         </table>

         <!-- Footer -->
         <div id="footer-tanggal">
            Tanah Laut, <?= date('d-M-Y') ?>
         </div>
         <div id="footer-jabatan">
            Kepala Bengkel,
         </div>
         <div id="footer-nama">
            Is Bakir
         </div>

      </div>

      <script>
         window.print();
      </script>

   </body>
</html>