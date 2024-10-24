<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('template/header');?>

    </head>
    <body class="sb-nav-fixed">
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
        <?php $this->load->view('template/topnav');?>
        <div id="layoutSidenav">
            <?php $this->load->view('template/sidenav'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mt-5">
                            <div class="col-12 text-end">
                                <a href="<?php echo site_url('Store/add'); ?>" class="btn btn-primary mb-3">
                                    <i class="fas fa-gear"></i> Add to Store
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Store Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Lot Number</th>
                                                        <th>Total Quantity</th>
                                                        <th>Product Status</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Lot Number</th>
                                                        <th>Total Quantity</th>
                                                        <th>Product Status</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($records as $key => $record): ?>
                                                        <tr>
                                                            <td><?php echo ($key+1); ?></td>
                                                            <td><?php echo $record['product_id'];?></td>
                                                            <td><?php echo $record['productName'];?></td>
                                                            <td><?php echo $record['lot_number'] ;?></td>
                                                            <td><?php echo $record['total_qty'] ;?></td>
                                                            <td><?php echo $record['status'] ;?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('template/footer');?>
                </footer>
            </div>
        </div>
        <?php $this->load->view('template/SiteScript');?>
    </body>
</html>