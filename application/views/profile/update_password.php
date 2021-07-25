<!-- Main content -->
<section class="content bg-light">
    <div class="row">
        <div class="col-sm m-4">
            <div class="box box-widget">
                <div class="box-body">
                    <form action="<?= base_url('profile/process') ?>" method="POST">
                        <div class="info-box p-4 col-md-6 mx-auto">
                            <table width="100%">
                                <tr>
                                    <!-- <td></td> -->
                                    <td class="pb-3" colspan="3">
                                        <div class="card-header text-center bg-success">
                                            Update Password
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="password">Password Baru</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" required placeholder="Input Password">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="password2">Input Ulang Password</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password2" required placeholder="Input ulang Password">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <div class="mx-auto text-center">
                                            <button type="submit" name="save_password" class="btn bg-info">
                                                <i class="fa fa-paper-plane"></i>Save Data
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>