<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sasaran_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_sasaran');
        if ($id != null) {
            $this->db->where('sasaran_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_sasaran'  => $post['nama_sasaran'],
        ];
        $this->db->insert('t_sasaran', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_sasaran'  => $post['nama_sasaran'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('sasaran_id', $post['id']);
        $this->db->update('t_sasaran', $params);
    }

    function del($id)
    {
        $this->db->where('sasaran_id', $id);
        $this->db->delete('t_sasaran');
    }
}
