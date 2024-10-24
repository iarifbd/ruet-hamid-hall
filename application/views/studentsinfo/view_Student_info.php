<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            .no-print {
                display: none;
            }
            table {
                width: 100%;
            }
            header, footer {
                display: none;
            }
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        th {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Information Report</h1>
        <p class="lead">Comprehensive details of enrolled students</p>
    </header>

    <div class="container mt-4">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>SL #</th>
                    <th>Student Id #</th>
                    <th>Reg_No</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Dept</th>
                    <th>Batch</th>
                    <th>F_Name</th>
                    <th>M_Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Gur_Mobile</th>
                    <th>Blood</th>
                    <th>Religion</th>
                    <th>Hall_Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stuinfo as $key => $value): ?>
                <tr>
                    <td><?php echo ($key + 1); ?></td>
                    <td><?php echo $value['S_Id']; ?></td>
                    <td><?php echo $value['Reg_No']; ?></td>
                    <td><?php echo $value['Name']; ?></td>
                    <td><?php echo $value['Room']; ?></td>
                    <td><?php echo $value['Dept']; ?></td>
                    <td><?php echo $value['Batch']; ?></td>
                    <td><?php echo $value['F_Name']; ?></td>
                    <td><?php echo $value['M_Name']; ?></td>
                    <td><?php echo $value['Address']; ?></td>
                    <td><?php echo $value['Mobile']; ?></td>
                    <td><?php echo $value['Gur_Mobile']; ?></td>
                    <td><?php echo $value['Blood']; ?></td>
                    <td><?php echo $value['Religion']; ?></td>
                    <td><?php echo $value['Hall_Name']; ?></td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center mt-4 no-print">
            <button class="btn btn-primary" onclick="window.print()">Print Report</button>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your Institution Name. All rights reserved.</p>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
