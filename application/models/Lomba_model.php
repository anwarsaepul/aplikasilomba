<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lomba_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_lomba');
        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
    }


    function cek_terbaru()
    {
        // $this->db->select('t_penilaian.*');
        $this->db->from('t_lomba');
        $this->db->order_by('lomba_id', 'desc');
        $this->db->limit(1);
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
        $this->db->insert('t_lomba', $params);
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
        $this->db->where('lomba_id', $post['lomba_id']);
        $this->db->update('t_lomba', $params);
    }

    function del($id)
    {
        $this->db->where('lomba_id', $id);
        $this->db->delete('t_lomba');
    }

    function tampillomba2($id = null)
    {
        $this->db->select('t_lomba.*, t_perlombaan.*');
        $this->db->from('t_lomba');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampillomba($id = null)
    {
        $this->db->select('t_lomba.*, t_perlombaan.*, t_order.*, users.*, t_penilaian.*, t_invoice.*');
        $this->db->from('t_lomba');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        // $this->db->where('lomba_id', 9);
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        $this->db->join('t_order', 't_order.lomba_id = t_lomba.lomba_id');
        $this->db->join('t_invoice', 't_invoice.invoice = t_order.invoice');
        $this->db->join('users', 'users.user_id = t_order.user_id');
        $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilpeserta($id = null)
    {
        $this->db->select('t_lomba.*, t_perlombaan.*');
        $this->db->from('t_lomba');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_invoice', 't_invoice.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');


        // $this->db->select('t_invoice.*, users.*, t_order.*, t_lomba.*, t_perlombaan.*, t_penilaian.*');
        // $this->db->from('t_invoice');
        // $this->db->where('status_pesanan', 2);
        // $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');
        // // $this->db->order_by('invoice_id', 'desc');
        // $this->db->join('users', 'users.user_id = t_invoice.user_id');
        // $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        // $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        // $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');

        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
    }





    function tampilItem($id = null)
    {
        $this->db->select('t_lomba.*, t_perlombaan.*');
        $this->db->from('t_lomba');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_lomba.sasaran_id');
        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
    }

    function tampilItem2($id = null)
    {
        $this->db->select('t_lomba.*, t_perlombaan.*');
        $this->db->from('t_lomba');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
    }
}
