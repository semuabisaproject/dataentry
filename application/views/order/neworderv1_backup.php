<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




<div class="container-fluid">
    <div class="container-fluid">
        <?= $this->session->flashdata('msg'); ?>
        <?= $this->session->flashdata('msgnomor'); ?>
        <?= $this->session->flashdata('msgsubmit'); ?>
    </div>
    <!-- <div class="col-sm-2 mb-4">
            <div class="card bg-primary shadow h-50 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-sm font-weight-bold text-light text-uppercase mb-1">
                                Total today</div>
                            <div class="h5 mb-0 font-weight-bold text-light-800"><?= ($masterkk) ?></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> -->
    <div class="page-title">

        <div class="title_right">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                <h6 for="" class="control-label"> User Logged in : <?= $user['name']; ?></h6>
            </div>
            <div class="col mb-4">
                <div class="d-inline p-2 bg-secondary text-white"> Total Today : <?= ($masterkk) ?></div>
            </div>
            <div class="col mt-2 mb-4">
                <div class="h4 col mt-2 mb-4" id="time" name="time">00 hours and 00 minutes and 00 seconds</div>
            </div>
        </div>
        <!-- <input name="create_by" id="create_by" disabled="disabled" class="form-control form-control-sm" value="<?= set_value('create_by', $user['id']) ?>"> -->
        <!-- <input type="hidden" name="create_by" id="create_by" class="form-control form-control-sm"value="<?= set_value('create_by', $user['id']) ?>"> -->



    </div>



<div class="clearfix"></div>
<div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">

                <form id="demo" data-parsley-validate="" method="post" action="<?= base_url('datatask/simpan') ?>">


                    <!-- <form id="demo" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('datatask/neworder'); ?>"> -->
                    <!-- <div class="form-group rec-element"> -->
                    <!-- <td>"></td> -->
                    <input type="hidden" name="create_by" id="create_by" class="form-control form-control-sm" value="<?= set_value('create_by', $user['id']) ?>">
                    <input type="hidden" name="start" id="start" value="<?= date("Y/m/d H:i:s") ?>">
                    <div class="card-body" width="auto">
                        <div class="table-responsive ">
                            <table class="table table-bordered table-m w-auto large" width="100%">
                                <h4>DATA KARTU KELUARGA</h4>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No Kontrak</th>
                                        <th>No KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>alamat</th>
                                        <th>RT</th>
                                        <th>RW</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="no_kontrak" id="no_kontrak" autocomplete="off" value="<?= set_value('no_kontrak') ?>"><?= form_error('no_kontrak', '<small class="text-danger">', '</small>'); ?></td>

                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="no_kk" id="no_kk" autocomplete="off" value="<?= set_value('no_kk') ?>"> </td>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="kepalakeluarga" style="text-transform: uppercase" id="kepalakeluarga" autocomplete="off" value="<?= set_value('kepalakeluarga') ?>"></td>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="alamat" style="text-transform: uppercase" id="alamat" autocomplete="off" value="<?= set_value('alamat') ?>"><?= form_error('alamat', '<small class="text-danger">', '</small>'); ?></td>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="rt" id="rt" style="text-transform: uppercase" autocomplete="off" value="<?= set_value('rt') ?>"><?= form_error('rt', '<small class="text-danger">', '</small>'); ?></td>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="rw" id="rw" style="text-transform: uppercase" autocomplete="off" value="<?= set_value('rw') ?>"><?= form_error('rw', '<small class="text-danger">', '</small>'); ?></td>


                                    </tr>
                                </tbody>
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Desa/kelurahan</th>
                                        <!-- <th>Kelurahan</th> -->
                                        <th>Kecamatan</th>
                                        <th>Kota Kabupaten</th>
                                        <th>Kodepos</th>
                                        <th>Provinsi</th>
                                        <th>Remark</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="desa" id="desa" style="text-transform: uppercase" autocomplete="off" value="<?= set_value('desa') ?>"></td>
                                        <!-- <td>
                        <nav class="card">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <select name="kelurahan" id="kelurahan" class="form-control">
                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">

                                  <?php foreach ($kel as $kl) : ?>
                                    <option value="<?= $kl['data']; ?>" id="kec"><?= $kl['data']; ?>
                                    <?php endforeach; ?>
                                    </option>
                                </div>
                              </select>
                            </li>
                          </ul>
                        </nav>

                      </td> -->
                                        <!-- <td>
                        <nav class="card">
                          <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <select name="kecamatan" id="kecamatan" class="form-control">
                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">

                                  <?php foreach ($kec as $kc) : ?>
                                    <option value="<?= $kc['data']; ?>" id="kec"><?= $kc['data']; ?>
                                    <?php endforeach; ?>
                                    </option>
                                </div>
                              </select>
                            </li>
                          </ul>
                        </nav>

                      </td> -->
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="kecamatan" id="kecamatan" style="text-transform: uppercase" autocomplete="off" value="<?= set_value('kecamatan') ?>"></td>
                                        <!--<td>
                        <select name="kota_kabupaten" id="kota_kabupaten" class="form-control" required="required">
                          <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                            <?php foreach ($kot as $kt) : ?>
                              <option value="<?= $kt['data']; ?>" id="kot"><?= $kt['data']; ?>
                              <?php endforeach; ?>
                              </option>
                          </div>
                        </select>


                      </td> -->
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="kota_kabupaten" id="kota_kabupaten" autocomplete="off" value="<?= set_value('kota_kabupaten') ?>"><?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?></td>
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="kodepos" id="kodepos" autocomplete="off" value="<?= set_value('kodepos') ?>"><?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?></td>
                                        <!-- <td>
                        <select name="provinsi" id="provinsi" class="form-control" required="required">
                          <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                            <?php foreach ($prov as $pr) : ?>
                              <option value="<?= $pr['data']; ?>" id="kot"><?= $pr['data']; ?>
                              <?php endforeach; ?>
                              </option>
                          </div>
                        </select>


                      </td> -->
                                        <td><input required="required" class="form-control col-md-11 col-xs-12" type="text" name="provinsi" id="provinsi" autocomplete="off" value="<?= set_value('provinsi') ?>"><?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?></td>
                                        <td>
                                            <select name="remark_kk" id="remark_kk" class="form-control" required="required">
                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                    <?php foreach ($rdata as $rd) : ?>
                                                        <option value="<?= $rd['data']; ?>" id="remark_kk"><?= $rd['data']; ?>
                                                        <?php endforeach; ?>
                                                        </option>
                                                </div>
                                            </select>


                                        </td>

                                    </tr>
                                <tbody>
                            </table>
                        </div>

                        <div class="form-group rec-element">
                            <div class="row">
                                <div class="form-group" width="100%">
                                    <div class="container">
                                        <div class="table-responsive ">
                                            <table class="table table-bordered table-m w-auto large">
                                                <h4>Informasi KK</h4>
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Nama Lengkap</th>
                                                        <th>NIK</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tempat lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Agama</th>
                                                        <th>Pendidikan</th>
                                                        <th>jenis Pekerjaan</th>
                                                        <th>Status Perkawinan</th>
                                                        <th>Hubungan Keluarga</th>
                                                        <th>Kewarganegaraan</th>
                                                        <th>No paspor</th>
                                                        <th>No KItas</th>
                                                        <th>Ayah</th>
                                                        <th>Ibu</th>
                                                        <!-- <th>Remark</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="nama_lengkap[]" style="text-transform: uppercase" id="nama_lengkap1" alt="1" required="required"></td>
                                                        <td><input type="text" name="nik[]" id="nik1" alt="1" required="required"></td>
                                                        <td>
                                                            <select name="jenis_kelamin[]" id="jenis_kelamin1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <!-- <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option> -->
                                                                    <?php foreach ($jkel as $jk) : ?>
                                                                        <option value="<?= $jk['data']; ?>" id="jenis_kelamin"><?= $jk['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>
                                                                </div>
                                                            </select>

                                                        </td>
                                                        <!-- <td>
                                <select name="tempat_lahir[]" id="tempat_lahir1" required="required">
                                  <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                    <?php foreach ($kot as $kt) : ?>
                                      <option value="<?= $kt['data']; ?>" id="kot"><?= $kt['data']; ?>
                                      <?php endforeach; ?>
                                      </option>
                                  </div>
                                </select>

                              </td> -->
                                                        <td><input type="text" name="tempat_lahir[]" style="text-transform: uppercase" id="tempat_lahir1" alt="1" required="required"></td>
                                                        <td>
                                                            <input name="tanggal_lahir[]" id="tanggal_lahir1" width="276" alt="1" required="required">
                                                        </td>


                                                        <!-- <td><input name="tanggal_lahir[]" id="tanggal_lahir1" required="required"></td> -->
                                                        <td>
                                                            <select name="agama[]" id="agama1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <?php foreach ($agma as $ag) : ?>
                                                                        <option value="<?= $ag['data']; ?>" id="agama"><?= $ag['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>
                                                                </div>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="pendidikan[]" id="pendidikan1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <?php foreach ($pend as $pd) : ?>
                                                                        <option value="<?= $pd['data']; ?>" id="pendidikan"><?= $pd['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>
                                                                </div>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="jenis_pekerjaan[]" id="jenis_pekerjaan1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <?php foreach ($pekj as $pj) : ?>
                                                                        <option value="<?= $pj['data']; ?>" id="jenis_pekerjaan"><?= $pj['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>
                                                                </div>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="status_perkawinan[]" id="status_perkawinan1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <!-- <option value="KAWIN">KAWIN</option>
                                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                                    <option value="CERAI">CERAI</option>
                                    <option value="CERAI MATI">CERAI MATI</option>
                                    <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option> -->

                                                                    <?php foreach ($kawn as $kw) : ?>
                                                                        <option value="<?= $kw['data']; ?>" id="status_perkawinan"><?= $kw['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>
                                                                </div>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="hub_keluarga[]" id="hub_keluarga1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <!-- <option value="KEPALA KELUARGA">KEPALA KELUARGA</option>
                                    <option value="ISTRI">ISTRI</option>
                                    <option value="ANAK">ANAK</option>
                                    <option value="ORANG TUA">ORANG TUA</option>
                                    <option value="SAUDARA">SAUDARA</option>
                                      <option value="FAMILI LAIN">FAMILI LAIN</option>
                                      <option value="CUCU">CUCU</option>
                                      <option value="MERTUA">MERTUA</option> -->

                                                                    <?php foreach ($hubk as $hk) : ?>
                                                                        <option value="<?= $hk['data']; ?>" id="hub_keluarga"><?= $hk['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>

                                                                </div>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select name="kewarganegaraan[]" id="kewarganegaraan1" required="required">
                                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                    <!-- <option value="WNI">WNI</option>
                                    <option value="WNA">WNA</option> -->
                                                                    <?php foreach ($warg as $w) : ?>
                                                                        <option value="<?= $w['data']; ?>" id="kewarganegaraan"><?= $w['data']; ?>
                                                                        <?php endforeach; ?>
                                                                        </option>

                                                                </div>
                                                            </select>

                                                        </td>
                                                        <td><input type="text" name="no_paspor[]" id="no_paspor1" alt="1"></td>
                                                        <td><input type="text" name="no_kitas[]" id="no_kitas1" alt="1">
                                                        <td><input type="text" name="ayah[]" style="text-transform: uppercase" id="ayah1" alt="1" required="required"></td>
                                                        <td><input type="text" name="ibu[]" style="text-transform: uppercase" id="ibu1" alt="1" required="required"></td>
                                                        <!-- <td>
                                                                <select name="remark_data[]" id="remark_data1" required="required">
                                                                    <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown" id="dropdown">
                                                                        <?php foreach ($rdata as $rd) : ?>
                                                                            <option value="<?= $rd['data']; ?>" id="remark_data"><?= $rd['data']; ?>
                                                                            <?php endforeach; ?>
                                                                            </option>

                                                                    </div>
                                                                </select>

                                                            </td> -->



                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div id="nextkolom" name="nextkolom"></div>
                        <button type="button" id="jumlahkolom" autocomplete="off" value="1" style="display:none"></button>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-info tambah-form">Tambah Form</button>
                                <button type="button" data-toggle="modal" data-target="#confirm-submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Submit
            </div>
            <div class="modal-body">
                Pastikan semua kolom terisi dan tidak kosong, kolom yang kosong akan tetap terinput dengan nilai nol.
                yakin akan submit data?
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a id="submit" class="btn btn-success success">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#submit').click(function() {


        $('#demo').submit();
    });
</script>

<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var i = 2;

        $(".tambah-form").on('click', function() {
            row =
                '<div class="rec-element">' +
                '<div class="row">' +
                '<div class="card shadow mb-4">' +
                '<div class="card-body" width="auto">' +
                '<div class="form-group">' +
                '<div class="container ">' +
                '<div class="table-responsive ">' +
                '<table class="table table-bordered table-sm w-auto large" width="auto">' +
                '<thead>' +
                '<tr>' +
                '<th>Action</th>' +
                '<th>Nama Lengkap</th>' +
                '<th>NIK</th>' +
                '<th>Jenis Kelamin</th>' +
                '<th>Tempat lahir</th>' +
                '<th>Tanggal Lahir</th>' +
                '<th>Agama</th>' +
                '<th>Pendidikan</th>' +
                '<th>jenis Pekerjaan</th>' +
                '<th>Status Perkawinan</th>' +
                '<th>Hubungan Keluarga</th>' +
                '<th>Kewarganegaraan</th>' +
                '<th>No paspor</th>' +
                '<th>No KItas</th>' +
                '<th>Ayah</th>' +
                '<th>Ibu</th>' +
                //'<th>Remark</th>' +

                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '<tr>' +
                '<td>' +
                '<button type="button" class="btn btn-danger del-element"><i class="fa fa-minus-square"></i></button>' +
                '</td>' +
                '<td><input type="text" name="nama_lengkap[]" style="text-transform: uppercase" Id="nama_lengkap' + i + '" alt="' + i + '" required="required">' +
                '<td><input type="text" name="nik[]" id="nik' + i + '" alt="' + i + '" required="required">' +
                '<td><select name="jenis_kelamin[]" id="jenis_kelamin' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($jkel as $jk) : ?>' +
                '<option value="<?= $jk['data']; ?>" id="jenis_kelamin"><?= $jk['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="tempat_lahir[]" id="tempat_lahir' + i + '" alt="' + i + '" required="required">' +
                '<td><input name="tanggal_lahir[]" id="tanggal_lahir' + i + '" alt="' + i + '" required="required">' +
                '<td><select name="agama[]" Id="agama' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($agma as $ag) : ?>' +
                '<option value="<?= $ag['data']; ?>" id="agama"><?= $ag['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><select name="pendidikan[]" Id="pendidikan' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($pend as $pd) : ?>' +
                '<option value="<?= $pd['data']; ?>" id="pendidikan"><?= $pd['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><select name="jenis_pekerjaan[]" Id="jenis_pekerjaan' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($pekj as $pj) : ?>' +
                '<option value="<?= $pj['data']; ?>" id="jenis_pekerjaan"><?= $pj['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><select name="status_perkawinan[]" id="status_perkawinan' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($kawn as $kw) : ?>' +
                '<option value="<?= $kw['data']; ?>" id="status_perkawinan"><?= $kw['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><select name="hub_keluarga[]" id="hub_keluarga' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($hubk as $hk) : ?>' +
                '<option value="<?= $hk['data']; ?>" id="hub_keluarga"><?= $hk['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><select name="kewarganegaraan[]" id="kewarganegaraan' + i + '" alt="' + i + '" required="required">' +
                '<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                '<?php foreach ($warg as $w) : ?>' +
                '<option value="<?= $w['data']; ?>" id="kewarganegaraan"><?= $w['data']; ?><?php endforeach; ?>' +
                '</option>' +
                '</div>' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="no_paspor[]" id="no_paspor' + i + '" alt="' + i + '">' +
                '<td><input type="text" name="no_kitas[]" id="no_kitas' + i + '">' +
                '<td><input type="text" name="ayah[]" style="text-transform: uppercase" id="ayah' + i + '" alt="' + i + '" required="required">' +
                '<td><input type="text" name="ibu[]" style="text-transform: uppercase" id="ibu' + i + '" alt="' + i + '" required="required">' +
                //'<td><select name="remark_data[]" id="remark_data' + i + '" alt="' + i + '" required="required">' +
                //'<div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">' +
                //'<?php foreach ($rdata as $rd) : ?>' +
                //'<option value="<?= $rd['data']; ?>" id="remark_data"><?= $rd['data']; ?><?php endforeach; ?>' +
                //'</option>' +
                //'</div>' +
                //'</select>' +
                //'</td>' +

                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';


            $(row).insertBefore("#nextkolom");

            $('#jumlahkolom').val(i + 1);
            i++;
        });
        $(document).on('click', '.del-element', function(e) {
            e.preventDefault()
            i--;
            //$(this).parents('.rec-element').fadeOut(400);
            $(this).parents('.rec-element').remove();
            $('#jumlahkolom').val(i - 1);

        });
    });
</script>

<script>
    var timeelm, time, days, hours, minutes, seconds;
    timeelm = document.getElementById("time");
    time = timeelm.innerHTML;
    //days = parseInt(time.split(" ")[0]);
    hours = parseInt(time.split(" ")[00]);
    minutes = parseInt(time.split(" ")[00]);
    seconds = parseInt(time.split(" ")[00]);
    timerGo();

    function timerGo() {
        seconds++;
        if (seconds == 60) {
            minutes++;
            seconds = 0;
        }
        if (minutes == 60) {
            hours++;
            minutes = 0;
        }
        if (hours == 24) {
            days++;
            hours = 0;
        }
        timeelm.innerHTML = hours + ":" + minutes + ":" + seconds + "";
        setTimeout(timerGo, 1000);
        console.log(time);
    }
</script>



<!-- <script>

        $('#tanggal_lahir1').datepicker();
    </script> -->