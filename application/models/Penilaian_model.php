<?php defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_penilaian');
        if ($id != null) {
            $this->db->where('penilaian_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilItem($id = null)
    {
        $this->db->select('t_penilaian.*, nama_kategori, jarak_sasaran, nama_sasaran');
        $this->db->from('t_penilaian');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_penilaian.kategori_id');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_penilaian.jarak_id');
        $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_penilaian.sasaran_id');
        if ($id != null) {
            $this->db->where('penilaian_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'kategori_id'   => $post['kategori'],
            'jarak_id'      => $post['jarak'],
            'sasaran_id'    => $post['sasaran'],
            'point'         => $post['point'],
            'keterangan'    => $post['keterangan'],
            'durasi'        => $post['durasi'],
            'jumlah_line'   => $post['line'],
        ];
        $this->db->insert('t_penilaian', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'kategori_id'   => $post['kategori'],
            'jarak_id'      => $post['jarak'],
            'sasaran_id'    => $post['sasaran'],
            'point'         => $post['point'],
            'keterangan'    => $post['keterangan'],
            'durasi'        => $post['durasi'],
            'jumlah_line'   => $post['line'],
            'updated'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('penilaian_id', $post['id']);
        $this->db->update('t_penilaian', $params);
    }

    function check_kode_product($code, $id = null)
    {
        $this->db->from('p_penilaian');
        $this->db->where('kode_product', $code);
        if ($id != null) {
            $this->db->where('penilaian_id !=', $id);
        }
            return $query =  $this->db->get();
    }

    function del($id)
    {
        $this->db->where('penilaian_id', $id);
        $this->db->delete('t_penilaian');
    }

    function update_stock_in($data)
    {
        $qty    = $data['qty'];
        $id     = $data['penilaian_id'];
        $sql = "UPDATE p_penilaian SET stock = stock + '$qty' WHERE penilaian_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty    = $data['qty'];
        $id     = $data['penilaian_id'];
        $sql = "UPDATE p_penilaian SET stock = stock - '$qty' WHERE penilaian_id = '$id'";
        $this->db->query($sql);
    }
    
}
