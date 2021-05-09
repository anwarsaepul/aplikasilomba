<?php

class penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['penilaian_model', 'kategori_model', 'jarak_model', 'sasaran_model']);
    }

    function index()
    {
        $data['row'] = $this->penilaian_model->tampilItem();
        $this->template->load('template', 'lomba/penilaian/penilaian_data', $data);
    }

    function add()
    {
        $penilaian = new stdClass();
        $penilaian->penilaian_id        = null;
        $penilaian->penilaian_sasaran   = null;
        $penilaian->kategori_id         = null;
        $penilaian->jarak_id            = null;
        $penilaian->sasaran_id          = null;
        $penilaian->point               = null;
        $penilaian->keterangan          = null;
        $penilaian->durasi              = null;
        $penilaian->jumlah_line         = null;

        $query_kategori = $this->kategori_model->get();
        $query_jarak    = $this->jarak_model->get();
        $query_sasaran  = $this->sasaran_model->get();

        $data = array(
            'page'      => 'Add',
            'kategori'  => $query_kategori,
            'jarak'     => $query_jarak,
            'sasaran'   => $query_sasaran,
            'row'       => $penilaian
        );

        $this->template->load('template', 'lomba/penilaian/penilaian_form', $data);
    }


    public function edit($id)
    {
        $query = $this->penilaian_model->get($id);
        if ($query->num_rows() > 0) {
            $penilaian = $query->row();
            $query_kategori = $this->kategori_model->get();
            $query_jarak    = $this->jarak_model->get();
            $query_sasaran  = $this->sasaran_model->get();

            $data = array(
                'page'      => 'Edit',
                'row'       => $penilaian,
                'kategori'  => $query_kategori,
                'jarak'     => $query_jarak,
                'sasaran'   => $query_sasaran,
            );
            $this->template->load('template', 'lomba/penilaian/penilaian_form', $data);
        } else {
            tampil_error($lokasi = 'penilaian');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            $this->penilaian_model->add($post);
            tampil_simpan($lokasi = 'penilaian');
        } elseif (isset($_POST['Edit'])) {
            $this->penilaian_model->edit($post);
            // echo $post['id'];
            tampil_edit($lokasi = 'penilaian');
        }
    }

    function del($id)
    {
        $this->penilaian_model->del($id);
        tampil_hapus($lokasi = 'penilaian');
    }
}
