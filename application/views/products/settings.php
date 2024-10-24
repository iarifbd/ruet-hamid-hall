<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('template/header'); ?>
</head>
<body class="sb-nav-fixed">
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
    <?php $this->load->view('template/topnav'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('template/sidenav'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-5 mb-3">
                    <h1 class="text-center text-success ">Product Settings:</h1>
                </div>
                <!-- product info -->
                <div class="container-fluid px-4 mb-3">    
                    <div class="row">
                        <div class="col-12 text-end">
                            <a href="<?php echo site_url('Products'); ?>" class="btn btn-primary mb-3">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        <h5 class="mb-0">Product Information</h5>
                                    </div>
                                    <form action="<?= base_url('Products/productData'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="productName" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="brand" class="form-label">Brand</label>
                                                    <select id="brand" name="brand" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                        <?php foreach ($brands as $key => $value) { ?>
                                                            <option value="<?php echo $value['brandName']; ?>"><?php echo $value['brandName']; ?></option>
                                                        <?php };?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select id="category" name="category" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                        <?php foreach ($categories as $key => $value) { ?>
                                                            <option value="<?php echo $value['category']; ?>"><?php echo $value['category']; ?></option>
                                                        <?php };?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="productImage" class="form-label">Product Image</label>
                                                    <input type="file" id="productImage" name="productImage">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Product Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-start">
                                            <button type="submit" class="btn btn-dark">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
                <br><br>
                <!-- Brand Info -->
                <div class="container-fluid px-4 mb-3">    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header bg-secondary text-white">
                                        <h5 class="mb-0">Brand Information</h5>
                                    </div>
                                    <form action="<?= base_url('Products/brandData'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label for="productID" class="form-label">Brand Name</label>
                                                    <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Enter Product ID" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-start">
                                            <button type="submit" class="btn btn-secondary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>        
                        </div>
                        <div class="col-md-6">
                            <div class="container">
                                <div class="card">
                                    <div class="card-header bg-secondary text-white">
                                        <h5 class="mb-0">Categories Information</h5>
                                    </div>
                                    <form action="<?= base_url('Products/categoryData'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label for="category" class="form-label">Category</label>
                                                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter Product ID" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-left">
                                            <button type="submit" class="btn btn-secondary">Submit</button>
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
