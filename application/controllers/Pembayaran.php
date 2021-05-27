<?php

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['pembayaran_model', 'kategori_model', 'jarak_model', 'sasaran_model', 'invoice_model']);
    }

    // function index($id = null)
    // {
    //     // $data['row'] = $this->pembayaran_model->tampilItem();
    //     $this->template->load('template', 'trx/pembayaran/pembayaran_data');
    // }

    function index($id)
    {
        // $invoice    = $this->invoice_model->getinvoicedetail();
        // $row        = $this->lomba_model->tampilItem2();

        // if ($invoice->num_rows() > 0) {
        //     $inv = $invoice->row();
        //     $data = array(
        //         'inv'       => $inv,
        //         'invoice'   => $invoice,
        //         'row'       => $row,
        //     );
        // }
        echo $id;
        // var_dump($invoice->result());
        // $this->template->load('template', 'trx/pembayaran/pembayaran_data', $data);
    }

    function add()
    {
        $pembayaran = new stdClass();
        $pembayaran->pembayaran_id        = null;
        $pembayaran->pembayaran_sasaran   = null;
        $pembayaran->kategori_id         = null;
        $pembayaran->jarak_id            = null;
        $pembayaran->sasaran_id          = null;
        $pembayaran->point               = null;
        $pembayaran->keterangan          = null;
        $pembayaran->durasi              = null;
        $pembayaran->jumlah_line         = null;

        $query_kategori = $this->kategori_model->get();
        $query_jarak    = $this->jarak_model->get();
        $query_sasaran  = $this->sasaran_model->get();

        $data = array(
            'page'      => 'Add',
            'kategori'  => $query_kategori,
            'jarak'     => $query_jarak,
            'sasaran'   => $query_sasaran,
            'row'       => $pembayaran
        );

        $this->template->load('template', 'lomba/pembayaran/pembayaran_form', $data);
    }


    public function edit($id)
    {
        $query = $this->pembayaran_model->get($id);
        if ($query->num_rows() > 0) {
            $pembayaran = $query->row();
            $query_kategori = $this->kategori_model->get();
            $query_jarak    = $this->jarak_model->get();
            $query_sasaran  = $this->sasaran_model->get();

            $data = array(
                'page'      => 'Edit',
                'row'       => $pembayaran,
                'kategori'  => $query_kategori,
                'jarak'     => $query_jarak,
                'sasaran'   => $query_sasaran,
            );
            $this->template->load('template', 'lomba/pembayaran/pembayaran_form', $data);
        } else {
            tampil_error($lokasi = 'pembayaran');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            $this->pembayaran_model->add($post);
            tampil_simpan($lokasi = 'pembayaran');
        } elseif (isset($_POST['Edit'])) {
            $this->pembayaran_model->edit($post);
            tampil_edit($lokasi = 'pembayaran');
        }
    }

    function del($id)
    {
        $this->pembayaran_model->del($id);
        tampil_hapus($lokasi = 'pembayaran');
    }
}
