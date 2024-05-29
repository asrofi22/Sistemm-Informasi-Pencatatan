<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("kaurrt/components/header.php") ?>
    <!-- Tambahkan SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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

    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view("kaurrt/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("kaurrt/components/sidebar.php") ?>

        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="title">
                                    <h4>Settings</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Settings
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="row">
                        <div class="col-12 mb-30">
                            <div class="pd-20 card-box height-100-p">
                                <form action="<?= base_url(); ?>Settings/settings_account_kaurrt" method="POST">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" aria-describedby="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" aria-describedby="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="re_password">Ulangi Password</label>
                                        <input type="password" class="form-control" id="re_password" name="re_password" aria-describedby="re_password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div><!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("kaurrt/components/js.php") ?>
</body>

</html>
