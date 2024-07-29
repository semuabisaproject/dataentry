    <!-- <div class="container" style="background-image: url(<? base_url('assets/img/profile/kurir.png') ?>"> -->

    <!-- Outer Row -->

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6  d-lg-block style=" style="background-image:url(<?php echo base_url('assets/img/profile/1.jpeg') ?>"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Please Login</h1>
                                        </div>
                                        <?= $this->session->flashdata('message'); ?>

                                        <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                            <div class="form-group"> email
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="form-group"> Password
                                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Login
                                            </button>
                                            <hr>
                                            <hr class="divider">
                                            <hr class="divider">
                                            <hr class="divider">
                                            <hr class="divider">


                                            <!-- <div class="text-center">
                                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="<?= base_url('auth/registration'); ?>">DAFTAR</a>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>