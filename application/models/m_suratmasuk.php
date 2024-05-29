<?php

class M_suratmasuk extends CI_Model
{
    public function get_all_suratmasuk()
    {
        $hasil = $this->db->query('SELECT * FROM suratmasuk JOIN user ON suratmasuk.id_user = user.id_user ORDER BY user.nama_lengkap ASC');
        return $hasil;
    }

    public function get_all_suratmasuk_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM suratmasuk WHERE suratmasuk.id_user='$id_user'");
        return $hasil;
    }

    public function get_all_suratmasuk_first_by_id_user($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM suratmasuk WHERE suratmasuk.id_user='$id_user' AND suratmasuk.id_status_surat='2' ORDER BY suratmasuk.tgl_diterima DESC LIMIT 1");
        return $hasil;
    }

    public function get_all_suratmasuk_by_id_suratmasuk($id_suratmasuk)
    {
        $hasil = $this->db->query("SELECT * FROM suratmasuk WHERE suratmasuk.id_suratmasuk='$id_suratmasuk'");
        return $hasil;
    }

    public function get_all_suratmasuk_by_id_user_level($id_user_level)
    {
        $hasil = $this->db->query("SELECT * FROM suratmasuk WHERE suratmasuk.id_user_level = '$id_user_level'");
        return $hasil;
    }

    public function insert_data_suratmasuk($id_suratmasuk, $id_user, $sifat, $indeks, $perihal, $no_surat, $asal_surat, $tgl_surat, $tgl_diterima, $file, $id_status_surat)
    {
        $this->db->trans_start();

        $data = array(
            'id_suratmasuk' => $id_suratmasuk,
            'id_user' => $id_user,
            'sifat' => $sifat,
            'indeks' => $indeks,
            'perihal' => $perihal,
            'no_surat' => $no_surat,
            'asal_surat' => $asal_surat,
            'tgl_surat' => $tgl_surat,
            'tgl_diterima' => $tgl_diterima,
            'file' => $file,
            'id_status_surat' => $id_status_surat
        );

        $this->db->insert('suratmasuk', $data);
        
        $this->db->trans_complete();

        return $this->db->trans_status(); // Mengembalikan status transaksi
    }

    public function delete_suratmasuk($id_suratmasuk)
    {
        $this->db->trans_start();
        $this->db->query("DELETE FROM suratmasuk WHERE id_suratmasuk='$id_suratmasuk'");
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function update_suratmasuk($sifat, $indeks, $perihal, $no_surat, $asal_surat, $tgl_surat, $tgl_diterima, $file, $id_suratmasuk)
    {
        $this->db->trans_start();

        $data = array(
            "sifat" => $sifat,
            "indeks" => $indeks,
            "perihal" => $perihal,
            "no_surat" => $no_surat,
            "asal_surat" => $asal_surat,
            "tgl_surat" => $tgl_surat,
            "tgl_diterima" => $tgl_diterima,
            "file" => $file
        );

        $this->db->where('id_suratmasuk', $id_suratmasuk);
        $this->db->update('suratmasuk', $data);

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function confirm_suratmasuk($id_suratmasuk, $id_status_surat, $diteruskan, $isi_disposisi, $catatan)
    {
        $this->db->trans_start();

        $data = array(
            'id_status_surat' => $id_status_surat,
            'diteruskan' => $diteruskan,
            'isi_disposisi' => $isi_disposisi,
            'catatan' => $catatan
        );

        $this->db->where('id_suratmasuk', $id_suratmasuk);
        $this->db->update('suratmasuk', $data);

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function count_all_suratmasuk()
    {
        $hasil = $this->db->query('SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk JOIN user ON suratmasuk.id_user = user.id_user');
        return $hasil;
    }

    public function count_all_suratmasuk_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE suratmasuk.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_suratmasuk_acc()
    {
        $hasil = $this->db->query('SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE id_status_surat=2');
        return $hasil;
    }

    public function count_all_suratmasuk_acc_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE id_status_surat=2 AND suratmasuk.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_suratmasuk_confirm()
    {
        $hasil = $this->db->query('SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE id_status_surat=1');
        return $hasil;
    }

    public function count_all_suratmasuk_confirm_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE id_status_surat=1 AND suratmasuk.id_user='$id_user'");
        return $hasil;
    }

    public function count_all_suratmasuk_reject()
    {
        $hasil = $this->db->query('SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE id_status_surat=3');
        return $hasil;
    }

    public function count_all_suratmasuk_reject_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT COUNT(id_suratmasuk) as total_suratmasuk FROM suratmasuk WHERE id_status_surat=3 AND suratmasuk.id_user='$id_user'");
        return $hasil;
    }
}
