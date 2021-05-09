<!-- Main content -->
<section class="content bg-light">
    <div class="box">
        <div class="box-header">
            <div class="col-sm mb-5 pt-3">
                <div class="float-left">
                    <h3><i class="nav-icon fa fa-object-group"></i> perlombaan</h3>
                </div>
                <div class="float-right">
                    <a href="<?= base_url('perlombaan') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="box pb-2">
                <div class="col-md-6 mx-auto col-md-offset-6">
                    <form action="<?= base_url('perlombaan/process') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="box-title text-center"><?= ucfirst($page) ?> Data Perlombaan</h3>
                        </div>
                        <div class="form-group">
                            <label>Kategori *</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">--Pilih Kategori--</option>
                                <?php foreach ($kategori->result() as $key => $data) { ?>
                                    <option value="<?= $data->kategori_id ?>" <?= $data->kategori_id == $row->kategori_id ? "selected" : null ?>><?= $data->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jarak *</label>
                            <select name="jarak" class="form-control" required>
                                <option value="">--Pilih Jarak--</option>
                                <?php foreach ($jarak->result() as $key => $data) { ?>
                                    <option value="<?= $data->jarak_id ?>" <?= $data->jarak_id == $row->jarak_id ? "selected" : null ?>><?= $data->jarak_sasaran ?> M</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sasaran *</label>
                            <select name="sasaran" class="form-control" required>
                                <option value="">--Pilih Sasaran--</option>
                                <?php foreach ($sasaran->result() as $key => $data) { ?>
                                    <option value="<?= $data->sasaran_id ?>" <?= $data->sasaran_id == $row->sasaran_id ? "selected" : null ?>><?= $data->nama_sasaran ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="point">Point *</label>
                            <input type="hidden" name="id" value="<?= $row->perlombaan_id ?>">
                            <input type="number" value="<?= $row->point ?>" class="form-control" id="point" name="point" required placeholder="Input point">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan *</label>
                            <textarea class="form-control" name="keterangan" placeholder="Input keterangan"><?= $row->keterangan ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi *</label>
                            <input type="number" value="<?= $row->durasi ?>" class="form-control" id="durasi" name="durasi" required placeholder="Input durasi">
                        </div>
                        <div class="form-group">
                            <label for="line">Jumlah Line *</label>
                            <input type="number" value="<?= $row->jumlah_line ?>" class="form-control" id="line" name="line" required placeholder="Input line">
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya *</label>
                            <input type="number" value="<?= $row->biaya ?>" class="form-control" id="line" name="biaya" required placeholder="Input biaya">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Save
                            </button>
                            <button type="reset" class="btn btn-flat btn-warning"><i class="fas fa-sync-alt"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>