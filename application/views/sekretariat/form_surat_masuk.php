<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("sekretariat/components/header.php") ?>
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
        <?php $this->load->view("sekretariat/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("sekretariat/components/sidebar.php") ?>

        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="title">
                                    <h4>Form Surat Masuk</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Form Surat Masuk
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
                            <form id="formSuratMasuk" action="<?= base_url();?>Form_suratmasuk/proses_suratmasuk" method="POST" enctype="multipart/form-data">
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

    <?php $this->load->view("sekretariat/components/js.php") ?>

    <!-- Load jQuery -->
    <script src="<?= base_url(); ?>src/plugins/jquery/jquery.min.js"></script>

    <!-- Activate WhatsApp -->
    <!-- <script>
        $(document).ready(function () {
            var form = $('#formPengajuanPerbaikanbmn');

            form.submit(function (event) {
                event.preventDefault(); // Mencegah pengiriman formulir secara default

                // Mengirim data formulir menggunakan AJAX
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (response) {
                        // Jika pengiriman formulir berhasil, arahkan ke WhatsApp
                        var message = encodeURIComponent("Saya telah mengajukan perbaikan BMN di sistem FrenSIP, mohon untuk ditindak lanjuti");
                        var phoneNumber = "+6287817889296"; // Nomor telepon dengan kode negara Indonesia
                        var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + message;
                        window.open(whatsappUrl, '_blank');
                    },
                    error: function () {
                        swal({
                            title: "Success!",
                            text: "Data telah tersimpan.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script> -->
</body>

</html>
