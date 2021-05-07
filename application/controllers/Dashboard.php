<?php 

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
    }

    public function index()
    {
        $this->template->load('template', 'dashboard');
    }
}