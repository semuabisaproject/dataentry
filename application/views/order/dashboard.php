<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-light text-uppercase mb-1">
                                Total Input</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= ($countall) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-light text-uppercase mb-1">
                                Today Input</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= ($counttoday) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paperclip fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-light text-uppercase mb-1">Agent Active
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= ($agentaktif) ?></div>
                                </div>
                                <div class="col">
                                    <!-- <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-light text-uppercase mb-1">
                                Agent Login</div>
                            <div class="text-lg font-weight-bold text-grey"><?= ($userlogin) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<div class="container-fluid">
    <div class="card-body">
        <div class="table-responsive ">

            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-info text-light">
                        <th>No.</th>
                        <th>Agent Name</th>
                        <th>Total Input</th>
                        <th>Today Input</th>
                        <th>Join Project</th>
                        <th>Productivity daily</th>
                        <th>Jumlah skip</th>
                        <th>Avg Durasi</th>
                        <th>status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($byagent as $b) : ?>
                        <tr>

                            <th><?= $i; ?></th>
                            <td><?= $b['nama']; ?></td>
                            <td><?= $b['jumlah']; ?></td>
                            <td><?= $b['total']; ?></td>
                            <td><?= $b['join']; ?></td>
                            <td><?= $b['productivity']; ?></td>
                            <td><?= $b['skip']; ?></td>
                            <td><?= $b['durasi']; ?></td>
                            <td><?= $b['status']; ?></td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </table>
        </div>
    </div>
</div>
</div>