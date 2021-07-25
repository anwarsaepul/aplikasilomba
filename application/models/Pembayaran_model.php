<?php defined('BASEPATH') or exit('No direct script access allowed');
    ini_set('date.timezone', 'Asia/Jakarta'); 
class pembayaran_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_pembayaran');
        if ($id != null) {
            $this->db->where('pembayaran_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilgambar($id)
    {
        // $this->db->select('t_pembayaran.*, nama_kategori, jarak_sasaran, nama_sasaran');
        $this->db->from('t_pembayaran');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_pembayaran.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_pembayaran.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_pembayaran.sasaran_id');
        $this->db->where('invoice_id', $id);
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get()->row();
    }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'photo'         => $post['gambar'],
            'invoice_id'    => $post['invoice_id'],
            'user_id'       => $this->session->userdata('user_id'),
            'catatan'       => $post['catatan'] == '' ? null : $post['catatan'],
        ];
        $this->db->insert('t_pembayaran', $params);
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
        $this->db->where('pembayaran_id', $post['id']);
        $this->db->update('t_pembayaran', $params);
    }

    function del($id)
    {
        $this->db->where('pembayaran_id', $id);
        $this->db->delete('t_pembayaran');
    }
}
