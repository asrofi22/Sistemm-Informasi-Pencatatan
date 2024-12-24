<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_profile');
		$this->load->model('m_jenis_kelamin');
		$this->load->model('m_user');
		$this->load->library('upload');
    }

    public function view_super_admin()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('super_admin/profile', $data);
	}
    
	public function view_admin()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('admin/profile', $data);
	}

    public function view_pegawai()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('pegawai/profile', $data);
	}

	public function view_ppnpn()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('ppnpn/profile', $data);
	}

	public function view_ktu()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('ktu/profile', $data);
	}

	public function view_sekretariat()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('sekretariat/profile', $data);
	}

	public function view_kaurrt()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('kaurrt/profile', $data);
	}

	public function view_pegawai2()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('pegawai2/profile', $data);
	}
	
	public function lengkapi_data()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_pegawai');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_pegawai');
		}
		
	}

	public function lengkapi_data_admin()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_admin');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_admin');
		}
		
	}

	public function lengkapi_data_ktu()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_ktu');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_ktu');
		}
		
	}

	public function lengkapi_data_kaurrt()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_kaurrt');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_kaurrt');
		}
		
	}

	public function lengkapi_data_pegawai2()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_pegawai2');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_pegawai2');
		}
		
	}

	public function lengkapi_data_ppnpn()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_ppnpn');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_ppnpn');
		}
		
	}

	public function lengkapi_data_sekretariat()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_sekretariat');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_sekretariat');
		}
		
	}

	public function lengkapi_data_super_admin()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$email = $this->input->post("email");
		$no_telp = $this->input->post("no_telp");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$masa_kerja = $this->input->post("masa_kerja");
		$jabatan = $this->input->post("jabatan");
		$unit_kerja = $this->input->post("unit_kerja");

		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $email, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja);

        if($hasil==false){
            $this->session->set_flashdata('eror','eror');
            redirect('Profile/view_super_admin');
		}else{
			$this->session->set_flashdata('input','input');
			redirect('Profile/view_super_admin');
		}
		
	}

	public function upload_photo()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 9000;
        $config['file_name'] = $this->session->userdata('id_user') . '_profile_photo';

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error', $error);
            redirect('Profile/view_pegawai');
        } else {
            $upload_data = $this->upload->data();
            $profile_picture = 'uploads/' . $upload_data['file_name'];
            $this->m_user->update_user_photo($this->session->userdata('id_user'), $profile_picture);
            $this->session->set_flashdata('upload_success', 'Photo uploaded successfully');
            redirect('Profile/view_pegawai');
        }
    }
}
?>
