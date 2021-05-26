<div class="container-fluid p-3">

	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="<?= base_url('assets/img/slider1.jpeg') ?>" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="<?= base_url('assets/img/slider2.jpeg') ?>" class="d-block w-100" alt="...">
			</div>
		</div>
	</div>

	<!-- membuat 1 baris -->
	<div class="row">
		<!-- lakukan looping -->
		<?php foreach ($row->result() as $key => $data) : ?>
			<div class="col-lg-3 col-sm-6">
				<div class="card mt-3 mb-3 text-center">
					<img src="<?= base_url() . 'uploads/panah.jpg' ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="mb-1"><?= $data->nama_kategori ?></h5>
						<small class=""><?= $data->keterangan ?></small><br>
						<span class="badge badge-success mb-3"><?= indo_currency($data->biaya) ?></span><br>
						<a href="<?= base_url('lomba/prosess/' . $data->lomba_id) ?>" class="btn btn-sm btn-primary mb-1">Masukan keranjang</a>
						<a class="btn btn-default btn-xs mb-1" id="set_detail" data-toggle="modal" data-target="#modal-detail" data-nama_kategori="<?= $data->nama_kategori ?>" data-jarak="<?= $data->jarak_sasaran ?>" data-nama_sasaran="<?= $data->nama_sasaran ?>" data-point="<?= $data->point ?>" data-keterangan="<?= $data->keterangan ?>" data-durasi="<?= $data->durasi ?>" data-jumlah_line="<?= $data->jumlah_line ?>" data-tanggal_tanding="<?= indo_date($data->tanggal_tanding) ?>" data-jam_tanding="<?= indo_jam($data->jam_tanding) ?>" data-biaya="<?= indo_currency($data->biaya) ?>">
							<i class="fa fa-eye"></i> Detail
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Detail Pertandingan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered text-center table-striped">
                    <tbody>
                        <tr>
                            <th>Nama Kategori</th>
                            <td><span id="nama_kategori2"></span></td>
                        </tr>
                        <tr>
                            <th>Jarak</th>
                            <td><span id="jarak"></span></td>
                        </tr>
                        <tr>
                            <th>Sasaran</th>
                            <td><span id="nama_sasaran"></td>
                        </tr>
                        <tr>
                            <th>Point</th>
                            <td><span id="point"></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><span id="keterangan"></td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td><span id="durasi"></td>
                        </tr>
                        <tr>
                            <th>Jumlah Line</th>
                            <td><span id="jumlah_line"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Tanding</th>
                            <td><span id="tanggal_tanding"></td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td><span id="jam_tanding"></td>
                        </tr>
                        <tr>
                            <th>Biaya</th>
                            <td><span id="biaya"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>