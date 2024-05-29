<?php

class M_user extends CI_Model
{

    public function get_all_pegawai()
    {
        $hasil = $this->db->query('SELECT * FROM user WHERE id_user_level IN (1, 2, 3, 4, 5, 6, 7 , 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18) ORDER BY username ASC');
        return $hasil;
    }

    public function get_all_kaurrt()
    {
        $hasil = $this->db->query('SELECT * FROM user WHERE id_user_level = 4');
        return $hasil;
    }

    public function get_all_sekretariat()
    {
        $hasil = $this->db->query('SELECT * FROM user WHERE id_user_level = 6');
        return $hasil;
    }

    public function count_all_pegawai()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user WHERE id_user_level IN (1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18)');
        return $hasil;
    }

    public function count_all_admin()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user WHERE id_user_level = 2');
        return $hasil;
    }

    public function get_all_admin()
    {
        $hasil = $this->db->query('SELECT * FROM user WHERE id_user_level = 2');
        return $hasil;
    }

    public function get_pegawai_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
        return $hasil;
    }

    public function get_ppnpn_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
        return $hasil;
    }

    public function get_kaurrt_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
        return $hasil;
    }

    public function get_sekretariat_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
        return $hasil;
    }

    public function cek_login($username)
    {
        $hasil = $this->db->query("SELECT * FROM user WHERE username='$username'");
        return $hasil;
    }

    public function pendaftaran_user($id, $username, $email, $password, $id_user_level)
    {
       $this->db->trans_start();

       $this->db->query("INSERT INTO user(id_user, username, password, email, id_user_level) VALUES ('$id','$username','$password','$email','$id_user_level')");

       $this->db->trans_complete();
       return $this->db->trans_status();
    }

    public function update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $nip, $masa_kerja, $jabatan, $unit_kerja)
    {
       $this->db->trans_start();
       $this->db->query("UPDATE user SET nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin', no_telp='$no_telp', nip='$nip', masa_kerja='$masa_kerja', jabatan='$jabatan', unit_kerja='$unit_kerja' WHERE id_user='$id'");

       $this->db->trans_complete();
       return $this->db->trans_status();
    }

    public function insert_pegawai($username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(username,password,email,id_user_level) VALUES ('$username','$password','$email','$id_user_level')");
        $insert_id = $this->db->insert_id();

        $this->db->query("UPDATE user SET nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin', no_telp='$no_telp' WHERE id_user='$insert_id'");

        $this->db->trans_complete();
        return $this->db->trans_status();
    }


    public function update_pegawai($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp)
    {
       $this->db->trans_start();

       $this->db->query("UPDATE user SET username='$username', password='$password', email='$email', id_user_level='$id_user_level', nama_lengkap='$nama_lengkap', id_jenis_kelamin='$id_jenis_kelamin', no_telp='$no_telp' WHERE id_user='$id'");

       $this->db->trans_complete();
       return $this->db->trans_status();
    }

    public function delete_pegawai($id)
    {
       $this->db->trans_start();

       $this->db->query("DELETE FROM user WHERE id_user='$id'");

       $this->db->trans_complete();
       return $this->db->trans_status();
    }

    public function update_user($id, $username, $password)
    {
       $this->db->trans_start();

       $this->db->query("UPDATE user SET username='$username', password='$password' WHERE id_user='$id'");

       $this->db->trans_complete();
       return $this->db->trans_status();
    }

    public function delete_admin($id)
    {
       $this->db->trans_start();

       $this->db->query("DELETE FROM user WHERE id_user='$id'");

       $this->db->trans_complete();
       return $this->db->trans_status();
    }

}
