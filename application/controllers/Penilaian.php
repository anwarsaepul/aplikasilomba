<?php

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['info_model', 'perlombaan_model', 'lomba_model', 'invoice_model', 'pembayaran_model']);
    }

    function index()
    {
        $data['invoice'] = $this->invoice_model->tampil_peserta();
        $this->template->load('template', 'penilaian/penilaian_data', $data);
    }

    function input($id)
    {
        $invoice    = $this->invoice_model->getinvoicedetail2($id);
        $cekinvoice = $this->invoice_model->get($id);
        $gambar     = $this->pembayaran_model->tampilgambar($id);

        // if ($cekinvoice->num_rows() > 0) {
        $inv = $invoice->row();
        $data = array(
            'inv'       => $inv,
            'invoice'   => $invoice,
            'gambar'    => $gambar,
        );
        // } 
        // else {
        //     tampil_error($lokasi = 'invoice');
        // }
        // var_dump($cekinvoice->result());
        // $this->template->load('template', 'trx/invoice/invoice_detail', $data);


        // $data['invoice'] = $this->invoice_model->tampil_peserta();
        $this->template->load('template', 'penilaian/penilaian_form', $data);
    }


    function add()
    {
        checkAdmin();
        ini_set('date.timezone', 'Asia/Jakarta');
        $info = new stdClass();
        $info->lomba_id           = null;
        $info->perlombaan_id      = null;
        $info->nama_kategori      = null;
        $info->tanggal_tanding    = date('Y-m-d');
        $info->jam_tanding        = date('H:i');
        $info->biaya              = null;

        $lomba = $this->perlombaan_model->tampilItem()->result();

        $data = array(
            'page'      => 'Add',
            'lomba'     => $lomba,
            'row'       => $info
        );

        $this->template->load('template', 'penilaian/penilaian_form', $data);
    }


    public function edit($id)
    {
        checkAdmin();
        // $query = $this->info_model->tampilItem($id);
        $query = $this->lomba_model->tampilItem($id);
        if ($query->num_rows() > 0) {
            $info         = $query->row();

            $lomba = $this->perlombaan_model->tampilItem()->result();

            $data = array(
                'page'      => 'Edit',
                'lomba'     => $lomba,
                'row'       => $info,
            );
            $this->template->load('template', 'lomba/info/info_form', $data);
        } else {
            tampil_error($lokasi = 'info');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            // $this->info_model->add($post);
            $this->lomba_model->add($post);
            tampil_simpan($lokasi = 'info');
        } elseif (isset($_POST['Edit'])) {
            // $this->info_model->edit($post);
            $this->lomba_model->edit($post);
            tampil_edit($lokasi = 'info');
        }
    }

    function del($id)
    {
        // $this->info_model->del($id);
        $this->lomba_model->del($id);
        tampil_hapus($lokasi = 'info');
    }
}
