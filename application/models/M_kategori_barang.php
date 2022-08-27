<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori_barang extends CI_Model
{
    private $_table = "kategori_barang";

    public $id_kategori_barang;
    public $kategori;

    public function rules()
    {
        return [
            ['field' => 'kategori',
            'label' => 'kategori',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_kategori_barang)
    {
        return $this->db->get_where($this->_table, ["id_kategori_barang" => $id_kategori_barang])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kategori = $post["kategori"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kategori_barang = $post["id_kategori_barang"];
        $this->kategori = $post["kategori"];
        $this->db->update($this->_table, $this, array('id_kategori_barang' => $post['id_kategori_barang']));
    }

    public function delete($id_kategori_barang)
    {
        return $this->db->delete($this->_table, array("id_kategori_barang" => $id_kategori_barang));
	}

    public function getAllGroups()
    {
        $this->db->from('kategori_barang');
        $query = $this->db->get();
        return $query->result();
    }
}