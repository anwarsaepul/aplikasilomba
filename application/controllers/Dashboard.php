<?php 

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['lomba_model']);
    }

    function index()
    {
        $data['row'] = $this->lomba_model->tampilItem2();
        $this->template->load('template', 'dashboard', $data);
    }
}