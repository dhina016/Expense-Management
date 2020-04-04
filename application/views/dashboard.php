<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Dashboard</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active" aria-current="page">Total Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">


                <div class="row">
                    <!-- ============================================================== -->
                    <!-- sales  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Balance</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">₹<?php echo $cost[0]->cost; ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end sales  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- new customer  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Product</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo sizeof($product); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end new customer  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- visitor  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Inward</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo sizeof($inward); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end visitor  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- total orders  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card border-3 border-top border-top-primary">
                            <div class="card-body">
                                <h5 class="text-muted">Total Outward</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1"><?php echo sizeof($outward); ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end total orders  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- pie chart  -->
            <!-- ============================================================== -->
            <div class="row">
                <?php if ($grapinward != false) { ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Inward - Product & Price</h5>
                            <div class="card-body">
                                <canvas id="pie_inward">

                                </canvas>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($grapoutward != false) { ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Outward - Product & Price</h5>
                            <div class="card-body">
                                <canvas id="pie_outward"></canvas>
                            </div>
                        </div>
                    </div>
            </div>
        <?php } ?>

        <?php if ($barinward != false) { ?>
            <div class="card">
                <h5 class="card-header">Inward - Product(Quantity) & Total Price</h5>
                <div class="card-body">
                    <canvas id="bar_inward"></canvas>
                </div>
            </div>
        <?php } ?>
        <!-- ============================================================== -->
        <!-- end total orders  -->
        <!-- ============================================================== -->
        <?php if ($baroutward != false) { ?>
            <div class="card">
                <h5 class="card-header">Outward - Product(Quantity) & Total Price</h5>
                <div class="card-body">
                    <canvas id="bar_outward"></canvas>
                </div>
            </div>
        <?php } ?>
        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- recent orders  -->
        <!-- ============================================================== -->
       <?php if ($tableinward == false) {
                            } else { ?>
        <div class="card" style="padding: 3px;">
            <h5 class="card-header">Total Sales - Inward Report</h5>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-light">
                            <tr class="border-0">
                                <th class="border-0">#</th>
                                <th class="border-0">Product Name</th>
                                <th class="border-0">Product Price</th>
                                <th class="border-0">Quantity</th>
                                <th class="border-0">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                           <?php foreach ($tableinward  as $r) : ?>
                                    <tr>
                                        <th><?php echo $i ?></th>
                                        <td><?php echo ucfirst($r->pname) ?></td>
                                        <td><?php echo $r->pprice ?></td>
                                        <td><?php echo $r->quantity ?></td>
                                        <td><?php echo $r->totalprice ?></td>
                                    </tr>
                                    <?php $i += 1; ?>
                            <?php endforeach; ?>
                            
                            <tr>
                                <td colspan="9"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($tableoutward == false) {
        } else { ?>
            <div class="card" style="padding: 3px;">
                <h5 class="card-header">Total Sales - Outward Report</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Price</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tableoutward  as $r) : ?>
                                    <tr>
                                        <th><?php echo $i ?></th>
                                        <td><?php echo ucfirst($r->pname) ?></td>
                                        <td><?php echo $r->pprice ?></td>
                                        <td><?php echo $r->quantity ?></td>
                                        <td><?php echo $r->totalprice ?></td>
                                    </tr>
                                    <?php $i += 1; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="9"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php  } ?>



        
        <script>
            $(function() {
                //get the bar chart canvas
                var cData = JSON.parse(`<?php if ($grapinward != false) {
                                            echo $grapinward;
                                        } ?>`);
                var ctx = $("#pie_inward");

                //bar chart data
                var data = {
                    labels: cData.label,
                    datasets: [{
                        data: cData.data,
                        backgroundColor: cData.color
                    }]
                };

                //options
                var options = {
                    responsive: true,
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    }
                };

                //create bar Chart class object
                var chart1 = new Chart(ctx, {
                    type: "pie",
                    data: data,
                    options: options
                });

            });
        </script>
        <script>
            $(function() {
                //get the bar chart canvas
                var cData = JSON.parse(`<?php if ($grapoutward != false) {
                                            echo $grapoutward;
                                        } ?>`);
                var ctx = $("#pie_outward");

                //bar chart data
                var data = {
                    labels: cData.label,
                    datasets: [{
                        data: cData.data,
                        backgroundColor: cData.color
                    }]
                };

                //options
                var options = {
                    responsive: true,
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    }
                };

                //create bar Chart class object
                var chart1 = new Chart(ctx, {
                    type: "pie",
                    data: data,
                    options: options
                });

            });
        </script>

        <script>
            $(function() {
                //get the bar chart canvas
                var cData = JSON.parse(`<?php if ($barinward != false) {
                                            echo $barinward;
                                        } ?>`);
                var ctx = $("#bar_inward");
                var barchart = {
                        labels: ['product'],
                        datasets: []
                    },
                    array = cData.data;
                try {
                    array.forEach(function(a, i) {
                        barchart.datasets.push({
                            label: cData.label[i],
                            data: [cData.data[i]],
                            backgroundColor: cData.color[i],
                            borderColor: cData.bordercolor[i],
                            borderWidth: cData.borderwidth[i],
                        });
                    });
                } catch (error) {
                    console.log(error);
                }

                //bar chart data
                // var data = {
                //     labels: cData.label,
                //     datasets: [{
                //         label: cData.label,
                //         data: cData.data,
                //         backgroundColor: cData.color,
                //         borderColor: cData.bordercolor,
                //         borderWidth: cData.borderwidth
                //     }]
                // };

                //options
                var options = {
                    scales: {
                        yAxes: [{

                        }]
                    },
                    legend: {
                        display: true,
                        position: 'bottom',

                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },

                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }]
                    }
                };

                //create bar Chart class object
                var chart1 = new Chart(ctx, {
                    type: "bar",
                    data: barchart,
                    options: options
                });

            });
        </script>
        <script>
            $(function() {
                //get the bar chart canvas
                var cData = JSON.parse(`<?php if ($baroutward != false) {
                                            echo $baroutward;
                                        } ?>`);
                var ctx = $("#bar_outward");
                var barchart = {
                        labels: ['product'],
                        datasets: []
                    },
                    array = cData.data;
                try {
                    array.forEach(function(a, i) {
                        barchart.datasets.push({
                            label: cData.label[i],
                            data: [cData.data[i]],
                            backgroundColor: cData.color[i],
                            borderColor: cData.bordercolor[i],
                            borderWidth: cData.borderwidth[i],
                        });
                    });
                } catch (error) {
                    console.log(error);

                }

                //console.log(barchart);
                //bar chart data
                // var data = {
                //     labels: cData.label,
                //     datasets: [{
                //         label: cData.label,
                //         data: cData.data,
                //         backgroundColor: cData.color,
                //         borderColor: cData.bordercolor,
                //         borderWidth: cData.borderwidth
                //     }]
                // };
                //console.log(data);
                //options
                var options = {
                    scales: {
                        yAxes: [{

                        }]
                    },
                    legend: {
                        display: true,
                        position: 'bottom',

                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },

                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 14,
                                fontFamily: 'Circular Std Book',
                                fontColor: '#71748d',
                                beginAtZero: true,
                            }
                        }]
                    }
                };

                //create bar Chart class object
                var chart1 = new Chart(ctx, {
                    type: "bar",
                    data: barchart,
                    options: options
                });

            });
        </script>