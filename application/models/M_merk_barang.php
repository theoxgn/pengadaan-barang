<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_merk_barang extends CI_Model
{
    private $_table = "merk_barang";

    public $id_merk_barang;
    public $merk;

    public function rules()
    {
        return [
            ['field' => 'merk',
            'label' => 'merk',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_merk_barang)
    {
        return $this->db->get_where($this->_table, ["id_merk_barang" => $id_merk_barang])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->merk = $post["merk"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_merk_barang = $post["id_merk_barang"];
        $this->merk = $post["merk"];
        $this->db->update($this->_table, $this, array('id_merk_barang' => $post['id_merk_barang']));
    }

    public function delete($id_merk_barang)
    {
        return $this->db->delete($this->_table, array("id_merk_barang" => $id_merk_barang));
	}

    public function getAllGroups()
    {
        $this->db->from('merk_barang');
        $query = $this->db->get();
        return $query->result();
    }

}
