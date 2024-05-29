<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Get user data by ID
    public function get_user_data($user_id) {
        $this->db->where('id_user', $user_id);
        $query = $this->db->get('pegawai');
        return $query->row_array();
    }

    // Update user data
    public function update_user_data($user_id, $data) {
        $this->db->where('id_user', $user_id);
        return $this->db->update('pegawai', $data);
    }
}
?>
