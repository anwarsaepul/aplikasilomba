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
        // $this->db->select('t_perlombaan.*, nama_kategori');
        $this->db->from('t_perlombaan');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('perlombaan_id', $id);
        }
        return $query = $this->db->get();
    }

    
    // function tampil_peserta()
    // {
    //     // $datafilter = $post['filterdata'];

    //     // $this->db->select('t_invoice.*, users.*');
    //     $this->db->select('t_perlombaan.*, t_invoice.*, users.*, t_order.*, t_lomba.*, t_perlombaan.*');
    //     $this->db->from('t_perlombaan');
    //     $this->db->where('status_pesanan', 2);
    //     $this->db->order_by('invoice_id', 'desc');
    //     $this->db->join('users', 'users.user_id = t_invoice.user_id');
    //     $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
    //     $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
    //     $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
    //     // $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');

    //     // if ($id != null) {
    //     //     $this->db->where('invoice_id', $id);
    //     // }
    //     return $query = $this->db->get();
    // }

    function add($post)
    {
        $params = [
            // nama d db    => nama di inputan
            'nama_kategori' => $post['kategori'],
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
            'nama_kategori' => $post['kategori'],
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
