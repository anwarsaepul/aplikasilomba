<?php

class jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        flashData();
        checklogin();
        $this->load->model(['jadwal_model', 'kategori_model', 'jarak_model', 'sasaran_model', 'perlombaan_model']);
    }

    function index()
    {
        $data['row'] = $this->jadwal_model->tampilItem();
        $this->template->load('template', 'lomba/jadwal/jadwal_data', $data);
    }

    function add()
    {
        $jadwal = new stdClass();
        $jadwal->jadwal_id          = null;
        $jadwal->nama_kategori      = null;
        $jadwal->tanggal_tanding    = date('Y-m-d');
        $jadwal->jam_tanding        = date('H:i', time() + (60 * 60 * 5));
        $jadwal->biaya              = null;

        $lomba = $this->perlombaan_model->tampilItem()->result();

        $data = array(
            'page'      => 'Add',
            'lomba'     => $lomba,
            'row'       => $jadwal
        );

        $this->template->load('template', 'lomba/jadwal/jadwal_form', $data);
    }


    public function edit($id)
    {
        $query = $this->jadwal_model->tampilItem($id);
        if ($query->num_rows() > 0) {
            $jadwal         = $query->row();

            $lomba = $this->perlombaan_model->tampilItem()->result();

            // $query_kategori = $this->kategori_model->get();
            // $query_jarak    = $this->jarak_model->get();
            // $query_sasaran  = $this->sasaran_model->get();

            $data = array(
                'page'      => 'Edit',
                'lomba'     => $lomba,
                'row'       => $jadwal,
                // 'kategori'  => $query_kategori,
                // 'jarak'     => $query_jarak,
                // 'sasaran'   => $query_sasaran,
            );
            $this->template->load('template', 'lomba/jadwal/jadwal_form', $data);
        } else {
            tampil_error($lokasi = 'jadwal');
        }
    }

    function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['Add'])) {
            $this->jadwal_model->add($post);
            tampil_simpan($lokasi = 'jadwal');
        } elseif (isset($_POST['Edit'])) {
            $this->jadwal_model->edit($post);
            tampil_edit($lokasi = 'jadwal');
        }
    }

    function del($id)
    {
        $this->jadwal_model->del($id);
        tampil_hapus($lokasi = 'jadwal');
    }
}
