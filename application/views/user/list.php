<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
    <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
</div>


<div class="">
    <div class="page-title">
        <div class="title_right">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            </div>
        </div>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-active">User Management</h6>



            <div class="row">

                <div class="col-md-3 mt-3">
                    <div class="btn-group">
                        <a href="<?= base_url('user/add/'); ?>" class="btn btn-primary btn-sm">Add User</a>
                    </div>
                    <div class="mt-3">
                        <?= $this->session->flashdata('sukses'); ?>
                        <?= $this->session->flashdata('gagal'); ?>
                        <?= $this->session->flashdata('addsukses'); ?>
                    </div>
                    <form action="<?= base_url('user/alreadylogin'); ?>" method="post">
                        <div class="input-group mb-3 mt-3">
                            <input type="text" class="form-control" placeholder="input email user already login" id="is_login" name="is_login" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-danger btn-user btn-block  col-lg-auto mx-auto">
                                    update
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="card-body">

            <div class="table-responsive ">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-info text-light">
                            <th>No.</th>
                            <th>name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>Center</th>
                            <th>Status User</th>
                            <th>Status Login</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($userlist as $u) : ?>
                            <tr>

                                <th scope="row"><?= $i; ?></th>
                                <td><?= $u['name']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?= $u['role']; ?></td>
                                <td><?= $u['center']; ?></td>
                                <td><?= $u['is_active']; ?></td>
                                <td><?= $u['is_login']; ?></td>

                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('user/view/' . $u['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                        <!-- <a href="<?= base_url('order/editorder/' . $ol['reference_number']); ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-flat"><i class="fas fa-window-close"></i></a> -->
                                        <!-- <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-flat"><i class="fas fa-window-close"></i></a> -->
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>