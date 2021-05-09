<?php

class Jarak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model('jarak_model');
    }

    function index()
    {
        $data['row'] = $this->jarak_model->get();
        $this->template->load('template', 'lomba/jarak/jarak_data', $data);
    }

    function add()
    {
        $jarak = new stdClass();
        $jarak->jarak_id = null;
        $jarak->jarak_sasaran = null;
        $data = array(
            'page'  => 'add',
            'row'   => $jarak
        );
        $this->template->load('template', 'lomba/jarak/jarak_form', $data);
    }


    function edit($id)
    {
        $query = $this->jarak_model->get($id);
        if ($query->num_rows() > 0) {
            $jarak = $query->row();
            $data = array(
                'page'  => 'edit',
                'row'   => $jarak
            );
            $this->template->load('template', 'lomba/jarak/jarak_form', $data);
        } else {
            tampil_error($lokasi = 'jarak');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->jarak_model->add($post);
            tampil_simpan($lokasi = 'jarak');
        } elseif (isset($_POST['edit'])) {
            $this->jarak_model->edit($post);
            tampil_edit($lokasi = 'jarak');
        }
    }

    function del($id)
    {
        $this->jarak_model->del($id);
        tampil_hapus($lokasi = 'jarak');
    }
}
