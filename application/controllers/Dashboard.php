<?php 

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['lomba_model', 'keranjang_model', 'order_model']);
    }

    function index()
    {
        $data['row'] = $this->lomba_model->tampilItem2();
        $this->template->load('template', 'dashboard', $data);
    }


    function process($id)
    {
        // $post = $this->input->post(null, TRUE);
        // if (isset($_POST['add_cart'])) {
            // validasi invoice jika kode invoice sama, maka datanya akan di update
            if ($this->keranjang_model->check_lomba_id($id)->num_rows() > 0) {
                redirect('dashboard');
            } else {
                $this->keranjang_model->add_keranjang($id);
                $this->order_model->add($id);
                redirect('dashboard');
            }
        }
    // }
}