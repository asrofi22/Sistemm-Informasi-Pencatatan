<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("super_admin/components/header.php") ?>
</head>
<body>
    <!-- Navbar and Sidebar Components -->
    <?php $this->load->view("super_admin/components/navbar.php") ?>
    <?php $this->load->view("super_admin/components/sidebar.php") ?>

    <div class="main-container">
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
                                        <a href="<?= base_url();?>Dashboard/dashboard_super_admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Izin Keluar Kantor
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <!-- Sample Table -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Izin Keluar Kantor</h4>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">No</th>
                                    <th>Tanggal Diajukan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alasan</th>
                                    <th>Mulai</th>
                                    <th>Berakhir</th>
                                    <th>Status Izin</th>
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
                                    $nama_lengkap = $i['nama_lengkap'];
                                    $alasan = $i['alasan'];
                                    $mulai = $i['mulai'];
                                    $berakhir = $i['berakhir'];
                                    $id_status_izin = $i['id_status_izin'];
                                ?>
                                <tr>
                                    <td class="table-plus"><?= $no ?></td>
                                    <td><?= $tgl_diajukan ?></td>
                                    <td><?= $nama_lengkap ?></td>
                                    <td><?= $alasan ?></td>
                                    <td><?= $mulai ?></td>
                                    <td><?= $berakhir ?></td>
                                    <td class="table-plus">
                                        <?php if($id_status_izin == 1) { ?>
                                            <a href="#" class="btn btn-info btn-sm"  data-target="#edit_data_pegawai">Menunggu Konfirmasi</a>
                                        <?php } elseif($id_status_izin == 2) { ?>
                                            <a href="#"  class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Izin Diterima</a>
                                        <?php } elseif($id_status_izin == 3) { ?>
                                            <a href="#" class="btn btn-danger btn-sm" data-target="#edit_data_pegawai">Izin Ditolak</a>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <?php if($id_status_izin == 2) { ?>
                                            <a href="<?= base_url();?>Cetak/surat_izin_pdf/<?=$id_izin?>" class="btn btn-info" target="_blank">Cetak Surat</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn btn-danger btn-sm">Belum Bisa</a>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <a href="#" data-toggle="modal" data-target="#setuju<?= $id_izin ?>" class="btn btn-primary btn-sm"><i class="icon-copy bi bi-check"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#tidak_setuju<?= $id_izin ?>" class="btn btn-danger btn-sm"><i class="icon-copy bi bi-x"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Setuju Izin -->
                                <div class="modal fade" id="setuju<?= $id_izin ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Setujui Data
                                                                Izin
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo base_url()?>Izin/acc_izin_super_admin/2"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_izin"
                                                                            value="<?php echo $id_izin?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />
                                                                        <p>Apakah anda yakin akan menyetujui izin
                                                                            ini?</i></b></p>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">Alasan</label>
                                                                            <textarea class="form-control"
                                                                                id="alasan_verifikasi"
                                                                                name="alasan_verifikasi"
                                                                                rows="3"></textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <!-- <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button> -->
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Tidak Setuju Izin -->
                                            <div class="modal fade" id="tidak_setuju<?= $id_izin ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Data
                                                                Izin
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo base_url()?>Izin/acc_izin_super_admin/3"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_izin"
                                                                            value="<?php echo $id_izin?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />

                                                                        <p>Apakah Anda yakin akan menolak izin
                                                                            ini?</i></b></p>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">Alasan</label>
                                                                            <textarea class="form-control"
                                                                                id="alasan_verifikasi"
                                                                                name="alasan_verifikasi"
                                                                                rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <!-- <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button> -->
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Submit</button>
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
</body>
</html>
