<body class="content bg-light">
    <div class="box-body">
        <div class="box pb-2">
            <div class="col-md-4 mx-auto col-md-offset-6">
                <div class="card p-3 mt-5 mb-5">
                    <div class="card-body login-card-body">
                        <div class="form-group text-center">
                            <h3>Daftar Akun</h3>
                        </div>
                        <form action="<?= base_url() ?>auth/process" method="post">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" class="form-control" name="nik" required placeholder="Input NIK" value="<?= set_value('nik') ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_user">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_user" required placeholder="Input nama lengkap">
                            </div>
                            <div class="form-group">
                                <label for="komunitas">Komunitas</label>
                                <input type="text" value="Umum" class="form-control" name="komunitas" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">No Telpon</label>
                                <input type="number" placeholder="Input no telpon" class="form-control" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required placeholder="Input Kota Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tanggal Lahir</label>
                                <div class="form-group">
                                    <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat user</label>
                                <textarea class="form-control" name="alamat" placeholder="Input alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required placeholder="Input Password">
                            </div>
                            <div class="form-group">
                                <label for="password2">Input Ulang Password</label>
                                <input type="password" class="form-control" name="password2" required placeholder="Input ulang Password">
                            </div>
                            <div class="input-group text-center">
                                <button type="submit" name="registrasi" class="btn btn-primary btn-block ">Daftar</button>
                                <div class="col-sm-12 mt-2">
                                    <h6>Atau</h6>
                                </div>
                                <a href="<?= base_url('auth/login') ?>" class="btn btn-primary btn-block"> Masuk</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</body>