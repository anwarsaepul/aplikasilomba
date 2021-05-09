<?php defined('BASEPATH') or exit('No direct script access allowed');

class jarak_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_jarak');
        $this->db->order_by('jarak_sasaran', 'asc');
        if ($id != null) {
            $this->db->where('jarak_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'jarak_sasaran'  => $post['jarak_sasaran'],
        ];
        $this->db->insert('t_jarak', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'jarak_sasaran'  => $post['jarak_sasaran'],
            'updated'          => date('Y-m-d H:i:s'),
        ];
        $this->db->where('jarak_id', $post['id']);
        $this->db->update('t_jarak', $params);
    }

    function del($id)
    {
        $this->db->where('jarak_id', $id);
        $this->db->delete('t_jarak');
    }
}