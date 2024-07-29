<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a href="" class="badge badge-success"><i class="fas fa-edit"></i></a>
                                <a href="" class="badge badge-danger"><i class="fas fa-window-close"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

<h1 class="h3 mb-4 text-gray-800"><?= ($masterkk)?></h1>
        
        </div>
    </div>
    <div>
    
    <p id="time">
00 hours and 00 minutes and 00 seconds
</p>
<form method ="post" action="<?= base_url('menu/tes'); ?>">
<input type="text" name="times" id="times" value="<?= date("Y/m/d H:i:s") ?>"></h1>
<input type="hidden" name="timesa" id="timesa" value="<?= date("Y/m/d H:i:s") ?>">
<button type="submit" class="btn btn-primary">Add</button>
</div>
</form>




</div>

<!-- /.container-fluid --> 

</div>
<!-- End of Main Content -->
<script>
           var timeelm, time, days, hours, minutes, seconds;
timeelm = document.getElementById("time");
time = timeelm.innerHTML;
//days = parseInt(time.split(" ")[0]);
hours = parseInt(time.split(" ")[00]);
minutes = parseInt(time.split(" ")[00]);
seconds = parseInt(time.split(" ")[00]);
timerGo();

function timerGo() {
    seconds++;
    if (seconds == 60) {
    		minutes++;
        seconds = 0;
    }
    if (minutes == 60) {
    		hours++;
        minutes = 0;
    }
    if (hours == 24) {
    		days++;
        hours = 0;
    }
    timeelm.innerHTML = hours+":"+minutes+":"+seconds+"";
    setTimeout(timerGo, 1000);
}

        </script>
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
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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