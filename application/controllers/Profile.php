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
        $id = $this->session->userdata('user_id');
        $data = $this->user_model->get($id);

        $query =  $this->user_model->get($id);
        if ($query->num_rows() > 0) {
            $user = $data->row();
        }
        $data = array(
            'user'      => $user
        );
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


    function edit($id)
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
        } elseif (isset($_POST['save'])) {
            // echo $post['alamat'];
            $this->user_model->update_profile($post);
            tampil_simpan($lokasi = 'profile');
        } elseif (isset($_POST['save_password'])) {
            if ($post['password'] != $post['password2']) {
                err_pass('profile/update_password');
            } else {
                $this->user_model->update_password($post);
                tampil_simpan($lokasi = 'profile');
            }
        }
    }

    function del($id)
    {
        $this->perlombaan_model->del($id);
        tampil_hapus($lokasi = 'perlombaan');
    }

    function update_profile() //id invoice
    {
        $id = $this->session->userdata('user_id');
        $query =  $this->user_model->get($id);
        if ($query->num_rows() > 0) {
            $user = $query->row();
        }
        $data = array(
            'user'      => $user
        );
        $this->template->load('template', 'profile/profile_form', $data);
    }

    function update_password() //id invoice
    {
        $this->template->load('template', 'profile/update_password');
    }
}
