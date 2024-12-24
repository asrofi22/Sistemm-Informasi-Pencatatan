<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
		$this->load->model('m_izin');
		// $this->load->model('m_cuti');
		$this->load->model('m_perbaikanbmn');
		$this->load->model('m_suratmasuk');
		$this->load->model('m_logbook');
		$this->load->model('m_logbookbulanan');

	}

	public function dashboard_super_admin()
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

		$data['logbook'] = $this->m_logbook->count_all_logbook();
		$data['logbookbulanan'] = $this->m_logbookbulanan->count_all_logbookbulanan();

		// $data['cuti'] = $this->m_cuti->count_all_cuti()->row_array();
		$data['izin'] = $this->m_izin->count_all_izin()->row_array();
		$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn()->row_array();
		$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
		$data['izin_acc'] = $this->m_izin->count_all_izin_acc()->row_array();
		$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm()->row_array();
		$data['izin_reject'] = $this->m_izin->count_all_izin_reject()->row_array();
		$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
		$data['admin'] = $this->m_user->count_all_admin()->row_array();
		$this->load->view('super_admin/dashboard', $data);

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('login');

	}
	}

	public function dashboard_ktu()
	{
	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 5) {

		$data['logbook'] = $this->m_logbook->count_all_logbook();
		$data['logbookbulanan'] = $this->m_logbookbulanan->count_all_logbookbulanan();

		// $data['cuti'] = $this->m_cuti->count_all_cuti()->row_array();
		$data['izin'] = $this->m_izin->count_all_izin()->row_array();
		$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn()->row_array();
		$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
		$data['izin_acc'] = $this->m_izin->count_all_izin_acc()->row_array();
		$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm()->row_array();
		$data['izin_reject'] = $this->m_izin->count_all_izin_reject()->row_array();
		$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
		$data['admin'] = $this->m_user->count_all_admin()->row_array();
		$this->load->view('ktu/dashboard', $data);

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('login');

	}
	}

	public function dashboard_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
			$data['logbook'] = $this->m_logbook->count_all_logbook();
			$data['logbookbulanan'] = $this->m_logbookbulanan->count_all_logbookbulanan();

			// $data['profile_pegawai'] = $this->m_logbook->get_all_logbook_first_by_id_user($this->session->userdata('id_user'))->result_array();
			// $data['profile'] = $this->m_logbook->count_all_logbook_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin'] = $this->m_izin->count_all_izin()->row_array();
			$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn()->row_array();
			$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
			$data['izin_acc'] = $this->m_izin->count_all_izin_acc()->row_array();
			$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm()->row_array();
			$data['izin_reject'] = $this->m_izin->count_all_izin_reject()->row_array();
			$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
			$this->load->view('admin/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('login/index');
	
		}
	}

	public function dashboard_sekretariat()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 6) {

			$data['logbook_pegawai'] = $this->m_logbook->get_all_logbook_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['logbook'] = $this->m_logbook->count_all_logbook_by_id($this->session->userdata('id_user'));
			$data['logbookbulanan_pegawai'] = $this->m_logbookbulanan->get_all_logbookbulanan_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['logbookbulanan'] = $this->m_logbookbulanan->count_all_logbookbulanan_by_id($this->session->userdata('id_user'));
			// $data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			// $data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_pegawai'] = $this->m_izin->get_all_izin_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['izin'] = $this->m_izin->count_all_izin_by_id($this->session->userdata('id_user'))->row_array();
			$data['perbaikanbmn_pegawai'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn_by_id($this->session->userdata('id_user'))->row_array();
			$data['suratmasuk_pegawai'] = $this->m_suratmasuk->get_all_suratmasuk_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
			$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_reject'] = $this->m_izin->count_all_izin_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			// echo var_dump($data);
			// die();
			$this->load->view('sekretariat/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
	
	public function dashboard_pegawai()
	{
		$allowed_levels = array(1, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);

			// Check if the user is logged in and has the required user level
			if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), $allowed_levels)) {

			$data['logbook_pegawai'] = $this->m_logbook->get_all_logbook_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['logbook'] = $this->m_logbook->count_all_logbook_by_id($this->session->userdata('id_user'))->row_array();
			// $data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			// $data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_pegawai'] = $this->m_izin->get_all_izin_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['izin'] = $this->m_izin->count_all_izin_by_id($this->session->userdata('id_user'))->row_array();
			$data['perbaikanbmn_pegawai'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn_by_id($this->session->userdata('id_user'))->row_array();
			$data['suratmasuk_pegawai'] = $this->m_suratmasuk->get_all_suratmasuk_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
			$data['izin_acc'] = $this->m_izin->count_all_izin_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_reject'] = $this->m_izin->count_all_izin_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			// echo var_dump($data);
			// die();
			$this->load->view('pegawai/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }

	public function dashboard_pegawai2()
	{
		if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), array(8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18))) {

			$data['izin_pegawai2'] = $this->m_izin->get_all_izin_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['izin'] = $this->m_izin->count_all_izin_by_id($this->session->userdata('id_user'))->row_array();
			$data['perbaikanbmn_pegawai2'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn_by_id($this->session->userdata('id_user'))->row_array();
			$data['suratmasuk_pegawai2'] = $this->m_suratmasuk->get_all_suratmasuk_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
			$data['izin_acc'] = $this->m_izin->count_all_izin_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_reject'] = $this->m_izin->count_all_izin_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			// echo var_dump($data);
			// die();
			$this->load->view('pegawai2/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }

	public function dashboard_ppnpn()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 7) {

			$data['logbook_ppnpn'] = $this->m_logbook->get_all_logbook_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['logbook'] = $this->m_logbook->count_all_logbook_by_id($this->session->userdata('id_user'));
			$data['logbookbulanan_ppnpn'] = $this->m_logbookbulanan->get_all_logbookbulanan_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['logbookbulanan'] = $this->m_logbookbulanan->count_all_logbookbulanan_by_id($this->session->userdata('id_user'));
			// $data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			// $data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_ppnpn'] = $this->m_izin->get_all_izin_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['izin'] = $this->m_izin->count_all_izin_by_id($this->session->userdata('id_user'))->row_array();
			$data['perbaikanbmn_ppnpn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn_by_id($this->session->userdata('id_user'))->row_array();
			$data['suratmasuk_ppnpn'] = $this->m_suratmasuk->get_all_suratmasuk_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
			$data['izin_acc'] = $this->m_izin->count_all_izin_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_reject'] = $this->m_izin->count_all_izin_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			// $data['profile'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();

			// echo var_dump($data);
			// die();
			$this->load->view('ppnpn/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }

	public function dashboard_kaurrt()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 4) {

			// $data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			// $data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_pegawai'] = $this->m_izin->get_all_izin_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['izin'] = $this->m_izin->count_all_izin_by_id($this->session->userdata('id_user'))->row_array();
			// $data['perbaikanbmn_pegawai'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['perbaikanbmn'] = $this->m_perbaikanbmn->count_all_perbaikanbmn()->row_array();
			$data['suratmasuk'] = $this->m_suratmasuk->count_all_suratmasuk()->row_array();
			$data['izin_acc'] = $this->m_izin->count_all_izin_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_confirm'] = $this->m_izin->count_all_izin_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['izin_reject'] = $this->m_izin->count_all_izin_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			// echo var_dump($data);
			// die();
			$this->load->view('kaurrt/dashboard', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
	
    
}