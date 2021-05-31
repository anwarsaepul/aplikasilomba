<?php
class Laporan extends CI_Controller
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
        $data = array(
            'invoice'   => $invoice,
        );
        $this->template->load('template', 'laporan/laporan_data', $data);
    }

    function process()
    {
        if (isset($_POST['filter'])) {
            if ($_POST['filterdata'] == '') {
                $invoice    = $this->invoice_model->getall();
            } else {
                $invoice    = $this->invoice_model->filter_data($_POST['filterdata']);
            }
        }
        $data = array(
            'invoice'   => $invoice,
        );
        $this->template->load('template', 'laporan/laporan_data', $data);
    }
}
