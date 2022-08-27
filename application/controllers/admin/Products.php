<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->model("m_kategori_barang");
        $this->load->model("m_merk_barang");
        $this->load->model("m_supplier_barang");
        $this->load->library('form_validation');
        if ($this->session->userdata('login') <> 1) {
            redirect(site_url('login'));
        }
    }

    public function index()
    {
        $data["products"] = $this->product_model->getAll();
        $this->load->view("admin/product/list", $data);
    }

    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('danger', 'error');
        }
        $data["kategorii"] = $this->m_kategori_barang->getAllGroups();
        $data["merkk"] = $this->m_merk_barang->getAllGroups();
        $data["supplierr"] = $this->m_supplier_barang->getAllGroups();
        $this->load->view("admin/product/new_form",$data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Data Baru Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        $data["kategorii"] = $this->m_kategori_barang->getAllGroups();
        $data["merkk"] = $this->m_merk_barang->getAllGroups();
        $data["supplierr"] = $this->m_supplier_barang->getAllGroups();
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/product/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/products'));
        }
    }
}
