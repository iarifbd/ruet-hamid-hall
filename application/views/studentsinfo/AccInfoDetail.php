<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('template/header');?>
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
        <?php $this->load->view('template/topnav');?>
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
                                        <h5 class="mb-0">Students Accounts Details Infomarion</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>Student#</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Acc Type</th>
                                                        <th>Acc Head</th>
                                                        <th>Dr</th>
                                                        <th>Cr</th>
                                                        <th>Balance</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Student#</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Acc Type</th>
                                                        <th>Acc Head</th>
                                                        <th>Dr</th>
                                                        <th>Cr</th>
                                                        <th>Balance</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($stuacc as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo $value['S_Id']; ?></td>
                                                        <td><?php echo $value['tdate']; ?></td>
                                                        <td><?php echo $value['description']; ?></td>
                                                        <td><?php echo $value['acctype']; ?></td>
                                                        <td><?php echo $value['achead']; ?></td>
                                                        <td><?php echo $value['dr']; ?></td>
                                                        <td><?php echo $value['cr']; ?></td>
                                                        <td><?php echo $value['balance']; ?></td>
                                                        <td><span class="badge <?php echo ($value['status']=='Paid')?"bg-success" :"bg-danger" ?> "><?php echo $value['status']; ?></span></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                        <div class="mdtbtn"></div>
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