<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['lomba_model',  'order_model', 'perlombaan_model']);
    }

    function index()
    {
        $lomba  = $this->perlombaan_model->tampilItem();
        $row    = $this->lomba_model->tampillomba2();

        $data = array(
            'row'       => $row,
            'lomba'   => $lomba,
        );
        $this->template->load('template', 'dashboard', $data);
        // var_dump($row->result());
    }
}
