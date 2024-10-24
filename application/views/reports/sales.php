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
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1 class="report-title">Generate Sales Report</h1>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url('sales/generate_report'); ?>" method="post">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </form>
                        </div>
                        <hr class="border border-success border-2 opacity-50">
                        <div class="card-body">
                            <!-- Sales Report Table -->
                            <?php if (isset($sales) && !empty($sales)): ?>
                                <div class="mt-4">
                                    <h2 class="report-title text-center">Sales Report from <?php echo htmlspecialchars($start_date); ?> to <?php echo htmlspecialchars($end_date); ?></h2>
                                    <table class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>Invoice Date</th>
                                                <th>Customer Name</th>
                                                <th>Grand Total</th>
                                                <th>Discount</th>
                                                <th>Net Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($sales as $sale): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($sale['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($sale['invoice_date_time']); ?></td>
                                                    <td><?php echo htmlspecialchars($sale['customer_name']); ?></td>
                                                    <td><?php echo number_format($sale['grand_total'], 2); ?></td>
                                                    <td><?php echo number_format($sale['discount'], 2); ?></td>
                                                    <td><?php echo number_format($sale['net_total'], 2); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php elseif (isset($start_date) && isset($end_date)): ?>
                                <div class="alert alert-warning" role="alert">
                                    No sales data found for the selected date range.
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary" onclick="printReport()">Print</button>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <?php $this->load->view('template/footer'); ?>
            </footer>
        </div>
    </div>

    <!-- SB Admin Main Page JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Print Function -->
    <script>
        function printReport() {
            window.print();
        }
    </script>

    <!-- Scroll to top script -->
    <script type="text/javascript">
        let mybutton = document.getElementById("myBtn");

        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

</body>
</html>
