<?php defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_invoice');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get();
    }

    function getinvoicedetail($id)
    {
        // $user_id = $this->session->userdata('user_id');

        $this->db->select('t_invoice.*, biaya, nama_kategori, tanggal_tanding, jarak_sasaran, sasaran, point, keterangan, durasi, jumlah_line, jam_tanding');
        $this->db->from('t_invoice');
        // $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->where('user_id', $user_id);
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get();
    }

    function getinvoicedetail2($id)
    {
        $this->db->select('t_invoice.*, t_order.*');
        $this->db->from('t_invoice');
        $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');

        // $this->db->where('user_id', $this->session->userdata('user_id'));
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get();
    }


    function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM t_invoice 
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

    function add($post)
    {
        $params = [
            // nama d db        => nama di inputan
            'invoice'   => $post['invoice'],
            'total'     => $post['totalpesanan'],
            'user_id'   => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_invoice', $params);
    }

    function del($table, $id)
    {
        $this->db->where($table, $id);
        $this->db->where('invoice', '0');
        $this->db->delete('t_invoice');
    }

    function update_invoice($post)
    {
        $invoice    = $post['invoice'];
        $user_id    = $this->session->userdata('user_id');
        $sql = "UPDATE t_invoice SET invoice = '$invoice' WHERE user_id = '$user_id' AND invoice = '0'";
        $this->db->query($sql);
    }
}
