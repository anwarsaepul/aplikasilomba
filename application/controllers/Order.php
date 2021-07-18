<?php
class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['invoice_model', 'perlombaan_model', 'order_model']);
    }

    function process($id)
    {
        $query = $this->perlombaan_model->get($id);
        if ($query->num_rows() > 0) {
            $inv = $this->invoice_model->invoice_no();
            $this->order_model->add($id, $inv);
            $this->invoice_model->add($inv);
            tampil_simpan('pesanan');
        }else {
            tampil_error($lokasi = 'dashboard');
        }
    }
}
