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
                <div class="container-fluid px-4">
                    <div class="row mt-5">
                        <div class="col-12 text-end mb-3">
                            <a href="<?php echo site_url('Products'); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>

                    <!-- Card for Product Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Product Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Products/save_product'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="product_id" class="form-label">Product ID</label>
                                        <input type="text" class="form-control" id="product_id" name="product_id" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="image" class="form-label">Product Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control" id="brand" name="brand" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="part_number" class="form-label">Part Number</label>
                                        <input type="text" class="form-control" id="part_number" name="part_number" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="serial_number" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <!-- Card for Stock and Pricing Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Stock and Pricing Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="qty" class="form-label">Quantity (QTY)</label>
                                    <input type="number" class="form-control" id="qty" name="qty" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" id="unit" name="unit" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="unit_price" class="form-label">Unit Price</label>
                                    <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="vat_tax" class="form-label">VAT & TAX (%)</label>
                                    <input type="number" step="0.01" class="form-control" id="vat_tax" name="vat_tax" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card for Additional Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title">Additional Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="min_stock" class="form-label">Minimum Stock</label>
                                    <input type="number" class="form-control" id="min_stock" name="min_stock" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lot_number" class="form-label">Lot Number</label>
                                    <input type="text" class="form-control" id="lot_number" name="lot_number" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="shipment_pdf" class="form-label">Upload Shipment PDF</label>
                                <input type="file" class="form-control" id="shipment_pdf" name="shipment_pdf" accept="application/pdf">
                            </div>
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </form>                            
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
