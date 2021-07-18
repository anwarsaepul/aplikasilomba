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

    function add($id, $inv)
    {
        $params = [
            // nama d db        => nama di inputan
            'perlombaan_id'  => $id,
            'user_id'   => $this->session->userdata('user_id'),
            'invoice'   => $inv,
        ];
        $this->db->insert('t_order', $params);
    }

    function update_invoice($invoice)
    {
        // $invoice    = $post['invoice'];
        $user_id    = $this->session->userdata('user_id');
        $sql = "UPDATE t_order SET invoice = '$invoice' WHERE user_id = '$user_id' AND invoice = '0'";
        $this->db->query($sql);
    }

    function del($table, $id)
    {
        $this->db->where($table, $id);
        $this->db->where('invoice', '0');
        $this->db->delete('t_order');
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


        
    function tampil_peserta()
    {
        // $datafilter = $post['filterdata'];

        // $this->db->select('t_invoice.*, users.*');
        // $this->db->select('t_order.*, t_order.lomba_id as lb, t_invoice.*, t_perlombaan.*');
        // $this->db->select('t_order.*');
        $this->db->select('t_order.*, t_invoice.*, t_perlombaan.*, users.*');
        $this->db->from('t_order');
        // $this->db->group_by('invoice_id');
        // $this->db->where('lomba_id', 10);
        $this->db->where('status_pesanan', 2);
        // // $this->db->order_by('invoice_id', 'desc');
        $this->db->join('t_invoice', 't_invoice.invoice = t_order.invoice');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        // $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        // $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_order.perlombaan_id');
        // $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');

        // if ($id != null) {
        //     $this->db->where('invoice_id', $id);
        // }
        return $query = $this->db->get();
    }


            
    function tampil_peserta2()
    {
        // $datafilter = $post['filterdata'];

        // $this->db->select('t_invoice.*, users.*');
        // $this->db->select('t_order.*, t_invoice.*, users.*, t_order.*, t_lomba.*, t_perlombaan.*');
        $this->db->select('t_order.*, t_perlombaan.*, users.*, t_invoice.*');
        $this->db->from('t_order');
        // $this->db->group_by('invoice_id');
        $this->db->where('status_pesanan', 2);
        // $this->db->order_by('invoice_id', 'desc');
        $this->db->join('t_invoice', 't_invoice.invoice = t_order.invoice');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        // $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');

        // if ($id != null) {
        //     $this->db->where('invoice_id', $id);
        // }
        return $query = $this->db->get();
    }

    function tampil_peserta3($id)
    {
        $this->db->select('t_order.*, t_invoice.*, users.*, t_penilaian.*');
        $this->db->from('t_order');
        $this->db->where('perlombaan_id', $id);
        $this->db->join('t_invoice', 't_invoice.invoice = t_order.invoice');
        $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        // $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        // $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_order.perlombaan_id');
        return $query = $this->db->get();

    }

    function lomba_terbaru($id = null)
    {
        $this->db->from('t_order');
        $this->db->select_max('perlombaan_id');
        if ($id != null) {
            $this->db->where('perlombaan_id', $id);
        }
        return $query = $this->db->get();
    }

}
