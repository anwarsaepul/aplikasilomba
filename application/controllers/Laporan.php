<?php
class Laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    flashData();
    checklogin();
    checkAdmin();
    $this->load->model(['invoice_model', 'pembayaran_model', 'order_model', 'perlombaan_model']);
  }


  function index()
  {
    redirect('laporan/invoice');
  }

  function invoice()
  {
    $invoice    = $this->invoice_model->getall();
    // $invoice    = $this->invoice_model->tampilsemuapeserta();
    
    $data = array(
      'invoice'   => $invoice,
    );
    $this->template->load('template', 'laporan/invoice_data', $data);
    // var_dump($invoice->result());
  }

  function peserta()
  {
    $peserta  = $this->order_model->tampil_peserta();
    $data = array(
      'invoice'   => $peserta,
    );
    // var_dump($peserta->result());
    $this->template->load('template', 'laporan/peserta_data', $data);
  }

  function jadwal()
  {
    $namalomba                  = new stdClass();
    $namalomba->perlombaan_id   = null;
    $namalomba->nama_kategori   = null;

    $get        = $this->order_model->lomba_terbaru()->row()->perlombaan_id;
    $invoice    = $this->order_model->tampil_peserta3($get);
    $perlombaan = $this->perlombaan_model->get($get)->row();
    $lomba      = $this->perlombaan_model->get();
    $data = array(
      'row'           => $namalomba,
      'lomba'         => $lomba,
      'invoice'       => $invoice,
      'perlombaan'    => $perlombaan,
    );
    $this->template->load('template', 'laporan/jadwal_data', $data);
  }

  function process()
  {
    $namalomba                  = new stdClass();
    $namalomba->perlombaan_id   = null;
    $namalomba->nama_kategori   = null;

    if (isset($_POST['filter'])) {
      if ($_POST['filterdata'] == '') {
        $invoice    = $this->invoice_model->getall();
      } else {
        $invoice    = $this->invoice_model->filter_data($_POST['filterdata']);
      }
      $data = array(
        'invoice'   => $invoice,
      );
      $this->template->load('template', 'laporan/invoice_data', $data);
    } else if (isset($_POST['filter_jadwal'])) {
      $invoice    = $this->order_model->tampil_peserta3($_POST['filterdata']);
      $lomba      = $this->perlombaan_model->get();
      $perlombaan = $this->perlombaan_model->get($_POST['filterdata'])->row();

      $data = array(
        'row'           => $namalomba,
        'lomba'         => $lomba,
        'invoice'       => $invoice,
        'perlombaan'    => $perlombaan,
      );
      $this->template->load('template', 'laporan/jadwal_data', $data);
    }
  }
}
