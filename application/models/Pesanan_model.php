<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_pesanan()
    {
        $this->db->select('tbo.*, tbc.package_name, tbc.price, tbc.image, tbu.name as user_name');
        $this->db->from('tb_order tbo');
        $this->db->join('tb_catalogues tbc', 'tbc.catalogue_id = tbo.catalogue_id');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbo.user_id');
        $this->db->order_by('tbo.order_id', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }
    // public function get_pesanan_by_id($id){
    //     $query = $this->db->get_where('tb_catalogues',array('catalogue_id' => $id));
    //     return $query->row();
    // }
    public function insert_pesanan($data)
    {
        return $this->db->insert('tb_order', $data);
    }
    public function update_pesanan($order_id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('order_id', $order_id);
        $this->db->update('tb_order');

        // Mengembalikan TRUE jika update berhasil
        return $this->db->affected_rows() > 0;
    }
    public function delete_pesanan($id)
    {
        $this->db->where('order_id', $id);
        $this->db->delete('tb_order');

        // Mengembalikan TRUE jika hapus berhasil
        return $this->db->affected_rows() > 0;
    }
}
