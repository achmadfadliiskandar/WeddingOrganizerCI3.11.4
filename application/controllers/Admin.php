<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property User_model $user_model
 * @property CI_Form_validation $form_validation
 * @property CI_Upload $upload
 * @property CI_Input $input
 * @property CI_Session $session
 */

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_model');
    }

    public function login() {
        // Tampilkan form login
        if ($this->session->userdata('logged_in') === TRUE) {
            // Jika user sudah login, arahkan mereka ke dashboard
            redirect('admin-dashboard'); 
        }
        // Tampilkan form login
        $this->load->view('admin/login');
    }

    public function authenticate() {
        // Atur aturan validasi form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman login
            $this->session->set_flashdata('error', 'Username dan password harus diisi.');
            redirect('admin/login');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Verifikasi user melalui model
            $user = $this->user_model->verify_user($username, $password);

            if ($user) {
                // Jika user ditemukan, simpan data ke session
                $session_data = array(
                    'user_id' => $user->user_id,
                    'username' => $user->username,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                // Redirect ke halaman dashboard
                redirect('admin-dashboard'); // Sesuaikan dengan nama controller dashboard Anda
            } else {
                // Jika login gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('admin/login');
            }
        }
    }

    public function logout() {
        // Hapus data dari session
        $this->session->unset_userdata(array('user_id', 'username', 'logged_in'));
        $this->session->sess_destroy();
        
        // Redirect ke halaman login
        redirect('admin/login');
    }
}