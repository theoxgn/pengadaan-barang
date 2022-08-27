<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_kategori_barang");
        $this->load->library('form_validation');
        if ($this->session->userdata('login') <> 1) {
            redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data["kategori"] = $this->M_kategori_barang->getAll();
        $this->load->view("admin/kategori/list", $data);
    }

    public function add()
    {
        $kategori = $this->M_kategori_barang;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/kategori/new_form");
    }

    public function edit($id_kategori_barang = null)
    {
        if (!isset($id_kategori_barang)) redirect('admin/kategori');
       
        $kategori = $this->M_kategori_barang;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());

        if ($validation->run()) {
            $kategori->update();
            $this->session->set_flashdata('success', 'Data Baru Berhasil disimpan');
        }

        $data["kategori"] = $kategori->getById($id_kategori_barang);
        if (!$data["kategori"]) show_404();
        
        $this->load->view("admin/kategori/edit_form", $data);
    }

    public function delete($id_kategori_barang=null)
    {
        if (!isset($id_kategori_barang)) show_404();
        
        if ($this->M_kategori_barang->delete($id_kategori_barang)) {
            redirect(site_url('admin/kategori'));
        }
    }
}