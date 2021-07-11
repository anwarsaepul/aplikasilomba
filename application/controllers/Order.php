<?php
class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['invoice_model', 'lomba_model', 'order_model']);
    }

    function process($id)
    {
        $query = $this->lomba_model->get($id);
        if ($query->num_rows() > 0) {
            $inv = $this->invoice_model->invoice_no();
            $this->order_model->add($id, $inv);
            $this->invoice_model->add($inv);
            tampil_simpan('pesanan');
            // $this->order_model->add($id);
            // $this->invoice_model->add($post);
            // $this->order_model->update_invoice($inv);
        }else {
            tampil_error($lokasi = 'dashboard');
        }

        // $post = $this->input->post(null, TRUE);
        // if (isset($_POST['daftar'])) {
            // $inv = $this->invoice_model->invoice_no();
            // $this->order_model->add($id);

        // var_dump($id);
            
            // // $this->invoice_model->add($post);
            // $this->order_model->update_invoice($inv);
            // $this->keranjang_model->del('user_id', $this->session->userdata('user_id'));
            // redirect('pesanan');
        // }
        // var_dump($id);
    }
}
