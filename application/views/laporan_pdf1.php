<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REKAP NILAI LOGBOOK PPNPN</title>
    <style>
        .container {
            width: 90%;
            margin: auto;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<p style="margin-top: -60px; margin-left: -40px; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span
            style="height:0pt; text-align:left; display:block; position:absolute; z-index:-1;"><img
            src="<?= base_url();?>assets/images/kopsurat.jpg" class="img-circle elevation-2"
                    alt="User Image">
                </span> <br><br><br><br><br><br><br><br>
                <!-- <strong><span
                style="font-family:'Times New Roman';">KEMENTERIAN PERTANIAN</span></strong> -->
        </p>
    <!-- <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><strong><span
                style="font-family:'Times New Roman';">BALAI PENERAPAN STANDAR INSTRUMEN PERTANIAN JAMBI</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:15pt; text-align:center; line-height:150%;"><span
            style="font-family:Arial;">Jl. Samarinda, Paal IV, Kec. Kota Baru, Kota Jambi, Jambi 36129</span></p>
    <hr> -->
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><strong><u><span
                style="font-family:'Times New Roman';">REKAP NILAI LOGBOOK PPNPN</span></strong></u></p>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Laporan</th>
                    <th>Tanggal Diajukan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through logbook data -->
                <?php
                $no = 0;
                foreach ($logbook2 as $i) :
                    $no++;
                    $id_log = $i['id_log'];
                    $id_user = $i['id_user'];
                    $nama_lengkap = $i['nama_lengkap'];
                    $nama_laporan = $i['nama_laporan'];
                    $tgl_diajukan = $i['nama_laporan'];
                    $tgl_diajukan = date('d-m-Y', strtotime($i['tgl_diajukan']));
                    $nilai = $i['nilai'];
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($nama_lengkap) ?></td>
                        <td><?= htmlspecialchars($nama_laporan) ?></td>
                        <td><?= htmlspecialchars($tgl_diajukan) ?></td>
                        <td><?= htmlspecialchars($nilai) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
