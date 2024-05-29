<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikanbmn extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_perbaikanbmn');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	

    public function view_super_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

			$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn()->result_array();
			$this->load->view('super_admin/perbaikanbmn', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
    
	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn()->result_array();
			$this->load->view('admin/perbaikanbmn', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}

	public function view_ktu()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 5) {

			$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn()->result_array();
			$this->load->view('ktu/perbaikanbmn', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}

	public function view_kaurrt()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 4 || $this->session->userdata('id_user_level') == 5)) {

			$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn()->result_array();
			$this->load->view('kaurrt/perbaikanbmn', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}
	
	public function proses_perbaikanbmn()
	{
		$allowed_levels = array(1, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);

		// Check if the user is logged in and has the required user level
		if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), $allowed_levels)) {
			$id_user = $this->input->post("id_user");
			$nama_brg = $this->input->post("nama_brg");
			$spesifikasi_brg = $this->input->post("spesifikasi_brg");
			$lokasi_brg = $this->input->post("lokasi_brg");
			$kerusakan = $this->input->post("kerusakan");
			$tgl_diajukan = date('Y-m-d H:i:s');
			$id_perbaikanbmn = md5($id_user.$nama_brg.$lokasi_brg);
			$id_status_perbaikanbmn = 1;
			$id_status_perbaikan = 1;

			$hasil = $this->m_perbaikanbmn->insert_data_perbaikanbmn('perbaikanbmn-'.substr($id_perbaikanbmn, 0, 5), $id_user, $nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_status_perbaikanbmn, $id_status_perbaikan);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Perbaikanbmn/view_pegawai/'.$id_user);
		}
	}
	
	public function view_pegawai($id_user)
	{
		$allowed_levels = array(1, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);

			// Check if the user is logged in and has the required user level
			if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), $allowed_levels)) {

		$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_by_id_user($id_user)->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('pegawai/perbaikanbmn', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}

	public function view_sekretariat()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 6 )) {

			$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('sekretariat/perbaikanbmn', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function view_ppnpn()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 7 )) {

			$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('ppnpn/perbaikanbmn', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	public function hapus_perbaikanbmn()
	{

		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_perbaikanbmn->delete_perbaikanbmn($id_perbaikanbmn);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Perbaikanbmn/view_pegawai/'.$id_user);
	}

	public function proses_perbaikanbmn_pegawai2()
	{
		if ($this->session->userdata('logged_in') == true AND in_array($this->session->userdata('id_user_level'), array(8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18))) {

			$id_user = $this->input->post("id_user");
			$nama_brg = $this->input->post("nama_brg");
			$spesifikasi_brg = $this->input->post("spesifikasi_brg");
			$lokasi_brg = $this->input->post("lokasi_brg");
			$kerusakan = $this->input->post("kerusakan");
			$tgl_diajukan = date('Y-m-d H:i:s');
			$id_perbaikanbmn = md5($id_user.$nama_brg.$lokasi_brg);
			$id_status_perbaikanbmn = 1;
			$id_status_perbaikan = 1;

			$hasil = $this->m_perbaikanbmn->insert_data_perbaikanbmn('perbaikanbmn-'.substr($id_perbaikanbmn, 0, 5), $id_user, $nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_status_perbaikanbmn, $id_status_perbaikan);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Perbaikanbmn/view_pegawai2/'.$id_user);
		}
	}
	
	public function proses_perbaikanbmn_ppnpn()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 7) {

			$id_user = $this->input->post("id_user");
			$nama_brg = $this->input->post("nama_brg");
			$spesifikasi_brg = $this->input->post("spesifikasi_brg");
			$lokasi_brg = $this->input->post("lokasi_brg");
			$kerusakan = $this->input->post("kerusakan");
			$tgl_diajukan = date('Y-m-d H:i:s');
			$id_perbaikanbmn = md5($id_user.$nama_brg.$lokasi_brg);
			$id_status_perbaikanbmn = 1;
			$id_status_perbaikan = 1;

			$hasil = $this->m_perbaikanbmn->insert_data_perbaikanbmn('perbaikanbmn-'.substr($id_perbaikanbmn, 0, 5), $id_user, $nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_status_perbaikanbmn, $id_status_perbaikan);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Perbaikanbmn/view_ppnpn/'.$id_user);
		}
	}

	public function proses_perbaikanbmn_sekretariat()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 6) {

			$id_user = $this->input->post("id_user");
			$nama_brg = $this->input->post("nama_brg");
			$spesifikasi_brg = $this->input->post("spesifikasi_brg");
			$lokasi_brg = $this->input->post("lokasi_brg");
			$kerusakan = $this->input->post("kerusakan");
			$tgl_diajukan = date('Y-m-d H:i:s');
			$id_perbaikanbmn = md5($id_user.$nama_brg.$lokasi_brg);
			$id_status_perbaikanbmn = 1;
			$id_status_perbaikan = 1;

			$hasil = $this->m_perbaikanbmn->insert_data_perbaikanbmn('perbaikanbmn-'.substr($id_perbaikanbmn, 0, 5), $id_user, $nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_status_perbaikanbmn, $id_status_perbaikan);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Perbaikanbmn/view_sekretariat/'.$id_user);
		}
	}

	public function view_pegawai2($id_user)
	{
		if ($this->session->userdata('logged_in') == true AND in_array($this->session->userdata('id_user_level'), array(8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18))) {

		$data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_by_id_user($id_user)->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('pegawai2/perbaikanbmn', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function hapus_perbaikanbmn_pegawai2()
	{

		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_perbaikanbmn->delete_perbaikanbmn($id_perbaikanbmn);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Perbaikanbmn/view_pegawai2/'.$id_user);
	}

	public function hapus_perbaikanbmn_admin()
	{

		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_perbaikanbmn->delete_perbaikanbmn($id_perbaikanbmn);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Perbaikanbmn/view_admin');
	}

	public function edit_perbaikanbmn_admin()
	{
		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$nama_brg = $this->input->post("nama_brg");
		$spesifikasi_brg = $this->input->post("spesifikasi_brg");
		$lokasi_brg = $this->input->post("lokasi_brg");
		$kerusakan = $this->input->post("kerusakan");
		$tgl_diajukan = $this->input->post("tgl_diajukan");
	
		$hasil = $this->m_perbaikanbmn->update_perbaikanbmn($nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_perbaikanbmn);
	
		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
		} else {
			$this->session->set_flashdata('edit', 'edit');
		}
	
		redirect('Perbaikanbmn/view_admin');
	}

	// public function edit_status_perbaikan_kaurrt($id_perbaikanbmn, $id_status_perbaikan)
	// {
	// 	$hasil = $this->m_perbaikanbmn->update_status_perbaikan($id_perbaikanbmn, $id_status_perbaikan);

	// 	if ($hasil == false) {
	// 		$this->session->set_flashdata('eror_edit', 'eror_edit');
	// 	} else {
	// 		$this->session->set_flashdata('edit', 'edit');
	// 	}

	// 	redirect('Perbaikanbmn/view_kaurrt');
	// }


	public function acc_perbaikanbmn_admin($id_status_perbaikanbmn)
	{
		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_perbaikanbmn->confirm_perbaikanbmn($id_perbaikanbmn, $id_status_perbaikanbmn, $alasan_verifikasi);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('Perbaikanbmn/view_admin/'.$id_user);
	}

	public function acc_perbaikanbmn_ktu($id_status_perbaikanbmn)
	{
		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_perbaikanbmn->confirm_perbaikanbmn($id_perbaikanbmn, $id_status_perbaikanbmn, $alasan_verifikasi);

		// Set status perbaikan menjadi "belum dikerjakan" setelah disetujui
        if ($id_status_perbaikanbmn == 2 && $hasil) {
            $this->m_perbaikanbmn->update_status_perbaikan($id_perbaikanbmn, 2); // Ubah status menjadi "belum dikerjakan"
        }

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('Perbaikanbmn/view_ktu/'.$id_user);
	}


	public function acc_perbaikanbmn_super_admin($id_status_perbaikanbmn)
	{
		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_perbaikanbmn->confirm_perbaikanbmn($id_perbaikanbmn, $id_status_perbaikanbmn, $alasan_verifikasi);

		// Set status perbaikan menjadi "belum dikerjakan" setelah disetujui
        if ($id_status_perbaikanbmn == 2 && $hasil) {
            $this->m_perbaikanbmn->update_status_perbaikan($id_perbaikanbmn, 2); // Ubah status menjadi "belum dikerjakan"
        }

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('Perbaikanbmn/view_super_admin/'.$id_user);
	}

	public function edit_status_perbaikan_kaurrt($id_status_perbaikan)
	{
		$id_perbaikanbmn = $this->input->post("id_perbaikanbmn");
		$id_user = $this->input->post("id_user");
		$verifikasi_kaurrt = $this->input->post("verifikasi_kaurrt");

		$hasil = $this->m_perbaikanbmn->confirm_status_perbaikan($id_perbaikanbmn, $id_status_perbaikan, $verifikasi_kaurrt);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('Perbaikanbmn/view_kaurrt/'.$id_user);
	}
    
}