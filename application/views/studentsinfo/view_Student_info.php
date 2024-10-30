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
        .student-info {
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Student Information Report</h1>
        <p class="lead">Comprehensive details of enrolled students</p>
    </header>

    <div class="container mt-4">
        <div class="row">
            <?php foreach ($stuinfo as $value): ?>
            <div class="col-md-6">
                <div class="student-info">
                    <p><strong>Student Id:</strong> <?php echo $value['S_Id']; ?></p>
                    <p><strong>Name:</strong> <?php echo $value['Name']; ?></p>
                    <p><strong>Reg No:</strong> <?php echo $value['Reg_No']; ?></p>
                    <p><strong>Room:</strong> <?php echo $value['Room']; ?></p>
                    <p><strong>Dept:</strong> <?php echo $value['Dept']; ?></p>
                    <p><strong>Batch:</strong> <?php echo $value['Batch']; ?></p>
                    <p><strong>Father's Name:</strong> <?php echo $value['F_Name']; ?></p>
                    <p><strong>Mother's Name:</strong> <?php echo $value['M_Name']; ?></p>
                    <p><strong>Address:</strong> <?php echo $value['Address']; ?></p>
                    <p><strong>Mobile:</strong> <?php echo $value['Mobile']; ?></p>
                    <p><strong>Guardian Mobile:</strong> <?php echo $value['Gur_Mobile']; ?></p>
                    <p><strong>Blood Group:</strong> <?php echo $value['Blood']; ?></p>
                    <p><strong>Religion:</strong> <?php echo $value['Religion']; ?></p>
                    <p><strong>Hall Name:</strong> <?php echo $value['Hall_Name']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4 no-print">
            <button class="btn btn-primary" onclick="window.print()">Print Report</button>
            <a href="<?php echo base_url(); ?>"><button class="btn btn-primary">Back to Home</button></a>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> www.iarifbd.com</p>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
