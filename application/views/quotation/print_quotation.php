<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quotation in A4 Paper</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 1.5in ;
            margin-bottom: 0.25in;
            margin-left: 0.25in;
            margin-right: 0.25in;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .header {
            text-align: center;
            
        }
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .header p {
            margin: 0;
        }
        .content {
            margin-top: 20px;
        }
        .content h2 {
            text-decoration: underline;
        }
        .terms {
            margin-top: 30px;
            font-size: 10px;
        }
        .terms h6 {
            text-decoration: underline;
            font-size: 10px;
        }
        .terms p {
            margin: 0;

        }
        .signature {
            margin-top: 70px;
            text-align: left;
            font-weight: bold;
        }


    </style>
  </head>
  <body>
    <div class="page">
      <!-- Your page content here -->
        <!-- Header -->
        <div class="header text-primary">
            <h1><b><u>QUOTATION</u></b></h1>
        </div>

        <!-- Content Section -->

            <div class="row">
                <div class="col-6">
                    <p>
                        <strong>To,</strong>  <br/>
                        <strong>Contact Person: </strong><?php echo $invoice[0]['Contact_Person']; ?>, <br/>
                        <strong>Company Name: </strong><?php echo $invoice[0]['Company_Name']; ?>, <br/>
                        <strong>Address: </strong><?php echo $invoice[0]['address']; ?>, <br/>
                        <strong>Phone/ Mobile: </strong><?php echo $invoice[0]['Contact']; ?>, <br/>
                    </p>
                </div>
                <div class="col-6 text-end">
                    <p>
                        <strong>Quotation No: </strong> <?php echo $invoice[0]['quotation_number']; ?> <br/>
                        <strong>Quotation Date: </strong> <?php echo $invoice[0]['qdate']; ?> <br/>
                        <strong>Valid Till: </strong> <?php echo $invoice[0]['vdate']; ?>
                    </p>
                </div>
            </div>

            <!-- Products Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($invoice as $key => $value): ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $value['productName']." - ".$value['brand']; ?></td>
                        <td><?php echo $value['unit_name']; ?></td>
                        <td><?php echo $value['unit_price']; ?></td>
                        <td><?php echo $value['order_quantity']; ?></td>
                        <td><?php echo "=".$value['sub_total'].'/- BDT'; ?></td>
                    </tr>
                    <?php $i=$i+$value['sub_total'];endforeach; ?>
                </tbody>
            </table>

            <!-- Total Section -->
            <div class="row">
                <div class="col-6">
                    <p><strong>In Words:</strong> <?php echo $this->numbertowords->convert_number_to_words($i); ?> Only.</p>
                </div>
                <div class="col-6">
                    <table class="table">
                        <tr>
                            <th>Grand Total:</th>
                            <td class="text-end"><?php echo "=".$invoice[0]['grand_total']; ?>/- BDT</td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td class="text-end"><?php echo "=".$invoice[0]['discount']; ?>/- BDT</td>
                        </tr>
                        <tr>
                            <th>Total Due:</th>
                            <td class="text-end"><?php echo "=".$invoice[0]['net_total']; ?>/- BDT</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="terms">
                <?php echo $invoice[0]['tc']; ?>
            </div>

            <!-- Signature Section -->
            <div class="signature ">
                ___________________<br>
                Signature
            </div>
                

      <!-- End of your page content -->
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>