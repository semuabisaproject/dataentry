<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container-fluid">
        <?= $this->session->flashdata('messagedata'); ?>
        <?= $this->session->flashdata('messagekk'); ?>
        <?= $this->session->flashdata('msgtambah'); ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


        <body id="page-top">

            <div class="card-body" width="auto">
                <div class="table-responsive ">
                    <table class="table table-bordered table-m w-auto large" width="100%">
                        <h3>Informasi Kartu Keluarga</h3>
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>id</th>
                                <th>No KontraK</th>
                                <th>No KK</th>
                                <th>alamat</th>
                                <th>Kepala Keluarga</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Desa/Kelurahan</th>
                                <!-- <th>Kelurahan</th> -->
                                <th>Kecamatan</th>
                                <th>Kota Kabupaten</th>
                                <th>Kodepos</th>
                                <th>Provinsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1; ?>
                                <?php foreach ($cekdata as $t) : ?>

                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= $t['id_master']; ?></td>
                                    <td><?= $t['no_kontrak']; ?></td>
                                    <td><?= $t['no_kk']; ?></td>
                                    <td><?= $t['alamat']; ?></td>
                                    <td><?= $t['kepalakeluarga']; ?></td>
                                    <td><?= $t['rt'] ?></td>
                                    <td><?= $t['rw']; ?></td>
                                    <td><?= $t['desa']; ?></td>
                                    <!-- <td><?= $t['kelurahan']; ?></td> -->
                                    <td><?= $t['kecamatan']; ?></td>
                                    <td><?= $t['kota_kabupaten']; ?></td>
                                    <td><?= $t['kodepos']; ?></td>
                                    <td><?= $t['provinsi']; ?></td>
                            </tr>

                            <?php $i++; ?>
                        <?php endforeach; ?>




                        <tbody>
                            <tr>
                                <?php $i = 1; ?>
                                <?php foreach ($cekdata as $t) : ?>
                                    <form id="demo" class="user" data-parsley-validate="" method="post" action="<?= base_url('resultdata/editdatakk/?id=' . $t['id_master']); ?>">
                                        <input type="hidden" name="update_by" id="update_by" class="form-control form-control-sm" value="<?= set_value('update_by', $user['id']) ?>">
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $t['id_master']; ?></td>
                                        <!-- <td><input value="<?= $t['no_kk']; ?>" type="text" name="no_kk" id="no_kk" disabled></td> -->
                                        <td><input value="<?= $t['no_kontrak']; ?>" type="text" name="no_kontrak" id="no_kontrak" value="<?= set_value('no_kontrak') ?>"></td>
                                        <td><input value="<?= $t['no_kk']; ?>" type="text" name="no_kk" id="no_kk" value="<?= set_value('no_kk') ?>"></td>
                                        <td><input value="<?= $t['alamat']; ?>" type="text" name="alamat" id="alamat" value="<?= set_value('alamat') ?>"></td>
                                        <td><input value="<?= $t['kepalakeluarga']; ?>" type="text" name="kepalakeluarga" id="kepalakeluarga" value="<?= set_value('kepalakeluarga') ?>"></td>
                                        <td><input value="<?= $t['rt']; ?>" type="text" name="rt" id="rt" value="<?= set_value('rt') ?>"></td>
                                        <td><input value="<?= $t['rw']; ?>" type="text" name="rw" id="rw" value="<?= set_value('rw') ?>"></td>
                                        <td><input value="<?= $t['desa']; ?>" type="text" name="desa" id="desa" value="<?= set_value('desa') ?>"></td>
                                        <!-- <td><input value="<?= $t['kelurahan']; ?>" type="text" name="kelurahan" id="kelurahan" value="<?= set_value('kelurahan') ?>"></td> -->
                                        <td><input value="<?= $t['kecamatan']; ?>" type="text" name="kecamatan" id="kecamatan" value="<?= set_value('kecamatan') ?>"></td>
                                        <td><input value="<?= $t['kota_kabupaten']; ?>" type="text" name="kota_kabupaten" id="kota_kabupaten" value="<?= set_value('kota_kabupaten') ?>"></td>
                                        <td><input value="<?= $t['kodepos']; ?>" type="text" name="kodepos" id="kodepos" value="<?= set_value('kodepos') ?>"></td>
                                        <td><input value="<?= $t['provinsi']; ?>" type="text" name="provinsi" id="provinsi" value="<?= set_value('provinsi') ?>"></td>
                                        <th><button type="submit" href="<?= base_url('resultdata/editdatakk/?id=' . $t['id_master']); ?>" class="btn btn-info btn-sm"><i class="fas fa-save"></i></button></th>
                                    </form>

                            </tr>

                            <?php $i++; ?>
                        <?php endforeach; ?>



                            
                            <p class="card-title">Nomor Kontrak : <?= $t['no_kontrak']; ?></p>
                            <p class="card-title">Cabang : <?= substr($t['no_kontrak'], 0, 3); ?></p>
                            <p class="card-text">Tanggal Input: <?= $t['create_date']; ?> , Dibuat oleh : <?= $t['create']; ?> </p>
                            <p class="card-text">Tanggal perubahan: <?= $t['update_date']; ?> , Diubah oleh : <?= $t['update']; ?> 
                            <div class="btn-group">
                                            <a href="<?= base_url('resultdata/tambahdata/' . $t['id_master'] .'/' . $t['no_kk']); ?>" class="btn btn-danger btn-sm">Tambah data</i></a>
                                            </div> </p>


                    </table>
                </div>
            </div>




            <div class="card-body" width="auto">
                <div class="table-responsive ">
                    <table class="table table-bordered table-m w-auto large" width="100%">
                        <h4>Data Anggota Keluarga</h4>
                        
                            
                        <thead class="thead-light">
                            <tr>

                                <th>No</th>
                                <th>id data</td>
                                <!-- <th><p>Update By</p></th>
                                <th><p>Update at</p></th> -->
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            <tr>


                                <?php $i = 1; ?>
                                <?php foreach ($cekdetail as $cd) : ?>
                                    <form id="demo" class="user" data-parsley-validate="" method="post" action="<?= base_url('resultdata/verifikasi/?id=' . $cd['id_data']); ?>">
                                        <input type="hidden" name="update_by" id="update_by" class="form-control form-control-sm" value="<?= set_value('update_by', $user['id']) ?>">

                                        <td scope="row"><?= $i; ?></td>
                                        <td> <?= $cd['id_data']; ?></p></td>
                                        <!-- <td><p> <?= $t['update']; ?></p></td>
                                        <td><p><?= $cd['tgl_update']; ?></p></td> -->
                                        <td><input value="<?= $cd['nama_lengkap']; ?>" type="text" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>"></td>
                                        <td><input value="<?= $cd['nik']; ?>" type="text" name="nik" id="nik" value="<?= set_value('nik') ?>"></td>
                                        <td><input value="<?= $cd['jenis_kelamin']; ?>" type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>"></td>
                                        <td><input value="<?= $cd['tempat_lahir']; ?>" type="text" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir') ?>"></td>
                                        <td><input value="<?= $cd['tanggal_lahir']; ?>" type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>"></td>
                                        <td><input value="<?= $cd['agama']; ?>" type="text" name="agama" id="agama" value="<?= set_value('agama') ?>"></td>
                                        <td><input value="<?= $cd['pendidikan']; ?>" type="text" name="pendidikan" id="pendidikan" value="<?= set_value('pendidikan') ?>"></td>
                                        <td><input value="<?= $cd['jenis_pekerjaan']; ?>" type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" value="<?= set_value('jenis_pekerjaan') ?>"></td>
                                        <td><input value="<?= $cd['status_perkawinan']; ?>" type="text" name="status_perkawinan" id="status_perkawinan" value="<?= set_value('status_perkawinan') ?>"></td>
                                        <td><input value="<?= $cd['hub_keluarga']; ?>" type="text" name="hub_keluarga" id="hub_keluarga" value="<?= set_value('hub_hub_keluarga') ?>"></td>
                                        <td><input value="<?= $cd['kewarganegaraan']; ?>" type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>"></td>
                                        <td><input value="<?= $cd['no_paspor']; ?>" type="text" name="no_paspor" id="no_paspor" value="<?= set_value('no_paspor') ?>"></td>
                                        <td><input value="<?= $cd['no_kitas']; ?>" type="text" name="no_kitas" id="no_kitas" value="<?= set_value('no_kitas') ?>"></td>
                                        <td><input value="<?= $cd['ayah']; ?>" type="text" name="ayah" id="ayah" value="<?= set_value('ayah') ?>"></td>
                                        <td><input value="<?= $cd['ibu']; ?>" type="text" name="ibu" id="ibu" value="<?= set_value('ibu') ?>"></td>

                                        <th><button type="submit" href="<?= base_url('resultdata/verifikasi/?id=' . $cd['id_data']); ?>" class="btn btn-info btn-sm"><i class="fas fa-save"></i></button></th>
                                    </form>
                                    <!-- <th scope="row"><?= $i; ?></th>
                                                <th><?= $cd['id']; ?></td>
                                                <td><?= $cd['nama_lengkap']; ?><input value="<?= $cd['nama_lengkap']; ?>" type="text" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>"></td>
                                                <td><?= $cd['nik']; ?><input value="<?= $cd['nik']; ?>" type="text" name="nik" id="nik" value="<?= set_value('nik') ?>"></td>
                                                <td><?= $cd['jenis_kelamin']; ?><input value="<?= $cd['jenis_kelamin']; ?>" type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>"></td>
                                                <td><?= $cd['tempat_lahir']; ?><input value="<?= $cd['tempat_lahir']; ?>" type="text" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir') ?>"></td>
                                                <td><?= $cd['tanggal_lahir']; ?><input value="<?= $cd['tanggal_lahir']; ?>" type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir') ?>"></td>
                                                <td><?= $cd['agama']; ?><input value="<?= $cd['agama']; ?>" type="text" name="agama" id="agama" value="<?= set_value('agama') ?>"></td>
                                                <td><?= $cd['pendidikan']; ?><input value="<?= $cd['pendidikan']; ?>" type="text" name="pendidikan" id="pendidikan" value="<?= set_value('pendidikan') ?>"></td>
                                                <td><?= $cd['jenis_pekerjaan']; ?><input value="<?= $cd['jenis_pekerjaan']; ?>" type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" value="<?= set_value('jenis_pekerjaan') ?>"></td>
                                                <td><?= $cd['status_perkawinan']; ?><input value="<?= $cd['status_perkawinan']; ?>" type="text" name="status_perkawinan" id="status_perkawinan" value="<?= set_value('status_perkawinan') ?>"></td>
                                                <td><?= $cd['hub_keluarga']; ?><input value="<?= $cd['hub_keluarga']; ?>" type="text" name="hub_le;uarga" id="hub_le;uarga" value="<?= set_value('hub_le;uarga') ?>"></td>
                                                <td><?= $cd['kewarganegaraan']; ?><input value="<?= $cd['kewarganegaraan']; ?>" type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>"></td>
                                                <td><?= $cd['no_paspor']; ?><input value="<?= $cd['no_paspor']; ?>" type="text" name="no_pasport" id="no_pasport" value="<?= set_value('no_pasport') ?>"></td>
                                                <td><?= $cd['no_kitas']; ?><input value="<?= $cd['no_kitas']; ?>" type="text" name="no_kitas" id="no_kitas" value="<?= set_value('no_kitas') ?>"></td>
                                                <td><?= $cd['ayah']; ?><input value="<?= $cd['ayah']; ?>" type="text" name="ayah" id="ayah" value="<?= set_value('ayah') ?>"></td>
                                                <td><?= $cd['ibu']; ?><input value="<?= $cd['ibu']; ?>" type="text" name="ibu" id="ibu" value="<?= set_value('ibu') ?>"></td>
                                        
                                                <th><a href="<?= base_url('resultdata/verifikasi/?id=' . $cd['id_data']); ?>" class="btn btn-info btn-sm"><i class="fas fa-save"></i></a></th> -->
                            </tr>
                            </form>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <?php foreach ($cekupdate as $cu) : ?>
                        <p class="card-text">Tanggal perubahan: <?= $cu['tgl_update']; ?> , Diubah oleh : <?= $cu['update']; ?> </p>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

            </div>
    </div>

</div>
