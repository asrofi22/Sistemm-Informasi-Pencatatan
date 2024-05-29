<?php

class M_logbook extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_logbookbulanan'); // Memuat model M_logbookbulanan
    }

    public function get_all_logbook()
    {
        $hasil = $this->db->query('SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user ORDER BY user.nama_lengkap ASC');
        return $hasil;
    }

    public function get_all_logbook_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.id_user='$id_user'");
        return $hasil;
    }

    // public function get_logbook_by_status1($status)
    // {
    //     $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.status='1'");
    //     return $hasil;
    // }

    public function get_logbook_by_status1($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.id_user='$id_user' AND logbook.status='1'");
        return $hasil;
    }

    public function get_logbook_by_status2($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.id_user='$id_user' AND logbook.status='2'");
        return $hasil;
    }

    public function get_all_logbook_by_status1()
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.status='1'");
        return $hasil;
    }

    public function get_all_logbook_by_status2()
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.status='2'");
        return $hasil;
    }

    public function get_all_logbook_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.id_user='$id_user' AND logbook.id_status_log='2' ORDER BY logbook.tgl_diajukan DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_logbook_by_id_log($id_log)
    {
        $hasil = $this->db->query("SELECT * FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.id_log='$id_log'");
        return $hasil;
    }

    public function insert_data_logbook($id_log, $id_user, $isi, $file, $id_status_log, $nama_laporan)
    {
        $this->db->trans_start();

        $data = array(
            'id_log' => $id_log,
            'id_user' => $id_user,
            'isi' => $isi,
            'tgl_diajukan' => date('Y-m-d H:i:s'), // Menggunakan waktu sekarang
            'file' => $file,
            'id_status_log' => $id_status_log,
            'nama_laporan' => $nama_laporan
        );

        $this->db->insert('logbook', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status(); // Mengembalikan status transaksi
    }

    public function get_logbook_by_date_range($start_date, $end_date)
    {
        $this->db->select('*');
        $this->db->from('logbook');
        $this->db->join('user', 'logbook.id_user = user.id_user');
        $this->db->where('logbook.tgl_diajukan >=', $start_date);
        $this->db->where('logbook.tgl_diajukan <=', $end_date);
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function get_monthly_logbook_by_date_range($start_date, $end_date)
    // {
    //     $this->db->select('*');
    //     $this->db->from('logbook');
    //     $this->db->join('user', 'logbook.id_user = user.id_user');
    //     $this->db->where('logbook.tgl_diajukan >=', $start_date);
    //     $this->db->where('logbook.tgl_diajukan <=', $end_date);
    //     $this->db->where('logbook.status', '2');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function delete_logbook($id_log)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM logbook WHERE id_log='$id_log'");
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function update_logbook($isi, $nama_laporan, $tgl_diajukan, $file, $id_log)
    {
        $this->db->trans_start();

        $data = array(
            'isi' => $isi,
            'nama_laporan' => $nama_laporan,
            'tgl_diajukan' => $tgl_diajukan,
            'file' => $file
        );

        $this->db->where('id_log', $id_log);
        $this->db->update('logbook', $data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function confirm_logbook($id_log, $id_status_log, $nilai)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE logbook SET id_status_log='$id_status_log', nilai='$nilai' WHERE id_log='$id_log'");
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function count_all_logbook()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user');
        return $hasil->row()->total_logbook;
    }

    public function count_all_logbookbulanan()
    {
        $hasil = $this->M_logbookbulanan->count_all_logbookbulanan();
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_total_logbooks()
    {
        // Hitung total logbook
        $query1 = $this->db->query('SELECT COUNT(id_log) as total_logbook FROM logbook');
        $result1 = $query1->row()->total_logbook;

        // Hitung total logbookbulanan
        $query2 = $this->M_logbookbulanan->count_all_logbookbulanan();
        $result2 = $query2->row()->total_logbookbulanan;

        // Jumlahkan hasil
        $total_logbooks = $result1 + $result2;

        return $total_logbooks;
    }

    public function count_all_logbook_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE logbook.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_logbook_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE id_status_log=2');
        return $hasil;
    }

    public function count_all_logbook_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE id_status_log=2 AND logbook.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_logbook_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE id_status_log=1');
        return $hasil;
    }

    public function count_all_logbook_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE id_status_log=1 AND logbook.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_logbook_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE id_status_log=3');
        return $hasil;
    }

    public function count_all_logbook_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbook FROM logbook JOIN user ON logbook.id_user = user.id_user WHERE id_status_log=3 AND logbook.id_user='$id_user'");
        return $hasil;
    }
}
