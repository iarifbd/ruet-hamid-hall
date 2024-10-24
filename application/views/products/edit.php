<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('template/header'); ?>
</head>
<body class="sb-nav-fixed">
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <?php $this->load->view('template/topnav'); ?>
    
    <div id="layoutSidenav">
        <?php $this->load->view('template/sidenav'); ?>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row mt-5">
                        <div class="col-12 text-end">
                            <a href="<?php echo site_url('Products'); ?>" class="btn btn-primary mb-3">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex align-items-center">
                                    <i class="fas fa-box me-2"></i>
                                    <h5 class="mb-0">Edit Product Information</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('Products/updateProduct'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="productName" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" id="productName" name="productName" value="<?= $product['productName']; ?>" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="brand" class="form-label">Brand</label>
                                                <select id="brand" name="brand" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <?php foreach ($brands as $value) { ?>
                                                        <option value="<?= $value['brandName']; ?>" <?= ($value['brandName'] == $product['brand']) ? 'selected' : ''; ?>><?= $value['brandName']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="category" class="form-label">Category</label>
                                                <select id="category" name="category" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <?php foreach ($categories as $value) { ?>
                                                        <option value="<?= $value['category']; ?>" <?= ($value['category'] == $product['category']) ? 'selected' : ''; ?>><?= $value['category']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="productImage" class="form-label">Product Image</label>
                                                <input type="file" id="productImage" name="productImage">
                                                    <img src="<?= base_url('uploads/images/'.$product['productImage']); ?>" alt="Product Image" class="img-thumbnail mt-2" width="100px" height="100px">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3"><?= $product['description']; ?></textarea>
                                            </div> 
                                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">                                     
                                        </div>
                                        <div class="card-footer text-start">
                                            <button type="submit" class="btn btn-dark">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <?php $this->load->view('template/footer'); ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view('template/SiteScript');?>
</body>
</html>
