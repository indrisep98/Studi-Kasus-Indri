<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{
    private $_table = "pemesanan";

    public $id_pemesanan;
    public $kode_pemesanan;
    public $no_meja;
    public $status;
    public $total_tagihan;

    public function rules()
    {
        return [
             ['field' => 'kode_pemesanan',
            'label' => 'Kode Pemesanan',
            'rules' => 'required'],

            ['field' => 'no_meja',
            'label' => 'No Meja',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required'],

            ['field' => 'total_tagihan',
            'label' => 'Total Tagihan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pemesanan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode_pemesanan = $post["kode_pemesanan"];
        $this->no_meja = $post["no_meja"];
        $this->status = $post["status"];
         $this->total_tagihan = $post["total_tagihan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pemesanan = $post["id_pemesanan"];
         $this->kode_pemesanan = $post["kode_pemesanan"];
        $this->no_meja = $post["no_meja"];
        $this->status = $post["status"];
        $this->total_tagihan = $post["total_tagihan"];
        $this->db->update($this->_table, $this, array('id_pemesanan' => $post['id_pemesanan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pemesanan" => $id));
    }


}