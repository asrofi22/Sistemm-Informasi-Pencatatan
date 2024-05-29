<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Notifikasi_model');
    }

    public function index() {
        // Mengambil daftar notifikasi yang belum dibaca
        $data['notifikasi'] = $this->Notifikasi_model->getNotifikasiBelumDibaca();
        // Load view untuk menampilkan notifikasi
        $this->load->view('notifikasi', $data);
    }

    // Metode untuk menandai notifikasi sebagai sudah dibaca
    public function baca($id_notifikasi) {
        $this->Notifikasi_model->setNotifikasiDibaca($id_notifikasi);
        redirect('notifikasi'); // Redirect kembali ke halaman notifikasi
    }

}
