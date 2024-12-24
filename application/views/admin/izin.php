<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("admin/components/header.php") ?>

    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/styles/core.css"/>
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
    </style> -->
    <style>
        .align-bottom {
            align-self: flex-end;
        }
        @media (max-width: 767.98px) { 
            .form-row {
                display: flex;
                flex-wrap: wrap;
            }
            .form-row .form-group {
                flex: 1 1 50%;
            }
        }
    </style>
</head>
<body>
    <!-- Your Navbar and Sidebar Components -->
    <?php $this->load->view("admin/components/navbar.php") ?>
    <?php $this->load->view("admin/components/sidebar.php") ?>

    <div id="dataIzin" class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Izin Keluar Kantor</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url();?>Dashboard/dashboard_admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Izin Keluar Kantor
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="<?php echo base_url('Form_izin/view_admin'); ?>" class="btn btn-primary">
                                Ajukan Izin
                            </a>
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
                        <h4 class="text-blue h4">Data Izin Keluar Kantor</h4>
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai:</label>
                                        <input type="date" class="form-control" id="start_date">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="end_date">Tanggal Selesai:</label>
                                        <input type="date" class="form-control" id="end_date">
                                    </div>
                                </div>
                                <div class="col-md-1 align-bottom">
                                    <button id="printReport" class="btn btn-success">Cetak Laporan</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">No</th>
                                    <th>Tanggal Diajukan</th>
                                    <th>Status Izin</th>
                                    <th>Nama Lengkap</th>
                                    <th>Mulai</th>
                                    <th>Berakhir</th>
                                    <th>Alasan</th>
                                    <th>Cetak Surat</th>
                                    <th class="datatable-nosort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($izin as $i):
                                    $no++;
                                    $id_izin = $i['id_izin'];
                                    $id_user = $i['id_user'];
                                    $tgl_diajukan = $i['tgl_diajukan'];
                                    $id_status_izin = $i['id_status_izin'];
                                    $nama_lengkap = $i['nama_lengkap'];
                                    $mulai = $i['mulai'];
                                    $berakhir = $i['berakhir'];
                                    $alasan = $i['alasan'];
                                ?>
                                <tr>
                                    <td class="table-plus"><?= $no ?></td>
                                    <td><?= $tgl_diajukan ?></td>
                                    <td class="table-plus">
                                        <?php if($id_status_izin == 1) { ?>
                                            <a href="#" class="btn btn-warning btn-sm"  data-target="#edit_data_pegawai">Menunggu Konfirmasi</a>
                                        <?php } elseif($id_status_izin == 2) { ?>
                                            <a href="#"  class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Izin Diterima</a>
                                        <?php } elseif($id_status_izin == 3) { ?>
                                            <a href="#" class="btn btn-danger btn-sm" data-target="#edit_data_pegawai">Izin Ditolak</a>
                                        <?php } ?>
                                    </td>
                                    <td><?= $nama_lengkap ?></td>
                                    <td><?= $mulai ?></td>
                                    <td><?= $berakhir ?></td>
                                    <td><?= $alasan ?></td>
                                    <td class="table-plus">
                                        <?php if($id_status_izin == 2) { ?>
                                            <a href="<?= base_url();?>Cetak/surat_izin_pdf/<?=$id_izin?>" class="btn btn-info" target="_blank">Cetak Surat</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-danger btn-sm">Belum Bisa</a>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <a href="#" data-toggle="modal" data-target="#hapus<?= $id_izin ?>" class="btn btn-danger"><i class="icon-copy bi bi-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Edit Izin -->
                                <div class="modal fade" id="edit<?= $id_izin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Izin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?=base_url();?>Izin/edit_izin_admin" method="POST">
                                                    <input type="text" value="<?=$id_izin?>" name="id_izin" hidden>
                                                    <div class="form-group">
                                                        <label for="alasan">Alasan</label>
                                                        <textarea class="form-control" id="alasan" rows="3" name="alasan" required><?=$alasan?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_diajukan">Tanggal Diajukan</label>
                                                        <input type="date" class="form-control" id="tgl_diajukan" aria-describedby="tgl_diajukan" name="tgl_diajukan" value="<?=$tgl_diajukan?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="mulai">Mulai Izin</label>
                                                        <input type="date" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" value="<?=$mulai?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="berakhir">Berakhir Izin</label>
                                                        <input type="date" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" value="<?=$berakhir?>" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus Izin -->
                                <div class="modal fade" id="hapus<?= $id_izin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Izin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url()?>Izin/hapus_izin_admin" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="id_izin" value="<?php echo $id_izin?>" />
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

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Form Pengajuan Izin -->
        <div class="modal fade" id="formPengajuanIzinModal" tabindex="-1" role="dialog" aria-labelledby="formPengajuanIzinModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formPengajuanIzinModalLabel">Form Pengajuan Izin Keluar Kantor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url();?>Izin/proses_izin" method="POST" enctype="multipart/form-data">
                                <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                                <div class="form-group">
                                    <label for="alasan">Alasan</label>
                                    <textarea class="form-control" id="alasan" rows="3" name="alasan" required></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="perihal_izin">Perihal Izin</label>
                                    <input type="text" class="form-control" id="perihal_izin" aria-describedby="perihal_izin" name="perihal_izin" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="mulai">Mulai Izin</label>
                                    <input type="time" class="form-control" id="mulai" aria-describedby="mulai" name="mulai" required>
                                </div>
                                <div class="form-group">
                                    <label for="berakhir">Berakhir Izin</label>
                                    <input type="time" class="form-control" id="berakhir" aria-describedby="berakhir" name="berakhir" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
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

        <!-- Activate DataTables -->
        <script>
            $(document).ready(function() {
                $('.data-table').DataTable({
                    responsive: true
                });
            });

            $(document).ready(function () {
                    $('#ajukanIzinButton').click(function () {
                        $('#formPengajuanIzinModal').modal('show');
                    });

                    $('#formPengajuanIzinModal form').submit(function (event) {
                        event.preventDefault(); // Mencegah pengiriman formulir secara default
                        
                        // Mengirim data formulir menggunakan AJAX
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            success: function (response) {
                                // Jika pengiriman formulir berhasil, arahkan ke WhatsApp
                                var message = encodeURIComponent("Saya telah mengajukan izin keluar kantor di sistem FrenSIP, mohon untuk ditindak lanjuti");
                                var phoneNumber = "+6287817889296"; // Nomor telepon dengan kode negara Indonesia
                                var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + message;
                                window.location.href = whatsappUrl;
                            },
                            error: function () {
                                alert('Gagal mengajukan izin. Silakan coba lagi.');
                            }
                        });
                    });
                });
                
            $(document).ready(function() {
                // Function to filter data based on date range
                $('#filterData').click(function() {
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();

                    // Ajax request to fetch filtered data
                    $.ajax({
                        url: '<?= base_url() ?>Izin/filter_izin_by_date_range',
                        type: 'GET',
                        data: {
                            start_date: start_date,
                            end_date: end_date
                        },
                        success: function(response) {
                            // Update the logbook table with filtered data
                            $('#dataIzin').html(response);
                        }
                    });
                });

                // Function to print report based on date range
                $('#printReport').click(function() {
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();

                    // Open a new window for printing
                    window.open('<?= base_url() ?>Izin/print_izin_report?start_date=' + start_date + '&end_date=' + end_date);
                });
            });
        </script>
    </div>
</body>
</html>
