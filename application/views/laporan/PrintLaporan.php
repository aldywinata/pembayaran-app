<html>
<head>
  <title>Print Laporan Pembayaran</title>
  <style>
    .table {
        border-collapse:collapse;
        table-layout:fixed;width: 630px;
    }
    .table th {
        padding: 5px;
    }
    .table td {
        word-wrap:break-word;
        width: 20%;
        padding: 5px;
    }
  </style>
</head>
<body>
  <center>
        <h3 style="margin-bottom: 5px;">LAPORAN PEMBAYARAN</h3>
  </center>

  <label>Laporan : <?= $label ?></label>
  <table class="table" border="1" width="100%" style="margin-top: 10px;">
    <tr>
      <th>NO</th>
      <th>Tanggal Pembayaran</th>
      <th>Kode Pembayaran</th>
      <th>Metode</th>
      <th>Total</th>
    </tr>

    <?php if( empty($pembayarans) ) : ?>
      <tr>
        <td colspan="5" align="center"><?= "Tidak Ada Data" ?></td>
      </tr>
    <?php else : ?>
      <?php $no = 1; foreach( $pembayarans as $pembayaran ) : ?>
        <?php if( $pembayaran->status_pembayaran == "LUNAS" ) { 
          $nominal[] = $pembayaran->total;
          $total = array_sum($nominal);    
        ?>
          <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= date('d-m-Y', strtotime($pembayaran->tanggal_pembayaran)) ?></td>
            <td><?= $pembayaran->kode_pembayaran ?></td>
            <td><?= $pembayaran->metode_pembayaran ?></td>
            <td>Rp. <?= number_format($pembayaran->total, 0, ",", ".") ?></td>
          </tr>
        <?php } ?>
      <?php endforeach ?>
      <tr>
        <!-- <td></td> -->
        <th colspan="4">Grandtotal</th>
        <td class="fw-bold">Rp. <?= number_format($total, 0, ",", ".") ?></td>
      </tr>
    <?php endif ?>
  </table>
</body>
</html>