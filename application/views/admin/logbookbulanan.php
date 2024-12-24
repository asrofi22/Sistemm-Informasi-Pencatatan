<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/components/header.php") ?>
    <link rel="stylesheet" href="<?= base_url();?>assets/css/daterangepicker.css">
</head>
<body>
    <?php $this->load->view("admin/components/navbar.php") ?>
    <?php $this->load->view("admin/components/sidebar.php") ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Logbook Bulanan PPNPN</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url();?>Dashboard/dashboard_admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Logbook Bulanan PPNPN
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="<?= base_url();?>Logbook/view_admin/<?= $this->session->userdata('id_user'); ?>" class="btn btn-primary mr-2">Logbook Harian</a>
                            <a href="<?= base_url();?>Logbookbulanan/view_admin/<?= $this->session->userdata('id_user'); ?>" class="btn btn-primary">Logbook Bulanan</a>
                            <!-- <button type="button" class="btn btn-secondary" id="printReportBtn">Cetak Laporan</button> -->
                        </div>
                    </div>
                </div>

                <!-- Form Rentang Tanggal -->
                <div class="form-inline mb-3"> <!-- Menambahkan class 'form-inline' di sini -->
                    <div class="form-group mr-2"> <!-- Menambahkan class 'mr-2' di sini untuk memberikan ruang antara kolom tanggal -->
                        <label for="start_date" class="mr-2">Mulai Tanggal:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="form-group mr-2"> <!-- Menambahkan class 'mr-2' di sini untuk memberikan ruang antara kolom tanggal -->
                        <label for="end_date" class="mr-2">Akhir Tanggal:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <button type="button" class="btn btn-secondary" id="printReport">Cetak Laporan</button> <!-- Tombol cetak laporan -->
                </div>


                <!-- Sample Table -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Logbook Bulanan PPNPN</h4>
                        <!-- <button type="button" class="btn btn-sm btn-primary" id="ajukanLogbookbulananButton" data-toggle="modal" data-target="#formLogbookbulananModal">
                            Tambah Logbook
                        </button> -->
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($logbookbulanan as $i):
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
                                            <div class="table-responsive">
                                                <div class="table table-striped table-hover ">
                                                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_data_pegawai">Diterima</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($nilai == NULL): ?>
                                            <a href="" class="btn btn-danger btn-sm">Belum dinilai</a>
                                        <?php else: ?>
                                            <?= $nilai ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $id_log ?>">
                                                    <i class="icon-copy bi bi-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $id_log ?>">
                                                    <i class="icon-copy bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>  
                                </tr>

                                <!-- Modal Hapus Logbook -->
                                <div class="modal fade" id="hapus<?= $id_log ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Logbook Bulanan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url()?>Logbookbulanan/hapus_logbookbulanan_admin" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="id_log" value="<?php echo $id_log?>" />
                                                            <input type="hidden" name="id_user" value="<?php echo $id_user?>" />
                                                            <p>Apakah kamu yakin ingin menghapus data ini?</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Detail logbook -->
                                <div class="modal fade" id="detail<?= $id_log ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
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

            <!-- Load JavaScript Libraries -->
            <script src="<?=base_url();?>assets/scripts/core.js"></script>
            <script src="<?=base_url();?>assets/scripts/script.min.js"></script>
            <script src="<?=base_url();?>assets/scripts/process.js"></script>
            <script src="<?=base_url();?>assets/scripts/layout-settings.js"></script>
            <script src="<?=base_url();?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
            <script src="<?=base_url();?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?=base_url();?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
            <script src="<?=base_url();?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
            <script src="<?=base_url();?>assets/js/moment.min.js"></script>
            <script src="<?=base_url();?>assets/js/daterangepicker.js"></script>

            <script>
            $(document).ready(function() {
                $('.data-table').DataTable({
                    responsive: true
                });
            });
            </script>
            <script>
            $(document).ready(function() {
                $('#date_range').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });
                
                $('.data-table').DataTable({
                    responsive: true
                });
            });

            $(document).ready(function() {
                // Function to filter data based on date range
                $('#filterData').click(function() {
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();

                    // Ajax request to fetch filtered data
                    $.ajax({
                        url: '<?= base_url() ?>Logbookbulanan/filter_logbook_by_date_range',
                        type: 'GET',
                        data: {
                            start_date: start_date,
                            end_date: end_date
                        },
                        success: function(response) {
                            // Update the logbook table with filtered data
                            $('#monthlyLogbookTable').html(response);
                        }
                    });
                });

                // Function to print report based on date range
                $('#printReport').click(function() {
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();

                    // Open a new window for printing
                    window.open('<?= base_url() ?>Logbookbulanan/print_logbook_report?start_date=' + start_date + '&end_date=' + end_date);
                });
            });

            </script>
        </div>
    </div>
</body>
</html>
