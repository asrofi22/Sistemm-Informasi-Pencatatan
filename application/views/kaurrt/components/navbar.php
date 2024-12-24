<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				
				
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<!-- <div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
									<li>
										<a href="#">
											<img src="assets/images/img.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/images/photo1.jpg" alt="" />
											<h3>Lea R. Frith</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/images/photo2.jpg" alt="" />
											<h3>Erik L. Richards</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/images/photo3.jpg" alt="" />
											<h3>John Doe</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/images/photo4.jpg" alt="" />
											<h3>Renee I. Hansen</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="assets/images/img.jpg" alt="" />
											<h3>Vicki M. Coleman</h3>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipisicing
												elit, sed...
											</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="<?= base_url();?>assets/images/account.jpg" alt="" />
							</span>
							<span class="user-name"><?=$this->session->userdata('username');?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"
								><i class="dw dw-user1"></i> Lengkapi Data</a
							>
							<a class="dropdown-item" href="profile.html"
								><i class="dw dw-settings2"></i> Setting</a
							>
							<!-- <a class="dropdown-item" href="faq.html"
								><i class="dw dw-help"></i> Help</a
							> -->
							<a class="dropdown-item" href="<?= base_url();?>Login/log_out" 
								><i class="dw dw-logout"></i> Log Out</a
							>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                            $masa_kerja = $i['masa_kerja'];
                                            $jabatan = $i['jabatan'];
                                            $unit_kerja = $i['unit_kerja'];
                                            

                                            ?>
                <form action="<?= base_url();?>Settings/lengkapi_data" method="POST">
                    <input type="text" value="<?=$this->session->userdata('id_user');?>" name="id" hidden>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            aria-describedby="nama_lengkap" value="<?=$nama_lengkap?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="id_jenis_kelamin" name="id_jenis_kelamin" required>
                            <?php foreach($jenis_kelamin as $u)
                                                                :
                                                                $id = $u["id_jenis_kelamin"];
                                                                $jenis_kelamin = $u["jenis_kelamin"];
                                                                ?>
                            <option value="<?= $id ?>" <?php if($id == $id_jenis_kelamin){
                                                                            echo 'selected';
                                                                        }else{
                                                                            echo '';
                                                                        }?>><?= $jenis_kelamin ?></option>

                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No HP</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" value="<?=$no_telp?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" aria-describedby="nip" value="<?=$nip?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pangkat">Masa Kerja</label>
                        <input type="text" class="form-control" id="masa_kerja" name="masa_kerja" aria-describedby="masa_kerja" value="<?=$masa_kerja?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" aria-describedby="jabatan" value="<?=$jabatan?>" required>
                    </div>
                    <div class="form-group">
                        <label for="unit_kerja">Unit Kerja</label>
                        <textarea class="form-control" id="unit_kerja" rows="3" name="unit_kerja" required><?=$unit_kerja?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>