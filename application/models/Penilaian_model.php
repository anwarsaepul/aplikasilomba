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

    function add($data)
    {
        $params = [
            // nama d db    => nama di inputan
            'invoice_id'    => $data['id'],
            'gelombang'     => $data['gelombang'],
            'lajur'         => $data['lajur'],
            'nilai'         => 0,
        ];
        $this->db->insert('t_penilaian', $params);
    }

    function cek_tertinggi()
    {
        // $this->db->select('t_penilaian.*');
        $this->db->from('t_penilaian');
        // $this->db->select_max('penilaian_id');
        $this->db->order_by('penilaian_id', 'desc');
        $this->db->limit(1);
        return $query = $this->db->get();
    }



    function update_status($post)
    {
        ini_set('date.timezone', 'Asia/Jakarta');
        $invoice_id    = $post['invoice_id'];
        $waktu         = date('Y-m-d H:i:s');
        $sql = "UPDATE t_invoice SET status_pesanan = '1', updated = '$waktu'  WHERE invoice_id = '$invoice_id'";
        $this->db->query($sql);
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
        $this->db->select('t_lomba.*, t_perlombaan.*');
        $this->db->from('t_lomba');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        // $this->db->join('t_lomba', 't_keranjang.lomba_id = t_lomba.lomba_id', 'right');
        if ($id != null) {
            $this->db->where('lomba_id', $id);
        }
        return $query = $this->db->get();
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
        $this->db->where('jadwal_id', $post['jadwal_id']);
        $this->db->update('t_jadwal', $params);
    }


    function del($id)
    {
        $this->db->where('jadwal_id', $id);
        $this->db->delete('t_jadwal');
    }
}
