<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Session $session
 */

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        
        // PERBAIKAN: Memuat library session
        $this->load->library('session');
        
        // Cek apakah user sudah login
        if ($this->session->userdata('logged_in') !== TRUE) {
            // Jika belum, arahkan mereka ke halaman login dan berikan pesan
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect('admin/login');
        }
    }	

	public function index()
	{
        $datamaster['content'] = $this->load->view('admin/dashboard', '', TRUE);
        $datamaster['title'] = 'Dashboard Admin';
		$datamaster['title1'] = 'Dashboard';
        $this->load->view('admin/TemplatesAdmin/master', $datamaster);
	}

}
