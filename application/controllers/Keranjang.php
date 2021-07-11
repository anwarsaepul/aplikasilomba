<?php
class Keranjang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['keranjang_model', 'info_model', 'perlombaan_model', 'order_model', 'invoice_model']);
    }

    function index()
    {
        $row        = $this->info_model->tampilItem2();
        $keranjang  = $this->keranjang_model->getkeranjang();

        $data = array(
            'row'       => $row,
            'keranjang' => $keranjang,
            'invoice'   => $this->invoice_model->invoice_no(),
        );
        $this->template->load('template', 'trx/keranjang/keranjang_data', $data);
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
            $inv = $this->invoice_model->invoice_no();
            // $this->order_model->add($id);
            // $this->invoice_model->add($post);
            $this->order_model->update_invoice($inv);
            $this->keranjang_model->del('user_id', $this->session->userdata('user_id'));
            redirect('pesanan');
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
