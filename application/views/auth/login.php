<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="form-group text-center">
                    <h3>Login Aplikasi</h3>
                </div>
                <form action="<?= base_url() ?>auth/process" method="post">
                    <div class="form-group">
                        <label for="phone">No Telpon </label>
                        <input type="number" placeholder="Masukan no telpon" class="form-control" name="phone" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Masukan Password">
                    </div>
                    <div class="input-group text-center">
                        <button type="submit" name="login" class="btn btn-primary btn-block ">Sign In</button>
                        <div class="col-sm-12 mt-2">
                            <h6>Atau</h6>
                        </div>
                        <a href="<?= base_url('auth/registrasi') ?>" class="btn btn-primary btn-block"> Registrasi</a>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->