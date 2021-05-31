<?php
class Invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        checkAdmin();
        $this->load->model(['invoice_model', 'pembayaran_model']);
    }

    function index()
    {
        $invoice    = $this->invoice_model->getall();

        // $row        = $this->info_model->tampilItem2();
        // $keranjang  = $this->keranjang_model->getkeranjang();

        $data = array(
            // 'row'       => $row,
            // 'keranjang' => $keranjang,
            'invoice'   => $invoice,
        );
        $this->template->load('template', 'trx/invoice/invoice_data', $data);
    }

    function detail($id)
    {
        $invoice    = $this->invoice_model->getinvoicedetail2($id);
        $cekinvoice = $this->invoice_model->get($id);
        $gambar     = $this->pembayaran_model->tampilgambar($id);

        // if ($cekinvoice->num_rows() > 0) {
            $inv = $invoice->row();
            $data = array(
                'inv'       => $inv,
                'invoice'   => $invoice,
                'gambar'    => $gambar,
            );
        // } 
        // else {
        //     tampil_error($lokasi = 'invoice');
        // }
        // var_dump($cekinvoice->result());
        $this->template->load('template', 'trx/invoice/invoice_detail', $data);
    }

    function konfirmasi($id)
    {
        $cekinvoice = $this->invoice_model->getall($id);
        if ($cekinvoice->num_rows() > 0) {
            $this->invoice_model->konfirmasi($id);
            tampil_simpan($lokasi = 'invoice/detail/' . $id);
        } else {
            tampil_error($lokasi = 'invoice');
        }
    }
}
