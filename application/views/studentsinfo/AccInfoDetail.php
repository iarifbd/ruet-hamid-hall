<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('template/header'); ?>
        <style type="text/css">
            @media print {
                .no-print {
                    display: none;
                }

                .bill-row {
                background-color: transparent !important;
                color: black !important; 
                }
            }
        </style>
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
                            <div class="col-12 text-end">
                                <a href="<?php echo site_url('StudentInfo/StuAcc'); ?>" class="btn btn-primary mb-3">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Topsheet
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Students Accounts Details Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Bill Date</th>
                                                        <th>Last Date</th>
                                                        <th>Description</th>
                                                        <th>Hall Charge</th>
                                                        <th>Delay Fine</th>
                                                        <th>Paid</th>
                                                        <th>Balance</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5">Totals:</th>
                                                        <th id="total-dr"></th>
                                                        <th id="total-cr"></th>
                                                        <th id="total-balance"></th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="table-body">
                                                    <?php
                                                    $totalDr = 0;
                                                    $totalCr = 0;
                                                    $totalBalance = 0;

                                                    foreach ($stuacc as $key => $value): 
                                                        $totalDr += $value['HallCharge'];
                                                        $totalDr += $value['DelayFine'];
                                                        $totalCr += $value['Paid'];
                                                        $totalBalance = $totalBalance + (($value['HallCharge']+$value['DelayFine'] )- $value['Paid']);
                                                    ?>
                                                    <tr class="bill-row" data-bill-date="<?php echo $value['gdate']; ?>">
                                                        <td><?php echo ($key + 1); ?></td>
                                                        <td><?php echo $value['gdate']; ?></td>
                                                        <td><?php echo $value['ldate']; ?></td>
                                                        <td><?php echo $value['description']; ?></td>
                                                        <td><?php echo number_format($value['HallCharge'], 2); ?></td>
                                                        <td><?php echo number_format($value['DelayFine'], 2); ?></td>
                                                        <td><?php echo number_format($value['Paid'], 2); ?></td>
                                                        <td><?php echo number_format($totalBalance, 2); ?></td>
                                                        <td><span class="badge <?php echo ($value['status'] == 'Paid') ? 'bg-success' : 'bg-danger'; ?>"><?php echo $value['status']; ?></span></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <div class="mdtbtn"></div>
                                    <script type="text/javascript">
                                        document.getElementById('total-dr').innerText = '<?php echo number_format($totalDr, 2); ?>';
                                        document.getElementById('total-cr').innerText = '<?php echo number_format($totalCr, 2); ?>';
                                        document.getElementById('total-balance').innerText = '<?php echo number_format($totalBalance, 2); ?>';
                                    </script>
                                </div>
                                <p>HC: Hall CHarge, DF: Delay Fine</p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('template/footer'); ?>
                </footer>
            </div>
        </div>
        <?php $this->load->view('template/SiteScript'); ?>
        <script>
            // Function to generate a light random color
            function getLightRandomColor() {
                // Light colors are achieved by using higher values for RGB channels
                const r = Math.floor(Math.random() * 256) + 100; // 100 to 255
                const g = Math.floor(Math.random() * 256) + 100; // 100 to 255
                const b = Math.floor(Math.random() * 256) + 100; // 100 to 255
                return `rgb(${r},${g},${b})`;
            }

            // Group rows by Bill Date and apply random light color
            window.onload = function() {
                const rows = document.querySelectorAll('.bill-row');
                const dateColors = {};

                rows.forEach(row => {
                    const billDate = row.getAttribute('data-bill-date');
                    
                    // If this Bill Date hasn't been assigned a color yet, assign it
                    if (!dateColors[billDate]) {
                        dateColors[billDate] = getLightRandomColor();
                    }
                    
                    // Apply the color to the row
                    row.style.backgroundColor = dateColors[billDate];
                });
            };
        </script>

    </body>
</html>
