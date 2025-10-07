<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function verify_user($username, $password) {
        // Ambil data user dari database berdasarkan username
        $query = $this->db->get_where('tb_users', array('username' => $username));
        $user = $query->row();

        // Jika user ditemukan, cek passwordnya
        if ($user && password_verify($password, $user->password)) {
            return $user; // Kembalikan objek user jika berhasil
        }
        
        return FALSE; // Jika gagal
    }
}