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
                    <h1 class="text-center text-success mt-5">Add Product To Store</h1>
                    <div class="row mt-5">
                        <div class="col-12 text-end mb-3">
                            <a href="<?php echo site_url('Store/storeInfo'); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                    <form action="<?= base_url('Store/update_record'); ?>" method="post" enctype="multipart/form-data">
                        <!-- Card for Product Information -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Product Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="product_id">Select Product</label>
                                            <select name="product_id" id="product_id" class="form-control selectpicker" data-lproduct_idive-search="true" data-width="100%">
                                                <?php foreach ($products as $value) { ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['id']." - ".$value['productName'] ; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="part_number" class="form-label">Part Number</label>
                                        <input type="text" class="form-control" id="partNumber" name="partNumber" value="<?php echo  $records['partNumber'] ;?>" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="serial_number" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" id="serialNumber" name="serialNumber" value="<?php echo  $records['serialNumber'] ;?>" required>
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
                                        <input type="number" class="form-control" id="qty" name="qty" value="<?php echo  $records['qty'] ;?>" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="unit">Select Unit</label>
                                            <select name="unit" id="unit" class="form-control selectpicker" data-live-search="true" data-width="100%">
                                                <?php foreach ($measurement as $value) { ?>
                                                    <option value="<?php echo $value['unit_name']; ?>" <?= ($value['unit_name'] == $records['unit']) ? 'selected' : ''; ?> ><?php echo $value['unit_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="unit_price" class="form-label">Unit Price</label>
                                        <input type="number" step="0.01" class="form-control" id="unitPrice" name="unitPrice" value="<?php echo  $records['unitPrice'] ;?>" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="vat_tax" class="form-label">VAT & TAX (%)</label>
                                        <input type="number" step="0.01" class="form-control" id="vat_tax" name="vat_tax" value="<?php echo  $records['vat_tax'] ;?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?php echo date('Y-m-d', strtotime($records['expiry_date'])); ?>" required>
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
                                        <input type="number" class="form-control" id="min_stock" name="min_stock" value="<?php echo  $records['min_stock'] ;?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lot_number" class="form-label">Lot Number</label>
                                        <input type="text" class="form-control" id="lot_number" name="lot_number" value="<?php echo  $records['lot_number'] ;?>" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="shipment_pdf" class="form-label">Upload Shipment PDF</label>
                                    <input type="file" class="form-control" id="shipment_pdf" name="shipment_pdf" accept="application/pdf">
                                </div>
                            </div>
                        </div>
                            <input type="hidden" id="id" name="id" value="<?php echo isset($records['id']) ? $records['id'] : ''; ?>">
                        <button type="submit" class="btn btn-primary mb-3">Update Store</button>
                    </form>                                                 
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <?php $this->load->view('template/footer'); ?>
            </footer>
        </div>
    </div>
        <?php $this->load->view('template/SiteScript'); ?>
</body>
</html>