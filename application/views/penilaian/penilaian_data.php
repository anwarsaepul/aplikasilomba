<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="col-12 col-sm-6 col-md-6 pr-3 mx-auto">
                    <div class="text-center">
                        <H3 class="">Daftar Peserta</H3>
                    </div>
                </div>
                <div class="box-body table-responsive pl-3 pr-3">
                    <div class="mx-auto">
                        <table class="table table-bordered text-center table-striped" id="table1">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>No Invoice</th>
                                    <th>Nama Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $biaya = 0;
                                foreach ($invoice->result() as $key => $data) { ?>
                                    <tr>
                                        <td style="width: 5%;"><?= $no++ ?>.</td>
                                        <td><?= $data->invoice ?></td>
                                        <td><?= $data->nama_lengkap ?></td>
                                        <td><a href="" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Nilai
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>