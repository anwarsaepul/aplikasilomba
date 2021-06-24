<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        head_web();
        flashData();
    }

    function login()
    {
        checklog();
        $this->load->view('auth/login');
    }

    function registrasi()
    {
        $this->load->view('auth/registrasi');
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['login'])){
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            if($query->num_rows() > 0 ){
                // di ekstra
                // $row = $query->row();
                $datalogin = $query->row_array();
                $data = array(
                    'user_id'       => $datalogin['user_id'],
                    'nama_lengkap'  => $datalogin['nama_lengkap'],
                    'nik'           => $datalogin['nik'],
                    'phone'       => $datalogin['user_id'],
                    'phone'         => $datalogin['phone'],
                    'password'      => $datalogin['password'],
                    'level'         => $datalogin['level'],
                );
                $this->session->set_userdata($data); 
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500,
                        title: 'Login Berhasil'
                    }).then((result) => {
                    window.location='<?= site_url('dashboard') ?>';
                    })
                </script>
                <?php
            }else{
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Gagal',
                        showConfirmButton: false,
                        timer: 1500,
                        title: 'Login Gagal'
                    }).then((result) => {
                    window.location='<?= site_url('auth/login') ?>';
                    })
                </script>
                <?php
            }
        }elseif(isset($post['registrasi'])){
            $this->load->model('user_model');
            if ($post['password'] != $post['password2']){
                err_pass('auth/registrasi');
            }
            else {
                if ($this->user_model->check_data('nik', $post['nik'])->num_rows() > 0) {
                    err_nik('auth/registrasi');
                }elseif ($this->user_model->check_data('phone', $post['phone'])->num_rows() > 0) {
                    err_phone('auth/registrasi');
                }else{
                $this->user_model->registrasi($post);
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1000,
                        title: 'Registrasi Berhasil <br> Silahkan Login'
                    }).then((result) => {
                    window.location='<?= site_url() ?>';
                    })
                </script>
                <?php
                }
            }
        }
    }

    function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
