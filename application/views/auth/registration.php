<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Daftar Mitra</h1>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                                    <div class="form-group row">
                                    </div>

                                    <div class="form-group">Nama :
                                        <input type="text" class="form-control form" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">Nomor telepon :
                                        <input type="text" class="form-control form" id="nohp" name="nohp" placeholder="Nomor HP" value="<?= set_value('nohp') ?>">
                                        <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">e-mail :
                                        <input type="text" class="form-control form" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="col-lg mb-3 mb-sm-0">
                                        <nav class="navbar navbar-expand navbar-light bg-light mb-4">
                                            <a class="text-muted ml-5" href="#">Pilih Mitra</a>
                                            <ul class="navbar-nav ml-5">
                                                <li class="nav-item dropdown">
                                                    <select name="register_as" id="register_as" class="form-control">
                                                        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                            <option value="3">Kurir</option>
                                                            <option value="4">Agent</option>
                                                            <option value="6">satelite</option>
                                                            <option value="7">Hub</option>
                                                        </div>
                                                    </select>
                                                </li>
                                            </ul>
                                        </nav>

                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form" id="password1" name="password1" placeholder="Password">
                                            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form" id="password2" name="password2" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-user btn-block shadow-lg my-3 col-lg-auto mx-auto">
                                        Register Account
                                    </button>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>