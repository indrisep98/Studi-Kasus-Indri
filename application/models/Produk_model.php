<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $_table = "produk";

    public $id_produk;
    public $kode_barang;
    public $nama;
    public $harga;
    public $gambar = "default.jpg";
    public $deskripsi;

    public function rules()
    {
        return [
             ['field' => 'kode_barang',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

             ['field' => 'jenis',
            'label' => 'Jenis',
            'rules' => 'required'],

             ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_produk = uniqid();
        $this->kode_barang = $post["kode_barang"];
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        $this->gambar = $this->_uploadImage();
        $this->deskripsi = $post["deskripsi"];
         $this->jenis = $post["jenis"];
        $this->status = $post["status"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk = $post["id"];
         $this->kode_barang = $post["kode_barang"];
        $this->nama = $post["nama"];
        $this->harga = $post["harga"];
        if (!empty($_FILES["gambar"]["nama"])) {
             $this->gambar = $this->_uploadImage();
         } else {
            $this->gambar = $post["old_image"];
         }
        $this->deskripsi = $post["deskripsi"];
        $this->jenis = $post["jenis"];
        $this->status = $post["status"];
        $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }

    private function _uploadImage()
{
    $config['upload_path']          = './upload/produk/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id_produk;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

private function _deleteImage($id)
{
    $product = $this->getById($id);
    if ($product->gambar != "default.jpg") {
        $filename = explode(".", $product->gambar)[0];
        return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
    }
}

public function kode_barang(){
          $this->db->select('RIGHT(produk.kode_barang,2) as kode_barang', FALSE);
          $this->db->order_by('kode_barang','DESC');    
          $this->db->limit(1);    
          $query = $this->db->get('produk');  //cek dulu apakah ada sudah ada kode di tabel.    
          if($query->num_rows() <> 0){      
               //cek kode jika telah tersedia    
               $data = $query->row();      
               $kode_barang = intval($data->kode_barang) + 1; 
          }
          else{      
               $kode_barang = 1;  //cek jika kode belum terdapat pada table
          }
              $tgl=date('dmY'); 
              $batas = str_pad($kode_barang, 3, "0", STR_PAD_LEFT);    
              $kodetampil = "BR"."5".$tgl.$batas;  //format kode
              return $kodetampil;  
         }

}