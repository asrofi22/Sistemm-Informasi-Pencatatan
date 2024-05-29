<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_suratmasuk');
        $this->load->model('m_user');
        $this->load->model('m_jenis_kelamin');
    }

    public function view_super_admin() {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
            $data['suratmasuk'] = $this->m_suratmasuk->get_all_suratmasuk()->result_array();
            $this->load->view('super_admin/suratmasuk', $data);
        } else {
            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');
        }
    }

    public function view_admin() {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
            $data['suratmasuk'] = $this->m_suratmasuk->get_all_suratmasuk()->result_array();
            $this->load->view('admin/suratmasuk', $data);
        } else {
            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');
        }
    }

    public function view_ktu() {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 5) {
            $data['suratmasuk'] = $this->m_suratmasuk->get_all_suratmasuk()->result_array();
            $this->load->view('ktu/suratmasuk', $data);
        } else {
            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');
        }
    }

    public function view_pegawai() {
        $allowed_levels = array(1, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18);

        // Check if the user is logged in and has the required user level
        if ($this->session->userdata('logged_in') == true && in_array($this->session->userdata('id_user_level'), $allowed_levels)) {            $data['suratmasuk'] = $this->m_suratmasuk->get_all_suratmasuk()->result_array();
            $this->load->view('pegawai/suratmasuk', $data);
        } else {
            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');
        }
    }

    public function view_sekretariat() {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 6) {
            $data['suratmasuk'] = $this->m_suratmasuk->get_all_suratmasuk()->result_array();
            $this->load->view('sekretariat/suratmasuk', $data);
        } else {
            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');
        }
    }

    public function proses_suratmasuk() {
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 6) {
            $id_user = $this->input->post("id_user");
            $sifat = implode(",", $this->input->post("sifat"));
            $indeks = $this->input->post("indeks");
            $perihal = $this->input->post("perihal");
            $no_surat = $this->input->post("no_surat");
            $asal_surat = $this->input->post("asal_surat");
            $tgl_surat = $this->input->post("tgl_surat");
            $tgl_diterima = $this->input->post("tgl_diterima");

            $config['upload_path'] = './uploads/suratmasuk/';
            $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls|jpg|jpeg|png';
            $config['max_size'] = 9000;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $file_data = $this->upload->data();
                $file = $file_data['file_name'];
                $id_suratmasuk = md5($id_user . $indeks . $file);

                $id_status_surat = 1;

                $hasil = $this->m_suratmasuk->insert_data_suratmasuk($id_suratmasuk, $id_user, $sifat, $indeks, $perihal, $no_surat, $asal_surat, $tgl_surat, $tgl_diterima, $file, $id_status_surat);

                if ($hasil) {
                    $this->session->set_flashdata('input', 'input');
                } else {
                    $this->session->set_flashdata('error_input', 'error_input');
                }
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('upload_error', $error);
            }

            redirect('Suratmasuk/view_sekretariat/' . $this->session->userdata('id_user'));
        } 
    }

    public function hapus_suratmasuk() {
        $id_suratmasuk = $this->input->post("id_suratmasuk");
        $id_user = $this->input->post("id_user");

        $hasil = $this->m_suratmasuk->delete_suratmasuk($id_suratmasuk);

        if($hasil==false){
            $this->session->set_flashdata('eror_hapus','eror_hapus');
        }else{
            $this->session->set_flashdata('hapus','hapus');
        }

        redirect('Suratmasuk/view_sekretariat/'.$id_user);
    }

    public function hapus_suratmasuk_admin() {
        $id_suratmasuk = $this->input->post("id_suratmasuk");
        $id_user = $this->input->post("id_user");

        $hasil = $this->m_suratmasuk->delete_suratmasuk($id_suratmasuk);

        if($hasil==false){
            $this->session->set_flashdata('eror_hapus','eror_hapus');
        }else{
            $this->session->set_flashdata('hapus','hapus');
        }

        redirect('Suratmasuk/view_admin/');
    }

    public function acc_suratmasuk_admin($id_status_surat) {
        $id_suratmasuk = $this->input->post("id_suratmasuk");
        $id_user = $this->input->post("id_user");

        $diteruskan = $this->input->post('diteruskan');
        $diteruskan_str = !empty($diteruskan) ? implode(", ", $diteruskan) : '';

        $isi_disposisi = $this->input->post('isi_disposisi');
        $isi_disposisi_str = !empty($isi_disposisi) ? implode(", ", $isi_disposisi) : '';

        $catatan = $this->input->post("catatan");

        $hasil = $this->m_suratmasuk->confirm_suratmasuk($id_suratmasuk, $id_status_surat, $diteruskan_str, $isi_disposisi_str, $catatan);

        if($hasil==false){
            $this->session->set_flashdata('eror_input','eror_input');
        }else{
            $this->session->set_flashdata('input','input');
        }

        redirect('Suratmasuk/view_admin/');
    }

    public function acc_suratmasuk_super_admin($id_status_surat) {
        $id_suratmasuk = $this->input->post("id_suratmasuk");
        $id_user = $this->input->post("id_user");

        $diteruskan = $this->input->post('diteruskan');
        $lainnya = $this->input->post('lainnya');

        if (!empty($lainnya)) {
            $diteruskan[] = $lainnya;
        }

        $diteruskan_str = !empty($diteruskan) ? implode(", ", $diteruskan) : '';

        $isi_disposisi = $this->input->post('isi_disposisi');
        $isi_disposisi_str = !empty($isi_disposisi) ? implode(", ", $isi_disposisi) : '';

        $catatan = $this->input->post("catatan");

        $hasil = $this->m_suratmasuk->confirm_suratmasuk($id_suratmasuk, $id_status_surat, $diteruskan_str, $isi_disposisi_str, $catatan);

        if($hasil==false){
            $this->session->set_flashdata('eror_input','eror_input');
        }else{
            $this->session->set_flashdata('input','input');
        }

        redirect('Suratmasuk/view_super_admin/'.$id_user);
    }
}
