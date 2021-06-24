<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        head_web();
        flashData();
    }

    function index()
    {
        $this->load->view('home/header');
        $this->load->view('home/home');
    }

    function petunjuk_teknis()
    {
        $this->load->view('home/header');
        $this->load->view('home/petunjuk_teknis');
    }

    function faq()
    {
        $this->load->view('home/faq');
    }

    function kontak()
    {
        $this->load->view('home/header');
        $this->load->view('home/kontak');
    }

    
}