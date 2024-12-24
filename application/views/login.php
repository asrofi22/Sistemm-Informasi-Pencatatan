<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>FrenSIP | Login</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>assets/images/bsip.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>assets/images/bsip.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>assets/images/bsip.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/styles/style.css" />

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <style>
        .login-page {
            background-image: url('<?= base_url();?>assets/images/balai2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-header {
            background: transparent;
            box-shadow: none;
            padding: 15px 0; /* Adjusted padding to align the logo */
        }

        .login-wrap {
            padding: 30px;
            border-radius: 10px;
        }

        .brand-logo img {
            max-width: 80px; /* Reduced size */
            height: auto;
            padding-top: 15px; /* Added top padding */
        }

        .login-title h1,
        .login-title h6 {
            color: #134315;
        }
    </style>
</head>
<body class="login-page">
    <div class="login-header">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="#">
                    <img src="<?= base_url();?>assets/images/logobpsip.png" alt="BSIP Logo" />
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6 col-lg-5 mx-auto">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h1 class="text-center">FrenSIP</h1>
                            <h6 class="text-center">BPSIP Jambi</h6>
                        </div>
                        <form id="loginForm" action="<?= base_url();?>Login/proses" method="POST">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="username" placeholder="username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="password" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
    
    <!-- jQuery (required for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(event) {
            event.preventDefault();

            const form = $(this);
            const formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                dataType: 'json',
                success: function(data) {
                    if (data.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        });
                    } else if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        }).then(() => {
                            window.location.href = data.redirect_url;
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                }
            });
        });
    });
    </script>
</body>
</html>
