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
                                <h4>Data Logbook Harian PPNPN</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url();?>Dashboard/dashboard_sekretariat">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Logbook Harian PPNPN
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="<?= base_url();?>Logbook/view_sekretariat/<?= $this->session->userdata('id_user'); ?>" class="btn btn-primary mr-2">Logbook Harian</a>
                            <a href="<?= base_url();?>Logbookbulanan/view_sekretariat/<?= $this->session->userdata('id_user'); ?>" class="btn btn-primary">Logbook Bulanan</a>
                        </div>
                        
                    </div>
                </div>

                <!-- Sample Table -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Logbook Harian PPNPN</h4>
                        <!-- <div class="col-md-6 col-sm-12 text-right"> -->
                            <a href="<?php echo base_url('Form_logbook/view_sekretariat'); ?>" class="btn btn-primary">
                                Tambah Logbook
                            </a>
                        <!-- </div> -->
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
                                    <!-- <th>Status</th> -->
                                    <!-- <th>Nilai</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($logbook as $i):
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
                                    <!-- <td>
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
                                            <a href="" class="btn btn-danger btn-sm">Belum dinilai</a>
                                        <?php else: ?>
                                            <?= $nilai ?>
                                        <?php endif; ?>
                                    </td> -->
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?= $id_log ?>">
                                                    <i class="icon-copy bi bi-eye"></i>
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $id_log ?>">
                                                    <i class="icon-copy bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>  
                                </tr>
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
                                <!-- Modal Hapus Data logbook -->
                                <div class="modal fade" id="hapus<?= $id_log ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data logbook</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url()?>Logbook/hapus_logbook" method="post" enctype="multipart/form-data">
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
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                        <!-- Modal Form Logbook Harian sekretariat -->
                        <div class="modal fade" id="formLogbookharianModal" tabindex="-1" role="dialog" aria-labelledby="formLogbookharianModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formLogbookharianModalLabel">Form Logbook Harian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url();?>Logbook/proses_logbook_harian_sekretariat" method="POST" enctype="multipart/form-data">
                                <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                                <div class="form-group">
                                    <label for="nama_laporan">Nama Laporan</label>
                                    <input type="text" class="form-control" id="nama_laporan" aria-describedby="nama_laporan" name="nama_laporan" required>
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi</label>
                                    <textarea class="form-control" id="isi" name="isi" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control-file" id="file" name="file" required>                              
                                </div>
                                <div class="text">
                                    <span style="font-weight: normal; color: red; font-style: italic;">note: Semua field harus terisi agar data bisa tersimpan</span>
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
            </script>
        </div>
    </div>
</body>
</html>
