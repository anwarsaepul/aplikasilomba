<?php
class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['keranjang_model', 'info_model', 'perlombaan_model', 'order_model', 'invoice_model', 'lomba_model']);
    }

    function index()
    {
        $invoice    = $this->invoice_model->get();

        $row        = $this->info_model->tampilItem2();
        $keranjang  = $this->keranjang_model->getkeranjang();

        $data = array(
            // 'page'   => 'Add',
            'row'       => $row,
            'keranjang' => $keranjang,
            'invoice'   => $invoice,
        );
        // $data['row'] = $this->sasaran_model->get();
        $this->template->load('template', 'trx/pesanan/pesanan_data', $data);
    }


    function detail($id)
    {
        $invoice    = $this->invoice_model->getinvoicedetail($id);
        $row        = $this->lomba_model->tampilItem2();

        if ($invoice->num_rows() > 0) {
            $inv = $invoice->row();
            $data = array(
                'inv'       => $inv,
                'invoice'   => $invoice,
                'row'       => $row,
            );
        }
        // var_dump($invoice->result());
        $this->template->load('template', 'trx/pesanan/pesanan_detail', $data);
    }




    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            // validasi invoice jika kode invoice sama, maka datanya akan di update
            if ($this->keranjang_model->check_lomba_id($post['id'])->num_rows() > 0) {
                redirect('keranjang');
            } else {
                $this->keranjang_model->add_keranjang($post);
                $this->order_model->add($post);
                redirect('keranjang');
            }
        } else if (isset($_POST['process-payment'])) {
            // echo $post['perlombaan_id2'];
            // $this->detail_model->add($post);
            $this->order_model->update_invoice($post);
            $this->keranjang_model->del('user_id', $this->session->userdata('user_id'));
            // $this->keranjang_model->del('user_id', $this->session->userdata('user_id'));


            // $this->sale_model->add_transaksi($post);
            // $this->kredit_model->add_transaksik($post);
            // $this->db->empty_table('t_keranjang');
            // redirect('sale');
            // tampil_simpan('report/penjualan');
        }
    }

    function del()
    {
        $keranjang  = $this->uri->segment(3);
        $lomba      = $this->uri->segment(4);
        // echo $keranjang;

        $query = $this->keranjang_model->get($keranjang);
        if ($query->num_rows() > 0) {
            $this->keranjang_model->del('keranjang_id', $keranjang);
            $this->order_model->del('lomba_id', $lomba);
            tampil_hapus($lokasi = 'keranjang');
        } else {
            tampil_error($lokasi = 'keranjang');
        }
    }
}
