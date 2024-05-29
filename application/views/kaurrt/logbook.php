<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("kaurrt/components/header.php") ?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/styles/core.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/styles/icon-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>src/plugins/datatables/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>src/plugins/datatables/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/styles/style.css"/>
    <style>
        .full-width-table {
            width: 100%;
            table-layout: fixed;
        }

        .full-width-table th, .full-width-table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <!-- Navbar and Sidebar Components -->
    <?php $this->load->view("kaurrt/components/navbar.php") ?>
    <?php $this->load->view("kaurrt/components/sidebar.php") ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Logbook PPNPN</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url();?>Dashboard/dashboard_kaurrt">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Logbook PPNPN
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <button id="showDailyLogbook" class="btn btn-primary mr-2">Logbook Harian</button>
                            <button id="showMonthlyLogbook" class="btn btn-primary">Logbook Bulanan</button>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            
            <!-- Daily Logbook Table -->
            <div id="dailyLogbookTable" class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Logbook Harian PPNPN</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Tanggal Diajukan</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Laporan</th>
                                <th>File</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach($logbook1 as $i):
                                $no++;
                                $id_log = $i['id_log'];
                                $id_user = $i['id_user'];
                                $tgl_diajukan = $i['tgl_diajukan'];
                                $nama_lengkap = $i['nama_lengkap'];
                                $nama_laporan = $i['nama_laporan'];
                                $isi = $i['isi'];
                                $file = $i['file'];

                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $tgl_diajukan ?></td>
                                <td><?= $nama_lengkap ?></td>
                                <td><?= $nama_laporan ?></td>
                                <td>
                                    <?php if ($file): ?>
                                        <a href="<?php echo base_url('uploads/logbook/' . $file) ?>" target="_blank">
                                            <center><i class="fas fa-file fa-2x"></i></center>
                                        </a>
                                    <?php else: ?>
                                        File tidak tersedia
                                    <?php endif; ?>
                                </td>
                                <td class="table-plus">
                                    <a href="#" data-toggle="modal" data-target="#detail<?= $id_log ?>" class="btn btn-info btn-sm"><i class="icon-copy bi bi-eye"></i></a>
                                </td>
                            </tr>
                            <!-- Modal Detail logbook -->
                            <div class="modal fade" id="detail<?= $id_log ?>" tabindex="-1"
                                                    aria-labelledby="detailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel">Detail
                                                                    Logbook</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <!-- <div class="form-group">
                                                                            <label for="detail_nama_lengkap<?= $id_log ?>">Nama
                                                                                Lengkap:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="detail_nama_lengkap<?= $id_log ?>"
                                                                                value="<?= $nama_lengkap ?>" readonly>
                                                                        </div> -->
                                                                        <div class="form-group">
                                                                            <label for="detail_nama_laporan<?= $id_log ?>">Nama
                                                                                Laporan:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="detail_nama_laporan<?= $id_log ?>"
                                                                                value="<?= $nama_laporan ?>" readonly>
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <label for="detail_tgl_diajukan<?= $id_log ?>">Tanggal
                                                                                Diajukan:</label>
                                                                            <input type="text" class="form-control"
                                                                                id="detail_tgl_diajukan<?= $id_log ?>"
                                                                                value="<?= $tgl_diajukan ?>" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="detail_isi<?= $id_log ?>">Isi:</label>
                                                                            <textarea class="form-control"
                                                                                id="detail_isi<?= $id_log ?>" rows="10"
                                                                                readonly><?= $isi ?></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="detail_file<?= $id_log ?>">File:</label>
                                                                            <?php if ($file): ?>
                                                                                <a href="<?= base_url('uploads/logbook/' . $file) ?>" target="_blank">
                                                                                    <i class="fas fa-file"></i> Lihat File
                                                                                </a>
                                                                            <?php else: ?>
                                                                                File tidak tersedia
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <!-- Add more details here if needed -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Monthly Logbook Table -->
            <div id="monthlyLogbookTable" class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Logbook Bulanan PPNPN</h4>
                    <div class="form-group">

                    <a href="<?= base_url();?>Cetak/rekap_logbook_pdf/<?=$id_log?>"
                                                        target="_blank" class="btn btn-success">
                                                        Cetak Rekap Nilai
                                                    </a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Tanggal Diajukan</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Laporan</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Nilai</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach($logbook2 as $i):
                                $no++;
                                $id_log = $i['id_log'];
                                $id_user = $i['id_user'];
                                $tgl_diajukan = $i['tgl_diajukan'];
                                $nama_lengkap = $i['nama_lengkap'];
                                $nama_laporan = $i['nama_laporan'];
                                $isi = $i['isi'];
                                $file = $i['file'];
                                $id_status_log = $i['id_status_log'];
                                $nilai = $i['nilai'];
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $tgl_diajukan ?></td>
                                <td><?= $nama_lengkap ?></td>
                                <td><?= $nama_laporan ?></td>
                                <td>
                                    <?php if ($file): ?>
                                        <a href="<?php echo base_url('uploads/logbook/' . $file) ?>" target="_blank">
                                            <center><i class="fas fa-file fa-2x"></i></center>
                                        </a>
                                    <?php else: ?>
                                        File tidak tersedia
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($id_status_log == 1): ?>
                                        <div class="table-responsive">
                                            <div class="table table-striped table-hover">
                                                <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_data_pegawai">Menunggu Konfirmasi</a>
                                            </div>
                                        </div>
                                    <?php elseif($id_status_log == 2): ?>
                                        <div
                                        class="table-responsive">
                                            <div class="table table-striped table-hover ">
                                                <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_data_pegawai">Diterima</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($nilai == NULL): ?>
                                        <a href="" class="btn btn-danger btn-sm">Belum Ada</a>
                                    <?php else: ?>
                                        <?= $nilai ?>
                                    <?php endif; ?>
                                </td>
                                <td class="table-plus">
                                    <a href="#" data-toggle="modal" data-target="#detail<?= $id_log ?>" class="btn btn-info "><i class="icon-copy bi bi-eye"></i></a>
                                </td>
                            </tr>
                            <!-- Modal Detail logbook -->
                            <div class="modal fade" id="detail<?= $id_log ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">Detail Logbook</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="detail_nama_laporan<?= $id_log ?>">Nama Laporan:</label>
                                                        <input type="text" class="form-control" id="detail_nama_laporan<?= $id_log ?>" value="<?= $nama_laporan ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="detail_tgl_diajukan<?= $id_log ?>">Tanggal Diajukan:</label>
                                                        <input type="text" class="form-control" id="detail_tgl_diajukan<?= $id_log ?>" value="<?= $tgl_diajukan ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="detail_isi<?= $id_log ?>">Isi:</label>
                                                        <textarea class="form-control" id="detail_isi<?= $id_log ?>" rows="10" readonly><?= $isi ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="detail_file<?= $id_log ?>">File:</label>
                                                        <?php if ($file): ?>
                                                            <a href="<?= base_url('uploads/logbook/' . $file) ?>" target="_blank">
                                                                <i class="fas fa-file"></i> Lihat File
                                                            </a>
                                                        <?php else: ?>
                                                            File tidak tersedia
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?=base_url();?>assets/scripts/core.js"></script>
    <script src="<?=base_url();?>assets/scripts/script.min.js"></script>
    <script src="<?=base_url();?>assets/scripts/process.js"></script>
    <script src="<?=base_url();?>assets/scripts/layout-settings.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

    <!-- Activate DataTables -->
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                responsive: true
            });
        });

        $(document).ready(function () {
            // Show daily logbook table by default
            $('#dailyLogbookTable').show();
            // Hide monthly logbook table
            $('#monthlyLogbookTable').css('visibility', 'hidden');

            // Show daily logbook table when daily logbook button clicked
            $('#showDailyLogbook').click(function () {
                $('#dailyLogbookTable').show();
                $('#monthlyLogbookTable').css('visibility', 'hidden');
                // Load daily logbook data with status 1
                $.ajax({
                    url: '<?= base_url() ?>Logbook/get_logbook_by_status1',
                    type: 'GET',
                    data: {
                        status: 1
                    },
                    success: function (response) {
                        // Update daily logbook table with retrieved data
                        $('#dailyLogbookTable').html(response);
                    }
                });
            });

            // Show monthly logbook table when monthly logbook button clicked
            $('#showMonthlyLogbook').click(function () {
                $('#dailyLogbookTable').hide();
                $('#monthlyLogbookTable').css('visibility', 'visible');
                // Load monthly logbook data with status 2
                $.ajax({
                    url: '<?= base_url() ?>Logbook/get_logbook_by_status2',
                    type: 'GET',
                    data: {
                        status: 2
                    },
                    success: function (response) {
                        // Update monthly logbook table with retrieved data
                        $('#monthlyLogbookTable').html(response);
                    }
                });
            });

            // Handle form submission for submitting nilai
            $('#nilaiForm').submit(function (event) {
                event.preventDefault(); // Prevent the form from submitting normally

                // Get form data
                var formData = $(this).serialize();

                // Submit form data using AJAX
                $.ajax({
                    url: $(this).attr('action'), // Get form action URL
                    type: $(this).attr('method'), // Get form submit method (GET, POST)
                    data: formData, // Serialize form data
                    success: function (response) {
                        // Show success message
                        $('#successMessage').html('<div class="alert alert-success" role="alert">Nilai berhasil disubmit!</div>');
                        // Hide any error message
                        $('#errorMessage').html('');
                        // Load monthly logbook table after submitting nilai
                        $('#showMonthlyLogbook').click(); // Trigger click event to reload monthly logbook table
                    },
                    error: function (xhr, status, error) {
                        // Show error message if submission fails
                        $('#errorMessage').html('<div class="alert alert-danger" role="alert">Terjadi kesalahan saat mengirim nilai: ' + xhr.responseText + '</div>');
                        // Hide any success message
                        $('#successMessage').html('');
                    }
                });

                return false; // Prevent default form submission
            });
        });
    </script>
</body>
</html>
