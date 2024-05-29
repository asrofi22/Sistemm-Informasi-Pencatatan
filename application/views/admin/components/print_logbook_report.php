<?php
require_once 'vendor/autoload.php';

// Use the DOMPDF namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// Create an instance of Dompdf with options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Buffer the following html with PHP so it can be saved as a variable later
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Logbook Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
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

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h1 {
            text-align: center;
        }

        .container {
            margin-top: 20px;
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
    <!-- <h1>Logbook Report</h1> -->
    <p>Report Date Range: <?= $start_date ?> to <?= $end_date ?></p>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Diajukan</th>
                    <th>Nama Lengkap</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($logbookbulanan as $logbookbulanan):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $logbookbulanan['tgl_diajukan'] ?></td>
                    <td><?= $logbookbulanan['nama_lengkap'] ?></td>
                    <td><?= $logbookbulanan['nilai'] ?? 'Belum Ada' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Get the buffered HTML content
$html = ob_get_clean();

// Load HTML content into DOMPDF
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output PDF as a file (you can also use $dompdf->stream() to show it directly in the browser)
$dompdf->stream('logbook_report.pdf', array('Attachment' => false));
