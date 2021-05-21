<?php
class Keranjang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['keranjang_model', 'info_model', 'perlombaan_model', 'order_model']);
    }

    function index()
    {
        $row        = $this->info_model->tampilItem2();
        $keranjang  = $this->keranjang_model->getkeranjang();
        // $keranjang  = $this->keranjang_model->get();
        // $lomba  = $this->perlombaan_model->tampilItem()->result();

        $data = array(
            // 'page'   => 'Add',
            'row'       => $row,
            'keranjang' => $keranjang,
            'invoice'   => $this->order_model->invoice_no(),
        );
        // $data['row'] = $this->sasaran_model->get();
        $this->template->load('template', 'trx/keranjang/keranjang_data', $data);
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            // validasi invoice jika kode invoice sama, maka datanya akan di update
            // if ($this->order_model->check_id_product($post['invoice'])->num_rows() > 0) {
                $this->keranjang_model->add_keranjang($post);
                $this->order_model->add($post);
                redirect('keranjang');
            // }
        } else if (isset($_POST['process-payment'])) {
            // echo $post['id'];

            // $this->sale_model->add_transaksi($post);
            // $this->kredit_model->add_transaksik($post);
            // $this->db->empty_table('t_keranjang');
            // redirect('sale');
            // tampil_simpan('report/penjualan');
        }
    }

    function del($id)
    {
        $this->keranjang_model->del($id);
        tampil_hapus($lokasi = 'keranjang');
    }
}
