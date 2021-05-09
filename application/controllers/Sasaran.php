<?php

class Sasaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model('sasaran_model');
    }

    function index()
    {
        $data['row'] = $this->sasaran_model->get();
        $this->template->load('template', 'lomba/sasaran/sasaran_data', $data);
    }

    function add()
    {
        $sasaran = new stdClass();
        $sasaran->sasaran_id = null;
        $sasaran->nama_sasaran = null;
        $data = array(
            'page'  => 'add',
            'row'   => $sasaran
        );
        $this->template->load('template', 'lomba/sasaran/sasaran_form', $data);
    }


    function edit($id)
    {
        $query = $this->sasaran_model->get($id);
        if ($query->num_rows() > 0) {
            $sasaran = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $sasaran
            );
            $this->template->load('template', 'lomba/sasaran/sasaran_form', $data);
        } else {
            tampil_error($lokasi = 'sasaran');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->sasaran_model->add($post);
            tampil_simpan($lokasi = 'sasaran');
        } elseif (isset($_POST['edit'])) {
            $this->sasaran_model->edit($post);
            tampil_edit($lokasi = 'sasaran');
        }
    }

    function del($id)
    {
        $this->sasaran_model->del($id);
        tampil_hapus($lokasi = 'sasaran');
    }
}
