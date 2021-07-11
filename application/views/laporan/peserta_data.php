<!-- Main content -->
<section class="container-fluid bg-light p-2">
    <div class="row p-2">
        <div class="col-md">
            <div class="box box-widget">
                <div class="col-12 col-sm-6 col-md-6 pr-3 mx-auto">
                    <div class="text-center">
                        <H3 class="">Data Peserta</H3>
                    </div>
                </div>
                <div class="box-body table-responsive pl-3 pr-3">
                    <div class="mx-auto">
                        <table class="table table-bordered text-center table-striped" id="example">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>No Peserta</th>
                                    <th>Nama Kategori</th>
                                    <th>NIK</th>
                                    <th>Nama Peserta</th>
                                    <th>Komunitas</th>
                                    <th>Telepon</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $biaya = 0;
                                foreach ($invoice->result() as $key => $data) { ?>
                                    <tr>
                                        <td style="width: 5%;"><?= $no++ ?>.</td>
                                        <td><?= $data->order_id ?></td>
                                        <td><?= $data->nama_kategori ?></td>
                                        <td><?= $data->nik ?></td>
                                        <td><?= $data->nama_lengkap ?></td>
                                        <td><?= $data->komunitas ?></td>
                                        <td><?= $data->phone ?></td>
                                        <td><?= $data->tempat_lahir ?></td>
                                        <td><?= indo_date($data->tanggal_lahir) ?></td>
                                        <td><?= $data->alamat ?></td>
                                        <td><?= indo_date($data->created) ?> <?= jam($data->created) ?></td>
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