<div class="">
  <div class="page-title">
    <div class="title_right">
      <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Data</a>
        <h5 class="m-0 font-weight-bold text-dark"></h5>
      </div>
    </div>
 <?= $this->session->flashdata('message'); ?>
    <div class="row">

      <div class="col-xl-3 mt-3">
        <form action="<?= base_url('master/datamaster'); ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="keyword" autocomplete="off" autofocus>
            <div class="input-group-append">
              <input class="btn btn-outline-secondary" type="submit" name="submit">
            </div>
          </div>

        </form>
      </div>
    </div>


    <div class="card-body">
      <div class="table-responsive ">

        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="bg-info text-light">
              <th>No.</th>
              <th>Id master</th>
              <th>kode</th>
              <th>Nama Data</th>

            </tr>
          </thead>

          <tbody>


            <?php foreach ($data as $r) : ?>
              <tr>

                <th><?= ++$start; ?></th>
                <td><?= $r['id']; ?></td>
                <td><?= $r['kode']; ?></td>
                <td><?= $r['data']; ?></td>

              </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('master/tambahdata'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="data" name="data" placeholder="Nama data">
                    </div>
                    <div class="form-group">
                        <select name="kode" id="kode" class="form-control">
                            <option value="">Select Kode</option>
                            <?php foreach ($kode as $d) : ?>
                                <option value="<?= $d['kode']; ?>"><?= $d['kode']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- <div class="row">
                    <div class="col"> -->
<!--Tampilkan pagination-->
<!-- <?= $this->pagination->create_links(); ?> -->
<h6 class="fs-6 fw-light mb-4 text-gray text-center">Total data <?= $total_rows ?></h6>
<!-- </div>
                </div> -->

<!-- <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script> -->