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
                                        <h5 class="mb-0">Short Item Lists</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable ">
                                                <thead>
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Product ID</th>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Brand</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Minimum Stock</th>
                                                        <th>In Stock</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Product ID</th>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Brand</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Minimum Stock</th>
                                                        <th>In Stock</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($s_list as $key => $record): ?>
                                                        <tr>
                                                            <td><?php echo ($key+1); ?></td>
                                                            <td><?php echo $record['product_id'];?></td>
                                                            <td><img src="<?php echo base_url('uploads/images/') . $record['productImage']; ?>" width="80px" height="80px"></td>
                                                            <td><?php echo $record['productName'];?></td>
                                                            <td><?php echo $record['brand'];?></td>
                                                            <td><?php echo $record['category'];?></td>
                                                            <td><?php echo $record['description'];?></td>
                                                            <td><?php echo $record['min_stock'];?></td>
                                                            <td><?php echo $record['total_qty'];?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                    <div class="card-footer text-end">
                                        <div class="mdtbtn"></div>
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