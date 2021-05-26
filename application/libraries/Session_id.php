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

    function hitung_keranjang()
    {
        $this->ci->load->model('keranjang_model');
        return $this->ci->keranjang_model->get()->num_rows();
    }

    function count_supplier()
    {
        $this->ci->load->model('supplier_model');
        return $this->ci->supplier_model->get()->num_rows();
    }

    function count_customer()
    {
        $this->ci->load->model('customer_model');
        return $this->ci->customer_model->get()->num_rows();
    }

    function count_user()
    {
        $this->ci->load->model('sales_model');
        return $this->ci->sales_model->get()->num_rows();
    }

    function count_sale()
    {
        $id = date('Y-m-d');
        $this->ci->load->model('sale_model');
        return $this->ci->sale_model->get($id)->num_rows();
    }
    
    function count_sale_day()
    {
        $id = date('Y-m-d');
        $this->ci->load->model('sale_model');
        return $this->ci->sale_model->gettransaksihariini($id)->num_rows();
    }

}
