<?php

class Profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['user_model']);
    }

    function index()
    {
        // echo 'ok';
        $id = $this->session->userdata('user_id');
        $data = $this->user_model->get($id);
        $user = $data->row();
        $data = array(
            'page'      => 'Add'
            // 'row'       => $perlombaan
        );
        // var_dump($data->result());
        $this->template->load('template', 'profile/profile_data', $data);
    }

    function add()
    {
        $perlombaan = new stdClass();
        $perlombaan->perlombaan_id        = null;
        $perlombaan->point               = null;
        $perlombaan->keterangan          = null;
        $perlombaan->durasi              = null;
        $perlombaan->jumlah_line         = null;

        $perlombaan->nama_kategori      = null;
        $perlombaan->jarak_sasaran      = null;
        $perlombaan->sasaran            = null;

        $data = array(
            'page'      => 'Add',
            'row'       => $perlombaan
        );

        $this->template->load('template', 'profile/profile_form', $data);
    }


    public function edit($id)
    {
        $query = $this->perlombaan_model->get($id);
        if ($query->num_rows() > 0) {
            $perlombaan     = $query->row();
            $data = array(
                'page'      => 'Edit',
                'row'       => $perlombaan,
            );
            $this->template->load('template', 'profile/profile_form', $data);
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
