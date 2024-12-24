<?php
// Array asosiatif untuk mencocokkan nilai jabatan dengan label yang sesuai
$jabatan_labels = array(
    '1' => 'Pegawai ASN',
    '2' => 'Kepegawaian',
    '3' => 'Kepala Balai',
    '4' => 'Pj. Rumah Tangga',
    '5' => 'Kasubbag Tata Usaha',
    '6' => 'Sekretariat',
    '7' => 'PPNPN',
    '8' => 'Subkoordinator KSPP',
    '9' => 'Pj. Keuangan',
    '10' => 'Pj. Kerjasama',
    '11' => 'Pj. Pelayanan Pengkajian',
    '12' => 'Subkoordinator Program dan Evaluasi',
    '13' => 'Ketua Kelompok Fungsional APSP/PBT/PMHP',
    '14' => 'Ketua Kelompok Penyuluh',
    '15' => 'Ketua Kelompok Fungsional Lainnya',
    '16' => 'Kepala IP2SIP',
    '17' => 'PPK',
    '18' => 'Ketua Dharma Wanita'

);

$jenis_kelamin_labels = array(
    '1' => 'Laki-Laki',
    '2' => 'Perempuan'

);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("super_admin/components/header.php") ?>

    
</head>
<body>
    <?php $this->load->view("super_admin/components/navbar.php") ?>
    <?php $this->load->view("super_admin/components/sidebar.php") ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Data Pegawai</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="<?= base_url();?>Dashboard/dashboard_super_admin">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Data Pegawai
										</li>
									</ol>
								</nav>
							</div>
                            <div class="col-md-6 col-sm-12 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Pegawai
                            </button>
                        </div>
                            </div>
                            
                            </div>
                <!-- Sample Table -->
                        <div class="card-box mb-30">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Data Pegawai</h4>
                                </div>
                <div class="pb-20">
                <table class="data-table table stripe hover nowrap">
                    <thead>
                        <tr>
                            <th class="table-plus datatable-nosort">No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telp</th>
                            <th class="datatable-nosort">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                
                                $no = 0;
                                foreach($pegawai as $i)
                                :
                                $no++;
                                $id_user = $i['id_user'];
                                $username = $i['username'];
                                $password = $i['password'];
                                $email = $i['email'];
                                $nama_lengkap = $i['nama_lengkap'];
                                $id_user_level = $i['id_user_level'];
                                // $jenis_kelamin = $i['jenis_kelamin'];
                                $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                $no_telp = $i['no_telp'];
                                // $ttd = $i['ttd'];
                                // $divisi = $i['divisi'];

                                ?>
                                <tr>
                                    <td class="table-plus"><?= $no ?></td>
                                    <td><?= $username ?></td>
                                    <td><?= $nama_lengkap ?></td>
                                    <td><?= isset($jabatan_labels[$id_user_level]) ? $jabatan_labels[$id_user_level] : 'Unknown' ?></td>
                                    <td><?= isset($jenis_kelamin_labels[$id_jenis_kelamin]) ? $jenis_kelamin_labels[$id_jenis_kelamin] : 'Unknown' ?></td>
                                    <td><?= $no_telp ?></td>
                                    
                                    <td class="table-plus">
                                        <!-- <div class="table-responsive"> -->
                                            <!-- <div class="table table-striped table-hover"> -->
                                            <a href="#" data-toggle="modal" data-target="#edit_data_pegawai<?= $id_user ?>" class="btn btn-info"><i class="icon-copy bi bi-pencil"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#hapus<?= $id_user ?>" class="btn btn-danger"><i class="icon-copy bi bi-trash"></i></a>
                                            <!-- </div> -->
                                        </div>
                                    </td>
                                </tr>
                                        <!-- Modal Hapus Data Pegawai -->
                                        <div class="modal fade" id="hapus<?= $id_user ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                Pegawai
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Pegawai/hapus_pegawai"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
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

                                            <!-- Modal Edit Pegawai -->
                                            <div class="modal fade" id="edit_data_pegawai<?=$id_user?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Pegawai</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Pegawai/edit_pegawai"
                                                                method="post" enctype="multipart/form-data">
                                                                <input type="text" value="<?= $id_user ?>" name="id_user" hidden>
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" class="form-control"
                                                                        id="username" aria-describedby="username"
                                                                        name="username" value="<?= $username ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="text" class="form-control"
                                                                        id="password" aria-describedby="password"
                                                                        name="password" value="<?= $password ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control" id="email"
                                                                        aria-describedby="email" name="email" value="<?= $email ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_lengkap"
                                                                        aria-describedby="nama_lengkap"
                                                                        name="nama_lengkap" value="<?= $nama_lengkap ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="id_user_level">Jabatan</label>
                                                                    <select class="form-control" id="id_user_level" name="id_user_level" required>
                                                                        <option value="1" <?php if($id_user_level == 1) echo 'selected'; ?>>Pegawai ASN</option>
                                                                        <option value="2" <?php if($id_user_level == 2) echo 'selected'; ?>>Pj. Kepegawaian</option>
                                                                        <option value="3" <?php if($id_user_level == 3) echo 'selected'; ?>>Kepala Balai</option>
                                                                        <option value="4" <?php if($id_user_level == 4) echo 'selected'; ?>>Pj. Rumah Tangga</option>
                                                                        <option value="5" <?php if($id_user_level == 5) echo 'selected'; ?>>Kasubbag Tata Usaha</option>
                                                                        <option value="6" <?php if($id_user_level == 6) echo 'selected'; ?>>Sekretariat</option>
                                                                        <option value="7" <?php if($id_user_level == 7) echo 'selected'; ?>>PPNPN</option>
                                                                        <option value="8" <?php if($id_user_level == 8) echo 'selected'; ?>>Subkoordinator KSPP</option>
                                                                        <option value="9" <?php if($id_user_level == 9) echo 'selected'; ?>>Pj. Keuangan</option>
                                                                        <option value="10" <?php if($id_user_level == 10) echo 'selected'; ?>>Pj. Kerjasama</option>
                                                                        <option value="11" <?php if($id_user_level == 11) echo 'selected'; ?>>Pj. Pelayanan Pengkajian</option>
                                                                        <option value="12" <?php if($id_user_level == 12) echo 'selected'; ?>>Subkoordinator Program dan Evaluasi</option>
                                                                        <option value="13" <?php if($id_user_level == 13) echo 'selected'; ?>>Ketua Kelompok Fungsional APSP/PBT/PMHP</option>
                                                                        <option value="14" <?php if($id_user_level == 14) echo 'selected'; ?>>Ketua Kelompok Penyuluh</option>
                                                                        <option value="15" <?php if($id_user_level == 15) echo 'selected'; ?>>Ketua Kelompok Fungsional Lainnya</option>
                                                                        <option value="16" <?php if($id_user_level == 16) echo 'selected'; ?>>Kepala IP2SIP</option>
                                                                        <option value="17" <?php if($id_user_level == 17) echo 'selected'; ?>>PPK</option>
                                                                        <option value="18" <?php if($id_user_level == 18) echo 'selected'; ?>>Ketua Dharma Wanita</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                                    <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                                                        <option selected>Pilih Jenis Kelamin</option>
                                                                        <?php foreach ($jenis_kelamin_labels as $key => $value) { ?>
                                                                        <option value="<?= $key ?>" <?= $id_jenis_kelamin == $key ? 'selected' : '' ?>><?= $value ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="no_telp">No Telp</label>
                                                                    <input type="text" class="form-control" id="no_telp"
                                                                        aria-describedby="no_telp" name="no_telp" value="<?= $no_telp ?>" required>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                    <label for="ttd">TTD (PNG Only)</label>
                                                                    <input type="file" class="form-control" id="ttd" 
                                                                        aria-describedby="ttd" name="ttd" value="<?= $ttd ?>">
                                                                </div> -->

                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Tambah Pegawai -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url()?>Pegawai/tambah_pegawai"
                                method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username"
                                        name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" aria-describedby="password"
                                        name="password" required>
                                </div>
                                <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" aria-describedby="email"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap"
                                    aria-describedby="nama_lengkap" name="nama_lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="id_user_level">Jabatan</label>
                                <select class="form-control" id="id_user_level" name="id_user_level" required>
                                    <option value="1">Pegawai ASN</option>
                                    <option value="2">Pj. Kepegawaian</option>
                                    <option value="3">Kepala Balai</option>
                                    <option value="4">Pj. Rumah Tangga</option>
                                    <option value="5">Kasubbag Tata Usaha</option>
                                    <option value="6">Sekretariat</option>
                                    <option value="7">PPNPN</option>
                                    <option value="8">Subkoordinator KSPP</option>
                                    <option value="9">Pj. Keuangan</option>
                                    <option value="10">Pj. Kerjasama</option>
                                    <option value="11">Pj. Pelayanan Pengkajian</option>
                                    <option value="12">Subkoordinator Program dan Evaluasi</option>
                                    <option value="13">Ketua Kelompok Fungsional APSP/PBT/PMHP</option>
                                    <option value="14">Ketua Kelompok Penyuluh</option>
                                    <option value="15">Ketua Kelompok Fungsional Lainnya</option>
                                    <option value="16">Kepala IP2SIP</option>
                                    <option value="17">PPK</option>
                                    <option value="18">Ketua Dharma Wanita</option>

                                </select>
                            </div>
                            <div class="form-group">
                            <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" class="form-control" id="no_telp" aria-describedby="no_telp"
                                    name="no_telp" required>
                            </div>
                            <!-- Tambahkan field untuk TTD -->
                            <!-- <div class="form-group">
                                <label for="ttd">TTD (PNG Only)</label>
                                <input type="file" class="form-control" id="ttd" name="ttd">
                            </div> -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            
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