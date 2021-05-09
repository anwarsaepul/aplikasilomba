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
        $this->db->select('t_perlombaan.*, nama_kategori, jarak_sasaran, nama_sasaran');
        $this->db->from('t_perlombaan');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
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
            'jarak_id'      => $post['jarak'],
            'sasaran_id'    => $post['sasaran'],
            'point'         => $post['point'],
            'keterangan'    => $post['keterangan'],
            'durasi'        => $post['durasi'],
            'jumlah_line'   => $post['line'],
            'biaya'         => $post['biaya'],
        ];
        $this->db->insert('t_perlombaan', $params);
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
            'biaya'         => $post['biaya'],
            'updated'       => date('Y-m-d H:i:s'),
        ];
        $this->db->where('perlombaan_id', $post['id']);
        $this->db->update('t_perlombaan', $params);
    }

    function check_kode_product($code, $id = null)
    {
        $this->db->from('p_perlombaan');
        $this->db->where('kode_product', $code);
        if ($id != null) {
            $this->db->where('perlombaan_id !=', $id);
        }
        return $query =  $this->db->get();
    }

    function del($id)
    {
        $this->db->where('perlombaan_id', $id);
        $this->db->delete('t_perlombaan');
    }

    function update_stock_in($data)
    {
        $qty    = $data['qty'];
        $id     = $data['perlombaan_id'];
        $sql = "UPDATE p_perlombaan SET stock = stock + '$qty' WHERE perlombaan_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty    = $data['qty'];
        $id     = $data['perlombaan_id'];
        $sql = "UPDATE p_perlombaan SET stock = stock - '$qty' WHERE perlombaan_id = '$id'";
        $this->db->query($sql);
    }
}
