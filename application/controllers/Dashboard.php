<?php 

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['lomba_model', 'keranjang_model', 'order_model', 'perlombaan_model']);
    }

    function index()
    {
        $lomba  = $this->perlombaan_model->tampilItem();
        $row    = $this->lomba_model->tampiljumlahpeserta();

        $data = array(
            'row'       => $row,
            'lomba'   => $lomba,
        );
        $this->template->load('template', 'dashboard', $data);
        // var_dump($row->result());
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