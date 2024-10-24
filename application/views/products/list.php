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
                                <a href="<?php echo site_url('Products/settings'); ?>" class="btn btn-primary mb-3">
                                    <i class="fas fa-gear"></i> Settings
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Product Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Brand</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Brand</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($products as $product): ?>
                                                        <tr>
                                                            <td><?php echo $product['id']; ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url().'uploads/images/'.$product['productImage']; ?>" width="50px" height="50px">
                                                            </td>
                                                            <td><?php echo $product['productName']; ?></td>
                                                            <td><?php echo $product['brand']; ?></td>
                                                            <td><?php echo $product['category']; ?></td>
                                                            <td><?php echo $product['description']; ?></td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Action buttons">
                                                                    <a href="<?php echo site_url('Products/view/' . $product['id']); ?>" class="btn btn-primary btn-sm">
                                                                        <i class="fas fa-eye"></i> View
                                                                    </a>
                                                                    <a href="<?php echo site_url('Products/edit/' . $product['id']); ?>" class="btn btn-warning btn-sm">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </a>
                                                                    <a href="<?php echo site_url('Products/delete/' . $product['id']); ?>" onclick="return confirm('Are you sure you want to delete this product?');" class="btn btn-danger btn-sm">
                                                                        <i class="fas fa-trash-alt"></i> Delete
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