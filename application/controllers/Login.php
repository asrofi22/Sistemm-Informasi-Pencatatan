<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function proses()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $user = $this->m_user->cek_login($username);

        if($user->num_rows() > 0) {
            $user = $user->row_array();

            if($user['password'] == $password) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('id_user', $user['id_user']);
                $this->session->set_userdata('username', $user['username']);
                $this->session->set_userdata('id_user_level', $user['id_user_level']);
                $this->session->set_userdata('nama_lengkap', $user['nama_lengkap']);

                $redirect_url = '';
                switch($user['id_user_level']) {
                    case 1:
                    case 8:
                    case 9:
                    case 10:
                    case 11:
                    case 12:
                    case 13:
                    case 14:
                    case 15:
                    case 16:
                    case 17:
                    case 18:
                        $redirect_url = 'Dashboard/dashboard_pegawai';
                        break;
                    case 2:
                        $redirect_url = 'Dashboard/dashboard_admin';
                        break;
                    case 3:
                        $redirect_url = 'Dashboard/dashboard_super_admin';
                        break;
                    case 4:
                        $redirect_url = 'Dashboard/dashboard_kaurrt';
                        break;
                    case 5:
                        $redirect_url = 'Dashboard/dashboard_ktu';
                        break;
                    case 6:
                        $redirect_url = 'Dashboard/dashboard_sekretariat';
                        break;
                    case 7:
                        $redirect_url = 'Dashboard/dashboard_ppnpn';
                        break;
                    default:
                        $redirect_url = 'Login/index';
                        break;
                }

                echo json_encode(['status' => 'success', 'message' => 'Login berhasil', 'redirect_url' => base_url($redirect_url)]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Username atau password salah']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Username atau password salah']);
        }
        exit;
    }

    public function log_out()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('id_user');
        $this->session->set_flashdata('success_log_out', 'success_log_out');
        redirect('Login/index');
    }
}
