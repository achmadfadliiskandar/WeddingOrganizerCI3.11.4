<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Katalog_model $katalog_model
 * @property Pesanan_model $pesanan_model
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_URI $uri
 * @property CI_Session $session
 */


class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('katalog_model');
        $this->load->model('pesanan_model');
    }

    public function index()
    {
        $data = array(
            'getAllKatalog' => $this->katalog_model->get_all_katalog()->result(),
            'title' => 'JeWePe Wedding Organizer',
            'page' => 'landing/beranda'
        );
        $this->load->view('landing/template/sites', $data);
    }
    public function detail($id)
    {
        $data_to_send['katalog'] = $this->katalog_model->get_katalog_by_id($id);

        if ($data_to_send['katalog']) {
            // 1. Muat view konten (detail.php) dan simpan outputnya
            $datamaster['content'] = $this->load->view('landing/detailkatalog', $data_to_send, TRUE);

            // 2. Set data lain untuk master template
            $datamaster['title'] = $data_to_send['katalog']->package_name;
            $datamaster['page'] = 'landing/detailkatalog'; // Contoh

            // 3. Muat template master dan kirim semua data ke sana
            $this->load->view('landing/template/sites', $datamaster);
        } else {
            show_404();
        }
    }
    public function Orderadd()
    {
        // Get the catalogue_id from the third segment of the URL.
        $catalogue_id = $this->uri->segment(3);

        // Validate that the catalogue ID exists and is a number.
        if (!is_numeric($catalogue_id) || empty($catalogue_id)) {
            show_404();
        }

        // --- Ambil data lengkap dari database ---
        // PERBAIKAN: Load the model that handles catalog data
        $this->load->model('katalog_model');

        // PERBAIKAN: Get the full catalog data using the ID
        $katalog = $this->katalog_model->get_katalog_by_id($catalogue_id);

        // PERBAIKAN: Check if the catalog data was found
        if (!$katalog) {
            show_404(); // If not found, show a 404 page.
        }

        // --- Use a fixed user_id of 1 ---
        $user_id = 1;

        // Load necessary libraries and models.
        $this->load->library('form_validation');
        $this->load->model('pesanan_model');

        // Set validation rules for the form data.
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[60]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|max_length[16]');
        $this->form_validation->set_rules('wedding_date', 'Wedding Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            // PERBAIKAN: Pass the full $katalog object to the view
            $data['katalog'] = $katalog;
            $this->session->set_flashdata('error_message', 'Mohon isi semua data dengan lengkap.');
            redirect(base_url('beranda/detail/' . $catalogue_id));
        } else {
            $data = array(
                'catalogue_id'   => $catalogue_id,
                'name'           => $this->input->post('name'),
                'email'          => $this->input->post('email'),
                'phone_number'   => $this->input->post('phone_number'),
                'wedding_date'   => $this->input->post('wedding_date'),
                'status'         => 'requested',
                'user_id'        => $user_id,
            );
            if ($this->pesanan_model->insert_pesanan($data)) {
                $this->session->set_flashdata('success_message', 'Pesanan Anda berhasil dikirim!');
                redirect(base_url('beranda/detail/' . $catalogue_id)); // Redirect ke halaman detail katalog yang sama
            } else {
                $this->session->set_flashdata('error_message', 'Gagal mengirim pesanan. Silakan coba lagi.');
                redirect(base_url('beranda/detail/' . $catalogue_id)); // Redirect ke halaman detail katalog yang sama
            }
        }
    }
}
