<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
    function get($id = null)
    {
        $this->db->from('t_keranjang');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        if ($id != null) {
            $this->db->where('keranjang_id', $id);
        }
        return $query = $this->db->get();
    }

    function add_keranjang($id)
    {
        $params = [
            //nama d db => nama di inputan
            'lomba_id' => $id,
            'user_id'   => $this->session->userdata('user_id'),
        ];
        $this->db->insert('t_keranjang', $params);
    }

    function del($table, $id)
    {
        $this->db->where($table, $id);
        $this->db->delete('t_keranjang');
    }

    function getkeranjang($id = null)
    {
        $user_id = $this->session->userdata('user_id');

        $this->db->select('t_keranjang.*, t_lomba.*, t_perlombaan.*');
        $this->db->from('t_keranjang');
        $this->db->join('t_lomba', 't_lomba.lomba_id = t_keranjang.lomba_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_lomba.perlombaan_id');
        // $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        // $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        // $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        $this->db->where('user_id', $user_id);
        if ($id != null) {
            $this->db->where('keranjang_id', $id);
        }
        return $query = $this->db->get();
        
    }

    function getkeranjang2($id = null)
    {
        $this->db->select('t_keranjang.*, t_jadwal.*, t_perlombaan.*, nama_kategori, jarak_sasaran, nama_sasaran, point, keterangan, durasi, jumlah_line');
        $this->db->from('t_keranjang');
        $this->db->join('t_jadwal', 't_jadwal.jadwal_id = t_keranjang.jadwal_id', 'right');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_jadwal.perlombaan_id', 'left');
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id', 'right');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id', 'left');
        $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id', 'left');
        if ($id != null) {
            $this->db->where('keranjang_id', $id);
        }
        return $query = $this->db->get();
    }



    function get_keranjang_user($id = null)
    {
        $this->db->select('t_keranjang.*, t_jadwal.*, nama_kategori, jarak_sasaran, nama_sasaran, point, keterangan, durasi, jumlah_line');
        $this->db->from('t_keranjang');
        $this->db->join('t_jadwal', 't_jadwal.jadwal_id = t_keranjang.jadwal_id');
        $this->db->join('t_perlombaan', 't_perlombaan.perlombaan_id = t_jadwal.perlombaan_id');
        $this->db->join('t_kategori', 't_kategori.kategori_id = t_perlombaan.kategori_id');
        $this->db->join('t_jarak', 't_jarak.jarak_id = t_perlombaan.jarak_id');
        $this->db->join('t_sasaran', 't_sasaran.sasaran_id = t_perlombaan.sasaran_id');
        if ($id != null) {
            $this->db->where('keranjang_id', $id);
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

    
    function check_lomba_id($code, $id = null)
    {
        // nama table
        $this->db->from('t_keranjang');
        // yg di cek
        $this->db->where('lomba_id', $code);
        // jika id tdk null
        if ($id != null) {
            // cek keranjang_id tdk sama dgn $id
            $this->db->where('keranjang_id !=', $id);
        }
        return $query =  $this->db->get();
    }








    function get_keranjang()
    {
        $this->db->select('t_keranjang.*, p_item.kode_product, nama_item, harga_jual');
        $this->db->from('t_keranjang');
        // 'table yg ingin di joinkan', 'tabel yang sama = tabel yang sama'
        $this->db->join('p_item', 't_keranjang.item_id = p_item.item_id');
        $this->db->order_by('keranjang_id', 'desc');
        return $query = $this->db->get();
    }



    function update_stock_keranjang($data)
    {
        $id         = $data['item_id'];
        $qty        = $data['qty'];
        $discount   = $data['discount'];
        $harga_jual = $data['harga_jual'];
        $invoice    = $data['invoice'];

        $sql = "UPDATE t_keranjang SET qty = qty + '$qty', 
                sub_total = '$harga_jual' * qty, 
                discount = '$discount', 
                potongan_diskon = (discount/100) * sub_total, 
                total_akhir = sub_total - potongan_diskon, 
                invoice = '$invoice' 
                WHERE item_id = '$id'";
        $this->db->query($sql);
    }





    function hitung_total()
    {
        // menghitung jumlah nilai pada table
        $this->db->select_sum('total_akhir', 'jumlah');
        $this->db->from('t_keranjang');
        return $this->db->get()->row();
    }
}
