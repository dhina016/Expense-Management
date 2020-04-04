        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">View Inward</h2>
                            <p class="pageheader-text">Inward view</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Dashboard</li>
                                        <li class="breadcrumb-item">Inward</li>
                                        <li class="breadcrumb-item active" aria-current="page">View Inward</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="accrodion-regular">
                    <div id="accordion3">
                        <div class="card">

                            <div class="card-header" id="headingNine">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        <span class="fas fa-angle-down mr-3"></span>Select Date
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion3">
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url('inwardview/getDate') ?>">
                                        <label for="inputText3" class="col-form-label">Start date (YYYY/MM/DD)</label>
                                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                            <input type="text" name="date1" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off">
                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                        <p class="text-danger"><?php echo form_error('date1'); ?></p>
                                        <label for="inputText3" class="col-form-label">End date (YYYY/MM/DD)</label>
                                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                            <input type="text" name="date2" class="form-control datetimepicker-input" data-target="#datetimepicker3" autocomplete="off">
                                            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                        <p class="text-danger"><?php echo form_error('date2'); ?></p>
                                        <div class="card-body">
                                            <center> <button class="btn btn-primary btn-lg">
                                                    Sort </button></center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">View Inward</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row">
                                        <?php $msg = $this->session->flashdata("msg"); ?>
                                        <div class="<?php echo $msg['name']; ?>" role="alert">
                                            <strong><?php echo $msg['error']; ?></strong>
                                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                                <span <?php if ($msg['close']) {
                                                            echo $msg['close'] . "true";
                                                        } else {
                                                            echo 'hidden';
                                                        } ?>>×</span>
                                            </a>
                                        </div>
                                    </div>
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total price</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php if ($result == false) {
                                            } else {
                                                foreach ($result  as $r) : ?>
                                                    <tr>
                                                        <th><?php echo $i ?></th>
                                                        <td><?php echo ucfirst($r->pname) ?></td>
                                                        <td><?php echo $r->totalprice / $r->quantity ?></td>
                                                        <td><?php echo $r->quantity ?></td>
                                                        <td><?php echo $r->totalprice ?></td>
                                                        <td><?php echo $r->date ?></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-primary" onclick="window.location.href ='<?php echo base_url('inwardview/inwardDelete/') . $r->id; ?>'">
                                                                <p class="fas fa-trash" style="color:aliceblue;"></p>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $i += 1; ?>
                                            <?php endforeach;
                                            } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>