<?php

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model('kategori_model');
    }

    function index()
    {
        $data['row'] = $this->kategori_model->get();
        $this->template->load('template', 'lomba/kategori/kategori_data', $data);
    }

    function add()
    {
        $kategori = new stdClass();
        $kategori->kategori_id = null;
        $kategori->nama_kategori = null;

        $data = array(
            'page'      => 'add',
            'row'       => $kategori
        );
        $this->template->load('template', 'lomba/kategori/kategori_form', $data);
    }


    function edit($id)
    {
        $query = $this->kategori_model->get($id);
        if ($query->num_rows() > 0) {
            $kategori = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $kategori
            );
            $this->template->load('template', 'lomba/kategori/kategori_form', $data);
        } else {
            tampil_error($lokasi = 'kategori');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->kategori_model->add($post);
            tampil_simpan($lokasi = 'kategori');
        }elseif (isset($_POST['edit'])) {
            $this->kategori_model->edit($post);
            tampil_edit($lokasi = 'kategori');            
        }
    }

    function del($id)
    {
        $this->kategori_model->del($id);
        tampil_hapus($lokasi = 'kategori');
    }
}