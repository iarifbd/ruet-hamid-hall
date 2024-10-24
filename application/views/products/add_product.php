<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="col-12 text-end">
            <a href="<?php echo site_url('Products'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to List</a>
        </div>
        <h2 class="text-center">Add Product to Products</h2>
        <form action="<?= base_url('Products/save_product'); ?>" method="post" enctype="multipart/form-data">
            <!-- Form fields as mentioned before -->
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

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
