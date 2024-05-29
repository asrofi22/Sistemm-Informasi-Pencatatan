<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('m_izin');
        $this->load->model('m_logbook');
    }
    public function surat_izin_pdf($id_izin){

        $data['izin'] = $this->m_izin->get_all_izin_by_id_izin($id_izin)->result_array();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('Letter', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "surat-izin.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    }

    public function rekap_logbook_pdf($id_log){

        $data['logbook2'] = $this->m_logbook->get_all_logbook_by_status2($id_log)->result_array();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('Letter', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->filename = "laporan_logbook.pdf";
        $this->pdf->load_view('laporan_pdf1', $data);
    }
    
}