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
        $get        = $this->perlombaan_model->perlombaan_terbaru()->row()->perlombaan_id;
        $invoice    = $this->order_model->tampil_peserta3($get);
        $perlombaan = $this->perlombaan_model->get($get)->row();


        $lomba  = $this->perlombaan_model->tampilItem();
        $row    = $this->lomba_model->tampillomba2();

        // $data = [
        //         'row'           => $row,
        //         'lomba'         => $lomba,
        //         'invoice'       => $invoice,
        //         'perlombaan'    => $perlombaan
        //         ];

        $data = array(
            'row'           => $row,
            'lomba'         => $lomba,
            'invoice'       => $invoice,
            'perlombaan'    => $perlombaan,

        );
        $this->template->load('template', 'dashboard', $data);
        // var_dump($lomba->result());
    }

    function process()
    {
        if (isset($_POST['filter'])) {
            $invoice    = $this->order_model->tampil_peserta3($_POST['filterdata']);
            $lomba      = $this->perlombaan_model->get();
            $perlombaan = $this->perlombaan_model->get($_POST['filterdata'])->row();

            $data = array(
                // 'row'           => $namalomba,
                'lomba'         => $lomba,
                'invoice'       => $invoice,
                'perlombaan'    => $perlombaan,
            );
            $this->template->load('template', 'penilaian/penilaian_data', $data);
        }
    }
}
