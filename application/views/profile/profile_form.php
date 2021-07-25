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
                                            PROFILE
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="nik">NIK</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="nik" value="<?= $user->nik ?>" class="form-control" name="nik" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="nama">Nama</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input name="nama" id="nama" value="<?= $user->nama_lengkap ?>" class="form-control" name="invoice">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="phone">No Telepon</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="phone" value="<?= $user->phone ?>" class="form-control" name="phone" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top;">
                                        <label for="komunitas">Nama Komunitas</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="komunitas" value="<?= $user->komunitas ?>" class="form-control" name="komunitas">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="tempat_lahir" value="<?= $user->tempat_lahir ?>" class="form-control" name="tempat_lahir">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="date" id="tanggal_lahir" value="<?= $user->tanggal_lahir ?>" class="form-control" name="tanggal_lahir">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; width: 35%;">
                                        <label for="alamat">Alamat</label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="alamat" value="<?= $user->alamat ?>" class="form-control" name="alamat">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2">
                                        <div class="mx-auto text-center">
                                            <button type="submit" name="save" class="btn bg-info">
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