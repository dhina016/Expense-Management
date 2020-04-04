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
                            <h2 class="pageheader-title">Settings</h2>
                            <p class="pageheader-text">settings</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Account</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Account Settings</h5>
                    <div class="card-body">
                    <?php $msg = $this->session->flashdata("msg");?>
                        <div class="<?php echo $msg['name'];?>" role="alert">
                            <strong><?php echo $msg['error']; ?></strong>
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span <?php if($msg['close']){
                                    echo $msg['close']."true";
                                }else{
                                    echo 'hidden';
                                } ?>>×</span>
                            </a>
                        </div>
                        <form method="post" action="<?php echo base_url('settings/changeSettings') ?>">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Username</label>
                                <input id="inputText3" type="text" name="username" placeholder="username" class="form-control">
                                <p class="text-danger"><?php echo form_error('username'); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email address</label>
                                <input id="inputEmail" type="email" name="email" placeholder="name@example.com" class="form-control">
                                <p class="text-danger"><?php echo form_error('email'); ?></p>
                            </div>
                            <label for="inputPassword">Password</label>
                            <input id="inputPassword" type="password" name="password" placeholder="Password" class="form-control">
                            <p class="text-danger"><?php echo form_error('password'); ?></p>
                    </div>
                    <div class="form-group">
                        <center> <button class="btn btn-primary btn-lg">Change</button></center>
                    </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->