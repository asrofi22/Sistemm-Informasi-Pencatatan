<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

    public function view_super_admin()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('super_admin/settings', $data);
	}
    
	public function view_admin()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('admin/settings', $data);
	}

	public function view_kaurrt()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('kaurrt/settings', $data);
	}

	public function view_ktu()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('ktu/settings', $data);
	}

	public function view_sekretariat()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('sekretariat/settings', $data);
	}
	
	public function view_pegawai()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('pegawai/settings', $data);
	}

	public function view_ppnpn()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('ppnpn/settings', $data);
	}
	
	
	public function lengkapi_data()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

		if($hasil==false){
			$this->session->set_flashdata('eror','eror');
			redirect('Settings/view_pegawai');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Settings/view_pegawai');
		}
	}

	public function lengkapi_data_ppnpn()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

		if($hasil==false){
			$this->session->set_flashdata('eror','eror');
			redirect('Settings/view_ppnpn');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Settings/view_ppnpn');
		}
	}

	public function lengkapi_data_admin()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

		if($hasil==false){
			$this->session->set_flashdata('eror','eror');
			redirect('Settings/view_ppnpn');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Settings/view_ppnpn');
		}
	}

	
	public function settings_account_super_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_super_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_super_admin');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_super_admin');
        }
	}

	public function settings_account_kaurrt()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_kaurrt');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_kaurrt');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_kaurrt');
        }
	}

	public function settings_account_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_admin');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_admin');
        }
	}

	public function settings_account_ktu()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_ktu');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_ktu');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_ktu');
        }
	}

	public function settings_account_sekretariat()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_sekretariat');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_sekretariat');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_sekretariat');
        }
	}


	public function settings_account_pegawai()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_pegawai');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_pegawai');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_pegawai');
        }
	}
    
}