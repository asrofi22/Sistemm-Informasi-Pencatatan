<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Agenda_model');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	

    public function view_super_admin()
	{
	if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 3 || $this->session->userdata('id_user_level') == 5)) {

		$data['tb_agenda'] = $this->Agenda_model->get_all_agenda()->result_array();
		$this->load->view('super_admin/agenda', $data);

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('Login/index');

	}
    }
    
	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['tb_agenda'] = $this->m_izin->get_all_agenda()->result_array();
			$this->load->view('admin/agenda', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}

  public function proses_agenda()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
	
      $tanggal = date('d-m-Y');

      $surat = $_FILES['surat'];
      if($surat = ''){}else{
        $config['upload_path']  = './assets/surma';
        $config['allowed_types'] = 'pdf';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('surat')){
           $surat = $this->upload->data('file_name');
        }
      };

	  $data = [
		'nosurat' => $this->input->post('nosurat'),
		'tglsurat' => $this->input->post('tglmasuk'),
		'tglteri' => $this->input->post('tgltrima'),
		'perihal' => $this->input->post('perihal'),
		'isi' => $this->input->post('ringkas'),        
		'instansi' => $this->input->post('instansi'),
		'file_surat' => $surat,
		'status' => 0,
		'track1'=> "Surat telah Terkirim <br> Ke Sekertaris Bappeda"."<br> Tanggal :".$tanggal 
	  ];

	  $data7 = [
		'nosurat' => $this->input->post('nosurat'),
	  ];

	  $this->db->insert('tb_agenda',$data);
	  $this->db->insert('tb_tracking', $data7);
	  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Berhasil Dikirim</div>');
	  redirect('agenda/add');
	}   
  } 

	
	// public function view_pegawai($id_user)
	// {
	// 	if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 4)) {

	// 	$data['izin'] = $this->m_izin->get_all_izin_by_id_user($id_user)->result_array();
	// 	$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
	// 	$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
	// 	$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
	// 	$this->load->view('pegawai/izin', $data);

	// 	}else{

	// 		$this->session->set_flashdata('loggin_err','loggin_err');
	// 		redirect('Login/index');

	// 	}
	// }
	
	// public function hapus_izin()
	// {

	// 	$id_izin = $this->input->post("id_izin");
	// 	$id_user = $this->input->post("id_user");

	// 	$hasil = $this->m_izin->delete_izin($id_izin);
		
	// 	if($hasil==false){
	// 		$this->session->set_flashdata('eror_hapus','eror_hapus');
	// 	}else{
	// 		$this->session->set_flashdata('hapus','hapus');
	// 	}

	// 	redirect('Izin/view_pegawai/'.$id_user);
	// }

	// public function hapus_izin_admin()
	// {

	// 	$id_izin = $this->input->post("id_izin");
	// 	$id_user = $this->input->post("id_user");

	// 	$hasil = $this->m_izin->delete_izin($id_izin);
		
	// 	if($hasil==false){
	// 		$this->session->set_flashdata('eror_hapus','eror_hapus');
	// 	}else{
	// 		$this->session->set_flashdata('hapus','hapus');
	// 	}

	// 	redirect('Izin/view_admin');
	// }

	// public function edit_izin_admin()
	// {
	// 	$id_izin = $this->input->post("id_izin");
	// 	$alasan = $this->input->post("alasan");
	// 	$perihal_izin = $this->input->post("perihal_izin");
	// 	$tgl_diajukan = $this->input->post("tgl_diajukan");
	// 	$mulai = $this->input->post("mulai");
	// 	$berakhir = $this->input->post("berakhir");


	// 	$hasil = $this->m_izin->update_izin($alasan, $perihal_izin, $tgl_diajukan, $mulai, $berakhir, $id_izin);
		
	// 	if($hasil==false){
	// 		$this->session->set_flashdata('eror_edit','eror_edit');
	// 	}else{
	// 		$this->session->set_flashdata('edit','edit');
	// 	}

	// 	redirect('Izin/view_admin');
	// }

	// public function acc_izin_admin($id_status_izin)
	// {

	// 	$id_izin = $this->input->post("id_izin");
	// 	$id_user = $this->input->post("id_user");
	// 	$alasan_verifikasi = $this->input->post("alasan_verifikasi");

	// 	$hasil = $this->m_izin->confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi);
		
	// 	if($hasil==false){
	// 		$this->session->set_flashdata('eror_input','eror_input');
	// 	}else{
	// 		$this->session->set_flashdata('input','input');
	// 	}

	// 	redirect('Izin/view_admin/'.$id_user);
	// }

	// public function acc_agenda_super_admin($nosurat)
	// {

	// 	$id = $this->input->post("id");
	// 	$id_user = $this->input->post("id_user");
	// 	// $alasan_verifikasi = $this->input->post("alasan_verifikasi");

	// 	$hasil = $this->m_izin->confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi);
		
	// 	if($hasil==false){
	// 		$this->session->set_flashdata('eror_input','eror_input');
	// 	}else{
	// 		$this->session->set_flashdata('input','input');
	// 	}

	// 	redirect('Izin/view_super_admin/'.$id_user);
	// }
	
    
}