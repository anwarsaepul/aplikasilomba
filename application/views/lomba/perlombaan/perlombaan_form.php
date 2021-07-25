<!-- Main content -->
<section class="content bg-light">
    <div class="box">
        <div class="box-header">
            <div class="col-sm mb-5 pt-3">
                <div class="float-left">
                    <h3><i class="nav-icon fa fa-object-group"></i> Perlombaan</h3>
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
                    <?= form_open_multipart('perlombaan/process') ?>
                    <div class="form-group">
                        <h3 class="box-title text-center"><?= ucfirst($page) ?> Data Perlombaan</h3>
                    </div>
                    <div class="form-group">
                        <label>Kategori *</label>
                        <input type="text" value="<?= $row->nama_kategori ?>" class="form-control" id="kategori" name="kategori" required placeholder="Input Nama Kategori">
                    </div>
                    <div class="form-group">
                        <label for="jarak">Jarak *</label>
                        <input type="number" value="<?= $row->jarak_sasaran ?>" class="form-control" id="jarak" name="jarak" required placeholder="Input jarak Sasaran">
                    </div>
                    <div class="form-group">
                        <label>Sasaran *</label>
                        <input type="text" value="<?= $row->sasaran ?>" class="form-control" id="sasaran" name="sasaran" required placeholder="Input sasaran">
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
                        <label for="date">Tanggal Perlombaan *</label>
                        <div class="form-group">
                            <input type="date" name="date" id="date" value="<?= $row->tanggal_tanding ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date">Jam Tanding *</label>
                        <div class="form-group">
                            <input type="time" name="jam" value="<?= $row->jam_tanding ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya *</label>
                        <input type="number" value="<?= $row->biaya ?>" class="form-control" id="line" name="biaya" required placeholder="Input biaya">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Pilih Gambar</label>
                        <div class="custom-file">
                            <input type="file" name="gambar" id="gambar" required>
                        </div>
                    </div>
                    </td>
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