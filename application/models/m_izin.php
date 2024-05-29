<?php

class M_izin extends CI_Model
{
    public function get_all_izin()
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->order_by('user.nama_lengkap', 'ASC');
        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_all_izin_by_id_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('izin.id_user', $id_user);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_all_izin_first_by_id_user($id_user)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('izin.id_user', $id_user);
        $this->db->where('izin.id_status_izin', '2');
        $this->db->order_by('izin.tgl_diajukan', 'DESC');
        $this->db->limit(1);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_all_izin_by_id_izin($id_izin)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('izin.id_izin', $id_izin);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function insert_data_izin($id_izin, $id_user, $alasan, $mulai, $berakhir, $id_status_izin)
    {
        $data = [
            'id_izin' => $id_izin,
            'id_user' => $id_user,
            'tgl_diajukan' => date('Y-m-d H:i:s'),
            'alasan' => $alasan,
            'mulai' => $mulai,
            'berakhir' => $berakhir,
            'id_status_izin' => $id_status_izin,
        ];
        $this->db->trans_start();
        $this->db->insert('izin', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function get_izin_by_date_range($start_date, $end_date)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('izin.tgl_diajukan >=', $start_date);
        $this->db->where('izin.tgl_diajukan <=', $end_date);
        $hasil = $this->db->get();
        return $hasil->result_array();
    }

    public function delete_izin($id_izin)
    {
        $this->db->trans_start();
        $this->db->delete('izin', ['id_izin' => $id_izin]);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function update_izin($tgl_diajukan, $alasan, $mulai, $berakhir, $id_izin)
    {
        $data = [
            'tgl_diajukan' => $tgl_diajukan,
            'alasan' => $alasan,
            'mulai' => $mulai,
            'berakhir' => $berakhir,
        ];
        $this->db->trans_start();
        $this->db->where('id_izin', $id_izin);
        $this->db->update('izin', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function confirm_izin($id_izin, $id_status_izin, $alasan_verifikasi)
    {
        $data = [
            'id_status_izin' => $id_status_izin,
            'alasan_verifikasi' => $alasan_verifikasi,
        ];
        $this->db->trans_start();
        $this->db->where('id_izin', $id_izin);
        $this->db->update('izin', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function count_all_izin()
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_by_id($id_user)
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('izin.id_user', $id_user);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_acc()
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('id_status_izin', 2);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_acc_by_id($id_user)
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('id_status_izin', 2);
        $this->db->where('izin.id_user', $id_user);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_confirm()
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('id_status_izin', 1);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_confirm_by_id($id_user)
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('id_status_izin', 1);
        $this->db->where('izin.id_user', $id_user);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_reject()
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('id_status_izin', 3);
        $hasil = $this->db->get();
        return $hasil;
    }

    public function count_all_izin_reject_by_id($id_user)
    {
        $this->db->select('COUNT(id_izin) as total_izin');
        $this->db->from('izin');
        $this->db->join('user', 'izin.id_user = user.id_user');
        $this->db->where('id_status_izin', 3);
        $this->db->where('izin.id_user', $id_user);
        $hasil = $this->db->get();
        return $hasil;
    }
}
