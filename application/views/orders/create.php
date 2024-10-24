<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Create New Order</h2>
        <form action="<?= base_url('Oders/store') ?>" method="POST">
            <div class="form-group">
                <label for="invoice_date_time">Invoice Date & Time:</label>
                <input type="datetime-local" name="invoice_date_time" id="invoice_date_time" class="form-control" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
            </div>
            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" value="Walking Customer" required>
            </div>
            <table class="table table-bordered" id="orderTable">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Sub-Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="product_id[]" class="form-control product_id" required>
                                <option value="">Select Product</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>"><?= $product['product_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="unit_price[]" class="form-control unit_price" readonly>
                        </td>
                        <td>
                            <input type="number" name="order_quantity[]" class="form-control order_quantity" required>
                        </td>
                        <td>
                            <input type="text" name="sub_total[]" class="form-control sub_total" readonly>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total:</td>
                        <td>
                            <input type="text" name="grand_total" id="grand_total" class="form-control" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Discount:</td>
                        <td>
                            <input type="number" name="discount" id="discount" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Net Total:</td>
                        <td>
                            <input type="text" name="net_total" id="net_total" class="form-control" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-primary" id="addRow">Add Product</button></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-success text-right"><i class="bi bi-save2"></i> Save Order</button></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <div class="mt-4">
        <a href="<?php echo site_url('Oders'); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event delegation for dynamic elements
            $('#orderTable').on('change', '.product_id', function() {
                var price = $(this).find(':selected').data('price');
                $(this).closest('tr').find('.unit_price').val(price);
                calculateSubTotal($(this).closest('tr'));
            });

            // Event delegation for quantity changes
            $('#orderTable').on('keyup change', '.order_quantity', function() {
                calculateSubTotal($(this).closest('tr'));
            });

            // Function to calculate sub-total
            function calculateSubTotal(row) {
                var unitPrice = parseFloat(row.find('.unit_price').val());
                var quantity = parseInt(row.find('.order_quantity').val());
                var subTotal = unitPrice * quantity;
                row.find('.sub_total').val(subTotal.toFixed(2));
                calculateGrandTotal();
            }

            // Function to calculate grand total
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.sub_total').each(function() {
                    grandTotal += parseFloat($(this).val());
                });
                $('#grand_total').val(grandTotal.toFixed(2));
                calculateNetTotal();
            }

            // Calculate net total after discount
            $('#discount').keyup(function() {
                calculateNetTotal();
            });

            function calculateNetTotal() {
                var grandTotal = parseFloat($('#grand_total').val());
                var discount = parseFloat($('#discount').val()) || 0;
                var netTotal = grandTotal - discount;
                $('#net_total').val(netTotal.toFixed(2));
            }

            // Add new row for another product
            $('#addRow').click(function() {
                var newRow = $('#orderTable tbody tr:first').clone();
                newRow.find('input').val('');
                newRow.find('select').val('');
                $('#orderTable tbody').append(newRow);
            });

            // Remove a row
            $('#orderTable').on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
                calculateGrandTotal();
            });
        });
    </script>
</body>
</html>
