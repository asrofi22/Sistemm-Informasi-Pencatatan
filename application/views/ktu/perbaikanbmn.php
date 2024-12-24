<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("ktu/components/header.php") ?>

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
</head>
<body>
    <!-- Your Navbar and Sidebar Components -->
    <?php $this->load->view("ktu/components/navbar.php") ?>
    <?php $this->load->view("ktu/components/sidebar.php") ?>

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
											<a href="<?= base_url();?>Dashboard/dashboard_ktu">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Data Pengajuan Perbaikan BMN
										</li>
									</ol>
								</nav>
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
                            <th>Status Ajuan</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi Barang</th>
                            <th>Lokasi Barang</th>
                            <th>Kerusakan</th>
                            <!-- <th>Tanggal Diajukan</th> -->
                            
                            <th>Alasan Verifikasi</th>
                            <th>Status Perbaikan</th>
                            <th>Estimasi Pengerjaan</th>
                            <th>Note</th>
                            <th class="datatable-nosort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $no = 0;
                                foreach($perbaikanbmn as $i)
                                :
                                $no++;
                                $id_perbaikanbmn = $i['id_perbaikanbmn'];
                                $id_user = $i['id_user'];
                                $tgl_diajukan = $i['tgl_diajukan'];
                                $id_status_perbaikanbmn = $i['id_status_perbaikanbmn'];
                                $nama_lengkap = $i['nama_lengkap'];
                                $nama_brg = $i['nama_brg'];
                                $spesifikasi_brg = $i['spesifikasi_brg'];
                                $lokasi_brg = $i['lokasi_brg'];
                                $kerusakan = $i['kerusakan'];
                               
                                $alasan_verifikasi = $i['alasan_verifikasi'];
                                $id_status_perbaikan = $i['id_status_perbaikan'];
                                $estimasi = $i['estimasi'];
                                $verifikasi_kaurrt = $i['verifikasi_kaurrt'];

                                ?>
                                <tr>
                                    <td class="table-plus"><?= $no ?></td>
                                    <td><?= $tgl_diajukan ?></td>
                                    <td class="table-plus">
                                        <?php if($id_status_perbaikanbmn == 1) { ?>
                                            <a href="#" class="btn btn-warning btn-sm"  data-target="#edit_data_pegawai">Menunggu Konfirmasi</a>
                                        <?php } elseif($id_status_perbaikanbmn == 2) { ?>
                                            <a href="#"  class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Ajuan Diterima</a>
                                        <?php } elseif($id_status_perbaikanbmn == 3) { ?>
                                            <a href="#" class="btn btn-danger btn-sm" data-target="#edit_data_pegawai">Ajuan Ditolak</a>
                                        <?php } ?>
                                    </td>
                                    <td><?= $nama_lengkap ?></td>
                                    <td><?= $nama_brg ?></td>
                                    <td><?= $spesifikasi_brg ?></td>
                                    <td><?= $lokasi_brg ?></td>
                                    <td><?= $kerusakan ?></td>
                                    
                                    <td><?php if($alasan_verifikasi == NULL) { ?>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Belum Ada
                                        </a>
                                        <?php } else {?>
                                        <?=$alasan_verifikasi?>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <?php if($id_status_perbaikan == 1) { ?>
                                            <a href="#" class="btn btn-danger btn-sm"  data-target="#edit_data_pegawai">Belum Disetujui</a>
                                        <?php } elseif($id_status_perbaikan == 2) { ?>
                                            <a href="#"  class="btn btn-warning btn-sm" data-target="#edit_data_pegawai">Belum Dikerjakan</a>
                                        <?php } elseif($id_status_perbaikan == 3) { ?>
                                            <a href="#" class="btn btn-info btn-sm" data-target="#edit_data_pegawai">Sedang Dikerjakan</a>
                                        <?php } elseif($id_status_perbaikan == 4) { ?>
                                            <a href="#" class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Sudah Dikerjakan</a>
                                        <?php } ?>
                                    </td>
                                    <td><?php if($estimasi == NULL) { ?>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Tidak Ada
                                        </a>
                                        <?php } else {?>
                                        <?=$estimasi?>
                                        <?php } ?>
                                    </td>
                                    <td><?php if($verifikasi_kaurrt == NULL) { ?>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Tidak Ada
                                        </a>
                                        <?php } else {?>
                                        <?=$verifikasi_kaurrt?>
                                        <?php } ?>
                                    </td>
                                    <td class="table-plus">
                                        <a href="#" data-toggle="modal" data-target="#setuju<?= $id_perbaikanbmn ?>" class="btn btn-primary btn-sm"><i class="icon-copy bi bi-check"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#tidak_setuju<?= $id_perbaikanbmn ?>" class="btn btn-danger btn-sm"><i class="icon-copy bi bi-x"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal Setuju Perbaikan BMN -->
                                <div class="modal fade" id="setuju<?= $id_perbaikanbmn ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Setujui Ajuan Perbaikan BMN
                                                                
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form id="form-setuju<?= $id_perbaikanbmn ?>"
                                                                action="<?php echo base_url()?>Perbaikanbmn/acc_perbaikanbmn_ktu/2"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_perbaikanbmn"
                                                                            value="<?php echo $id_perbaikanbmn?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />
                                                                        <p>Apakah anda yakin akan menyetujui pengajuan perbaikan BMN
                                                                            ini?</i></b></p>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">Alasan Verifikasi</label>
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

                                            <!-- Modal Tidak Setuju Perbaikan BMN -->
                                            <div class="modal fade" id="tidak_setuju<?= $id_perbaikanbmn ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Ajuan Perbaikan BMN
                                                                
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form
                                                                action="<?php echo base_url()?>Perbaikanbmn/acc_perbaikanbmn_ktu/3"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_perbaikanbmn"
                                                                            value="<?php echo $id_perbaikanbmn?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />

                                                                        <p>Apakah Anda yakin akan menolak ajuan perbaikan BMN
                                                                            ini?</i></b></p>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleFormControlTextarea1">Alasan Verifikasi</label>
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
                                        <!-- Modal Edit Perbaikan BMN -->
                                            <div class="modal fade" id="edit<?= $id_perbaikanbmn ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                Ajuan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Perbaikanbmn/edit_perbaikanbmn_ktu"
                                                                method="POST">
                                                                <input type="text" value="<?=$id_perbaikanbmn?>" name="id_perbaikanbmn"
                                                                    hidden>
                                                                <div class="form-group">
                                                                    <label for="nama_brg">Nama Barang</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_brg"
                                                                        aria-describedby="nama_brg"
                                                                        name="nama_brg" value="<?=$nama_brg?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="spesifikasi_brg">Spesifikasi Barang</label>
                                                                    <input type="text" class="form-control"
                                                                        id="spesifikasi_brg"
                                                                        aria-describedby="spesifikasi_brg"
                                                                        name="spesifikasi_brg" value="<?=$spesifikasi_brg?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lokasi_brg">Lokasi Barang</label>
                                                                    <input type="text" class="form-control"
                                                                        id="lokasi_brg"
                                                                        aria-describedby="lokasi_brg"
                                                                        name="lokasi_brg" value="<?=$lokasi_brg?>"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kerusakan">Kerusakan</label>
                                                                    <textarea class="form-control" id="kerusakan" rows="3"
                                                                        name="kerusakan" required><?=$kerusakan?></textarea>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="tgl_diajukan">Tanggal Diajukan</label>
                                                                    <input type="date" class="form-control"
                                                                        id="tgl_diajukan"
                                                                        aria-describedby="tgl_diajukan"
                                                                        name="tgl_diajukan" value="<?=$tgl_diajukan?>"
                                                                        required>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Hapus Pengajuan Perbaikan BMN -->
                                            <div class="modal fade" id="hapus<?= $id_perbaikanbmn ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                Ajuan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Perbaikanbmn/hapus_perbaikanbmn_ktu"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="id_perbaikanbmn"
                                                                            value="<?php echo $id_perbaikanbmn?>" />
                                                                        <input type="hidden" name="id_user"
                                                                            value="<?php echo $id_user?>" />

                                                                        <p>Apakah kamu yakin ingin menghapus data
                                                                            ini?</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger ripple"
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category">Ya</button>
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

    <!-- Load JavaScript Libraries -->
    <script src="<?=base_url();?>assets/scripts/core.js"></script>
    <script src="<?=base_url();?>assets/scripts/script.min.js"></script>
    <script src="<?=base_url();?>assets/scripts/process.js"></script>
    <script src="<?=base_url();?>assets/scripts/layout-settings.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url();?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                responsive: true
            });

            $(document).ready(function() {
                // Ketika form modal setuju disubmit
                $('#form-setuju<?= $id_perbaikanbmn ?>').submit(function(e) {
                    e.preventDefault(); // Menghentikan pengiriman form bawaan

                    // Kirim pesan ke nomor tujuan
                    var pesan = "saya telah menyetujui data ajuan perbaikan BMN di sistem FrenSIP, mohon segera ditindak lanjuti";
                    var nomor = "087817889296"; // Ganti dengan nomor yang sesuai

                    // Redirect ke WhatsApp
                    window.location.href = "whatsapp://send?phone=" + nomor + "&text=" + encodeURIComponent(pesan);
                });
            });

        });
    </script>

</body>
</html>