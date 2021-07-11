<?php
class Session_id
{
    protected $ci;
    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('user_model');
        $user_id = $this->ci->session->userdata('user_id');
        return $user_data = $this->ci->user_model->get($user_id)->row();
    }

    // function hitung_keranjang()
    // {
    //     $this->ci->load->model('keranjang_model');
    //     return $this->ci->keranjang_model->get()->num_rows();
    // }

    function hitung_invoice()
    {
        $this->ci->load->model('invoice_model');
        return $this->ci->invoice_model->getall()->num_rows();
    }

    function hitung_data_invoice($id)
    {
        $this->ci->load->model('invoice_model');
        return $this->ci->invoice_model->filter_data($id)->num_rows();
    }

    function hitung_user()
    {
        $this->ci->load->model('user_model');
        return $this->ci->user_model->get()->num_rows();
    }

    function hitung_peserta()
    {
        $this->ci->load->model('order_model');
        return $this->ci->order_model->get()->num_rows();
    }

}
