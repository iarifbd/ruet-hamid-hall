<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <form role="form" action="<?php echo site_url('orders/create'); ?>" method="post" class="form-horizontal">
            <div class="box-body">

                <?php echo validation_errors(); ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="invoice_date_time" class="col-sm-12 control-label">Invoice Date and Time</label>
                    <input type="datetime-local" class="form-control" id="invoice_date_time" name="invoice_date_time" required />
                </div>

                <div class="form-group">
                    <label for="product_id" class="col-sm-12 control-label">Product</label>
                    <select class="form-control" id="product_id" name="product_id" onchange="updateProductDetails()" required>
                        <option value="">Select Product</option>
                        <?php foreach ($products as $product): ?>
                            <option value="<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="order_quantity" class="col-sm-12 control-label">Order Quantity</label>
                    <input type="number" class="form-control" id="order_quantity" name="order_quantity" required />
                </div>

                <div class="form-group">
                    <label for="discount" class="col-sm-12 control-label">Discount</label>
                    <input type="number" step="0.01" class="form-control" id="discount" name="discount" required />
                </div>

                <div class="form-group">
                    <label for="sub_total" class="col-sm-12 control-label">Sub Total</label>
                    <input type="text" class="form-control" id="sub_total" name="sub_total" disabled />
                </div>

                <div class="form-group">
                    <label for="total_amount" class="col-sm-12 control-label">Total Amount</label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" disabled />
                </div>

                <button type="submit" class="btn btn-primary">Create Order</button>
            </div>
        </form>
    </div>

    <script>
        function updateProductDetails() {
            var productId = $('#product_id').val();
            if (productId) {
                $.ajax({
                    url: '<?php echo site_url('orders/getProductDetails'); ?>/' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#unit_price').val(data.price);
                        calculateAmounts();
                    }
                });
            }
        }

        function calculateAmounts() {
            var unitPrice = parseFloat($('#unit_price').val()) || 0;
            var quantity = parseInt($('#order_quantity').val()) || 0;
            var discount = parseFloat($('#discount').val()) || 0;

            var subTotal = unitPrice * quantity;
            var totalAmount = subTotal - discount;

            $('#sub_total').val(subTotal.toFixed(2));
            $('#total_amount').val(totalAmount.toFixed(2));
        }

        $('#order_quantity, #discount').on('input', calculateAmounts);
    </script>
</body>
</html>
