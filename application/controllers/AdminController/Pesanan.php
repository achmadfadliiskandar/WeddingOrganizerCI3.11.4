<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Pesanan_model $pesanan_model
 * @property CI_Session $session
 */

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pesanan_model');
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
        $data_to_send_to_view['getAllPesanan'] = $this->pesanan_model->get_all_pesanan();
        $datamaster['content'] = $this->load->view('admin/pesanan/index', $data_to_send_to_view, TRUE);
        $datamaster['title'] = 'Data Katalog';
        $datamaster['title1'] = 'Katalog';
        $this->load->view('admin/TemplatesAdmin/master', $datamaster);
    }
    public function terima_pesanan($order_id)
    {
        // Pastikan order_id yang diterima valid
        if (!is_numeric($order_id)) {
            show_404();
        }

        // Muat model pesanan
        $this->load->model('pesanan_model');

        // Status yang akan diupdate
        $status = 'approved';

        // Panggil model untuk update status
        $result = $this->pesanan_model->update_pesanan($order_id, $status);

        // Beri umpan balik kepada pengguna
        if ($result) {
            $this->session->set_flashdata('success_message', 'Status pesanan berhasil diupdate menjadi Diterima.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal memperbarui status pesanan.');
        }

        // Redirect kembali ke halaman daftar pesanan
        redirect('AdminController/pesanan'); // Ganti dengan nama controller Anda
    }
    public function hapus_pesanan($order_id)
    {
        // Pastikan order_id yang diterima valid
        if (!is_numeric($order_id)) {
            show_404();
        }

        // Muat model pesanan
        $this->load->model('pesanan_model');

        // Panggil model untuk menghapus data
        $result = $this->pesanan_model->delete_pesanan($order_id);

        // Beri umpan balik kepada pengguna
        if ($result) {
            $this->session->set_flashdata('success_message', 'Data pesanan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menghapus data pesanan.');
        }

        // Redirect kembali ke halaman daftar pesanan
        redirect('AdminController/pesanan'); // Ganti dengan nama controller Anda
    }
}
