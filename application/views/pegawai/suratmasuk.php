<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("pegawai/components/header.php") ?>

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
    <?php $this->load->view("pegawai/components/navbar.php") ?>
    <?php $this->load->view("pegawai/components/sidebar.php") ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Data Surat Masuk dan Disposisi</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url();?>Dashboard/dashboard_pegawai">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Surat Masuk dan Disposisi
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <!-- <div class="col-md-6 col-sm-12 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" id="ajukanSuratmasukButton">
                                Tambah Surat Masuk
                            </button>
                        </div> -->
                    </div>
                </div>
                <!-- Sample Table -->
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Data Surat Masuk dan Disposisi</h4>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sifat</th>
                                    <th>Indeks</th>
                                    <th>Perihal</th>
                                    <th>No. Surat</th>
                                    <th>Asal Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Diterima</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Diteruskan</th>
                                    <th>Isi Disposisi</th>
                                    <th>Catatan</th>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach($suratmasuk as $i):
                                    $no++;
                                    $id_suratmasuk = $i['id_suratmasuk'];
                                    $id_user = $i['id_user'];
                                    $sifat = $i['sifat'];
                                    $indeks = $i['indeks'];
                                    $perihal = $i['perihal'];
                                    $no_surat = $i['no_surat'];
                                    $asal_surat = $i['asal_surat'];
                                    $tgl_surat = $i['tgl_surat'];
                                    $tgl_diterima = $i['tgl_diterima'];
                                    $file = $i['file'];
                                    $id_status_surat = $i['id_status_surat'];
                                    $diteruskan = $i['diteruskan'];
                                    $isi_disposisi = $i['isi_disposisi'];
                                    $catatan = $i['catatan'];
                                ?>
                                <tr>
                                    <td class="table-plus"><?= $no ?></td>
                                    <td><?= $sifat ?></td>
                                    <td><?= $indeks ?></td>
                                    <td><?= $perihal ?></td>
                                    <td><?= $no_surat ?></td>
                                    <td><?= $asal_surat ?></td>
                                    <td><?= $tgl_surat ?></td>
                                    <td><?= $tgl_diterima ?></td>
                                    <td>
                                        <?php if ($file): ?>
                                            <button type="button" class="btn btn-link" onclick="confirmDownload('<?php echo base_url('uploads/suratmasuk/' . $file) ?>')">
                                                <center><i class="fas fa-file fa-2x"></i></center>
                                            </button>
                                        <?php else: ?>
                                            File tidak tersedia
                                        <?php endif; ?>
                                    </td>

                                    <script>
                                        function confirmDownload(fileUrl) {
                                            if (confirm('Apakah Anda ingin membuka file ini?')) {
                                                window.location.href = fileUrl;
                                            }
                                        }
                                    </script>
                                    <td class="table-plus">
                                        <?php if($id_status_surat == 1) { ?>
                                            <a href="#" class="btn btn-info btn-sm" data-target="#edit_data_pegawai">Menunggu Konfirmasi</a>
                                        <?php } elseif($id_status_surat == 2) { ?>
                                            <a href="#" class="btn btn-success btn-sm" data-target="#edit_data_pegawai">Surat Didisposisikan</a>
                                        <?php } ?>
                                    </td>
                                    <td><?php if(empty($diteruskan)) { ?>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Belum Ada
                                        </a>
                                    <?php } else { ?>
                                        <?= $diteruskan ?>
                                    <?php } ?>
                                    </td>
                                    <td><?php if(empty($isi_disposisi)) { ?>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Belum Ada
                                        </a>
                                    <?php } else { ?>
                                        <?= $isi_disposisi ?>
                                    <?php } ?>
                                    </td>
                                    <td><?php if(empty($catatan)) { ?>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Belum Ada
                                        </a>
                                    <?php } else { ?>
                                        <?= $catatan ?>
                                    <?php } ?>
                                    </td>
                                    <!-- <td class="table-plus">
                                        <a href="#" data-toggle="modal" data-target="#hapus<?= $id_suratmasuk ?>" class="btn btn-danger"><i class="icon-copy bi bi-trash"></i></a>
                                    </td> -->
                                </tr>
                                <!-- Modal Hapus suratmasuk -->
                                <div class="modal fade" id="hapus<?= $id_suratmasuk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Surat Masuk</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url()?>Suratmasuk/hapus_suratmasuk_pegawai" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" name="id_suratmasuk" value="<?php echo $id_suratmasuk?>" />
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
    </div>

    <!-- Modal Form Pengajuan Izin -->
    <div class="modal fade" id="formPengajuanSuratmasukModal" tabindex="-1" role="dialog" aria-labelledby="formPengajuanSuratmasukModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formPengajuanSuratmasukModalLabel">Form Surat Masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formSuratMasuk" action="<?= base_url();?>Suratmasuk/proses_suratmasuk" method="POST" enctype="multipart/form-data">
                                <input type="text" value="<?=$this->session->userdata('id_user') ?>" name="id_user" hidden>
                                <div class="form-group">
                                    <label>Sifat</label><br>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="Sangat Rahasia" id="sifat1" name="sifat[]">
                                        <label class="form-check-label" for="sifat1">
                                            Sangat Rahasia
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="Rahasia" id="sifat2" name="sifat[]">
                                        <label class="form-check-label" for="sifat2">
                                            Rahasia
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="Biasa" id="sifat3" name="sifat[]">
                                        <label class="form-check-label" for="sifat3">
                                            Biasa
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="indeks">Indeks</label>
                                    <input type="text" class="form-control" id="indeks" aria-describedby="indeks" name="indeks" required>
                                </div>
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" class="form-control" id="perihal" aria-describedby="perihal" name="perihal" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" class="form-control" id="no_surat" aria-describedby="no_surat" name="no_surat" required>
                                </div>
                                <div class="form-group">
                                    <label for="asal_surat">Asal Surat</label>
                                    <input type="text" class="form-control" id="asal_surat" aria-describedby="asal_surat" name="asal_surat" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="date" class="form-control" id="tgl_surat" aria-describedby="tgl_surat" name="tgl_surat" required>
                                    </div>
                                    <div class="col">
                                        <label for="tgl_diterima">Tanggal Diterima</label>
                                        <input type="date" class="form-control" id="tgl_diterima" aria-describedby="tgl_diterima" name="tgl_diterima" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control-file" id="file" aria-describedby="file" name="file" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Form Pengajuan Cuti -->

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
            $('#ajukanSuratmasukButton').click(function () {
                $('#formPengajuanSuratmasukModal').modal('show');
            });
        });
    </script>
</body>
</html>
