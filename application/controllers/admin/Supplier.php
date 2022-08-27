<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_supplier_barang");
        $this->load->library('form_validation');
        if ($this->session->userdata('login') <> 1) {
            redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data["supplier"] = $this->M_supplier_barang->getAll();
        $this->load->view("admin/supplier/list", $data);
    }

    public function add()
    {
        $supplier = $this->M_supplier_barang;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/supplier/new_form");
    }

    public function edit($id_supplier_barang = null)
    {
        if (!isset($id_supplier_barang)) redirect('admin/supplier');
       
        $supplier = $this->M_supplier_barang;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->update();
            $this->session->set_flashdata('success', 'Data Baru Berhasil disimpan');
        }

        $data["supplier"] = $supplier->getById($id_supplier_barang);
        if (!$data["supplier"]) show_404();
        
        $this->load->view("admin/supplier/edit_form", $data);
    }

    public function delete($id_supplier_barang=null)
    {
        if (!isset($id_supplier_barang)) show_404();
        
        if ($this->M_supplier_barang->delete($id_supplier_barang)) {
            redirect(site_url('admin/supplier'));
        }
    }
}