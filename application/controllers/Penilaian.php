<?php

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['info_model', 'perlombaan_model', 'lomba_model', 'invoice_model', 'pembayaran_model', 'penilaian_model', 'order_model']);
    }

    function index()
    {
        $namalomba                  = new stdClass();
        $namalomba->perlombaan_id   = null;
        $namalomba->nama_kategori   = null;

        $get        = $this->order_model->lomba_terbaru()->row()->perlombaan_id;
        $invoice    = $this->order_model->tampil_peserta3($get);
        $perlombaan = $this->perlombaan_model->get($get)->row()->nama_kategori;
        $lomba      = $this->perlombaan_model->get();
        $data = array(
            'row'           => $namalomba,
            'lomba'         => $lomba,
            'invoice'       => $invoice,
            'nama_kategori' => $perlombaan,
        );
        $this->template->load('template', 'penilaian/penilaian_data', $data);
        // var_dump($perlombaan);

    }

    function input($id) //id invoice
    {
        checkAdmin();
        $invoice    = $this->invoice_model->getinvoicedetail4($id);
        // $invoice    = $this->penilaian_model->penilaiandetail($id);

        $cekinvoice = $this->invoice_model->get($id);
        $gambar     = $this->pembayaran_model->tampilgambar($id);

        // if ($cekinvoice->num_rows() > 0) {
        $inv = $invoice->row();
        $data = array(
            'inv'       => $inv,
            'invoice'   => $invoice,
            'gambar'    => $gambar,
        );
        $this->template->load('template', 'penilaian/penilaian_form', $data);
        // var_dump($invoice->result());
    }

    function update($id) //id invoice
    {
        checkAdmin();
        $invoice    = $this->invoice_model->getinvoicedetail4($id);
        $cekinvoice = $this->invoice_model->get($id);
        $gambar     = $this->pembayaran_model->tampilgambar($id);

        // if ($cekinvoice->num_rows() > 0) {
        $inv = $invoice->row();
        $data = array(
            'inv'       => $inv,
            'invoice'   => $invoice,
            'gambar'    => $gambar,
        );
        $this->template->load('template', 'penilaian/penilaian_update', $data);
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
        $namalomba                  = new stdClass();
        $namalomba->perlombaan_id   = null;
        $namalomba->nama_kategori   = null;

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            // $this->info_model->add($post);
            $this->lomba_model->add($post);
            tampil_simpan($lokasi = 'info');
        } elseif (isset($_POST['Edit'])) {
            // $this->info_model->edit($post);
            $this->lomba_model->edit($post);
            tampil_edit($lokasi = 'info');
        } elseif (isset($_POST['save'])) {
            $this->penilaian_model->update_data($post);
            // echo $post['nilai'];
            tampil_simpan($lokasi = 'penilaian/input/' . $post['invoice_id']);
        } else if (isset($_POST['filter'])) {
            $invoice    = $this->order_model->tampil_peserta3($_POST['filterdata']);
            $lomba      = $this->perlombaan_model->get();
            $perlombaan = $this->perlombaan_model->get($_POST['filterdata'])->row()->nama_kategori;

            $data = array(
                'row'           => $namalomba,
                'lomba'         => $lomba,
                'invoice'       => $invoice,
                'nama_kategori' => $perlombaan,
            );
            $this->template->load('template', 'penilaian/penilaian_data', $data);
        }
        // var_dump($invoice);
    }

    // function del($id)
    // {
    //     // $this->info_model->del($id);
    //     $this->lomba_model->del($id);
    //     tampil_hapus($lokasi = 'info');
    // }
}
