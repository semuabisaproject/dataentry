<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <body id="page-top">

        <div class="row">
            <div class="card-body">
                <form class="user" method="post" action="<?= base_url('order/neworder') ?>">
                    <label for="" class="control-label"> Create by :
                        <p class="card-text">
                            <small class="text"> </small>
                        </p>

                        <input name="create_by" id="" class="form-control form-control-sm" disabled="disabled" value=" <?= set_value('create_by', ($user['name'] . "-" .  $user['email'])) ?>">
                    </label>


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Sender Information</b>
                                <div class="form-group">
                                    <label for="" class="control-label">Name Pengirim</label>
                                    <input type="text" class="form-control form-control-sm" name="namapengirim" id="" value="<?= set_value('namapengirim') ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat Pengirim</label>
                                    <input type="text" name="alamatpengirim" id="" class="form-control form-control-sm" value="<?= set_value('alamatpengirim') ?>">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <nav class="card">
                                            <label class="col">Kelurahan</label>
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <select name="kel_asal" id="kel_asal" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($area as $a) : ?>
                                                                <option value="<?= $a['id_kel']; ?>" id="kel"><?= $a['kelurahan']; ?>
                                                                <?php endforeach; ?>
                                                                </option>
                                                        </div>

                                                    </select>
                                        </nav>
                                        <nav class="card">
                                            <label class="col">kecamatan</label>
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <select name="kec_asal" id="kec_asal" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($kec as $kc) : ?>
                                                                <option value="<?= $kc['id_kec']; ?>" id="kec"><?= $kc['kecamatan']; ?>
                                                                <?php endforeach; ?>
                                                                </option>
                                                        </div>
                                                    </select>
                                        </nav>
                                        <nav class="card">
                                            <label class="col">Kota</label>
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <select name="kota_asal" id="kota_asal" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($kot as $kt) : ?>
                                                                <option value="<?= $kt['id_kota']; ?>" id="kot"><?= $kt['kota']; ?>
                                                                <?php endforeach; ?>
                                                                </option>
                                                        </div>
                                                    </select>
                                        </nav>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Nomor Pengirim</label>
                                    <input type="text" name="contactpengirim" id="" class="form-control form-control-sm" value="<?= set_value('contactpengirim') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b>Recipient Information</b>
                                <div class="form-group">
                                    <label for="" class="control-label">Nama penerima</label>
                                    <input type="text" name="namapenerima" id="" class="form-control form-control-sm" value="<?= set_value('namapenerima') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat penerima</label>
                                    <input type="text" name="alamatpenerima" id="" class="form-control form-control-sm" value="<?= set_value('alamatpenerima') ?>">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <nav class="card">
                                            <label class="col">Kelurahan</label>
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <select name="kel_tujuan" id="kel_tujuan" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($area as $a) : ?>
                                                                <option value="<?= $a['id_kel']; ?>" id="kel"><?= $a['kelurahan']; ?>
                                                                <?php endforeach; ?>
                                                                </option>
                                                        </div>

                                                    </select>
                                        </nav>
                                        <nav class="card">
                                            <label class="col">kecamatan</label>
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <select name="kec_tujuan" id="kec_tujuan" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($kec as $kc) : ?>
                                                                <option value="<?= $kc['id_kec']; ?>" id="kec"><?= $kc['kecamatan']; ?>
                                                                <?php endforeach; ?>
                                                                </option>
                                                        </div>
                                                    </select>
                                        </nav>
                                        <nav class="card">
                                            <label class="col">Kota</label>
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <select name="kota_tujuan" id="kota_tujuan" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <?php foreach ($kot as $kt) : ?>
                                                                <option value="<?= $kt['id_kota']; ?>" id="kot"><?= $kt['kota']; ?>
                                                                <?php endforeach; ?>
                                                                </option>
                                                        </div>
                                                    </select>
                                        </nav>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Nomor telepon penerima</label>
                                    <input type="text" name="contactpenerima" id="" class="form-control form-control-sm" value="<?= set_value('contactpenerima') ?>">
                                </div>
                                <div id="barcode_div">
                                    <input type="text" name="barcode_text">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- <input type="hidden" name="create_by" id="" class="form-control form-control-sm" disabled="disabled" value="<?= set_value('create_by', $user['email']) ?>"> -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered table-sm w-auto small" width="100%" id="parcel-items">
                            <b>Informasi barang</b>
                            <thead>
                                <tr>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>Length</th>
                                    <th>Width</th>
                                    <th>Price</th>
                                    <th>Jenis barang</th>


                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="weight" id="weight" value="<?= set_value('weight') ?>"></td>
                                    <td><input type="text" name="height" id="height" value="<?= set_value('height') ?>"></td>
                                    <td><input type="text" name="length" id="length" value="<?= set_value('length') ?>"></td>
                                    <td><input type="text" name="width" id="width" value="<?= set_value('width') ?>"></td>
                                    <td><input type="text" name="price" id="price" value="<?= set_value('price') ?>"></td>
                                    <td><input type="text" name="jenisbarang" id="jenisbarang" value="<?= set_value('jenisbarang') ?>"></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block shadow-lg my-3 col-lg-2 mx-right">
            Submit
        </button>
        </form>
</div>
</body>
</div>
<script>
    $('.dropdown-menu').on('select', function() {
        const id_kel = $(this).data('id_kel');
        const id_kec = $(this).data('id_kec');
        const id_kota = $(this).data('id_kota');

        $.ajax({
            url: "<?= base_url('order/neworder'); ?>",
            type: 'get',
            data: {
                id_kel: id_kel,
                id_kec: id_kec,
                id_kota: id_kota
            },
            success: function() {
                document.location.href = "<?= base_url('order/neworder/'); ?>" + id_kel;
            }
        });

    });
</script>