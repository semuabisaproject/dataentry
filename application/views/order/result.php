<div class="">
    <div class="page-title">
        <div class="title_right">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                
                  <h5 class="m-0 font-weight-bold text-dark">Result Data Entry</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <form action="<?= base_url('resultdata/result'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="keyword" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <input class="btn btn-outline-secondary" type="submit" name="submit">
                        </div>
                    </div>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive ">

                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-info text-light">
                                <th>No.</th>
                                <th>Nomor Kontrak</th>
                                <th>Cabang</th>
                                <th>Nomor KK</th>
                                <th>Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Kota_kabupaten</th>
                                <th>Provinsi</th>
                                <!-- <th>Jumlah data</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>


                            <?php foreach ($data as $r) : ?>
                                <tr>

                                    <th><?= ++$start; ?></th>
                                    <td><?= $r['no_kontrak']; ?></td>
                                    <td><?= substr($r['no_kontrak'], 0, 3); ?></td>
                                    <td><?= $r['no_kk']; ?></td>
                                    <td><?= $r['kepalakeluarga']; ?></td>
                                    <td><?= $r['alamat']; ?></td>
                                    <td><?= $r['kelurahan']; ?></td>
                                    <td><?= $r['kecamatan']; ?></td>
                                    <td><?= $r['kota_kabupaten']; ?></td>
                                    <td><?= $r['provinsi']; ?></td>
                                    <!-- <td><?= $r['jumlah']; ?></td> -->
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('resultdata/cekdata/' . $r['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            <!-- <a href="<?= base_url('order/editorder/' . $ol['reference_number']); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-flat"><i class="fas fa-window-close"></i></a> -->
                                            <!-- <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-flat"><i class="fas fa-window-close"></i></a> -->
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- <div class="row">
                    <div class="col"> -->
                    <!--Tampilkan pagination-->
                    <?= $this->pagination->create_links(); ?>
                    <h6 class="fs-6 fw-light mb-4 text-gray text-center">Total data <?= $total_rows ?></h6>
                    <!-- </div>
                </div> -->

                    <!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script> -->