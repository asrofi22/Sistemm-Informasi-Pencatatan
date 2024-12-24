<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("ppnpn/components/header.php") ?>
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
            text: "Data Berhasil Ditambahkan!",
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
                                    <h4>Form Logbook Harian PPNPN</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Form Logbook Harian PPNPN
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
                                <form id="formPengajuanPerbaikanbmn" action="<?= base_url();?>Form_logbook/proses_logbook_harian_ppnpn" method="POST" enctype="multipart/form-data">
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
                                <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>

                            </div>
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

    <?php $this->load->view("ppnpn/components/js.php") ?>

    <!-- Load jQuery -->
    <script src="<?= base_url(); ?>src/plugins/jquery/jquery.min.js"></script>

</body>

</html>
