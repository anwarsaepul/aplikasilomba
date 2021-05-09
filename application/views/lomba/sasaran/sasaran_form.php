<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="col-sm mb-5 pt-3">
                <div class="float-left">
                    <h3><i class="nav-icon fa fa-object-group"></i> Sasaran</h3>
                </div>
                <div class="float-right">
                    <a href="<?= base_url('sasaran') ?>" class="btn btn-warning btn-flat"><i class="nav-icon fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="box-body">
            <div class="box">
                <div class="col-md-6 mx-auto col-md-offset-6">
                    <form action="<?= base_url('sasaran/process') ?>" method="POST">
                        <div class="form-group">
                            <h3 class="box-title text-center"><?= ucfirst($page) ?> Data Sasaran</h3>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Sasaran *</label>
                            <input type="hidden" name="id" value="<?= $row->sasaran_id ?>">
                            <input type="text" value="<?= $row->nama_sasaran ?>" class="form-control" name="nama_sasaran" required placeholder="Input nama Sasaran">
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