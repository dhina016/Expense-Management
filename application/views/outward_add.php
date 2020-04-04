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
                            <h2 class="pageheader-title">Add Outward</h2>
                            <p class="pageheader-text">Outward add</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Outward</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Outward</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h5 class="card-header">Add Outward</h5>
                    <div class="card-body">
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
                            <form method="post" action="<?php echo base_url('outwardadd/add') ?>">
                                <div class="form-group">
                                    <label for="input-select">Select Product</label>
                                    <select class="form-control" id="input-select" name="pid">
                                        <?php foreach ($result  as $r) : ?>
                                            <option value="<?php echo $r->id ?>"><?php echo $r->pname ?> (₹<?php echo $r->pprice ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="inputText3" class="col-form-label">Quantity</label>
                                    <input id="inputText3" type="number" name="pquantity" placeholder="Enter Quantity" class="form-control" autocomplete="off">
                                    <p class="text-danger"><?php echo form_error('pquantity'); ?></p>
                                    <label for="inputText3" class="col-form-label">Select date</label>
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text" name="date" class="form-control datetimepicker-input" data-target="#datetimepicker4" autocomplete="off">
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                    <p class="text-danger"><?php echo form_error('date'); ?></p>
                                </div>
                                <div class="form-group">
                                    <center> <button class="<?php if (sizeof($result) == 0) {
                                                                echo 'btn btn-danger btn-lg';
                                                            } else {
                                                                echo 'btn btn-primary btn-lg';
                                                            } ?>" <?php if (sizeof($result) == 0) {
                                                                    echo 'disabled';
                                                                } ?>>
                                            <?php if (sizeof($result) == 0) {
                                                echo 'No product is outward';
                                            } else {
                                                echo 'Add Outward';
                                            } ?>
                                        </button></center>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->