<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('template/header'); ?>
        <style type="text/css">
            @media print {
                .no-print {
                    display: none;
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
                            <div class="col-md-12">
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <head>Automatically Apply Fees for Hall Charges and Delays:</head>
                                <hr>
                                <form action="<?php echo site_url('FineCL/ApplyFees'); ?>" method="post">
                                    <div class="row justify-content-center">
                                        <!-- Date picker column -->
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label for="date" class="form-label fs-5">Select Date</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <div class="mb-4">
                                                <button type="submit" class="btn btn-primary">Apply Fees</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                               <hr>
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
    </body>
</html>
