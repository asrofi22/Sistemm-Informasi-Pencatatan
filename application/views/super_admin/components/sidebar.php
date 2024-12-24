
<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>

					
					<div class="reset-options pt-30 text-center">
						<button class="btn btn-danger" id="reset-settings">
							Reset Settings
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="<?= base_url();?>Dashboard/dashboard_super_admin" class="nav-link">
					<img src="<?= base_url();?>assets/images/bsiplogo.png" alt="" class="dark-logo" style="height: 100px; width: auto;"/>
					<img
						src="<?= base_url();?>assets/images/logobsip3.jpg"
						alt=""
						class="light-logo" class="dark-logo" style="height: 100px; width: auto;"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="<?= base_url();?>Dashboard/dashboard_super_admin" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-house"></span
								><span class="mtext">Home</span>
							</a>
							
						</li>
						<!-- <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle">
								<span class="micon bi bi-book-half"></span
								><span class="mtext">Logbook PPNPN</span>
							</a>
							<ul class="submenu">
								<li>
									<a href="advanced-components.html">Logbook Harian</a>
								</li>
								<li><a href="form-wizard.html">Logbook Bulanan</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-door-open"></span
								><span class="mtext">Izin Keluar Kantor</span>
							</a>
						</li>
                        <li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-wrench"></span
								><span class="mtext">Pengajuan Perbaikan BMN</span>
							</a>
						</li>
                        <li>
							<a href="calendar.html" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-mailbox"></span
								><span class="mtext">Surat Masuk dan Disposisi</span>
							</a>
						</li> -->
						<li>
							<a href="<?= base_url();?>Profile/view_super_admin" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-person"></span
								><span class="mtext">Profil</span>
							</a>
						</li>
                        <li>
							<a href="<?= base_url();?>Settings/view_super_admin" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-gear-wide-connected"></span
								><span class="mtext">Setting</span>
							</a>
						</li>
                        <li>
							<a href="<?= base_url();?>Login/log_out" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-door-open-fill"></span
								><span class="mtext">Logout</span>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>
