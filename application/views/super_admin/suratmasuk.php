<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("super_admin/components/header.php") ?>

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
    <?php $this->load->view("super_admin/components/navbar.php") ?>
    <?php $this->load->view("super_admin/components/sidebar.php") ?>

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
                                        <a href="<?= base_url();?>Dashboard/dashboard_super_admin">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Surat Masuk dan Disposisi
                                    </li>
                                </ol>
                            </nav>
                        </div>
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
                                    <th>Aksi</th>
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
                                    <td class="table-plus">
                                        <a href="#" data-toggle="modal" data-target="#setuju<?= $id_suratmasuk ?>" class="btn btn-primary">Disposisi</a>
                                    </td>
                                </tr>
                                <!-- Modal Setuju Surat Masuk -->
                                <div class="modal fade" id="setuju<?= $id_suratmasuk ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Disposisi
                                                                Surat Masuk
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                        <form action="<?php echo base_url()?>Suratmasuk/acc_suratmasuk_super_admin/2" method="post" enctype="multipart/form-data">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="id_suratmasuk" value="<?php echo $id_suratmasuk?>" />
                                                                <input type="hidden" name="id_user" value="<?php echo $id_user?>" />
                                                                <!-- <p>Disposisi?</i></b></p> -->
                                                                <div class="form-group">
                                                                    <label for="diteruskan">Diteruskan</label><br>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="kasubbag_tata_usaha" name="diteruskan[]" value="Kasubbag Tata Usaha">
                                                                        <label class="form-check-label" for="kasubbag_tata_usaha">Kasubbag Tata Usaha</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="pj_fungsional_pelaksana_kepegawaian" name="diteruskan[]" value="Pj Fungsional/Pelaksana Kepegawaian">
                                                                        <label class="form-check-label" for="pj_fungsional_pelaksana_kepegawaian">Pj Fungsional/Pelaksana Kepegawaian</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="pj_fungsional_pelaksana_rt" name="diteruskan[]" value="Pj Fungsional/Pelaksana RT">
                                                                        <label class="form-check-label" for="pj_fungsional_pelaksana_rt">Pj Fungsional/Pelaksana RT</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="pj_fungsional_pelaksana_keuangan" name="diteruskan[]" value="Pj Fungsional/Pelaksana Keuangan">
                                                                        <label class="form-check-label" for="pj_fungsional_pelaksana_keuangan">Pj Fungsional/Pelaksana Keuangan</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="pj_fungsional_pelaksana_kerjasama" name="diteruskan[]" value="Pj Fungsional/Pelaksana Kerjasama">
                                                                        <label class="form-check-label" for="pj_fungsional_pelaksana_kerjasama">Pj Fungsional/Pelaksana Kerjasama</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="pj_fungsional_pelaksana_pengkajian" name="diteruskan[]" value="Pj Fungsional/Pelaksana Pelayanan Pengkajian">
                                                                        <label class="form-check-label" for="pj_fungsional_pelaksana_pengkajian">Pj Fungsional/Pelaksana Pelayanan Pengkajian</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="subkoordinator_program_evaluasi" name="diteruskan[]" value="Subkoordinator Program dan Evaluasi">
                                                                        <label class="form-check-label" for="subkoordinator_program_evaluasi">Subkoordinator Program dan Evaluasi</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ketua_kelompok_fungsional_apsp_pbt_pmhp" name="diteruskan[]" value="Ketua Kelompok Fungsional APSP/PBT/PMHP">
                                                                        <label class="form-check-label" for="ketua_kelompok_fungsional_apsp_pbt_pmhp">Ketua Kelompok Fungsional APSP/PBT/PMHP</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ketua_kelompok_penyuluh" name="diteruskan[]" value="Ketua Kelompok Penyuluh">
                                                                        <label class="form-check-label" for="ketua_kelompok_penyuluh">Ketua Kelompok Penyuluh</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ketua_kelompok_fungsional_lainnya" name="diteruskan[]" value="Ketua Kelompok Fungsional Lainnya">
                                                                        <label class="form-check-label" for="ketua_kelompok_fungsional_lainnya">Ketua Kelompok Fungsional Lainnya</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="kepala_ip2sip" name="diteruskan[]" value="Kepala IP2SIP">
                                                                        <label class="form-check-label" for="kepala_ip2sip">Kepala IP2SIP</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ppk" name="diteruskan[]" value="PPK">
                                                                        <label class="form-check-label" for="ppk">PPK</label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="ketua_dharma_wanita" name="diteruskan[]" value="Ketua Dharma Wanita">
                                                                        <label class="form-check-label" for="ketua_dharma_wanita">Ketua Dharma Wanita</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="lainnya">Lainnya (sebutkan):</label>
                                                                    <textarea class="form-control" id="lainnya" name="lainnya" rows="2"></textarea>
                                                                            </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="isi_disposisi">Isi Disposisi</label>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Untuk Diketahui" id="untuk_diketahui" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="untuk_diketahui">
                                                                            Untuk Diketahui
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Untuk dipelajari" id="untuk_dipelajari" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="untuk_dipelajari">
                                                                            Untuk dipelajari
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Untuk Ditindaklanjuti" id="untuk_ditindaklanjuti" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="untuk_ditindaklanjuti">
                                                                            Untuk Ditindaklanjuti
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Untuk dibincangkan dengan saya" id="untuk_dibincangkan" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="untuk_dibincangkan">
                                                                            Untuk dibincangkan dengan saya
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Harap saran/pertimbangan" id="harap_saran" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="harap_saran">
                                                                            Harap saran/pertimbangan
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Harap mewakili saya" id="harap_mewakili" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="harap_mewakili">
                                                                            Harap mewakili saya
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Siapkan bahan" id="siapkan_bahan" name="isi_disposisi[]">
                                                                        <label class="form-check-label" for="siapkan_bahan">
                                                                            Siapkan bahan
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="catatan">Catatan</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="catatan" name="catatan" required>
                                                                    </div>
                                                                </div>
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
                                                <form action="<?php echo base_url()?>Suratmasuk/hapus_suratmasuk_super_admin" method="post" enctype="multipart/form-data">
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
