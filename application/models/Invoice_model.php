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

    function getall($id = null)
    {
        $this->db->select('t_invoice.*, users.*');
        $this->db->from('t_invoice');
        $this->db->order_by('invoice_id', 'desc');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get();
    }

    function filter_data($id)
    {
        $this->db->select('t_invoice.*, users.*');
        $this->db->from('t_invoice');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        $this->db->where('status_pesanan', $id);
        $this->db->order_by('invoice_id', 'desc');
        return $query = $this->db->get();
    }

    function tampil_peserta()
    {
        // $datafilter = $post['filterdata'];

        // $this->db->select('t_invoice.*, users.*');
        $this->db->select('t_invoice.*, users.*, t_order.*, t_lomba.*, t_perlombaan.*');
        $this->db->from('t_invoice');
        $this->db->where('status_pesanan', 2);
        $this->db->order_by('invoice_id', 'desc');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');

        // if ($id != null) {
        //     $this->db->where('invoice_id', $id);
        // }
        return $query = $this->db->get();
    }

    function tampil_peserta_max()
    {
        // $datafilter = $post['filterdata'];

        // $this->db->select('t_invoice.*, users.*');
        $this->db->select('t_invoice.*, users.*, t_order.*, t_lomba.*, t_perlombaan.*');
        $this->db->from('t_invoice');
        // $this->db->where('status_pesanan', 2);
        $this->db->order_by('invoice_id', 'desc');
        $this->db->limit(1);
        // $this->db->select_max('invoice_id');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_penilaian', 't_penilaian.invoice_id = t_invoice.invoice_id');

        // if ($id != null) {
        //     $this->db->where('invoice_id', $id);
        // }
        return $query = $this->db->get();
    }


    function getinvoicedetail($id)
    {
        // $user_id = $this->session->userdata('user_id');

        $this->db->select('t_invoice.*, biaya, nama_kategori, tanggal_tanding, jarak_sasaran, sasaran, point, keterangan, durasi, jumlah_line, jam_tanding');
        $this->db->from('t_invoice');
        $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->where('user_id', $this->session->userdata('user_id'));
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get();
    }

    function getinvoicedetail2($id)
    {
        $this->db->select('t_invoice.*, biaya, nama_kategori, tanggal_tanding, jarak_sasaran, sasaran, point, keterangan, durasi, jumlah_line, jam_tanding, users.*');
        $this->db->from('t_invoice');
        $this->db->join('t_order', 't_order.invoice = t_invoice.invoice');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        $this->db->join('users', 'users.user_id = t_invoice.user_id');
        // $this->db->where('invoice_id', $id);

        // $this->db->where('user_id', $this->session->userdata('user_id'));
        if ($id != null) {
            $this->db->where('invoice_id', $id);
        }
        return $query = $this->db->get();
    }

    function cekinvoice($id)
    {
        // $this->db->select('t_invoice.*');
        // $this->db->select('t_invoice.*, biaya, nama_kategori, tanggal_tanding, jarak_sasaran, sasaran, point, keterangan, durasi, jumlah_line, jam_tanding');
        $this->db->from('t_invoice');
        // $this->db->join('t_order', 't_invoice.invoice = t_order.invoice');
        // $this->db->join('t_lomba', 't_lomba.lomba_id = t_order.lomba_id');
        // $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->where('invoice', $id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
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

    function add($inv)
    {
        $params = [
            // nama d db        => nama di inputan
            'invoice'   => $inv,
            // 'total'     => $post['totalpesanan'],
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

    function update_status($post)
    {
        ini_set('date.timezone', 'Asia/Jakarta'); 
        $invoice_id    = $post['invoice_id'];
        $waktu         = date('Y-m-d H:i:s');
        $sql = "UPDATE t_invoice SET status_pesanan = '1', updated = '$waktu'  WHERE invoice_id = '$invoice_id'";
        $this->db->query($sql);
    }

    function konfirmasi($id)
    {
        ini_set('date.timezone', 'Asia/Jakarta'); 
        $params = [
            // nama d db    => nama di inputan
            'status_pesanan'    => '2',
            'updated'           => date('Y-m-d H:i:s'),
        ];
        $this->db->where('invoice_id', $id);
        $this->db->update('t_invoice', $params);
    }
}

