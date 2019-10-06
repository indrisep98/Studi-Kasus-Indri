<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pemesanan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pemesanan"] = $this->pemesanan_model->getAll();
        $this->load->view("pemesanan/list", $data);
    }

    public function add()
    {
        $pemesanan = $this->pemesanan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pemesanan->rules());

        if ($validation->run()) {
            $pemesanan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pemesanan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('pemesanan');
       
        $pemesanan = $this->pemesanan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pemesanan->rules());

        if ($validation->run()) {
            $pemesanan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pemesanan"] = $pemesanan->getById($id);
        if (!$data["pemesanan"]) show_404();
        
        $this->load->view("pemesanan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pemesanan_model->delete($id)) {
            redirect(site_url('pemesanan'));
        }
    }
}