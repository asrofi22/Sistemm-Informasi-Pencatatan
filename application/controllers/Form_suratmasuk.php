<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_suratmasuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_suratmasuk');
        $this->load->model('m_user');
        $this->load->model('m_jenis_kelamin');
    }

    public function view_sekretariat() {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 6) {
            $data['suratmasuk'] = $this->m_suratmasuk->get_all_suratmasuk()->result_array();
            $this->load->view('sekretariat/form_surat_masuk', $data);
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

                if ($hasil == false) {
                    $this->session->set_flashdata('eror_input', 'eror_input');
                    redirect('Form_suratmasuk/view_sekretariat');
                } else {
                    $this->session->set_flashdata('input', 'input');
                    redirect('suratmasuk/view_sekretariat/'.$id_user);
                }
    
                // Arahkan pengguna ke tampilan formulir dengan data yang dimasukkan
                redirect('Form_suratmasuk/view_sekretariat');
            }   else {
                $this->session->set_flashdata('login_err', 'login_err');
                redirect('Login/index');
            } 
        }
    }
}
