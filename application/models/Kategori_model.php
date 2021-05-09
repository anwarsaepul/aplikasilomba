<?php defined('BASEPATH') or exit('No direct script access allowed');

class kategori_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_kategori');
        if ($id != null) {
            $this->db->where('kategori_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db     => nama di inputan
            'nama_kategori'  => $post['nama_kategori'],
        ];
        $this->db->insert('t_kategori', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db     => nama di inputan
            'nama_kategori'  => $post['nama_kategori'],
            'updated'        => date('Y-m-d H:i:s'),
        ];
        $this->db->where('kategori_id', $post['id']);
        $this->db->update('t_kategori', $params);
    }

    function del($id)
    {
        $this->db->where('kategori_id', $id);
        $this->db->delete('t_kategori');
    }
}