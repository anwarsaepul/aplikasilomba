<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="mx-auto col-8">
        <div class="card mt-4">
            <div class="card-header text-center bg-success">
                <strong><?= $inv->nama_kategori ?></strong>
            </div>
            <div class="row p-3">
                <div class="col-4">
                    <span>No Peserta</span>
                </div>
                <div class="col-8">
                    <span>: <?= $inv->invoice ?> </span>
                </div>
                <div class="col-4">
                    <span>Nama Peserta</span>
                </div>
                <div class="col-8">
                    <span>: <?= $inv->nama_lengkap ?> </span>
                </div>
                <div class="col-4">
                    <span>Komunitas/Club</span>
                </div>
                <div class="col-8">
                    <span>: <?= $inv->komunitas ?> </span>
                </div>
                <div class="col-4">
                    <span>Gelombang</span>
                </div>
                <div class="col-8">
                    <span>: <?= $inv->gelombang ?> </span>
                </div>
                <div class="col-4">
                    <span>Lajur</span>
                </div>
                <div class="col-8">
                    <span>: <?= $inv->lajur ?> </span>
                </div>
                <div class="col-4">
                    <span>Nilai</span>
                </div>
                <div class="col-8">
                    <span>: <?= $inv->nilai ?> </span>
                </div>
            </div>
            <div class="form-group text-center">
                <a href="<?= base_url('penilaian/update/' . $inv->invoice_id) ?>" class="btn bg-info">
                    <i class="fa fa-edit"></i> Update Data
                </a>
            </div>
        </div>
    </div>
</section>