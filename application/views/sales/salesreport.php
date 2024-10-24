<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('template/header');?>

    </head>
    <body class="sb-nav-fixed">
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
        <?php $this->load->view('template/topnav');?>
        <div id="layoutSidenav">
            <?php $this->load->view('template/sidenav'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Sales Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Sales ID</th>
                                                        <th>Invoice Number</th>
                                                        <th>Customer Name</th>
                                                        <th>Company Name</th>
                                                        <th>Address</th>
                                                        <th>Gross Amount</th>
                                                        <th>Discount</th>
                                                        <th>Net Amount</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Sales ID</th>
                                                        <th>Invoice Number</th>
                                                        <th>Customer Name</th>
                                                        <th>Company Name</th>
                                                        <th>Address</th>
                                                        <th>Gross Amount</th>
                                                        <th>Discount</th>
                                                        <th>Net Amount</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($salesrecords as $key => $record): ?>
                                                        <tr>
                                                            <td><?php echo ($key+1); ?></td>
                                                            <td><?php echo $record['id'];?></td>
                                                            <td><?php echo $record['bill_no'];?></td>
                                                            <td><?php echo $record['customer_name'];?></td>
                                                            <td><?php echo $record['company_name'];?></td>
                                                            <td><?php echo $record['customer_address'];?></td>
                                                            <td><?php echo $record['gross_amount'];?></td>
                                                            <td><?php echo $record['discount'];?></td>
                                                            <td><?php echo $record['net_amount'];?></td>
                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('template/footer');?>
                </footer>
            </div>
        </div>
        <?php $this->load->view('template/SiteScript');?>




    </body>
</html>