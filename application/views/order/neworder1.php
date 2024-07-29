<div class="container-fluid">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <body id="page-top">

        <div class="row">
            <div class="card-body">

                <form class="user" method="post" action="<?= base_url('datatask/neworder') ?>">
                    <!-- <div class="card shadow mb-4">
                        <div class="card-body" width="auto">
                            <div class="table-responsive ">
                                <table class="table table-bordered table-m w-auto large" width="100%" id="masterkk">
                                    <b>Informasi KK</b>
                                    <thead>
                                        <tr>
                                            <th>No KK</th>
                                            <th>alamat</th>
                                            <th>Kepala Keluarga</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Desa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="no_kk" id="no_kk" value="<?= set_value('no_kk') ?>"></td>
                                            <td><input type="text" name="alamat" id="alamat" value="<?= set_value('alamat') ?>"></td>
                                            <td><input type="text" name="kepalakeluarga" id="kepalakeluarga" value="<?= set_value('kepalakeluarga') ?>"></td>
                                            <td><input type="text" name="rt" id="rt" value="<?= set_value('rt') ?>"></td>
                                            <td><input type="text" name="rw" id="rw" value="<?= set_value('rw') ?>"></td>
                                            <td><input type="text" name="desa" id="desa" value="<?= set_value('desa') ?>"></td>


                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Kelurahan</th>
                                            <th>Kecamatan</th>
                                            <th>Kota Kabupaten</th>
                                            <th>Kodepos</th>
                                            <th>Provinsi</th>




                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="kelurahan" id="kelurahan" value="<?= set_value('kelurahan') ?>"></td>
                                            <td><input type="text" name="kecamatan" id="kecamatan" value="<?= set_value('kecamatan') ?>"></td>
                                            <td><input type="text" name="kota_kabupaten" id="kota_kabupaten" value="<?= set_value('kota_kabupaten') ?>"></td>
                                            <td><input type="text" name="kodepos" id="kodepos" value="<?= set_value('kodepos') ?>"></td>
                                            <td><input type="text" name="provinsi" id="provinsi" value="<?= set_value('provinsi') ?>"></td>



                                        </tr>
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <div class="x_content">
                                    <br>
                                    <form id="demo" data-parsley-validate="" class="form-horizontal form-label-left" method="POST" action="<?php echo base_url('order/neworder'); ?>">
                                    <div class="form-group rec-element">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="nama[]" id="nama1" alt="1" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="pekerjaan[]" id="pekerjaan1" alt="1" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="alamat[]" id="alamat1" alt="1" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div id="nextkolom" name="nextkolom"></div>
                                    <button type="button" id="jumlahkolom" value="1" style="display:none"></button>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="button" class="btn btn-info tambah-form">Tambah Form</button>
                                            <button type="submit" class="btn btn-success">Simpan</button></div>





                    <!-- <div class="row">
                        <div class="card shadow mb-4">
                            <div class="card-body" width="auto">
                                <div class="form-group fieldGroup">
                                    <div class="container ">

                                        <div class="table-responsive ">
                                            <table class="table table-bordered table-sm w-auto large" width="auto" id="dynamic_field">

                                                <b>Informasi KK</b>
                                                <thead class="thead-danger">
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

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>


                                                        <td><input type="text" name="nama_lengkap[]" alt="1" id="nama_lengkap1"></td>
                                                        <td><input type="text" name="nik[]" alt="1" id="nik1"></td>
                                                        <td><input type="text" name="jenis_kelamin[]" alt="1" id="jenis_kelamin1"></td>
                                                        <td><input type="text" name="tempat_lahir[]" alt="1" id="tempat_lahir1"></td>
                                                        <td><input type="text" name="tanggal_lahir[]" alt="1" id="tanggal_lahir1"></td>
                                                        <td><input type="text" name="agama[]" alt="1" id="agama1"></td>
                                                        <td><input type="text" name="pendidikan[]" alt="1" id="pendidikan1"></td>
                                                        <td><input type="text" name="jenis_pekerjaan[]" alt="1" id="jenis_pekerjaan1"></td>
                                                        <td><input type="text" name="status_perkawinan[]" alt="1" id="status_perkawinan1" ?></td>
                                                        <td><input type="text" name="hub_keluarga[]" alt="1" id="hub_keluarga1"></td>
                                                        <td><input type="text" name="kewarganegaraan[]" alt="1" id="kewarganegaraan1"></td>
                                                        <td><input type="text" name="no_paspor[]" alt="1" id="no_paspor1"></td>
                                                        <td><input type="text" name="no_kitas[]" alt="1" id="no_kitas1">
                                                        <td><input type="text" name="ayah[]" alt="1" id="ayah1"></td>
                                                        <td><input type="text" name="ibu[]" alt="1" id="ibu1"></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->



                    <div class="ln_solid"></div>
                    <div id="nextkolom" name="nextkolom"></div>
                    <button type="button" id="jumlahkolom" value="1" style="display:none"></button>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="button" class="btn btn-info tambah-form">Tambah Form</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </body>
</div>





<!-- <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                                            <button type="button" name="add" id="add" class="btn btn-success">Add More</button> -->

<!-- </div> -->
<!-- </div>
                                </div>
                            </div>
                        </div>
                    </div> -->





<!-- <input type="hidden" name="create_by" id="" class="form-control form-control-sm" disabled="disabled" value="<?= set_value('create_by', $user['email']) ?>"> -->




<!-- <div class="form-group fieldGroupCopy" style="display: none;">
                <div class="input-group">
                    <div class="table-responsive ">
                        <table class="table table-bordered table-sm w-auto large" width="auto" id="dynamic_field">

                            <thead>
                                <tr>
                                    <th>Action</th>
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

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0)" class="btn btn-danger remove"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td> -->

<!-- <tr>
                                    <td><input type="text" name="addmore[][nama_lengkap]" for="first-name" alt="1" id="nama_lengkap" class="form-control nama_lengkap"></td>
                                    <td><input type="text" name="addmore[][nik]" id="nik" for="first-name" alt="1" class="form-control nik"></td>
                                    <td><input type="text" name="addmore[][jenis_kelamin]" for="first-name" alt="1" id="jenis_kelamin" class="form-control jenis_kelamin"></td>
                                    <td><input type="text" name="addmore[][tempat_lahir]" for="first-name" alt="1" id="tempat_lahir" class="form-control tempat_lahir"></td>
                                    <td><input type="text" name="addmore[][tanggal_lahir]" for="first-name" alt="1" id="tanggal_lahir" class="form-control tanggal_lahir"></td>
                                    <td><input type="text" name="addmore[][agama]" for="first-name" alt="1" id="agama" class="form-control agama"></td>
                                    <td><input type="text" name="addmore[][pendidikan]" for="first-name" alt="1" id="pendidikan" class="form-control pendidikan"></td>
                                    <td><input type="text" name="addmore[][jenis_pekerjaan]" for="first-name" alt="1" id="jenis_pekerjaan" class="form-control jenis_pekerjaan"></td>
                                    <td><input type="text" name="addmore[][status_perkawinan]" for="first-name" alt="1" id="status_perkawinan" class="form-control status_perkawinan"></td>
                                    <td><input type="text" name="addmore[][hub_keluarga]" for="first-name" alt="1" id="hub_keluarga" class="form-control hub_keluarga"></td>
                                    <td><input type="text" name="addmore[][kewarganegaraan]" for="first-name" alt="1" id="kewarganegaraan" class="form-control kewarganegaraan"></td>
                                    <td><input type="text" name="addmore[][no_paspor]" for="first-name" alt="1" id="no_paspor" class="form-control no_paspor"></td>
                                    <td><input type="text" name="addmore[][no_kitas]" for="first-name" alt="1" id="no_kitas" class="form-control no_kitas"></td>
                                    <td><input type="text" name="addmore[][ayah]" for="first-name" alt="1" id="ayah" class="form-control ayah"></td>
                                    <td><input type="text" name="addmore[][ibu]" for="first-name" alt="1" id="ibu" class="form-control ibu"></td> -->
<!-- <div class="input-group-addon ml-3">
                                        <a href="javascript:void(0)" class="btn btn-success addMore"><i class="fas fa-plus"></i></a>
                                    </div> -->






<!-- <script>
    $(document).ready(function() {
        // membatasi jumlah inputan
        var maxGroup = 20;

        //melakukan proses multiple input 
        $(".addMore").click(function() {
            if ($('body').find('.fieldGroup').length < maxGroup) {
                var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            } else {
                alert('Maximum ' + maxGroup + ' groups are allowed.');
            }
        });

        //remove fields group
        $("body").on("click", ".remove", function() {
            $(this).parents(".fieldGroup").remove();
        });

        $('#submit').click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>datatask/neworder",
                type: 'POST',
                data: {

                    "nama_lengkap": $("#nama_lengkap").val(),
                    "nik": $("#nik").val(),
                    "jenis_kelamin": $("#jenis_kelamin").val(),
                    "tempat_lahir": $("#tempat_lahir").val(),
                    "tanggal_lahir": $("#tanggal_lahir").val(),
                    "agama": $("#agama").val(),
                    "pendidikan": $("#pendidikan").val(),
                    "jenis_pekerjaan": $("#jenis_pekerjaan").val(),
                    "status_perkawinan": $("#status_perkawinan").val(),
                    "hub_keluarga": $("#hub_keluarga").val(),
                    "kewarganegaraan": $("#kewarganegaraan").val(),
                    "no_paspor": $("#no_paspor").val(),
                    "no_kitas": $("#no_kitas").val(),
                    "ayah": $("#ayah").val(),
                    "ibu": $("#ibu").val(),

                },
                success: function(data) {}
            });

            // $.ajax({
            //     <?= base_url('datatask/neworder') ?>,
            //     method: "POST",
            //     data: $('alt').serialize(),
            //     success: function(data) {
            //         alert(data);
            //         $('#dynamic_field')[0].reset();
            //     }
            // });
        });
    });
</script> -->


<!-- <script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="height' + i + '"><td><input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>"></td><td><input type="text" name="nik" id="nik" value="<?= set_value('nik') ?>"></td><td><input type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>"></td><td><input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir') ?>"></td><td><input type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>"></td><td><input type="text" name="agama" id="agama" value="<?= set_value('agama') ?>"></td><td><input type="text" name="pendidikan" id="pendidikan" value="<?= set_value('pendidikan') ?>"></td><td><input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" value="<?= set_value('jenis_pekerjaan') ?>"></td><td><input type="text" name="status_perkawinan" id="status_perkawinan" value="<?= set_value('status_perkawinan') ?>"></td><td><input type="text" name="hub_keluarga" id="hub_keluarga" value="<?= set_value('hub_keluarga') ?>"></td><td><input type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>"></td><td><input type="text" name="no_paspor" id="no_paspor" value="<?= set_value('no_paspor') ?>"></td><td><input type="text" name="no_kitas" id="no_kitas" value="<?= set_value('no_kitas') ?>"></td><td><input type="text" name="ayah" id="ayah" value="<?= set_value('ayah') ?>"></td><td><input type="text" name="ibu" id="ibu" value="<?= set_value('ibu') ?>"></td>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                // <?= base_url('datatask/neworder') ?>,
                method: "POST",
                data: $('alt').serialize(),
                success: function(data) {
                    alert(data);
                    $('#dynamic_field')[0].reset();
                }
            });
        });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        var i = 2;
        $('#add').click(function() {
            // var i = 2;
            // i++;
            // $('#dynamic_field').append('<" class="dynamic-added"><td><input type="text" name="addmore[][nama_lengkap]" placeholder="Nama Lengap" class="form-control name_lengkap" required /></td><td><input type="text" name="addmore[][nik]" placeholder="NIK" class="form-control nik" required /></td><td><input type="text" name="addmore[][jenis_kelamin]" placeholder="Jenis Kelamin" class="form-control jenis_kelamin" required /></td><td><input type="text" name="addmore[][tempat_lahir]" placeholder="tempat_lahir" class="form-control tempat_lahir" required /></td><td><input type="text" name="addmore[][tanggal_lahir]"placeholder="Tanggal_lahir" class="form-control tanggal_lahir" required /></td><td><input type="text" name="addmore [][agama]" placeholder="agama" class="form-control agama" required /></td><td><input type="text" name="addmore[][pendidikan]" placeholder="pendidikan" class=form-control pendidikan" required /></td><td><input type="text" name="addmore[][jenis_pekerjaan]" placeholder="jenis_pekerjaan" class=form-control jenis_pekerjaan" required /></td><td><input type="text" name="addmore[][status_perkawinan]" placeholder="status_perkawinan" class=form-control status_perkawinan" required /></td><td><input type="text" name="addmore[][hub_keluarga]" placeholder="hub_keluarga" class=form-control hub_keluarga" required /"></td><td><input type="text" name="addmore[][kewarganegaraan]" placeholder="kewarganegaraan" class=form-control kewarganegaraan" required /></td><td><input type="text" name="addmore[][no_paspor]" placeholder="no_paspor" class="form-control no_paspor" required /"></td><td><input type="text" name="addmore[][no_kitas]" placeholder="no_kitas" class=form-control no_kitas" required /></td><td><input type="text" name="addmore[][ayah]" placeholder="ayah" class=form-control ayah" required /></td><td><input type="text" name="addmore[][ibu]" placeholder="ibu" class="form-control ibu" required /></td>');
            // $('#dynamic_field').append('<" class="dynamic-added"><td><input type="text" name="addmore[][nama_lengkap]" placeholder="Nama Lengkap" class="form-control name_lengkap" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][nik]" placeholder="NIK" class="form-control nik" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][jenis_kelamin]" placeholder="Jenis Kelamin" class="form-control jenis_kelamin" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][tempat_lahir]" placeholder="tempat_lahir" class="form-control tempat_lahir" required /></td>');
            // $('#dynamic_field').append('<"<<td><input type="text" name="addmore[][tanggal_lahir]"placeholder="Tanggal_lahir" class="form-control tanggal_lahir" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore [][agama]" placeholder="agama" class="form-control agama" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][pendidikan]" placeholder="pendidikan" class=form-control pendidikan" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][jenis_pekerjaan]" placeholder="jenis_pekerjaan" class=form-control jenis_pekerjaan" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][status_perkawinan]" placeholder="status_perkawinan" class=form-control status_perkawinan" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][hub_keluarga]" placeholder="hub_keluarga" class=form-control hub_keluarga" required /"></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][kewarganegaraan]" placeholder="kewarganegaraan" class=form-control kewarganegaraan" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][no_paspor]" placeholder="no_paspor" class="form-control no_paspor" required /"></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][no_kitas]" placeholder="no_kitas" class=form-control no_kitas" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][ayah]" placeholder="ayah" class=form-control ayah" required /></td>');
            // $('#dynamic_field').append('<"<td><input type="text" name="addmore[][ibu]" placeholder="ibu" class="form-control ibu" required /></td>');

            // row=$('#dynamic_field').append('<"class="form-group"> <td><input type="text" name="addmore[][nama_lengkap]" placeholder="Nama Lengap" class="form-control name_lengkap" required /></td><td><input type="text" name="addmore[][nik]" placeholder="NIK" class="form-control nik" required /></td><td><input type="text" name="addmore[][jenis_kelamin]" placeholder="Jenis Kelamin" class="form-control jenis_kelamin" required /></td><td><input type="text" name="addmore[][tempat_lahir]" placeholder="tempat_lahir" class="form-control tempat_lahir" required /></td><td><input type="text" name="addmore[][tanggal_lahir]"placeholder="Tanggal_lahir" class="form-control tanggal_lahir" required /></td><td><input type="text" name="addmore [][agama]" placeholder="agama" class="form-control agama" required /></td><td><input type="text" name="addmore[][pendidikan]" placeholder="pendidikan" class=form-control pendidikan" required /></td><td><input type="text" name="addmore[][jenis_pekerjaan]" placeholder="jenis_pekerjaan" class=form-control jenis_pekerjaan" required /></td><td><input type="text" name="addmore[][status_perkawinan]" placeholder="status_perkawinan" class=form-control status_perkawinan" required /></td><td><input type="text" name="addmore[][hub_keluarga]" placeholder="hub_keluarga" class=form-control hub_keluarga" required /"></td><td><input type="text" name="addmore[][kewarganegaraan]" placeholder="kewarganegaraan" class=form-control kewarganegaraan" required /></td><td><input type="text" name="addmore[][no_paspor]" placeholder="no_paspor" class="form-control no_paspor" required /"></td><td><input type="text" name="addmore[][no_kitas]" placeholder="no_kitas" class=form-control no_kitas" required /></td><td><input type="text" name="addmore[][ayah]" placeholder="ayah" class=form-control ayah" required /></td><td><input type="text" name="addmore[][ibu]" placeholder="ibu" class="form-control ibu" required /></td>');
            row = $('#dynamic_field').append('<" class="dynamic-added"><td><input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control name_lengkap" required /></td><td><input type="text" name="nik" placeholder="NIK" class="form-control nik" required /></td><td><input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" class="form-control jenis_kelamin" required /></td><td><input type="text" name="tempat_lahir" placeholder="tempat_lahir" class="form-control tempat_lahir" required /></td><td><input type="text" name="tanggal_lahir"placeholder="Tanggal_lahir" class="form-control tanggal_lahir" required /></td><td><input type="text" name=" agama" placeholder="agama" class="form-control agama" required /></td><td><input type="text" name="pendidikan" placeholder="pendidikan" class=form-control pendidikan" required /></td><td><input type="text" name="jenis_pekerjaan" placeholder="jenis_pekerjaan" class=form-control jenis_pekerjaan" required /></td><td><input type="text" name="status_perkawinan" placeholder="status_perkawinan" class=form-control status_perkawinan" required /></td><td><input type="text" name="hub_keluarga" placeholder="hub_keluarga" class=form-control hub_keluarga" required /"></td><td><input type="text" name="kewarganegaraan" placeholder="kewarganegaraan" class=form-control kewarganegaraan" required /></td><td><input type="text" name="no_paspor" placeholder="no_paspor" class="form-control no_paspor" required /"></td><td><input type="text" name="no_kitas" placeholder="no_kitas" class=form-control no_kitas" required /></td><td><input type="text" name="ayah" placeholder="ayah" class=form-control ayah" required /></td><td><input type="text" name="ibu" placeholder="ibu" class="form-control ibu" required /></td>');

            $(row).insertBefore("#nextkolom");
            $('#jumlahkolom').val(i + 1);
            i++;

        });

        // $('#dynamic_field').append('<tr id="height' + i + '"><td><input type="text" name="addmore[][nama_lengkap]" placeholder="Nama Lengap" class="form-control name_lengkap" required /></td><td><input type="text" name="addmore[][nik]" placeholder="NIK" class="form-control nik" required /></td><td><input type="text" name="addmore[][jenis_kelamin]" placeholder="Jenis Kelamin" class="form-control jenis_kelamin" required /></td><td><input type="text" name="addmore[][tempat_lahir]" placeholder="tempat_lahir" class="form-control tempat_lahir" required /></td><td><input type="text" name="addmore[][nik]" placeholder="NIK" class="form-control tanggal" required /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        // });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script> -->
<!-- </body>
 
</html>

        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        // $(row).insertBefore("#nextkolom");
        // $('#jumlahkolom').val(i + 1);
        // i++;
    });

    //$(this).parents('.rec-element').fadeOut(400);
    $(this).parents('.rec-element').remove();
    $('#jumlahkolom').val(i - 1);
</script> -->



<script>
    $(document).ready(function() {
        var i = 2;
        $(".tambah-form").on('click', function() {
            // row = $('#dynamic_field').append('<" class="dynamic-added"><td><input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="form-control name_lengkap" required /></td><td><input type="text" name="nik" placeholder="NIK" class="form-control nik" required /></td><td><input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" class="form-control jenis_kelamin" required /></td><td><input type="text" name="tempat_lahir" placeholder="tempat_lahir" class="form-control tempat_lahir" required /></td><td><input type="text" name="tanggal_lahir"placeholder="Tanggal_lahir" class="form-control tanggal_lahir" required /></td><td><input type="text" name=" agama" placeholder="agama" class="form-control agama" required /></td><td><input type="text" name="pendidikan" placeholder="pendidikan" class=form-control pendidikan" required /></td><td><input type="text" name="jenis_pekerjaan" placeholder="jenis_pekerjaan" class=form-control jenis_pekerjaan" required /></td><td><input type="text" name="status_perkawinan" placeholder="status_perkawinan" class=form-control status_perkawinan" required /></td><td><input type="text" name="hub_keluarga" placeholder="hub_keluarga" class=form-control hub_keluarga" required /"></td><td><input type="text" name="kewarganegaraan" placeholder="kewarganegaraan" class=form-control kewarganegaraan" required /></td><td><input type="text" name="no_paspor" placeholder="no_paspor" class="form-control no_paspor" required /"></td><td><input type="text" name="no_kitas" placeholder="no_kitas" class=form-control no_kitas" required /></td><td><input type="text" name="ayah" placeholder="ayah" class=form-control ayah" required /></td><td><input type="text" name="ibu" placeholder="ibu" class="form-control ibu" required /></td>');
            // row =
            //     '<div class="rec-element">' +
                // '<div class="row">' +
                // '<div class="card shadow mb-4">' +
                // '<div class="card-body" width="auto">' +
                // '<div class="form-group fieldGroup">' +
                // '<div class="container ">' +

                // '<div class="table-responsive ">' +
                // '<table class="table table-bordered table-sm w-auto large" width="auto" id="dynamic_field">' +



                // '<thead>' +
                // '<tr>' +
                // '<th>Action</th>' +
                // '<th>Nama Lengkap</th>' +
                // '<th>NIK</th>' +
                // '<th>Jenis Kelamin</th>' +
                // '<th>Tempat lahir</th>' +
                // '<th>Tanggal Lahir</th>' +
                // '<th>Agama</th>' +
                // '<th>Pendidikan</th>' +
                // '<th>jenis Pekerjaan</th>' +
                // '<th>Status Perkawinan</th>' +
                // '<th>Hubungan Keluarga</th>' +
                // '<th>Kewarganegaraan</th>' +
                // '<th>No paspor</th>' +
                // '<th>No KItas</th>' +
                // '<th>Ayah</th>' +
                // '<th>Ibu</th>' +

                // '</tr>' +
                // '</thead>' +
                // '<tbody>' +
                // '<tr>' +

                // '<td><button type="button" class="btn btn-danger del-element"><i class="fa fa-minus-square"></i></button></td>' +
                // '<td><input type="text" name="nama_lengkap[]" alt="'+i+'"id="nama_lengkap'+i+'"></td>' +
                // '<td><input type="text" name="nik[]" alt="'+i+'" id="nik'+i+'"></td>' +
                // '<td><input type="text" name="jenis_kelamin[]" alt="'+i+'" id="jenis_kelamin'+i+'"></td>' +
                // '<td><input type="text" name="tempat_lahir[]" alt="'+i+'" id="tempat_lahir'+i+'"></td>' +
                // '<td><input type="text" name="tanggal_lahir[]" alt="'+i+'" id="tanggal_lahir'+i+'"></td>' +
                // '<td><input type="text" name="agama[]" alt="'+i+'" id="agama'+i+'"></td>' +
                // '<td><input type="text" name="pendidikan[]" alt="'+i+'" id="pendidikan'+i+'"></td>' +
                // '<td><input type="text" name="jenis_pekerjaan[]" alt="'+i+'" id="jenis_pekerjaan'+i+'"></td>' +
                // '<td><input type="text" name="status_perkawinan[]" alt="'+i+'" id="status_perkawinan'+i+'"></td>' +
                // '<td><input type="text" name="hub_keluarga[]" alt="'+i+'" id="hub_keluarga'+i+'"></td>' +
                // '<td><input type="text" name="kewarganegaraan[]" alt="'+i+'" id="kewarganegaraan'+i+'"></td>' +
                // '<td><input type="text" name="no_paspor[]" alt="'+i+'" id="no_paspor'+i+'"></td>' +
                // '<td><input type="text" name="no_kitas[]" alt="'+i+'" id="no_kitas'+i+'">' +
                // '<td><input type="text" name="ayah[]" alt="'+i+'" id="ayah'+i+'"></td>' +
                // '<td><input type="text" name="ibu[]" alt="'+i+'" id="ibu'+i+'"></td>' +

            //     '</tr>' +
            //     '</tbody>' +
            //     '</table>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>' +
            //     '</div>';

            row = '<div class="rec-element">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama ' + i + ' <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12">' +
                '<input type="text" name="nama[]" id="nama' + i + '" alt="' + i + '" required="required" class="form-control col-md-7 col-xs-12">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan ' + i + '<span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12">' +
                '<input type="text" name="pekerjaan[]" id="pekerjaan' + i + '" alt="' + i + '" required="required" class="form-control col-md-7 col-xs-12">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat ' + i + ' <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12"> ' +
                '<div class="input-group">' +
                '<input type="text" name="alamat" id="alamat' + i + '" alt="' + i + '" class="form-control">' +
                '<span class="input-group-btn">' +
                '<button type="button" class="btn btn-warning del-element"><i class="fa fa-minus-square"></i> Hapus</button>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="ln_solid"></div>' +

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