<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_merk_barang");
        $this->load->library('form_validation');
        if ($this->session->userdata('login') <> 1) {
            redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data["merk"] = $this->M_merk_barang->getAll();
        $this->load->view("admin/merk/list", $data);
    }

    public function add()
    {
        $merk = $this->M_merk_barang;
        $validation = $this->form_validation;
        $validation->set_rules($merk->rules());

        if ($validation->run()) {
            $merk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/merk/new_form");
    }

    public function edit($id_merk_barang = null)
    {
        if (!isset($id_merk_barang)) redirect('admin/merk');
       
        $merk = $this->M_merk_barang;
        $validation = $this->form_validation;
        $validation->set_rules($merk->rules());

        if ($validation->run()) {
            $merk->update();
            $this->session->set_flashdata('success', 'Data Baru Berhasil disimpan');
        }

        $data["merk"] = $merk->getById($id_merk_barang);
        if (!$data["merk"]) show_404();
        
        $this->load->view("admin/merk/edit_form", $data);
    }

    public function delete($id_merk_barang=null)
    {
        if (!isset($id_merk_barang)) show_404();
        
        if ($this->M_merk_barang->delete($id_merk_barang)) {
            redirect(site_url('admin/merk'));
        }
    }
}