<?php

class M_Perbaikanbmn extends CI_Model
{
    public function get_all_perbaikanbmn()
    {
        $hasil = $this->db->query('SELECT * FROM perbaikanbmn JOIN user ON perbaikanbmn.id_user = user.id_user ORDER BY perbaikanbmn.tgl_diajukan DESC');
        return $hasil;
    }

    public function get_all_perbaikanbmn_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM perbaikanbmn JOIN user ON perbaikanbmn.id_user = user.id_user WHERE perbaikanbmn.id_user='$id_user'");
        return $hasil;
    }

    public function get_all_perbaikanbmn_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM perbaikanbmn JOIN user ON perbaikanbmn.id_user = user.id_user WHERE perbaikanbmn.id_user='$id_user' AND perbaikanbmn.id_status_perbaikanbmn='2' ORDER BY perbaikanbmn.tgl_diajukan DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_perbaikanbmn_by_id_perbaikanbmn($id_perbaikanbmn)
    {
        $hasil = $this->db->query("SELECT * FROM perbaikanbmn JOIN user ON perbaikanbmn.id_user = user.id_user WHERE perbaikanbmn.id_perbaikanbmn='$id_perbaikanbmn'");
        return $hasil;
    }

    public function insert_data_perbaikanbmn($id_perbaikanbmn, $id_user, $nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_status_perbaikanbmn, $id_status_perbaikan)
    {
        $this->db->trans_start();
        $this->db->query("INSERT INTO perbaikanbmn(id_perbaikanbmn, id_user, nama_brg, spesifikasi_brg, lokasi_brg, kerusakan, tgl_diajukan, id_status_perbaikanbmn, id_status_perbaikan) VALUES ('$id_perbaikanbmn','$id_user','$nama_brg', '$spesifikasi_brg', '$lokasi_brg', '$kerusakan', '$tgl_diajukan', '$id_status_perbaikanbmn', $id_status_perbaikan)");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_perbaikanbmn($id_perbaikanbmn)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM perbaikanbmn WHERE id_perbaikanbmn='$id_perbaikanbmn'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_perbaikanbmn($nama_brg, $spesifikasi_brg, $lokasi_brg, $kerusakan, $tgl_diajukan, $id_perbaikanbmn)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE perbaikanbmn SET nama_brg='$nama_brg', spesifikasi_brg='$spesifikasi_brg', lokasi_brg='$lokasi_brg', kerusakan='$kerusakan', tgl_diajukan='$tgl_diajukan' WHERE id_perbaikanbmn='$id_perbaikanbmn'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function confirm_perbaikanbmn($id_perbaikanbmn, $id_status_perbaikanbmn, $alasan_verifikasi)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE perbaikanbmn SET id_status_perbaikanbmn='$id_status_perbaikanbmn', alasan_verifikasi='$alasan_verifikasi' WHERE id_perbaikanbmn='$id_perbaikanbmn'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function confirm_status_perbaikan($id_perbaikanbmn, $id_status_perbaikan, $estimasi, $verifikasi_kaurrt)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE perbaikanbmn SET id_status_perbaikan='$id_status_perbaikan', estimasi='$estimasi', verifikasi_kaurrt='$verifikasi_kaurrt' WHERE id_perbaikanbmn='$id_perbaikanbmn'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function edit_status_perbaikan($id_perbaikanbmn, $id_status_perbaikan)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE perbaikanbmn SET id_status_perbaikan='$id_status_perbaikan' WHERE id_perbaikanbmn='$id_perbaikanbmn'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function count_all_perbaikanbmn()
    {
        $hasil = $this->db->query('SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn JOIN user ON perbaikanbmn.id_user = user.id_user');
        return $hasil;
    }

    public function count_all_perbaikanbmn_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_user='$id_user'");
        return $hasil;
    }

    public function count_all_perbaikanbmn_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_status_perbaikanbmn=2');
        return $hasil;
    }

    public function count_all_perbaikanbmn_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_status_perbaikanbmn=2 AND id_user='$id_user'");
        return $hasil;
    }
    
    public function count_all_perbaikanbmn_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_status_perbaikanbmn=1');
        return $hasil;
    }
    
    public function count_all_perbaikanbmn_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_status_perbaikanbmn=1 AND id_user='$id_user'");
        return $hasil;
    }
    
    public function count_all_perbaikanbmn_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_status_perbaikanbmn=3');
        return $hasil;
    }
    
    public function count_all_perbaikanbmn_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_perbaikanbmn) as total_perbaikanbmn FROM perbaikanbmn WHERE id_status_perbaikanbmn=3 AND id_user='$id_user'");
        return $hasil;
    }
    
    // Fungsi untuk mengubah status perbaikan menjadi "belum dikerjakan" setelah disetujui oleh admin super
    public function update_status_perbaikan($id_perbaikanbmn, $id_status_perbaikan)
    {
        $this->db->trans_start();
        $this->db->query("UPDATE perbaikanbmn SET id_status_perbaikan='$id_status_perbaikan' WHERE id_perbaikanbmn='$id_perbaikanbmn'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }
    
    }
    