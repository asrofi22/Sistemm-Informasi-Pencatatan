<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_logbookbulanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_logbookbulanan');
        $this->load->model('m_user');
        $this->load->model('m_jenis_kelamin');
    }

    // public function cetak_rekap_nilai_logbook() {
    //     // Ambil data logbook bulanan dengan status 2 (diajukan)
    //     $logbook2 = $this->m_logbook->get_all_logbook_by_status2()->result_array();
    
    //     // Load view untuk halaman cetak rekap nilai logbook bulanan
    //     $this->load->view('admin/cetak_rekap_logbook_bulanan', array('logbook2' => $logbook2));
    // }  

    public function view_super_admin()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {

            // $data['logbook1'] = $this->m_logbook->get_all_logbook_by_status1()->result_array();
            // $data['logbook2'] = $this->m_logbook->get_all_logbook_by_status2()->result_array();
            $data['logbookbulanan'] = $this->m_logbookbulanan->get_all_logbookbulanan()->result_array();
            $this->load->view('super_admin/logbookbulanan', $data);

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');

        }
    }

    public function view_admin()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

            // $data['logbook1'] = $this->m_logbook->get_all_logbook_by_status1()->result_array();
            // $data['logbook2'] = $this->m_logbook->get_all_logbook_by_status2()->result_array();
            $data['logbookbulanan'] = $this->m_logbookbulanan->get_all_logbookbulanan()->result_array();
            $this->load->view('admin/logbookbulanan', $data);

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');

        }

    }

    public function view_ktu()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 5) {

            // $data['logbook1'] = $this->m_logbook->get_all_logbook_by_status1()->result_array();
            // $data['logbook2'] = $this->m_logbook->get_all_logbook_by_status2()->result_array();
            $data['logbookbulanan'] = $this->m_logbookbulanan->get_all_logbookbulanan()->result_array();
            $this->load->view('ktu/logbookbulanan', $data);

        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');

        }

    }

    // public function get_logbook_by_status1()
    // {
    //     $status = 1;
    //     $data['logbook1'] = $this->m_logbook->get_logbook_by_status($status)->result_array();
    //     $this->load->view('logbook', $data);
    // }

    // public function get_logbook_by_status2()
    // {
    //     $status = 2;
    //     $data['logbook2'] = $this->m_logbook->get_logbook_by_status($status)->result_array();
    //     $this->load->view('logbook', $data);
    // }

	public function view_ppnpn()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 7)) {

		// $data['logbook'] = $this->m_logbook->get_all_logbook_by_id_user($id_user)->result_array();
		// $data['logbook1'] = $this->m_logbook->get_logbook_by_status1($id_user)->result_array();
		// $data['logbook2'] = $this->m_logbook->get_logbook_by_status2($id_user)->result_array();
        // $data['total_logbooks'] = $this->m_logbook->count_total_logbooks();
		$data['ppnpn'] = $this->m_user->get_ppnpn_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['ppnpn_data'] = $this->m_user->get_ppnpn_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('ppnpn/form_logbook_bulanan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}

    public function view_sekretariat()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 6 )) {

			// $data['perbaikanbmn'] = $this->m_perbaikanbmn->get_all_perbaikanbmn_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('sekretariat/form_logbook_bulanan', $data);

		} else {
			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');
		}
	}
	
	public function view_pegawai()
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 4)) {

		// $data['logbook'] = $this->m_logbook->get_all_logbook_by_id_user($id_user)->result_array();
		// $data['logbook1'] = $this->m_logbook->get_logbook_by_status1($id_user)->result_array();
		// $data['logbook2'] = $this->m_logbook->get_logbook_by_status2($id_user)->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('pegawai/form_logbook_bulanan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}

	public function proses_logbook_bulanan() {
        if ($this->session->userdata('logged_in') == true && ($this->session->userdata('id_user_level') == 6)) {
            $id_user = $this->input->post("id_user");
			// $status = 1;
            $isi = $this->input->post("isi");
            $nama_laporan = $this->input->post("nama_laporan");

            // Konfigurasi untuk upload file
            $config['upload_path'] = './uploads/logbook/'; // Direktori penyimpanan file yang diunggah
            $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png'; // Jenis file yang diperbolehkan
            $config['max_size'] = 9000; // Ukuran maksimum file (dalam kilobita)
            $this->load->library('upload', $config);

            // Memeriksa apakah file berhasil diunggah
            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();
                $file = $file_data['file_name']; // Menggunakan nama file yang diunggah
                $id_log = md5($id_user . $isi . $file); // Memperbarui id_log dengan menggunakan nama file yang diunggah

                $id_status_log = 1;

                // Memasukkan data pengajuan logbook beserta nama file ke dalam database
                $hasil = $this->m_logbookbulanan->insert_data_logbookbulanan($id_log, $id_user, $isi, $file, $id_status_log, $nama_laporan);

                // Set flashdata berdasarkan hasil operasi penyimpanan data
            if ($hasil == false) {
                $this->session->set_flashdata('eror_input', 'eror_input');
                redirect('Form_logbookbulanan/view_sekretariat');
            } else {
                $this->session->set_flashdata('input', 'input');
                redirect('Logbookbulanan/view_sekretariat/'.$id_user);
            }

            // Arahkan pengguna ke tampilan formulir dengan data yang dimasukkan
            redirect('Form_logbookbulanan/view_sekretariat');
        }   else {
            $this->session->set_flashdata('login_err', 'login_err');
            redirect('Login/index');
        } 
        }}

	public function proses_logbook_bulanan_ppnpn() {
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 7) {
            $id_user = $this->input->post("id_user");
			// $status = 1;
            $isi = $this->input->post("isi");
            $nama_laporan = $this->input->post("nama_laporan");

            // Konfigurasi untuk upload file
            $config['upload_path'] = './uploads/logbook/'; // Direktori penyimpanan file yang diunggah
            $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png'; // Jenis file yang diperbolehkan
            $config['max_size'] = 9000; // Ukuran maksimum file (dalam kilobita)
            $this->load->library('upload', $config);

            // Memeriksa apakah file berhasil diunggah
            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();
                $file = $file_data['file_name']; // Menggunakan nama file yang diunggah
                $id_log = md5($id_user . $isi . $file); // Memperbarui id_log dengan menggunakan nama file yang diunggah

                $id_status_log = 1;

                // Memasukkan data pengajuan logbook beserta nama file ke dalam database
                $hasil = $this->m_logbookbulanan->insert_data_logbookbulanan($id_log, $id_user, $isi, $file, $id_status_log, $nama_laporan);

                // Set flashdata berdasarkan hasil operasi penyimpanan data
            if ($hasil == false) {
                $this->session->set_flashdata('eror_input', 'eror_input');
                redirect('Form_logbookbulanan/view_ppnpn');
            } else {
                $this->session->set_flashdata('input', 'input');
                redirect('Logbookbulanan/view_ppnpn/'.$id_user);
            }

            // Arahkan pengguna ke tampilan formulir dengan data yang dimasukkan
            redirect('Form_logbookbulanan/view_ppnpn');
        }   else {
            $this->session->set_flashdata('login_err', 'login_err');
            redirect('Login/index');
        }
    }}

	public function proses_logbookbulanan_sekretariat() {
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 6) {
            $id_user = $this->input->post("id_user");
            $isi = $this->input->post("isi");
            $nama_laporan = $this->input->post("nama_laporan");

            // Konfigurasi untuk upload file
            $config['upload_path'] = './uploads/logbook/'; // Direktori penyimpanan file yang diunggah
            $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png'; // Jenis file yang diperbolehkan
            $config['max_size'] = 9000; // Ukuran maksimum file (dalam kilobita)
            $this->load->library('upload', $config);

            // Memeriksa apakah file berhasil diunggah
            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();
                $file = $file_data['file_name']; // Menggunakan nama file yang diunggah
                $id_log = md5($id_user . $isi . $file); // Memperbarui id_log dengan menggunakan nama file yang diunggah

                $id_status_log = 1;

                // Memasukkan data pengajuan logbook beserta nama file ke dalam database
                $hasil = $this->m_logbookbulanan->insert_data_logbookbulanan($id_log, $id_user, $isi, $file, $id_status_log, $nama_laporan);

                // Set flashdata berdasarkan hasil operasi penyimpanan data
                if ($hasil == false) {
                    $this->session->set_flashdata('eror_input', 'eror_input');
                    redirect('Form_logbookbulanan/view_sekretariat');
                } else {
                    $this->session->set_flashdata('input', 'input');
                    redirect('Logbookbulanan/view_sekretariat/'.$id_user);
                }

                // Arahkan pengguna ke tampilan formulir dengan data yang dimasukkan
                redirect('Form_logbookbulanan/view_sekretariat');
            }   else {
                $this->session->set_flashdata('login_err', 'login_err');
                redirect('Login/index');
            }
    }}


	
    
}