<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("sekretariat/components/header.php") ?>
</head>
<body>
    <?php $this->load->view("sekretariat/components/navbar.php") ?>
    <?php $this->load->view("sekretariat/components/sidebar.php") ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Pengajuan Perbaikan BMN</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url();?>Dashboard/dashboard_sekretariat">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Pengajuan Perbaikan BMN
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <button type="button" class="btn btn-primary" id="ajukanPerbaikanbmnButton">
                                Ajukan Perbaikan BMN
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sample Table -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Pengajuan Perbaikan BMN</h4>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">No</th>
                                    
                                    <th>Tanggal Diajukan</th>
                                    <th>Nama Lengkap</th>
                                                <th>Nama Barang</th>
                                                <th>Spesifikasi Barang</th>
                                                <th>Lokasi Barang</th>
                                                <th>Kerusakan</th>
                                                
                                                <th>Status Pengajuan</th>
                                                <th>Alasan Verifikasi</th>
                                                <th>Status Perbaikan</th>
                                                <th>Note</th>
                                    <th class="datatable-nosort">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($perbaikanbmn as $i) :
                                    $no++;
                                    $id_perbaikanbmn = $i['id_perbaikanbmn'];
                                    $id_user = $i['id_user'];
                                    $tgl_diajukan = $i['tgl_diajukan'];
                                    $nama_lengkap = $i['nama_lengkap'];
                                    $nama_brg = $i['nama_brg'];
                                    $spesifikasi_brg = $i['spesifikasi_brg'];
                                    $lokasi_brg = $i['lokasi_brg'];
                                    $kerusakan = $i['kerusakan'];
                                    $id_status_perbaikanbmn = $i['id_status_perbaikanbmn'];
                                    $alasan_verifikasi = $i['alasan_verifikasi'];
                                    $id_status_perbaikan = $i['id_status_perbaikan'];
                                    $verifikasi_kaurrt = $i['verifikasi_kaurrt'];
                                ?>
                                <tr>
                                    <td class="table-plus"><?= $no ?></td>
                                    <td><?= $tgl_diajukan ?></td>
                                    <td><?= $nama_lengkap ?></td>
                                    <td><?= $nama_brg ?></td>
                                    <td><?= $spesifikasi_brg ?></td>
                                    <td><?= $lokasi_brg ?></td>
                                    <td><?= $kerusakan ?></td>
                                    <td class="table-plus">
                                        <?php if($id_status_perbaikanbmn == 1) { ?>
                                            <a href="#" class="btn btn-info btn-sm" data-target="#edit_data_pegawai">Menunggu Konfirmasi</a>
                                        <?php } elseif($id_status_perbaikanbmn == 2) { ?>
                                            <a href="#" class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Ajuan Diterima</a>
                                        <?php } elseif($id_status_perbaikanbmn == 3) { ?>
                                            <a href="#" class="btn btn-danger btn-sm" data-target="#edit_data_pegawai">Ajuan Ditolak</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($alasan_verifikasi == NULL) { ?>
                                            <a href="#" class="btn btn-danger btn-sm">Belum Ada</a>
                                        <?php } else { ?>
                                            <?= $alasan_verifikasi ?>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <?php if($id_status_perbaikan == 1) { ?>
                                            <a href="#" class="btn btn-info btn-sm" data-target="#edit_data_pegawai">Belum Disetujui</a>
                                        <?php } elseif($id_status_perbaikan == 2) { ?>
                                            <a href="#" class="btn btn-warning btn-sm" data-target="#edit_data_pegawai">Belum Dikerjakan</a>
                                        <?php } elseif($id_status_perbaikan == 3) { ?>
                                            <a href="#" class="btn btn-info btn-sm" data-target="#edit_data_pegawai">Sedang Dikerjakan</a>
                                        <?php } elseif($id_status_perbaikan == 4) { ?>
                                            <a href="#" class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Sudah Dikerjakan</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($verifikasi_kaurrt == NULL) { ?>
                                            <a href="#" class="btn btn-danger btn-sm">Tidak Ada</a>
                                        <?php } else { ?>
                                            <?= $verifikasi_kaurrt ?>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <a href="#" data-toggle="modal" data-target="#hapus<?= $id_perbaikanbmn ?>" class="btn btn-danger">
                                            <i class="icon-copy bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Hapus Perbaikan bmn -->
                                <div class="modal fade" id="hapus<?= $id_perbaikanbmn ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Perbaikan BMN</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url()?>Perbaikanbmn/hapus_perbaikanbmn" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="id_perbaikanbmn" value="<?php echo $id_perbaikanbmn?>" />
                                                            <input type="hidden" name="id_user" value="<?php echo $id_user?>" />
                                                            <p>Apakah anda yakin ingin menghapus data ini?</p>
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

            <!-- Modal Form Pengajuan Perbaikan BMN -->
        <div class="modal fade" id="formPengajuanPerbaikanbmnModal" tabindex="-1" role="dialog" aria-labelledby="formPengajuanPerbaikanbmnModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formPengajuanPerbaikanbmnModalLabel">Form Pengajuan Perbaikan BMN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url();?>Perbaikanbmn/proses_perbaikanbmn_sekretariat" method="POST" enctype="multipart/form-data">
                                <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                                <div class="form-group">
                                    <label for="nama_brg">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_brg" aria-describedby="nama_brg" name="nama_brg" required>
                                </div>
                                <div class="form-group">
                                    <label for="spesifikasi_brg">Spesifikasi Barang</label>
                                    <input type="text" class="form-control" id="spesifikasi_brg" aria-describedby="spesifikasi_brg" name="spesifikasi_brg" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_brg">Lokasi Barang</label>
                                    <input type="text" class="form-control" id="lokasi_brg" aria-describedby="lokasi_brg" name="lokasi_brg" required>
                                </div>
                                <div class="form-group">
                                    <label for="kerusakan">Kerusakan</label>
                                    <textarea class="form-control" id="kerusakan" rows="3" name="kerusakan" required></textarea>
                                </div>
                                <div class="text-center"> 
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
                    $('#ajukanPerbaikanbmnButton').click(function () {
                        $('#formPengajuanPerbaikanbmnModal').modal('show');
                    });

                    $('#formPengajuanPerbaikanbmnModal form').submit(function (event) {
                        event.preventDefault(); // Mencegah pengiriman formulir secara default
                        
                        // Mengirim data formulir menggunakan AJAX
                        $.ajax({
                            type: 'POST',
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            success: function (response) {
                                // Jika pengiriman formulir berhasil, arahkan ke WhatsApp
                                var message = encodeURIComponent("Saya telah mengajukan perbaikan BMN di sistem FrenSIP, mohon untuk ditindak lanjuti");
                                var phoneNumber = "+6287817889296"; // Nomor telepon dengan kode negara Indonesia
                                var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + message;
                                window.location.href = whatsappUrl;
                            },
                            error: function () {
                                alert('Gagal mengajukan perbaikan bmn. Silakan coba lagi.');
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
</body>
</html>
