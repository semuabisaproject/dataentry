<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>
    <div class="card mb-3" style="max-width: auto;">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail rounded">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Name   : <?= $user['name']; ?></h5>
                    <p class="card-text">Email    : <?= $user['email']; ?></p>
                 <p class="card-text">TOTAL DATA INPUT : </p>
                 <p class="card-text">INPUT TODAY : </p>
                 <p class="card-text">Chart : </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->