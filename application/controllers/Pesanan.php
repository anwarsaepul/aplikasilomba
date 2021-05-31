<?php
class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['keranjang_model', 'info_model', 'perlombaan_model', 'order_model', 'invoice_model', 'lomba_model', 'pembayaran_model']);
    }

    function index()
    {
        $invoice    = $this->invoice_model->get();
        $row        = $this->info_model->tampilItem2();
        $keranjang  = $this->keranjang_model->getkeranjang();

        $data = array(
            'row'       => $row,
            'keranjang' => $keranjang,
            'invoice'   => $invoice,
        );
        $this->template->load('template', 'trx/pesanan/pesanan_data', $data);
    }


    function detail($id)
    {
        $invoice    = $this->invoice_model->getinvoicedetail2($id);
        $cekinvoice = $this->invoice_model->get($id);
        $gambar     = $this->pembayaran_model->tampilgambar($id);

        if ($cekinvoice->num_rows() > 0) {
            $inv = $invoice->row();
            $data = array(
                'inv'       => $inv,
                'invoice'   => $invoice,
                'gambar'    => $gambar,
            );
        } else {
            tampil_error($lokasi = 'pesanan');
        }
        // var_dump($cekinvoice->result());
        $this->template->load('template', 'trx/pesanan/pesanan_detail', $data);
    }



    function bayar($id)
    {
        $invoice    = $this->invoice_model->getinvoicedetail2($id);
        $cekinvoice = $this->invoice_model->get($id);
        // $row        = $this->lomba_model->tampilItem2();

        if ($cekinvoice->num_rows() > 0) {
            $inv = $cekinvoice->row();
            $data = array(
                'inv'       => $inv,
                'invoice'   => $invoice,
                // 'row'       => $row,
            );
        } else {
            tampil_error($lokasi = 'pesanan');
        }
        // var_dump($cekinvoice->result());
        $this->template->load('template', 'trx/pembayaran/pembayaran_data', $data);
    }





    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            // validasi invoice jika kode invoice sama, maka datanya akan di update
            if ($this->keranjang_model->check_lomba_id($post['id'])->num_rows() > 0) {
                redirect('keranjang');
            } else {
                $this->keranjang_model->add_keranjang($post);
                $this->order_model->add($post);
                redirect('keranjang');
            }
        } else if (isset($_POST['process-payment'])) {
            // echo $post['perlombaan_id2'];
            // $this->detail_model->add($post);
            $this->order_model->update_invoice($post);
            $this->keranjang_model->del('user_id', $this->session->userdata('user_id'));
            // $this->keranjang_model->del('user_id', $this->session->userdata('user_id'));


            // $this->sale_model->add_transaksi($post);
            // $this->kredit_model->add_transaksik($post);
            // $this->db->empty_table('t_keranjang');
            // redirect('sale');
            // tampil_simpan('report/penjualan');
        } else if (isset($_POST['pembayaran'])) {
            // $config['upload-path']      = './assets/img/uploads/pembayaran/';
            $config['upload_path']      = './assets/img/uploads/pembayaran/';
            $config['allowed_types']    = 'gif|jpg|jpeg|png';
            $config['max_size']         = '2048';
            $config['file_name']         = 'ID-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            // ketika berhasil diupload
            if ($this->upload->do_upload('gambar')) {
                $post['gambar'] = $this->upload->data('file_name');
                $this->pembayaran_model->add($post);
                $this->invoice_model->update_status($post);
            } else {
                $this->upload->display_errors();
                ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        text: 'Error',
                        showConfirmButton: false,
                        timer: 1500,
                        title: 'Photo gagal diupload!'
                    }).then((result) => {
                        window.location = '<?= site_url('pesanan') ?>';
                    })
                </script>
                <?php
            }
            tampil_simpan('pesanan/detail/' . $post['invoice_id']);
        }
    }

    function del()
    {
        $keranjang  = $this->uri->segment(3);
        $lomba      = $this->uri->segment(4);
        // echo $keranjang;

        $query = $this->keranjang_model->get($keranjang);
        if ($query->num_rows() > 0) {
            $this->keranjang_model->del('keranjang_id', $keranjang);
            $this->order_model->del('lomba_id', $lomba);
            tampil_hapus($lokasi = 'keranjang');
        } else {
            tampil_error($lokasi = 'keranjang');
        }
    }
}
