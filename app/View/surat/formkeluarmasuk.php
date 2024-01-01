<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Keluar / Masuk Kampus</title>
    <!-- <style>
        td{
            margin-right: 10px;
        }
    </style> -->
</head>
<body>


    <div class="header"></div>
    <img src="http://localhost/CRUD-INFORMASI-MAHASISWA/public/img/logo.png" alt="Logo" style="width:50px; float:left;" alt="">

    <h6 style="margin:20px 0 10px 0 ;float:left;">POLITEKNIK GAJAH TUNGGAL</h6>
    <br>
    <br><br>
    <table>
        <tr>
            <th colspan="6" style="text-align:left;padding-bottom:20px;">IZIN KELUAR / MASUK KAMPUS</th>
        </tr>
        <tr>
        <td>HARI/TANGGAL</td>
    <td>:</td>
    <td><?= $model[0]['tanggal']?></td>
</td><td></td><td></td>
            <!-- Ganti $dataIzin[0]['tanggal'] dengan kunci yang sesuai -->
            <td >JAM KELUAR</td>
            <td>:</td>
            <td><?= $model[0]['jam_keluar']?></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><?= $model[0]['nama']?></td><td></td><td></td>
            <td>JAM KEMBALI</td>
            <td>:</td>
            <td><?= $model[0]['jam_masuk']?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $model[0]['nim']?></td>
        </tr>
        <tr>
        <td>KELAS</td>
            <td>:</td>
            <td><?= $model[0]['kelas']?></td>
        </tr>
        <tr>
        <td>KEPERLUAN</td>
            <td>:</td>
            <td colspan="3"><?= $model[0]['keperluan']?></td>
        </tr>
        
    </table><br>
    <table >
        <tr>
            <td style="padding-bottom: 60px; padding-right:60px;text-align:center;">pemohon,</td><td style="padding-left: 50px;"></td><td></td>
            <td style=" padding-bottom:60px;text-align:center;">menyetujui,</td><td style="padding-left: 50px;"></td><td></td>
            <td style="padding-bottom:60px;text-align:center;">mengetahui,</td>
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr>
            <td><hr>Mahasiswa</td><td></td><td></td>
            <td><hr >Pembimbing Akademik</td><td></td><td></td>
            <td><hr >Bag. Kemahasiswaan</td>
            
        </tr>
    </table>
    
</body>
</html>