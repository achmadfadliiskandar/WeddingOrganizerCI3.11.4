<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Katalog_model $katalog_model
 * @property CI_Form_validation $form_validation
 * @property CI_Upload $upload
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('katalog_model');
        $this->load->library(array('form_validation', 'upload', 'session'));
        $this->load->helper(array('form', 'url', 'date'));
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
        $data_to_send_to_view['getAllKatalog'] = $this->katalog_model->get_all_katalog()->result();
        $datamaster['content'] = $this->load->view('admin/katalog/index', $data_to_send_to_view, TRUE);
        $datamaster['title'] = 'Data Katalog';
        $datamaster['title1'] = 'Katalog';
        $this->load->view('admin/TemplatesAdmin/master', $datamaster);
    }

    public function tambah()
    {
        $datamaster['content'] = $this->load->view('admin/katalog/tambah', '', TRUE);
        $datamaster['title'] = 'Tambah Katalog';
        $datamaster['title1'] = 'Katalog';
        $this->load->view('admin/TemplatesAdmin/master', $datamaster);
    }

    public function tambahData()
    {
        // Aturan Validasi untuk data form
        $this->form_validation->set_rules('package_name', 'Nama Paket', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('status_publish', 'Status Publish', 'required|in_list[Y,N]');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi GAGAL, tampilkan kembali form dengan pesan error
            $this->tambah();
        } else {
            $image_name = 'default_image.png';
            $upload_failed = false;

            if (!empty($_FILES['image']['name'])) {
                $config['upload_path'] = './assets/files/katalog/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 0;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {
                    $upload_failed = true;
                    $this->session->set_flashdata('error_upload', $this->upload->display_errors());
                    $this->tambah();
                } else {
                    $upload_data = $this->upload->data();
                    $image_name = $upload_data['file_name'];
                }
            }

            if (!$upload_failed) {
                $data = array(
                    'image' => $image_name,
                    'package_name' => $this->input->post('package_name'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),
                    'status_publish' => $this->input->post('status_publish'),
                    'user_id' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                );

                $this->katalog_model->insert_katalog($data);

                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                redirect('AdminController/katalog');
            }
        }
    }
    public function edit($id)
    {
        // Ambil Data Katalog Dengan ID
        $data_to_send_to_view['katalog'] = $this->katalog_model->get_katalog_by_id($id);
        // Jika data ditemukan, tampilkan form edit
        if ($data_to_send_to_view['katalog']) {
            $datamaster['content'] = $this->load->view('admin/katalog/edit', $data_to_send_to_view, TRUE);
            $datamaster['title'] = 'Edit Katalog';
            $datamaster['title1'] = 'Katalog';
            $this->load->view('admin/TemplatesAdmin/master', $datamaster);
        } else {
            // Jika data tidak ditemukan, arahkan kembali
            show_404();
        }
    }
    public function updateData()
    {
        $this->form_validation->set_rules('package_name', 'Nama Paket', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('status_publish', 'Status Publish', 'required|in_list[Y,N]');
        // Ambil ID dari form
        $catalogue_id = $this->input->post('catalogue_id');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form edit
            $this->edit($catalogue_id);
        } else {
            // Ambil nama file lama dari database
            $old_image = $this->katalog_model->get_katalog_by_id($catalogue_id)->image;

            // Konfigurasi unggahan file baru
            $config['upload_path'] = './assets/files/katalog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 5120;

            $this->upload->initialize($config);

            $image_name = $old_image; // Default: gunakan nama gambar lama

            if ($this->upload->do_upload('image')) {
                // Jika unggahan berhasil, hapus gambar lama
                if ($old_image != 'default_image.png') {
                    unlink($config['upload_path'] . $old_image);
                }
                $upload_data = $this->upload->data();
                $image_name = $upload_data['file_name'];
            }

            // Kumpulkan data untuk diperbarui
            $data = array(
                'image' => $image_name,
                'package_name' => $this->input->post('package_name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'status_publish' => $this->input->post('status_publish'),
                'created_at' => date('Y-m-d H:i:s')
            );

            // Perbarui data di database
            $this->katalog_model->update_katalog($catalogue_id, $data);

            $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
            redirect('AdminController/katalog');
        }
    }
    public function hapus($id)
    {
        // Pastikan ID tidak kosong
        if (empty($id)) {
            redirect('AdminController/katalog');
        }

        // Panggil fungsi hapus dari model
        $this->katalog_model->delete_katalog($id);

        // Set pesan sukses menggunakan flashdata
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');

        // Arahkan kembali ke halaman katalog
        redirect('AdminController/katalog');
    }
}
