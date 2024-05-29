<!DOCTYPE html>
<html>
	<head>
        <?php $this->load->view("sekretariat/components/header.php") ?>
        <style>
			.icon-img {
				width: 100px; /* Sesuaikan dengan ukuran yang Anda inginkan */
				height: 100px; /* Sesuaikan dengan ukuran yang Anda inginkan */
				object-fit: contain;
			}

			/* .progress-data {
				display: flex;
				justify-content: center;
				align-items: center;
				height: 100%;
				width: 100%;
			} */

			/* .widget-style1 {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			} */

			.text-center {
				text-align: center;
			}
		</style>

		<link
			rel="stylesheet"
			type="text/css"
			href="<?= base_url();?>src/plugins/fullcalendar/fullcalendar.css"
		/>
	</head>
	<body>
		<!-- Navbar -->
        <?php $this->load->view("sekretariat/components/navbar.php") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view("sekretariat/components/sidebar.php") ?>

		<div class="main-container">
			<div class="pd-ltr-20">
				<div class="card-box pd-20 height-100-p mb-30">
					<div class="row align-items-center">
						<div class="col-md-4">
							<img src="<?= base_url();?>assets/images/banner-img.png" alt="" />
						</div>
						<div class="col-md-8">
							<h4 class="font-20 weight-500 mb-10 text-capitalize">
								Selamat Datang!
								<div class="weight-600 font-30 text-blue"><?=$this->session->userdata('username');?></div>
							</h4>
							
						</div>
					</div>
				</div>
				<div class="row">
				
					<div class="col-xl-3 mb-30">
						<a href="<?=base_url();?>Logbook/view_sekretariat">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/logbookic.png" alt="Logbook Chart" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?=$logbook['total_logbook']?></div>
									<div class="weight-600 font-14">Logbook PPNPN</div>
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="<?=base_url();?>Izin/view_sekretariat">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/izinic.png" alt="Izin Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?=$izin['total_izin']?></div>
									<div class="weight-600 font-14">Izin Keluar Kantor</div>
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="<?=base_url();?>Perbaikanbmn/view_sekretariat">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/perbaikanbmnic.png" alt="Perbaikanbmn Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?=$perbaikanbmn['total_perbaikanbmn']?></div>
									<div class="weight-600 font-14">Pengajuan Perbaikan BMN</div>
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="<?=base_url();?>Suratmasuk/view_sekretariat">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/suratmasukic.png" alt="Suratmasuk Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?=$suratmasuk['total_suratmasuk']?></div>
									<div class="weight-600 font-14">Surat Masuk dan Disposisi</div>
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<!-- <div class="col-xl-3 mb-30">
						<a href="<?=base_url();?>Pegawai/view_sekretariat">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/pegawaiic.png" alt="Pegawai Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0"><?=$pegawai['total_user']?></div>
									<div class="weight-600 font-14">Data Pegawai</div>
								</div>
								<a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> 
							</div>
						</div>
						</a>
					</div> -->
					<div class="col-xl-3 mb-30">
						<a href="https://srikandi.arsip.go.id/auth/login">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/srikandiic.png" alt="Srikandi Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">Srikandi</div>
									<!-- <div class="weight-600 font-14">Data Pegawai</div> -->
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="https://epersonal.pertanian.go.id/login">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/epersonalic.png" alt="Epersonal Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">E-Personal</div>
									<!-- <div class="weight-600 font-14">Data Pegawai</div> -->
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="https://simasn.pertanian.go.id/simasn/">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/simasnic.png" alt="Simasn Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">SIM ASN</div>
									<!-- <div class="weight-600 font-14">Data Pegawai</div> -->
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="https://sikumagro.000webhostapp.com/">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/sikumagroic.png" alt="Sikumagro Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">SIKUMAGRO</div>
									<!-- <div class="weight-600 font-14">Data Pegawai</div> -->
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
					<div class="col-xl-3 mb-30">
						<a href="https://jambi.bsip.pertanian.go.id/">
						<div class="card-box height-100-p widget-style1">
							<div class="d-flex flex-wrap align-items-center">
								<div class="progress-data">
								<img src="<?= base_url();?>assets/images/webbsipic.png" alt="Sikumagro Logo" class="icon-img"/>
								</div>
								<div class="widget-data">
									<div class="h4 mb-0">Web BSIP Jambi</div>
									<!-- <div class="weight-600 font-14">Data Pegawai</div> -->
								</div>
								<!-- <a href="<?=base_url();?>Logbook/view_sekretariat" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a> -->
							</div>
						</div>
						</a>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-xl-8 mb-30">
						<div class="card-box height-100-p pd-20">
							<h2 class="h4 mb-20">Calendar</h2>
							<div id="chart5"></div>
						</div>
					</div>
					<div class="col-xl-4 mb-30">
						<div class="card-box height-100-p pd-20">
							<h2 class="h4 mb-20">Lead Target</h2>
							<div id="chart6"></div>
						</div>
					</div>
				</div> -->

			</div>
		</div>
		
		<!-- welcome modal end -->
		<!-- js -->
		<script src="<?= base_url();?>assets/scripts/core.js"></script>
		<script src="<?= base_url();?>assets/scripts/script.min.js"></script>
		<script src="<?= base_url();?>assets/scripts/process.js"></script>
		<script src="<?= base_url();?>assets/scripts/layout-settings.js"></script>
		<script src="<?= base_url();?>src/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="<?= base_url();?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url();?>src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?= base_url();?>src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="<?= base_url();?>src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="<?= base_url();?>assets/scripts/dashboard.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
