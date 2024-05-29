<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_logbookbulanan extends CI_Model
{

    public function get_all_logbookbulanan()
    {
        $hasil = $this->db->query('SELECT * FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user ORDER BY user.nama_lengkap ASC');
        return $hasil;
    }

    public function get_logbookbulanan_by_date_range($start_date, $end_date)
    {
        $this->db->select('*');
        $this->db->from('logbookbulanan');
        $this->db->join('user', 'logbookbulanan.id_user = user.id_user');
        $this->db->where('logbookbulanan.tgl_diajukan >=', $start_date);
        $this->db->where('logbookbulanan.tgl_diajukan <=', $end_date);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_logbookbulanan_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user WHERE logbookbulanan.id_user='$id_user'");
        return $hasil;
    }

    public function get_all_logbookbulanan_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user WHERE logbookbulanan.id_user='$id_user' AND logbookbulanan.id_status_log='2' ORDER BY logbookbulanan.tgl_diajukan DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_logbookbulanan_by_id_log($id_log)
    {
        $hasil = $this->db->query("SELECT * FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user WHERE logbookbulanan.id_log='$id_log'");
        return $hasil;
    }

    public function insert_data_logbookbulanan($id_log, $id_user, $isi, $file, $id_status_log, $nama_laporan)
    {
        $this->db->trans_start();

        $data = array(
            'id_log' => $id_log,
            'id_user' => $id_user,
            'isi' => $isi,
            'tgl_diajukan' => date('Y-m-d H:i:s'),
            'file' => $file,
            'id_status_log' => $id_status_log,
            'nama_laporan' => $nama_laporan
        );

        $this->db->insert('logbookbulanan', $data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function delete_logbookbulanan($id_log)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM logbookbulanan WHERE id_log='$id_log'");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function update_logbookbulanan($isi, $nama_laporan, $tgl_diajukan, $file, $id_log)
    {
        $this->db->trans_start();

        $data = array(
            'isi' => $isi,
            'nama_laporan' => $nama_laporan,
            'tgl_diajukan' => $tgl_diajukan,
            'file' => $file
        );

        $this->db->where('id_log', $id_log);
        $this->db->update('logbookbulanan', $data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function confirm_logbookbulanan($id_log, $id_status_log, $nilai)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE logbookbulanan SET id_status_log='$id_status_log', nilai='$nilai' WHERE id_log='$id_log'");
        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function count_all_logbookbulanan()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user');
        return $hasil->row()->total_logbookbulanan;
    }

    public function get_logbookbulanan_by_status($status)
    {
        $hasil = $this->db->query("SELECT * FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user WHERE logbookbulanan.id_status_log='$status'");
        return $hasil;
    }

    public function get_logbookbulanan_by_date_range1($start_date, $end_date)
    {
        $hasil = $this->db->query("SELECT * FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user WHERE logbookbulanan.tgl_diajukan BETWEEN '$start_date' AND '$end_date'");
        return $hasil;
    }

    public function count_all_logbookbulanan_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan JOIN user ON logbookbulanan.id_user = user.id_user WHERE logbookbulanan.id_user='$id_user'");
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_all_logbookbulanan_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan WHERE id_status_log=2');
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_all_logbookbulanan_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan WHERE id_status_log=2 AND id_user='$id_user'");
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_all_logbookbulanan_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan WHERE id_status_log=1');
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_all_logbookbulanan_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan WHERE id_status_log=1 AND id_user='$id_user'");
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_all_logbookbulanan_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan WHERE id_status_log=3');
        return $hasil->row()->total_logbookbulanan;
    }

    public function count_all_logbookbulanan_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_log) as total_logbookbulanan FROM logbookbulanan WHERE id_status_log=3 AND id_user='$id_user'");
        return $hasil->row()->total_logbookbulanan;
    }
}

