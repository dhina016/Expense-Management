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
                            <h2 class="pageheader-title">Edit Product</h2>
                            <p class="pageheader-text">Product Edit</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb"> 
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Dashboard</li>
                                        <li class="breadcrumb-item">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Edit Product</h5>
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
                        <form method="post" action="<?php echo base_url('productmanage/edit/').$result[0]->id; ?>">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Product Name</label>
                                <input id="inputText3" type="text" name="product" placeholder="Enter product" value="<?php echo $result[0]->pname; ?>" class="form-control">
                                <p class="text-danger"><?php echo form_error('product'); ?></p>
                            </div>
                            <div class="form-group">
                                <label for="inputText4" class="col-form-label">Enter Price</label>
                                <input id="inputText4" type="number" name="price" class="form-control" value="<?php echo $result[0]->pprice; ?>" placeholder="Enter Price">
                                <p class="text-danger"><?php echo form_error('price'); ?></p>
                            </div>
                            <div class="form-group">
                            <?php if($result[0]->ptype == 0){ ?>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="type" value='inward' checked="" class="custom-control-input"><span class="custom-control-label">Inward</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="type" value='outward' class="custom-control-input"><span class="custom-control-label">Outward</span>
                                </label>
                            <?php }else{ ?>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="type" value='inward' class="custom-control-input"><span class="custom-control-label">Inward</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="type" value='outward' checked="" class="custom-control-input"><span class="custom-control-label">Outward</span>
                                </label>
                            <?php }?>
                            </div>
                            <div class="form-group">
                                <center> <button class="btn btn-primary btn-lg">Edit Product</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->