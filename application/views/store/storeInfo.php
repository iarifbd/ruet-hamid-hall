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
                                                        <th>Store ID</th>
                                                        <th>Product Name</th>
                                                        <th>Unit Price</th>
                                                        <th>Lot Number</th>
                                                        <th>created_at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Store ID</th>
                                                        <th>Product Name</th>
                                                        <th>Unit Price</th>
                                                        <th>Lot Number</th>
                                                        <th>created_at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($records as $key => $record): ?>
                                                        <tr>
                                                            <td><?php echo $record['sid'] ;?></td>
                                                            <td><?php echo $record['productName'] ;?></td>
                                                            <td><?php echo $record['unitPrice'] ;?></td>
                                                            <td><?php echo $record['lot_number'] ;?></td>
                                                            <td><?php echo date('d-m-Y', strtotime($record['created_at'])); ?>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Action buttons">
                                                                    <a href="<?php echo site_url('Store/edit/' . $record['sid']); ?>" class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                </div>
                                                            </td>
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