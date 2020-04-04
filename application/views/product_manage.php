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
                            <h2 class="pageheader-title">Manage Product</h2>
                            <p class="pageheader-text">Manage Product</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Dashboard</li>
                                        <li class="breadcrumb-item">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->

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

                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Manage Product</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row"></div>
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Price</th>
                                                <th scope="col">Product Type</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($result  as $r) : ?>
                                                <tr>
                                                    <th><?php echo $i ?></th>
                                                    <td><?php echo ucfirst($r->pname); ?></td>
                                                    <td><?php echo $r->pprice ?></td>
                                                    <td><?php if ($r->ptype == 0) {
                                                            echo 'Inward';
                                                        } else {
                                                            echo 'Outward';
                                                        } ?></td>
                                                    <td> <button class="btn btn-primary btn-dark" onclick="window.location.href ='<?php echo base_url('productmanage/productEdit/') . $r->id; ?>'">
                                                            <p class="fas fa-edit" style="color:aliceblue;"></p>
                                                        </button>
                                                        <button class="btn btn-primary btn-primary" onclick="window.location.href ='<?php echo base_url('productmanage/productDelete/') . $r->id; ?>'">
                                                            <p class="fas fa-trash" style="color:aliceblue;"></p>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php $i += 1; ?>
                                            <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>