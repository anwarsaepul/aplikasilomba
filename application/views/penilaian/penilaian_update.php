<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="mx-auto col-8">
        <form action="<?= base_url('penilaian/process') ?>" method="POST">
            <div class="card mt-4">
                <div class="card-header text-center bg-success">
                    <strong><?= $inv->nama_kategori ?></strong>
                </div>
                <div class="row p-3">
                    <div class="col-4">
                        <span>No Peserta</span>
                    </div>
                    <div class="col-8">
                        <input type="text" value="<?= $inv->invoice ?>" class="form-control mb-2" disabled>
                    </div>
                    <div class="col-4">
                        <span>Nama Peserta</span>
                    </div>
                    <div class="col-8">
                        <input type="text" value="<?= $inv->nama_lengkap ?>" class="form-control mb-2" disabled>
                    </div>
                    <div class="col-4">
                        <span>Komunitas/Club</span>
                    </div>
                    <div class="col-8">
                        <input type="text" value="<?= $inv->komunitas ?>" class="form-control mb-2" disabled>
                    </div>
                    <div class="col-4">
                        <span>Jam Perlombaan</span>
                    </div>
                    <div class="col-8">
                        <input type="time" name="jam_perlombaan" value="<?= $inv->jam_perlombaan ?>" class="form-control mb-2">
                    </div>
                    <div class="col-4">
                        <span>Gelombang</span>
                    </div>
                    <div class="col-8">
                        <input type="text" name="gelombang" value="<?= $inv->gelombang ?>" class="form-control mb-2">
                    </div>
                    <div class="col-4">
                        <span>Lajur</span>
                    </div>
                    <div class="col-8">
                        <input type="text" name="lajur" value="<?= $inv->lajur ?>" class="form-control mb-2">
                    </div>
                    <div class="col-4">
                        <span>Nilai</span>
                    </div>
                    <div class="col-8">
                        <input type="text" name="nilai" value="<?= $inv->nilai ?>" class="form-control">
                        <input type="hidden" name="penilaian_id" value="<?= $inv->penilaian_id ?>">
                        <input type="hidden" name="invoice_id" value="<?= $inv->invoiceid ?>">
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name="save" class="btn bg-info">
                        <i class="fa fa-paper-plane"></i>Save Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>