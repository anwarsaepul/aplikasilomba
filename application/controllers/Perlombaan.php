<?php

class Perlombaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        checkAdmin();
        $this->load->model(['perlombaan_model', 'kategori_model', 'jarak_model', 'sasaran_model']);
    }

    function index()
    {
        $data['row'] = $this->perlombaan_model->tampilItem();
        $this->template->load('template', 'lomba/perlombaan/perlombaan_data', $data);
    }

    function add()
    {
        $perlombaan = new stdClass();
        $perlombaan->perlombaan_id        = null;
        $perlombaan->perlombaan_sasaran   = null;
        $perlombaan->kategori_id         = null;
        $perlombaan->jarak_id            = null;
        // $perlombaan->sasaran_id          = null;
        $perlombaan->point               = null;
        $perlombaan->keterangan          = null;
        $perlombaan->durasi              = null;
        $perlombaan->jumlah_line         = null;

        $perlombaan->nama_kategori      = null;
        $perlombaan->jarak_sasaran      = null;
        $perlombaan->sasaran            = null;


        $query_kategori = $this->kategori_model->get();
        $query_jarak    = $this->jarak_model->get();
        // $query_sasaran  = $this->sasaran_model->get();

        $data = array(
            'page'      => 'Add',
            'kategori'  => $query_kategori,
            'jarak'     => $query_jarak,
            // 'sasaran'   => $query_sasaran,
            'row'       => $perlombaan
        );

        $this->template->load('template', 'lomba/perlombaan/perlombaan_form', $data);
    }


    public function edit($id)
    {
        $query = $this->perlombaan_model->get($id);
        if ($query->num_rows() > 0) {
            $perlombaan     = $query->row();
            $query_kategori = $this->kategori_model->get();
            $query_jarak    = $this->jarak_model->get();
            $query_sasaran  = $this->sasaran_model->get();

            $data = array(
                'page'      => 'Edit',
                'row'       => $perlombaan,
                'kategori'  => $query_kategori,
                'jarak'     => $query_jarak,
                'sasaran'   => $query_sasaran,
            );
            $this->template->load('template', 'lomba/perlombaan/perlombaan_form', $data);
        } else {
            tampil_error($lokasi = 'perlombaan');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            $this->perlombaan_model->add($post);
            tampil_simpan($lokasi = 'perlombaan');
        } elseif (isset($_POST['Edit'])) {
            $this->perlombaan_model->edit($post);
            tampil_edit($lokasi = 'perlombaan');
        }
    }

    function del($id)
    {
        $this->perlombaan_model->del($id);
        tampil_hapus($lokasi = 'perlombaan');
    }
}
