<?php
class Trx extends CI_Controller
{
    function index()
    {
        // $data['row'] = $this->sasaran_model->get();
        $this->template->load('template', 'trx/order/order_data');
    }
}
