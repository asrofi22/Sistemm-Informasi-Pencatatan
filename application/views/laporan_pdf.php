<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Keluar Kantor</title>
</head>

<body>
    <?php
function tgl_indo($tanggal){
	$bulan = array (
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
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

    <?php

        $id = 0;
        foreach($izin as $i)
        :
        $id++;
        $id_izin = $i['id_izin'];
        $id_user = $i['id_user'];
        $nama_lengkap = $i['nama_lengkap'];
        $alasan = $i['alasan'];
        $nip = $i['nip'];
        $masa_kerja = $i['masa_kerja'];
        $jabatan = $i['jabatan'];
        $perihal_izin = $i['perihal_izin'];
        $tgl_diajukan = $i['tgl_diajukan'];
        $mulai = date('H:i', strtotime($i['mulai']));
        $berakhir = date('H:i', strtotime($i['berakhir']));
        $id_status_izin = $i['id_status_izin'];

        ?>

    <?php $diff = abs(strtotime($mulai) - strtotime($berakhir));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    ?>
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
                style="font-family:'Times New Roman';">SURAT IZIN KELUAR KANTOR</span></strong></u></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="font-family:'Times New Roman';">&nbsp;</span></br></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">Perihal</span><span
            style="width:4.84pt; display:inline-block;">&nbsp;</span><span
            style="width:10pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            Pengajuan Izin Keluar Kantor&nbsp;</span><span style="width:22.14pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Bersama surat ini, diberikan izin kepada:</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Nama</span><span
            style="width:6.99pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?=$nama_lengkap?></span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;NIP</span><span
            style="width:16.75pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?=$nip?></span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Masa Kerja</span><span
            style="width:52pt; display:inline-block;"></span><span style="font-family:'Times New Roman';">:
            <?=$masa_kerja?></span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Jabatan</span><span
            style="width:0.27pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?=$jabatan?></span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Untuk keluar kantor dengan keperluan:</span>
    </p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Alasan</span><span
            style="width:6.99pt; display:inline-block;">&nbsp;</span><span
            style="width:35pt; display:inline-block;"></span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?=$alasan?></span></p>
     <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Tanggal</span><span
            style="width:6.99pt; display:inline-block;">&nbsp;</span><span
            style="width:29pt; display:inline-block;"></span><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?= tgl_indo($tgl_diajukan)?></span></p>
     <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:60pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Jam</span><span
            style="width:6.99pt; display:inline-block;"></span><span
            style="width:45pt; display:inline-block;">&nbsp;</span><span
            style="width:40pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">:
            <?=$mulai?> s/d <?=$berakhir?> WIB</span></p>  
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;"><span
            style="width:36pt; display:inline-block;">&nbsp;</span><span
            style="font-family:'Times New Roman';">&nbsp;Demikian surat ini dibuat, agar
                dipergunakan sebagaimana mestinya.</span></p>
                
    <?php endforeach; ?>

</body>

</html>