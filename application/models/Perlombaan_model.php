<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perlombaan_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_perlombaan');
        if ($id != null) {
            $this->db->where('perlombaan_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilItem($id = null)
    {
        $this->db->select('t_perlombaan.*, nama_kategori');
        $this->db->from('t_perlombaan');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('perlombaan_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'kategori_id'   => $post['kategori'],
            'jarak_sasaran' => $post['jarak'],
            'sasaran'       => $post['sasaran'],
            'point'         => $post['point'],
            'keterangan'    => $post['keterangan'],
            'durasi'        => $post['durasi'],
            'jumlah_line'   => $post['line'],
        ];
        $this->db->insert('t_perlombaan', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'kategori_id'   => $post['kategori'],
            'jarak_sasaran' => $post['jarak'],
            'sasaran'       => $post['sasaran'],
            'point'         => $post['point'],
            'keterangan'    => $post['keterangan'],
            'durasi'        => $post['durasi'],
            'jumlah_line'   => $post['line'],
            'updated'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('perlombaan_id', $post['id']);
        $this->db->update('t_perlombaan', $params);
    }

    function del($id)
    {
        $this->db->where('perlombaan_id', $id);
        $this->db->delete('t_perlombaan');
    }
}
