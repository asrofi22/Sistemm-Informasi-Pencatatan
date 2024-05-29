<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logbookbulanan extends CI_Controller {

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

    public function cetak_laporan_bulanan() {
        // Ambil rentang tanggal dari parameter URL
        $startDate = $this->input->get('startDate');
        $endDate = $this->input->get('endDate');
    
        // Panggil model untuk mengambil data laporan bulanan berdasarkan rentang tanggal
        $data['laporan_bulanan'] = $this->m_logbookbulanan->get_laporan_bulanan($startDate, $endDate);
    
        // Load view untuk menampilkan laporan bulanan
        $this->load->view('cetak_laporan_bulanan', $data);
    }
    

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

	public function view_ppnpn($id_user)
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 7)) {

		$data['logbookbulanan'] = $this->m_logbookbulanan->get_all_logbookbulanan_by_id_user($id_user)->result_array();
		// $data['logbook1'] = $this->m_logbook->get_logbook_by_status1($id_user)->result_array();
		// $data['logbook2'] = $this->m_logbook->get_logbook_by_status2($id_user)->result_array();
		$data['ppnpn'] = $this->m_user->get_ppnpn_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['ppnpn_data'] = $this->m_user->get_ppnpn_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('ppnpn/logbookbulanan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function view_pegawai($id_user)
	{
		if ($this->session->userdata('logged_in') == true AND ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 4)) {

		$data['logbookbulanan'] = $this->m_logbookbulanan->get_all_logbookbulanan_by_id_user($id_user)->result_array();
		// $data['logbook1'] = $this->m_logbook->get_logbook_by_status1($id_user)->result_array();
		// $data['logbook2'] = $this->m_logbook->get_logbook_by_status2($id_user)->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$this->load->view('pegawai/logbookbulanan', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}

	// public function proses_logbook_harian() {
    //     if ($this->session->userdata('logged_in') == true && ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 7)) {
    //         $id_user = $this->input->post("id_user");
	// 		$status = 1;
    //         $isi = $this->input->post("isi");
    //         $nama_laporan = $this->input->post("nama_laporan");

    //         // Konfigurasi untuk upload file
    //         $config['upload_path'] = './uploads/logbook/'; // Direktori penyimpanan file yang diunggah
    //         $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png'; // Jenis file yang diperbolehkan
    //         $config['max_size'] = 9000; // Ukuran maksimum file (dalam kilobita)
    //         $this->load->library('upload', $config);

    //         // Memeriksa apakah file berhasil diunggah
    //         if ($this->upload->do_upload('file')) {
    //             $file_data = $this->upload->data();
    //             $file = $file_data['file_name']; // Menggunakan nama file yang diunggah
    //             $id_log = md5($id_user . $isi . $file); // Memperbarui id_log dengan menggunakan nama file yang diunggah

    //             $id_status_log = 1;

    //             // Memasukkan data pengajuan logbook beserta nama file ke dalam database
    //             $hasil = $this->m_logbook->insert_data_logbook($id_log, $status, $id_user, $isi, $file, $id_status_log, $nama_laporan);

    //             if ($hasil) {
    //                 $this->session->set_flashdata('input', 'input');
    //             } else {
    //                 $this->session->set_flashdata('error_input', 'error_input');
    //             }
    //         } else {
    //             // Jika terjadi kesalahan saat mengunggah file
    //             $error = $this->upload->display_errors();
    //             $this->session->set_flashdata('upload_error', $error);
    //         }

    //         redirect('Logbook/view_pegawai/' . $this->session->userdata('id_user'));
    //     } 
    // }

	public function proses_logbook_bulanan() {
        if ($this->session->userdata('logged_in') == true && ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 7)) {
            $id_user = $this->input->post("id_user");
			$status = 2;
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
                $hasil = $this->m_logbookbulanan->insert_data_logbookbulanan($id_log, $status, $id_user, $isi, $file, $id_status_log, $nama_laporan);

                if ($hasil) {
                    $this->session->set_flashdata('input', 'input');
                } else {
                    $this->session->set_flashdata('error_input', 'error_input');
                }
            } else {
                // Jika terjadi kesalahan saat mengunggah file
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
            }

            redirect('Logbookbulanan/view_ppnpn/' . $this->session->userdata('id_user'));
        } 
    }

    public function get_logbook_by_date_range($start_date, $end_date) {
        $this->db->select('*');
        $this->db->from('logbookbulanan');
        $this->db->where('tgl_diajukan >=', $start_date);
        $this->db->where('tgl_diajukan <=', $end_date);
        return $this->db->get();
    }

    public function get_monthly_logbook_by_date_range($start_date, $end_date)
    {
        $this->db->select('*');
        $this->db->from('logbookbulanan');
        $this->db->join('user', 'logbookbulanan.id_user = user.id_user');
        $this->db->join('user_detail', 'user.id_user_detail = user_detail.id_user_detail');
        // $this->db->where('logbook.status', '2'); // Hanya logbook bulanan dengan status 2
        $this->db->where('logbookbulanan.tgl_diajukan >=', $start_date);
        $this->db->where('logbookbulanan.tgl_diajukan <=', $end_date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function print_logbook_report()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        $this->load->model('M_logbookbulanan');
        $data['logbookbulanan'] = $this->M_logbookbulanan->get_monthly_logbook_by_date_range($start_date, $end_date);

        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        $this->load->view('admin/components/print_logbook_report', $data);
    }

    public function filter_by_date() {
        // Ambil data dari form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        
        // Panggil method model untuk mengambil data berdasarkan rentang tanggal
        $data['logbook_data'] = $this->M_logbookbulanan->get_logbookbulanan_by_date_range($start_date, $end_date);

        // Tampilkan data yang telah difilter
        $this->load->view('admin/components/print_logbook_report', $data);
    }

	// public function proses_logbook_harian_ppnpn() {
    //     if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 7) {
    //         $id_user = $this->input->post("id_user");
	// 		$status = 1;
    //         $isi = $this->input->post("isi");
    //         $nama_laporan = $this->input->post("nama_laporan");

    //         // Konfigurasi untuk upload file
    //         $config['upload_path'] = './uploads/logbook/'; // Direktori penyimpanan file yang diunggah
    //         $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png'; // Jenis file yang diperbolehkan
    //         $config['max_size'] = 9000; // Ukuran maksimum file (dalam kilobita)
    //         $this->load->library('upload', $config);

    //         // Memeriksa apakah file berhasil diunggah
    //         if ($this->upload->do_upload('file')) {
    //             $file_data = $this->upload->data();
    //             $file = $file_data['file_name']; // Menggunakan nama file yang diunggah
    //             $id_log = md5($id_user . $isi . $file); // Memperbarui id_log dengan menggunakan nama file yang diunggah

    //             $id_status_log = 1;

    //             // Memasukkan data pengajuan logbook beserta nama file ke dalam database
    //             $hasil = $this->m_logbook->insert_data_logbook($id_log, $status, $id_user, $isi, $file, $id_status_log, $nama_laporan);

    //             if ($hasil) {
    //                 $this->session->set_flashdata('input', 'input');
    //             } else {
    //                 $this->session->set_flashdata('error_input', 'error_input');
    //             }
    //         } else {
    //             // Jika terjadi kesalahan saat mengunggah file
    //             $error = $this->upload->display_errors();
    //             $this->session->set_flashdata('upload_error', $error);
    //         }

    //         redirect('Logbook/view_ppnpn/' . $this->session->userdata('id_user'));
    //     } 
    // }

	public function proses_logbook_bulanan_ppnpn() {
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 7) {
            $id_user = $this->input->post("id_user");
			// $status = 2;
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

                if ($hasil) {
                    $this->session->set_flashdata('input', 'input');
                } else {
                    $this->session->set_flashdata('error_input', 'error_input');
                }
            } else {
                // Jika terjadi kesalahan saat mengunggah file
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
            }

            redirect('Logbookbulanan/view_ppnpn/' . $this->session->userdata('id_user'));
        } 
    }

    // public function get_logbook_by_date_range($start_date, $end_date) {
    //     $this->db->select('*');
    //     $this->db->from('logbook');
    //     $this->db->where('tgl_diajukan >=', $start_date);
    //     $this->db->where('tgl_diajukan <=', $end_date);
    //     return $this->db->get();
    // }

    // public function get_monthly_logbook_by_date_range($start_date, $end_date)
    // {
    //     $this->db->select('*');
    //     $this->db->from('logbook');
    //     $this->db->join('user', 'logbook.id_user = user.id_user');
    //     $this->db->join('user_detail', 'user.id_user_detail = user_detail.id_user_detail');
    //     $this->db->where('logbook.status', '2'); // Hanya logbook bulanan dengan status 2
    //     $this->db->where('logbook.tgl_diajukan >=', $start_date);
    //     $this->db->where('logbook.tgl_diajukan <=', $end_date);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // public function print_logbook_report()
    // {
    //     $start_date = $this->input->get('start_date');
    //     $end_date = $this->input->get('end_date');

    //     $this->load->model('M_logbook');
    //     $data['logbook2'] = $this->M_logbook->get_monthly_logbook_by_date_range($start_date, $end_date);

    //     $data['start_date'] = $start_date;
    //     $data['end_date'] = $end_date;

    //     $this->load->view('admin/components/print_logbook_report', $data);
    // }


    // public function cetak_rekap_nilai_logbook() {
    //     // Ambil data logbook bulanan dengan status 2 (diajukan)
    //     $logbook2 = $this->m_logbook->get_all_logbook_by_status2()->result_array();
    
    //     // Load view untuk halaman cetak rekap nilai logbook bulanan
    //     $this->load->view('admin/cetak_rekap_logbook_bulanan', array('logbook2' => $logbook2));
    // }
    
    // public function filter_logbook_by_date_range() {
    //     // Ambil rentang tanggal dari form
    //     $start_date = $this->input->post('start_date');
    //     $end_date = $this->input->post('end_date');
    
    //     // Ambil data logbook berdasarkan rentang tanggal
    //     $logbook_filtered = $this->m_logbook->get_logbook_by_date_range($start_date, $end_date)->result_array();
    
    //     // Load view untuk menampilkan data logbook berdasarkan rentang tanggal
    //     $this->load->view('admin/logbook_filtered', array('logbook_filtered' => $logbook_filtered));
    // }
    
    // public function cetak_laporan_by_date_range() {
    //     // Ambil rentang tanggal dari form
    //     $start_date = $this->input->post('start_date');
    //     $end_date = $this->input->post('end_date');
    
    //     // Ambil data logbook berdasarkan rentang tanggal
    //     $logbook_filtered = $this->m_logbook->get_logbook_by_date_range($start_date, $end_date)->result_array();
    
    //     // Load view untuk cetak laporan berdasarkan rentang tanggal
    //     $this->load->view('admin/cetak_laporan_logbook', array('logbook_filtered' => $logbook_filtered));
    // }


	public function hapus_logbookbulanan()
	{

		$id_log = $this->input->post("id_log");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_logbookbulanan->delete_logbookbulanan($id_log);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Logbookbulanan/view_ppnpn/'.$id_user);
	}

	public function proses_logbook_s() {
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

                if ($hasil) {
                    $this->session->set_flashdata('input', 'input');
                } else {
                    $this->session->set_flashdata('error_input', 'error_input');
                }
            } else {
                // Jika terjadi kesalahan saat mengunggah file
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
            }

            redirect('Logbookbulanan/logbook_s/' . $this->session->userdata('id_user'));
        } 
    }
	
	public function hapus_logbook_s()
	{

		$id_log = $this->input->post("id_log");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_logbookbulanan->delete_logbookbulanan($id_log);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Logbookbulanan/logbook_s/'.$id_user);
	}

	public function hapus_logbookbulanan_admin()
	{

		$id_log = $this->input->post("id_log");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_logbookbulanan->delete_logbookbulanan($id_log);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_hapus','eror_hapus');
		}else{
			$this->session->set_flashdata('hapus','hapus');
		}

		redirect('Logbookbulanan/view_admin');
	}

	public function edit_logbookbulanan_admin()
	{
    $id_log = $this->input->post("id_log");
    $isi = $this->input->post("isi");
    $nama_laporan = $this->input->post("nama_laporan");
    $tgl_diajukan = $this->input->post("tgl_diajukan");
    
    // Cek apakah ada file yang diunggah
    if (!empty($_FILES['file']['name'])) {
        // Konfigurasi untuk upload file
        $config['upload_path'] = './uploads/logbook/'; // Direktori penyimpanan file yang diunggah
        $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls'; // Jenis file yang diperbolehkan
        $config['max_size'] = 2048; // Ukuran maksimum file (dalam kilobita)
        $this->load->library('upload', $config);

        // Memeriksa apakah file berhasil diunggah
        if ($this->upload->do_upload('file')) {
            $file_data = $this->upload->data();
            $file = $file_data['file_name']; // Menggunakan nama file yang diunggah
        } else {
            // Jika terjadi kesalahan saat mengunggah file
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('upload_error', $error);
            redirect('Logbookbulanan/view_admin');
        }
    } else {
        // Jika tidak ada file yang diunggah, gunakan nilai yang ada
        $file = $this->input->post("file");
    }

    // Memperbarui data logbook, termasuk nama file jika ada perubahan
    $hasil = $this->m_logbookbulanan->update_logbookbulanan($isi, $nama_laporan, $tgl_diajukan, $file, $id_log);
    
    if ($hasil == false) {
        $this->session->set_flashdata('error_edit', 'error_edit');
    } else {
        $this->session->set_flashdata('edit', 'edit');
    }

    redirect('Logbookbulanan/view_admin');
}


	public function acc_logbookbulanan_ktu($id_status_log)
	{

		$id_log = $this->input->post("id_log");
		$id_user = $this->input->post("id_user");
		$nilai = $this->input->post("nilai");
        $verifikasi = $this->input->post("verifikasi");

		$hasil = $this->m_logbookbulanan->confirm_logbookbulanan($id_log, $id_status_log, $nilai, $verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('logbookbulanan/view_ktu/'.$id_user);
	}

	public function acc_logbookbulanan_super_admin($id_status_log)
	{

		$id_log = $this->input->post("id_log");
		$id_user = $this->input->post("id_user");
		$nilai = $this->input->post("nilai");
        $verifikasi = $this->input->post("verifikasi");

		$hasil = $this->m_logbookbulanan->confirm_logbookbulanan($id_log, $id_status_log, $nilai, $verifikasi);
		
		if($hasil==false){
			$this->session->set_flashdata('eror_input','eror_input');
		}else{
			$this->session->set_flashdata('input','input');
		}

		redirect('logbookbulanan/view_super_admin/'.$id_user);
	}
    
}