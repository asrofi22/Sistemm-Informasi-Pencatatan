<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view("ppnpn/components/header.php") ?>
    <!-- Tambahkan SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <!-- Flashdata for SweetAlert -->
    <?php if ($this->session->flashdata('password_err')) { ?>
    <script>
        swal({
            title: "Error Password!",
            text: "Ketik Ulang Password!",
            icon: "error"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('edit')) { ?>
    <script>
        swal({
            title: "Success!",
            text: "Data Berhasil Diedit!",
            icon: "success"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('eror_edit')) { ?>
    <script>
        swal({
            title: "Error!",
            text: "Data Gagal Diedit!",
            icon: "error"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('input')) { ?>
    <script>
        swal({
            title: "Success!",
            text: "Data Berhasil Dilengkapi!",
            icon: "success"
        });
    </script>
    <?php } ?>
    <?php if ($this->session->flashdata('eror')) { ?>
    <script>
        swal({
            title: "Error!",
            text: "Data Gagal Ditambahkan!",
            icon: "error"
        });
    </script>
    <?php } ?>

    <!-- Navbar -->
    <?php $this->load->view("ppnpn/components/navbar.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view("ppnpn/components/sidebar.php") ?>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>Profile</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <?php
                                            $id = 0;
                                            foreach($pegawai_data as $i)
                                            :
                                            $id++;
                                            $id_user = $i['id_user'];
                                            $username = $i['username'];
                                            $password = $i['password'];
                                            $nama_lengkap = $i['nama_lengkap'];
                                            $id_jenis_kelamin = $i['id_jenis_kelamin'];
                                            $email = $i['email'];
                                            $no_telp = $i['no_telp'];
                                            $nip = $i['nip'];
                                            $unit_kerja = $i['unit_kerja'];
                                            $jabatan = $i['jabatan'];
                                            $masa_kerja = $i['masa_kerja'];
                                            $jabatan = $i['jabatan'];
                                            $unit_kerja = $i['unit_kerja'];

                                            ?>

                
                <div class="row">
                    <div class="col-12 mb-30">
                        <div class="pd-20 card-box height-100-p">
                            <div class="profile-photo">
                                <a href="#" data-toggle="modal" data-target="#editPhotoModal" class="edit-avatar">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <img src="<?= base_url();?>assets/images/photo1.jpg" alt="" class="avatar-photo"/>
                            </div>
                            <h5 class="text-center h5 mb-0"><?= $i['nama_lengkap'] ?></h5>
                            <p class="text-center text-muted font-14"><?= $i['jabatan'] ?></p>

                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Profil <a href="#" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></a></h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        <?= $i['email'] ?>
                                    </li>
                                    <li>
                                        <span>Phone Number:</span>
                                        <?= $i['no_telp'] ?>
                                    </li>
                                    <li>
                                        <span>NIP:</span>
                                        <?= $i['nip'] ?>
                                    </li>
                                    <li>
                                        <span>Unit Kerja:</span>
                                        <?= $i['unit_kerja'] ?>
                                    </li>
                                    <li>
                                        <span>Jabatan:</span>
                                        <?= $i['jabatan'] ?>
                                    </li>
                                    <li>
                                        <span>Masa Kerja:</span>
                                        <?= $i['masa_kerja'] ?> 
                                    </li>
                                </ul>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url();?>Profile/lengkapi_data_ppnpn" method="POST">
                                                <input type="text" value="<?=$this->session->userdata('id_user');?>" name="id" hidden>
                                                <div class="form-group">
                                                    <label for="nama_lengkap">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" aria-describedby="nama_lengkap" value="<?=$i['nama_lengkap']?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="id_jenis_kelamin">Jenis Kelamin</label>
                                                    <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                                                        <?php foreach($jenis_kelamin as $u): ?>
                                                            <option value="<?= $u['id_jenis_kelamin'] ?>" <?php if($u['id_jenis_kelamin'] == $i['id_jenis_kelamin']) echo 'selected'; ?>><?= $u['jenis_kelamin'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="no_telp">No HP</label>
                                                        <input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?=$i['no_telp']?>" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="nip">NIP</label>
                                                        <input type="text" class="form-control" id="nip" name="nip" aria-describedby="nip" value="<?=$i['nip']?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="masa_kerja">Masa Kerja</label>
                                                    <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" aria-describedby="masa_kerja" value="<?=$i['masa_kerja']?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <input type="text" class="form-control" id="jabatan" name="jabatan" aria-describedby="jabatan" value="<?=$i['jabatan']?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="unit_kerja">Unit Kerja</label>
                                                    <textarea class="form-control" id="unit_kerja" rows="3" name="unit_kerja" required><?=$i['unit_kerja']?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Photo Modal -->
                            <div class="modal fade" id="editPhotoModal" tabindex="-1" role="dialog" aria-labelledby="editPhotoModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPhotoModalLabel">Edit Photo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="img-container">
                                                <img id="image" src="<?= base_url();?>assets/images/photo2.jpg" alt="Picture"/>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="Update" class="btn btn-primary"/>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <?php $this->load->view("ppnpn/components/js.php") ?>
</body>
</html>
