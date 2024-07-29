<div class="container-fluid">
    <div class="card o-hidden border-colour-#ffff shadow-lg my-3 col-lg-auto mx-3">
        <div class="card-body p-1">
            <!-- Page Heading -->
            <h1 class="h3 mb-1 text-gray-800">SOBAT REGISTRATION FORM</h1>
            <p class="mb-4">Silakan mengisi data berikut untuk registrasi sebagai Agen Hub Sobat express
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow-lg my-3 col-lg-auto mx-3">
            <div class="card-body p-20">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-20">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Personal Data</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                                <div class="form-group row">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="ktp" name="ktp" placeholder="Nomor KTP" value="<?= set_value('ktp') ?>">
                                    <?= form_error('ktp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamatktp" name="alamatktp" placeholder="Alamat KTP" value="<?= set_value('alamatktp') ?>">
                                    <?= form_error('alamat domisili', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="npwp" name="npwp" placeholder="Nomor NPWP" value="<?= set_value('npwp') ?>">
                                    <?= form_error('npwp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nohp" name="nohp" placeholder="Nomor HP" value="<?= set_value('nohp') ?>">
                                    <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow-lg my-3 col-lg-auto mx-3">
            <div class="card-body p-20">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-20">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Business Data</h1>
                            </div>

                            <div class="form-group row">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamatkantor" name="alamatkantor" placeholder="Alamat kantor" value="<?= set_value('alamatkantor') ?>">
                                <?= form_error('alamatkantor', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <nav class="navbar navbar-expand navbar-light bg-light mb-4">
                                <a class="navbar-brand" href="#">Badan Hukum</a>
                                <ul class="navbar-nav ml-5">
                                    <li class="nav-item dropdown">
                                        <select name="badanhukum" id="badanhukum" class="form-control">
                                            <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                <option value="">PERORANGAN</option>
                                                <option value="">CV</option>
                                                <option value="">PT</option>
                                                <option value="">KOPERASI</option>
                                                <option value="">YAYASAN</option>
                                            </div>
                                        </select>
                        </div>
                        </li>
                        </ul>
                        </nav>

                        <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="badanhukum" name="badanhukum" placeholder="badanhukum" value="<?= set_value('badanhukum') ?>">
                                <?= form_error('badan hukum', '<small class="text-danger">', '</small>'); ?>
                            </div> -->
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="alamatusaha" name="alamatusaha" placeholder="Alamat Usaha" value="<?= set_value('alamatusaha') ?>">
                            <?= form_error('Alamat usaha', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="norek" name="norek" placeholder="Nomor Rekening" value="<?= set_value('norek') ?>">
                            <?= form_error('nomor rekening', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="notelpusaha" name="notelpusaha" placeholder="Nomor Telepon Usaha" value="<?= set_value('notelpusaha') ?>">
                            <?= form_error('no telpon kantor', '<small class="text-danger">', '</small>'); ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-lg-6">
    <div class="card shadow-lg my-3 col-lg-auto mx-3">
        <div class="card-body p-10">
            <div class="row">
                <div class="col-lg">
                    <div class="p-10">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create Password</h1>
                        </div>
                        <div class="form-group row">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" value="<?= set_value('password'); ?>">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block shadow-lg my-3 col-lg-auto mx-3">
                                Register Account
                            </button>
                            </form>
                            <button type="submit" class="btn btn-primary btn-user btn-block shadow-lg my-3 col-lg-auto mx-3">
                                Print Form
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>