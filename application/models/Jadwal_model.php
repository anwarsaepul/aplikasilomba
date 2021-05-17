<?php defined('BASEPATH') or exit('No direct script access allowed');

class jadwal_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_jadwal');
        if ($id != null) {
            $this->db->where('jadwal_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilItem($id = null)
    {
        $this->db->select('t_jadwal.*, nama_kategori');
        $this->db->from('t_jadwal');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_jadwal.perlombaan_id');
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_jadwal.sasaran_id');
        if ($id != null) {
            $this->db->where('jadwal_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilItem2($id = null)
    {
        $this->db->select('t_jadwal.*, nama_kategori, jarak_sasaran, nama_sasaran, point, keterangan, durasi, jumlah_line');
        $this->db->from('t_jadwal');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_jadwal.perlombaan_id');
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('jadwal_id', $id);
        }
        return $query = $this->db->get();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'perlombaan_id'     => $post['perlombaan_id'],
            'tanggal_tanding'   => $post['date'],
            'jam_tanding'       => $post['jam'],
            'biaya'             => $post['biaya'],
        ];
        $this->db->insert('t_jadwal', $params);
    }

    function edit($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'perlombaan_id'     => $post['perlombaan_id'],
            'tanggal_tanding'   => $post['date'],
            'jam_tanding'       => $post['jam'],
            'biaya'             => $post['biaya'],
            'updated'           => date('Y-m-d H:i:s'),
        ];
        $this->db->where('jadwal_id', $post['id']);
        $this->db->update('t_jadwal', $params);
    }

    function check_kode_product($code, $id = null)
    {
        $this->db->from('p_jadwal');
        $this->db->where('kode_product', $code);
        if ($id != null) {
            $this->db->where('jadwal_id !=', $id);
        }
        return $query =  $this->db->get();
    }

    function del($id)
    {
        $this->db->where('jadwal_id', $id);
        $this->db->delete('t_jadwal');
    }

    function update_stock_in($data)
    {
        $qty    = $data['qty'];
        $id     = $data['jadwal_id'];
        $sql = "UPDATE p_jadwal SET stock = stock + '$qty' WHERE jadwal_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty    = $data['qty'];
        $id     = $data['jadwal_id'];
        $sql = "UPDATE p_jadwal SET stock = stock - '$qty' WHERE jadwal_id = '$id'";
        $this->db->query($sql);
    }
}
