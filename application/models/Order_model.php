<?php defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_order');
        if ($id != null) {
            $this->db->where('order_id', $id);
        }
        return $query = $this->db->get();
    }

    function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM t_order 
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        return $invoice = "ID" . date('ymd') . $no;
    }

    function add($id)
    {
        $params = [
            // nama d db        => nama di inputan
            'lomba_id'  => $id,
            'user_id'   => $this->session->userdata('user_id'),
            'invoice'   => '0',
        ];
        $this->db->insert('t_order', $params);
    }

    function del($table, $id)
    {
        $this->db->where($table, $id);
        $this->db->where('invoice', '0');
        $this->db->delete('t_order');
    }

    function update_invoice($post)
    {
        $invoice    = $post['invoice'];
        $user_id    = $this->session->userdata('user_id');
        $sql = "UPDATE t_order SET invoice = '$invoice' WHERE user_id = '$user_id' AND invoice = '0'";
        $this->db->query($sql);
    }

    function getinvoice($invoice)
    {
        // $user_id = $this->session->userdata('user_id');

        $this->db->select('t_order.*');
        // $this->db->select('t_order.*, t_lomba.*, t_perlombaan.*, nama_kategori, jarak_sasaran, nama_sasaran, point, keterangan, durasi, jumlah_line');
        $this->db->from('t_order');
        // $this->db->join('t_invoice', 't_invoice.invoice = t_order.invoice');
        // $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        // $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        // $this->db->where('user_id', $user_id);

        $this->db->where('invoice', $invoice);

        // if ($id != null) {
        //     $this->db->where('order_id', $id);
        // }
        return $query = $this->db->get();
        
    }
}
