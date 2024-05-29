<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require 'vendor/autoload.php';
// use Twilio\Rest\Client;

class Izin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_izin');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}
	

    public function view_super_admin()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 3 || $this->session->userdata('id_user_level') == 5)) {

			$data['izin'] = $this->m_izin->get_all_izin()->result_array();
			$this->load->view('super_admin/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
    }
    
	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['izin'] = $this->m_izin->get_all_izin()->result_array();
			$this->load->view('admin/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function view_ktu()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 5) {

			$data['izin'] = $this->m_izin->get_all_izin()->result_array();
			$this->load->view('ktu/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function proses_izin() {
		// Check if the user is logged in and has the required user level
		if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), array(1, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18))) {
			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_izin = md5($id_user.$alasan.$mulai.$berakhir);
			$id_status_izin = 1;
	
			$hasil = $this->m_izin->insert_data_izin('izin-'.substr($id_izin, 0, 5), $id_user, $alasan, $mulai, $berakhir, $id_status_izin);
	
			if ($hasil == false) {
				log_message('error', 'Data insertion failed for user: ' . $id_user);
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				log_message('info', 'Data insertion succeeded for user: ' . $id_user);
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Izin/view_pegawai/'.$id_user);
		} else {
			log_message('error', 'Unauthorized access attempt by user: ' . $this->session->userdata('id_user'));
			redirect('Login/index');
		}
	}
	

	public function proses_izin_ajax() {
		// Ambil data dari request
		$id_user = $this->input->post('id_user');
		$alasan = $this->input->post('alasan');
		// $perihal_izin = $this->input->post('perihal_izin');
		$mulai = $this->input->post('mulai');
		$berakhir = $this->input->post('berakhir');

		// Simpan data ke database
		$data = [
			'tgl_diajukan' => date('Y-m-d H:i:s'),
			'id_user' => $id_user,
			
			'alasan' => $alasan,
			// 'perihal_izin' => $perihal_izin,
			'mulai' => $mulai,
			'berakhir' => $berakhir,
			'id_status_izin' => 1 // Status menunggu konfirmasi
		];

		$insert_id = $this->m_izin->insert_izin($data);

		if ($insert_id) {
			// Kirim pesan WhatsApp menggunakan Twilio API
			$message = "Saya telah mengajukan izin keluar kantor, mohon untuk ditindak lanjuti";
			$this->send_whatsapp_message($message);

			// Kirim response balik ke AJAX
			echo json_encode(['status' => 'success', 'message' => 'Pengajuan izin berhasil disimpan.']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Pengajuan izin gagal disimpan.']);
		}
	}

	private function send_whatsapp_message($message) {
		// Twilio credentials
		$sid = 'YOUR_TWILIO_ACCOUNT_SID';
		$token = 'YOUR_TWILIO_AUTH_TOKEN';
		$twilio_whatsapp_number = 'YOUR_TWILIO_WHATSAPP_NUMBER';
		$recipient_whatsapp_number = 'whatsapp:+6287817889296';

		$client = new Client($sid, $token);

		$client->messages->create(
			$recipient_whatsapp_number,
			[
				'from' => 'whatsapp:' . $twilio_whatsapp_number,
				'body' => $message
			]
		);
	}

	public function get_izin_by_date_range($start_date, $end_date) {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->where('tgl_diajukan >=', $start_date);
        $this->db->where('tgl_diajukan <=', $end_date);
        return $this->db->get();
    }

	public function print_izin_report()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        $this->load->model('M_izin');
        $data['izin'] = $this->M_izin->get_izin_by_date_range($start_date, $end_date);

        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        $this->load->view('admin/components/print_izin_report', $data);
    }

	public function filter_izin_by_date_range() {
        // Ambil rentang tanggal dari form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
    
        // Ambil data izin berdasarkan rentang tanggal
        $izin_filtered = $this->m_izin->get_izin_by_date_range($start_date, $end_date)->result_array();
    
        // Load view untuk menampilkan data izin berdasarkan rentang tanggal
        $this->load->view('admin/izin_filtered', array('izin_filtered' => $izin_filtered));
    }

	public function view_pegawai($id_user)
	{
		$allowed_levels = array(1, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);

			// Check if the user is logged in and has the required user level
			if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), $allowed_levels)) {

			$data['izin'] = $this->m_izin->get_all_izin_by_id_user($id_user)->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('pegawai/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function view_sekretariat()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 6 )) {

			$data['izin'] = $this->m_izin->get_all_izin_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('sekretariat/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}


	public function proses_izin_ppnpn()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 7)) {
	
			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			// $perihal_izin = $this->input->post("perihal_izin");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_izin = md5($id_user.$alasan.$mulai);
			
			$id_status_izin = 1;
	
			$hasil = $this->m_izin->insert_data_izin('izin-'.substr($id_izin, 0, 5),$id_user, $alasan, $mulai, $berakhir, $id_status_izin);
	
			if($hasil==false){
				$this->session->set_flashdata('eror_input','eror_input');
			} else {
				$this->session->set_flashdata('input','input');

				// Tambah notifikasi untuk super admin
                // $pesan = 'Pegawai dengan ID '.$id_user.' telah mengajukan izin.';
				// $this->load->model('notifikasi_m');
				// $this->Notifikasi_model->tambahNotifikasi($pesan);
			}
			redirect('Izin/view_ppnpn/'.$id_user);
		}
	}

	public function proses_izin_sekretariat()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 6)) {
	
			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			// $perihal_izin = $this->input->post("perihal_izin");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_izin = md5($id_user.$alasan.$mulai);
			
			$id_status_izin = 1;
	
			$hasil = $this->m_izin->insert_data_izin('izin-'.substr($id_izin, 0, 5),$id_user, $alasan, $mulai, $berakhir, $id_status_izin);
	
			if($hasil==false){
				$this->session->set_flashdata('eror_input','eror_input');
			} else {
				$this->session->set_flashdata('input','input');

				// Tambah notifikasi untuk super admin
                // $pesan = 'Pegawai dengan ID '.$id_user.' telah mengajukan izin.';
				// $this->load->model('notifikasi_m');
				// $this->Notifikasi_model->tambahNotifikasi($pesan);
			}
			redirect('Izin/view_sekretariat/'.$id_user);
		}
	}
	
	public function view_ppnpn()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 7 )) {

			$data['izin'] = $this->m_izin->get_all_izin_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('ppnpn/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	public function hapus_izin()
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_izin->delete_izin($id_izin);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Izin/view_pegawai/'.$id_user);
	}

	public function proses_izin_pegawai2()
	{
		if ($this->session->userdata('logged_in') == true AND in_array($this->session->userdata('id_user_level'), array(8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18))) {
	
			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			// $perihal_izin = $this->input->post("perihal_izin");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_izin = md5($id_user.$alasan.$mulai);
			
			$id_status_izin = 1;
	
			$hasil = $this->m_izin->insert_data_izin('izin-'.substr($id_izin, 0, 5),$id_user, $alasan, $mulai, $berakhir, $id_status_izin);
	
			if($hasil==false){
				$this->session->set_flashdata('eror_input','eror_input');
			}else{
				$this->session->set_flashdata('input','input');

				// Tambah notifikasi untuk super admin
                // $pesan = 'Pegawai dengan ID '.$id_user.' telah mengajukan izin.';
				// $this->load->model('notifikasi_m');
				// $this->Notifikasi_model->tambahNotifikasi($pesan);
			}
			redirect('Izin/view_pegawai2/'.$id_user);
		}
	}
	
	public function view_pegawai2($id_user)
	{
		if ($this->session->userdata('logged_in') == true AND in_array($this->session->userdata('id_user_level'), array(8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18))) {

			$data['izin'] = $this->m_izin->get_all_izin_by_id_user($id_user)->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('pegawai2/izin', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}

	public function hapus_izin_pegawai2()
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_izin->delete_izin($id_izin);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Izin/view_pegawai2/'.$id_user);
	}
	

	public function hapus_izin_admin()
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_izin->delete_izin($id_izin);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Izin/view_admin');
	}

	public function hapus_izin_ktu()
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_izin->delete_izin($id_izin);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Izin/view_ktu');
	}

	public function edit_izin_admin()
	{
		
		$id_izin = $this->input->post("id_izin");
		$tgl_diajukan = $this->input->post("tgl_diajukan");
		$alasan = $this->input->post("alasan");
		// $perihal_izin = $this->input->post("perihal_izin");
		$mulai = $this->input->post("mulai");
		$berakhir = $this->input->post("berakhir");

		$hasil = $this->m_izin->update_izin($tgl_diajukan, $alasan, $mulai, $berakhir, $id_izin);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_edit','eror_edit');
		}else{
			$this->session->set_flashdata('edit','edit');
		}

		redirect('Izin/view_admin');
	}

	public function acc_izin_admin($id_status_izin)
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_izin->confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('Izin/view_admin/'.$id_user);
	}

	public function acc_izin_super_admin($id_status_izin)
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_izin->confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('Izin/view_super_admin/'.$id_user);
	}

	public function acc_izin_ktu($id_status_izin)
	{
		$id_izin = $this->input->post("id_izin");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_izin->confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('Izin/view_ktu/'.$id_user);
	}
}
