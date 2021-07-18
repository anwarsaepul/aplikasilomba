<?php
class Invoice extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        checkAdmin();
        $this->load->model(['invoice_model', 'pembayaran_model', 'penilaian_model']);
    }

    function index()
    {
        $invoice    = $this->invoice_model->getall();
        $data = array(
            'invoice'   => $invoice,
        );
        $this->template->load('template', 'trx/invoice/invoice_data', $data);
    }

    function detail($id)
    {
        $invoice    = $this->invoice_model->getinvoicedetail3($id);
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
        $invoice        = $this->invoice_model->getinvoicedetail2($id);
        $cekinvoice     = $this->invoice_model->get($id);
        $data_tertinggi = $this->penilaian_model->cek_tertinggi();


        if ($data_tertinggi->num_rows() > 0) {
            $dt = $data_tertinggi->row();
            if ($dt->lajur == null) {
                $gelombang = 1;
                $lajur = 1;
            } else if ($dt->lajur == 3) {
                $gelombang = $dt->gelombang + 1;
                $lajur = 1;
            } else {
                $lajur = $dt->lajur + 1;
                $gelombang = $dt->gelombang;
            }
        } else {
            $gelombang  = 1;
            $lajur      = 1;
        }
        
        $data = array(
            'id'        => $id,
            'gelombang' => $gelombang,
            'lajur'     => $lajur,
        );

        $cekinvoice = $this->invoice_model->getall($id);
        if ($cekinvoice->num_rows() > 0) {
            $this->invoice_model->konfirmasi($id);
            $this->penilaian_model->add($data);
            tampil_simpan($lokasi = 'invoice/detail/' . $id);
        } else {
            tampil_error($lokasi = 'invoice');
        }
    }
}
