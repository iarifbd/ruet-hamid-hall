<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Loading the header template -->
    <?php $this->load->view('template/header'); ?>
</head>
<body class="sb-nav-fixed">

    <!-- Button to scroll to the top -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <!-- Loading the top navigation template -->
    <?php $this->load->view('template/topnav'); ?>

    <div id="layoutSidenav">
        <!-- Loading the side navigation template -->
        <?php $this->load->view('template/sidenav'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <!-- Page title -->
                    <h1 class="text-center text-success mt-5 mb-3">Create Quotation:</h1>

                </div>
            </main>
            
            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">
                <?php $this->load->view('template/footer'); ?>
            </footer>
        </div>
    </div>

    <!-- Loading additional scripts -->
    <?php $this->load->view('template/SiteScript'); ?>

    <!-- JavaScript code -->
    <script>
        $(document).ready(function() {
            // Initialize the selectpicker for all product and measurement dropdowns
            function initSelectPicker() {
                $('select.product_id, select.measurement_id').each(function() {
                    if (!$(this).data('selectpicker-initialized')) {
                        $(this).selectpicker();
                        $(this).data('selectpicker-initialized', true);
                    }
                });
            }

            // Function to calculate sub-total for a row
            function calculateSubTotal(row) {
                var unitPrice = parseFloat(row.find('.unit_price').val()) || 0;
                var quantity = parseInt(row.find('.order_quantity').val()) || 0;
                var subTotal = unitPrice * quantity;
                row.find('.sub_total').val(subTotal.toFixed(2));
                calculateGrandTotal();
            }

            // Function to calculate grand total
            function calculateGrandTotal() {
                var grandTotal = 0;
                $('.sub_total').each(function() {
                    grandTotal += parseFloat($(this).val()) || 0;
                });
                $('#grand_total').val(grandTotal.toFixed(2));
                calculateNetTotal();
            }

            // Function to calculate net total after discount
            function calculateNetTotal() {
                var grandTotal = parseFloat($('#grand_total').val()) || 0;
                var discount = parseFloat($('#discount').val()) || 0;
                var netTotal = grandTotal - discount;
                $('#net_total').val(netTotal.toFixed(2));
            }

            // Function to show error message
            function showError(message) {
                alert(message); // You can replace this with a Bootstrap alert if needed
            }

            // Event listener for product dropdown change
            $('#orderTable').on('change', '.product_id', function() {
                var price = $(this).find(':selected').data('price');
                var stock = $(this).find(':selected').data('stock'); // Assuming you add data-stock attribute in options
                $(this).closest('tr').find('.unit_price').val(price);
                $(this).closest('tr').find('.order_quantity').attr('max', stock); // Set max attribute for quantity input
                calculateSubTotal($(this).closest('tr'));
            });

            // Event listener for quantity changes
            $('#orderTable').on('keyup change', '.order_quantity', function() {
                var quantity = parseInt($(this).val()) || 0;
                var maxQuantity = parseInt($(this).attr('max')) || 0;

                if (quantity > maxQuantity) {
                    showError("Quantity cannot exceed available stock.");
                    $(this).val(maxQuantity); // Reset the quantity to maximum allowable value
                    quantity = maxQuantity;
                }

                calculateSubTotal($(this).closest('tr'));
            });

            // Event listener for discount changes
            $('#orderTable').on('keyup change', '.discount', function() {
                calculateNetTotal();
            });

            // Add a new row for another product
            $('#addRow').click(function() {
                var newRow = `
                    <tr>
                        <td>
                            <select name="product_id[]" class="form-control product_id selectpicker" data-live-search="true" data-width="100%" required>
                                <option value="">Select Product</option>
                                <?php foreach ($records as $record): ?>
                                    <option value="<?= $record['pid'] ?>" data-price="<?= $record['unitPrice'] ?>" data-stock="<?= $record['total_stock'] ?>">
                                        <?= $record['productName'] . ' - ' . $record['unitPrice'] . 'BDT - (' . $record['total_stock'] . ') - (' . $record['lot_number'] . ')[' . date('d-m-Y', strtotime($record['created_at'])) . ']' ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="measurement_id[]" class="form-control measurement_id selectpicker" data-live-search="true" data-width="100%" required>
                                <option value="">Select Unit</option>
                                <?php foreach ($measurement as $value) { ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['unit_name']; ?></option>
                                <?php } ?>
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
                            <button type="button" class="btn btn-danger removeRow"><i class="fa fa-trash" aria-hidden="true"></i> Remove</button>
                        </td>
                    </tr>
                `;
                $('#orderTable tbody').append(newRow);
                initSelectPicker(); // Initialize selectpicker for the new row
            });

            // Remove a row
            $('#orderTable').on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
                calculateGrandTotal();
            });

            // Initialize selectpicker for existing elements
            initSelectPicker();
        });

    </script>

</body>
</html>
