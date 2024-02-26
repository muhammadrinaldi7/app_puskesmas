<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
  <style type="text/css">
    @media print{@page {size: landscape}}
  </style>
  <?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}
?>

  <?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
<body onLoad="window.print()">
  <table border="0" align="center" width="100%">
        <tr align="center">
            <td>
                <img width="70px" src="<?= base_url() ?>assets/logo3.png">
            </td>
           <td>
                <font size="6">PUSKESMAS BANJARBARU SELATAN</font> <br>
                <font size="3">Jl. Rambai No.1, Loktabat Sel., Kec. Banjarbaru Selatan, Kota Banjar Baru, Kalimantan Selatan 70713</font><br>
                <font size="3">Telepon : (0267) 4218872. E-mail: puskesbbs@gmail.com</font><br>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr size="3px" color="black">
            </td>
        </tr>
    </table>
    <br>
    <div style="text-align: center; ">
        <font size="3"><b><u>LAPORAN DATA OBAT</u></b></font><br>
    </div>
    <br>

    <table border="0" cellspacing="0" width="50%" style="font-size: 12px;">
        <?php foreach($data_rm as $d): ?>
        <?php endforeach; ?>
        <thead style="text-align: left; ">
        <tr>
            <td style="width:40%">No Rekam Medis</td> 
            <td>: <?= $d->no_rekamedis ?></td>   
        </tr>   
        <tr>
            <td>No KTP </td> 
            <td>: <?= $d->no_ktp ?></td>   
        </tr>
        <tr>
            <td>Nama </td> 
            <td>: <?= $d->nama_pasien ?></td>   
        </tr>
        <tr>
            <td>Jenis Kelamin</td> 
            <td>: <?= $d->jenkel ?></td>   
        </tr>
        <tr>
            <td>Tempat dan Tanggal Lahir</td> 
            <td>: <?= $d->tempat_lahir.', '.tgl_indo($d->tanggal_lahir) ?></td>   
        </tr>
        </thead>
    </table>
    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 12px;">
        <thead style="background-color: #d5eacf; text-align: center; ">
            <tr>
                <th style="flex: 0 0 auto; min-width: 2em;">No.</th>
                <th>No Rawat</th>
                <th>Nama Poli</th>
                <th>Tindakan</th>
                <th>Hasil Periksa</th>
                <th>Pemberian Obat</th>
            </tr>
        </thead>
                    
        <tbody>
            <?php $no=1; foreach($data_rm1 as $i):?>
            <tr>   
                <td style="flex: 0 0 auto; min-width: 2em;"><center><?php echo $no++;?></center></td>
                <td><?= $i->no_rawat ?></td> 
                <td><?= $i->nama_poli ?></td>
                <td><?= $i->nama_tindakan ?></td>
                <td><?= $i->hasil_periksa ?></td>
                <td><?= $i->nama_obat ?></td>
            </tr>
            <?php endforeach ?>
                
                </tbody>
              </table>

    <br><br><br>

  <div style="text-align: left; display: inline-block; float: right; margin-right: 50px; font-size: 11pt;">
        <label>
            Banjarbaru, <?php echo tgl_indo(date('Y-m-d'));?>
            <br>
            <p style="text-align: center;">
                <b>PENANGGUNG JAWAB</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>______________________</u></b><br>
                
            </p>
        </label>
    </div>
   
</body>

</html>

