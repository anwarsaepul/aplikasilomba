<?php

class Perlombaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        checkAdmin();
        $this->load->model(['perlombaan_model']);
    }

    function index()
    {
        $data['row'] = $this->perlombaan_model->tampilItem();
        $this->template->load('template', 'lomba/perlombaan/perlombaan_data', $data);
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
        $perlombaan->tanggal_tanding    = date('Y-m-d');
        $perlombaan->jam_tanding        = date('H:i');
        $perlombaan->biaya              = null;

        $data = array(
            'page'      => 'Add',
            'row'       => $perlombaan
        );

        $this->template->load('template', 'lomba/perlombaan/perlombaan_form', $data);
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
            $this->template->load('template', 'lomba/perlombaan/perlombaan_form', $data);
        } else {
            tampil_error($lokasi = 'perlombaan');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            // $this->perlombaan_model->add($post);
            // tampil_simpan($lokasi = 'perlombaan');
                $config['upload_path']      = './assets/img/uploads/lomba/';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                $config['max_size']         = '2048';
                $config['file_name']         = 'ID-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
    
                // ketika berhasil diupload
                if ($this->upload->do_upload('gambar')) {
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->perlombaan_model->add($post);
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
                            window.location = '<?= site_url('perlombaan') ?>';
                        })
                    </script>
                    <?php
                }
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
