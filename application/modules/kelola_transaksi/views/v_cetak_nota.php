<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cetak Nota <?= $transaksi['kode_transaksi'] ?></title>
      <link rel="stylesheet" href="<?= base_url('assets/vendors/css/nota.css') ?>">
      <!-- <link href="<?= base_url('assets/vendors/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" /> -->

   </head>
   <body>

      <!-- Header -->
      <div id="title-tanggal">
         NOTA PENJUALAN
      </div>
      <div id="title">
         BENGKEL BAKIR
      </div>
      <p class="text"><b>Service Kendaraan Roda Dua</b>
      <p class="text"> Jl. Balerejo, Angsau, Pelaihari, Tanah Laut
      <p class="text"> HP/WA : 0813-4967-0724/0852-4962-7302

      <br>
      <br>
      
      <br>

      <div class="tanggal">
         Pelaihari, <?= date('d-M-Y') ?>
      </div>

      <table style="width: 100%;">
         <tr>
            <td valign="top" align="left">
               <table class="transaksi">
                  <tr>
                     <td>Kode Transaksi</td>
                     <td>:</td>
                     <td><?= $transaksi['kode_transaksi'] ?></td>
                  </tr>
                  <tr>
                     <td>Nama Kasir</td>
                     <td>:</td>
                     <td><?= $transaksi['nama_user'] ?></td>
                  </tr>
                  <tr>
                     <td>Nama Mekanik</td>
                     <td>:</td>
                     <td><?= $transaksi['nama_mekanik'] ?></td>
                  </tr>
                  <tr>
                     <td>Nama Pembeli</td>
                     <td>:</td>
                     <td><?= $transaksi['nama_pembeli'] ?></td>
                  </tr>
                  <tr>
                     <td>No HP</td>
                     <td>:</td>
                     <td><?= $transaksi['nohp_pembeli'] ?></td>
                  </tr>
                  <tr>
                     <td>Merk Motor</td>
                     <td>:</td>
                     <td><?= $transaksi['merk_motor'] ?></td>
                  </tr>
                  <tr>
                     <td>Plat Nomor</td>
                     <td>:</td>
                     <td><?= $transaksi['plat_nomor'] ?></td>
                  </tr>
                  <tr>
                     <td><b>Keterangan</b></td>
                     <td><b>:</b></td>
                     <td><b><?= $transaksi['keterangan'] ?></b></td>
                  </tr>
               </table>
            </td>
            <td valign="top" align="left">
               <div id="isi">
                  <!-- Tabel/Main -->
                  <table class="table" width="100%" border="1" cellpadding="0" cellspacing="0">
                     <thead>
                        <tr class="tr-title">
                           <th height="25" align="center" valign="middle">No.</th>
                           <th height="25" align="center" valign="middle">Jumlah</th>
                           <th height="25" align="center" valign="middle">Nama Barang</th>
                           <th height="25" align="center" valign="middle">Harga</th>
                           <th height="25" align="center" valign="middle">Subtotal</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                           $no = 1;
                           $harga = 0;
                           foreach ($detail->result() as $res) : 
                        ?>
                           <tr class="tr">
                              <td height="25" align="center" valign="middle"><?= $no++; ?></td>
                              <td height="25" align="center" valign="middle"><?= $res->jumlah; ?></td>
                              <td height="25" align="center" valign="middle"><?= $res->nama_sparepart; ?></td>
                              <td height="25" align="center" valign="middle">Rp. <?= $res->harga; ?></td>
                              <td height="25" align="center" valign="middle">Rp. <?= $res->subtotal; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td height="25" align="center" valign="middle" colspan="4"><b>Total</b></td>
                           <td height="25" align="center" valign="middle">Rp. 
                              <?= $transaksi['harga_total']; ?>
                           </td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </td>
         </tr>
      </table>

      <br>
      <br>

      <script>
         window.print();
      </script>

   </body>
</html>