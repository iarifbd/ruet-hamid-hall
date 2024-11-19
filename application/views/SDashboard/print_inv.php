<?php
function getOrdinalDate($date) {
    $day = (int)date('d', strtotime($date)); // Extract day from date
    $suffix = 'th'; // Default suffix

    if (($day % 10) == 1 && $day != 11) {
        $suffix = 'st';
    } elseif (($day % 10) == 2 && $day != 12) {
        $suffix = 'nd';
    } elseif (($day % 10) == 3 && $day != 13) {
        $suffix = 'rd';
    }

    // Return the formatted date
    return date('j', strtotime($date)) . $suffix . ' ' . date('F Y', strtotime($date));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Slip</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 30px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1, h3 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
            color: #0044cc;
        }

        h1 {
            font-size: 26px;
            text-transform: uppercase;
        }

        h3 {
            font-size: 22px;
            margin-bottom: 20px;
        }

        p {
            margin: 8px 0;
            font-size: 14px;
        }

        .pp{
            text-align: center;
        }

        /* Container for the whole document */
        .container {
            background-color: #fff;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Section styles */
        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            background-color: #f1f1f1;
            font-weight: bold;
            color: #333;
        }

        td {
            background-color: #fafafa;
        }

        /* Total Due Section */
        .total-due {
            font-size: 18px;
            font-weight: bold;
            text-align: left;
            padding-top: 15px;
            color: #ff6600;
        }

        .footer {
            text-align: left;
            font-size: 12px;
            color: #0044cc;
            margin-bottom: 50px;
        }

        .footer p {
            margin: 5px 0;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Invoice Header -->
        <div class="section">
            <h1>Bank Deposit Slip</h1>
            <p class="pp">(for Student's Ledger)</p>
            <p><strong>Deposit Date:</strong> <?php echo getOrdinalDate('today'); ?></p>
        </div>

        <!-- Student Information Section -->
        <div class="section student-info">
            <h3 class="section-title">Student Information</h3>
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Blood Group</th>
                    <th>Religion</th>
                </tr>
                <tr>
                    <td><?php echo $Info[0]['S_Id']; ?></td>
                    <td><?php echo $Info[0]['Name']; ?></td>
                    <td><?php echo $Info[0]['Dept']; ?></td>
                    <td><?php echo $Info[0]['Batch']; ?></td>
                    <td><?php echo $Info[0]['Address']; ?></td>
                    <td><?php echo $Info[0]['Mobile']; ?></td>
                    <td><?php echo $Info[0]['Blood']; ?></td>
                    <td><?php echo $Info[0]['Religion']; ?></td>
                </tr>
            </table>
        </div>

        <!-- Invoice Summary Section -->
        <div class="section invoice-summary">
            <h3 class="section-title">Payment Description</h3>
            <table>
                <thead>
                    <tr>
                        <th>Deposit Against</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalDue = 0;
                    foreach ($cart as $row) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td>BDT <?php echo number_format($row['price'], 2); ?></td>
                        <?php $totalDue += $row['price']; ?>
                    </tr>
                    <?php }; ?>
                    <tr>
                        <td><strong>Total Payble Amount:</strong></td>
                        <td><strong>BDT <?php echo number_format($totalDue, 2); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Total Due Section -->
        <div class="total-due">
            Total Deposited Amount: BDT <?php echo $words=number_format($totalDue, 2); ?>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>(In words: <?php  echo  $this->numbertowords->convert_number_to_words($words); ?> Only.)</strong></p>
        </div>

    </div>

</body>
</html>
