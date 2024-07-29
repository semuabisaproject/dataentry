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

        <?= $this->session->flashdata('msgsubmit'); ?>
    </div>
    <div class="page-title">

        <div class="title_right">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            </div>

            </p>
            <!-- <input name="create_by" id="create_by" disabled="disabled" class="form-control form-control-sm" value="<?= set_value('create_by', $user['id']) ?>"> -->
            <!-- <input type="hidden" name="create_by" id="create_by" class="form-control form-control-sm"value="<?= set_value('create_by', $user['id']) ?>"> -->
            </h6>

        </div>




        <div class="clearfix"></div>
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <?php foreach ($cekdata as $t) : ?>
                            <!-- <p class="card-title">id : <?= $t['id_master']; ?></p> -->
                            <p class="card-title">Nomor Kontrak : <?= $t['no_kontrak']; ?></p>
                            <p class="card-title">Nomor KK : <?= $t['no_kk']; ?></p>
                            <p class="card-title">Kepala Keluarga : <?= $t['kepalakeluarga']; ?></p>
                            <p class="card-title">Alamat : <?= $t['alamat']; ?></p>
                            <p class="card-title">Cabang : <?= substr($t['no_kontrak'], 0, 3); ?></p>

                        <?php endforeach; ?>
                        <div class="card-body" width="auto">
                         <div class="form-group rec-element">
                            <div class="table-responsive ">
                                <table class="table table-bordered table-m w-auto large" width="100%">


                                    <form id="add" method="post" action="<?= base_url('resultdata/simpantambah') ?>">


                                        

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

                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <input type="hidden" name="no_kk" id="no_kk" class="form-control form-control-sm" value="<?= set_value('no_kk', $t['no_kk']) ?>">
                                            <input type="hidden" name="parent_id" id="parent_id" class="form-control form-control-sm" value="<?= set_value('parent_id', $t['id_master']) ?>">
                                            <input type="hidden" name="create_by" id="create_by" class="form-control form-control-sm" value="<?= set_value('create_by', $user['id']) ?>">
                                            <div class="ln_solid"></div>
                                            <div id="nextkolom" name="nextkolom"></div>
                                            <button type="button" id="jumlahkolom" autocomplete="off" value="1" style="display:none"></button>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <!-- <button type="button" class="btn btn-info tambah-form">Tambah Form</button> -->
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
                Apakah sudah yakin akan menambah data?
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


        $('#add').submit();
    });
</script> 

<!-- <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
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
</script> -->