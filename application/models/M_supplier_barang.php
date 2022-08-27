<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier_barang extends CI_Model
{
    private $_table = "supplier_barang";

    public $id_supplier_barang;
    public $supplier;

    public function rules()
    {
        return [
            ['field' => 'supplier',
            'label' => 'supplier',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_supplier_barang)
    {
        return $this->db->get_where($this->_table, ["id_supplier_barang" => $id_supplier_barang])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->supplier = $post["supplier"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_supplier_barang = $post["id_supplier_barang"];
        $this->supplier = $post["supplier"];
        $this->db->update($this->_table, $this, array('id_supplier_barang' => $post['id_supplier_barang']));
    }

    public function delete($id_supplier_barang)
    {
        return $this->db->delete($this->_table, array("id_supplier_barang" => $id_supplier_barang));
	}

    public function getAllGroups()
    {
        $this->db->from('supplier_barang');
        $query = $this->db->get();
        return $query->result();
    }

}
