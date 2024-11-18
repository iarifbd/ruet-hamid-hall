<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('SDashboard/header');?>
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
        <?php $this->load->view('SDashboard/topnav');?>
        <div id="layoutSidenav">
            <?php $this->load->view('SDashboard/sidenav'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mt-5">
                            <div class="col-12 text-end">
                                  <div class="mdtbtn"></div>
                            </div> 
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Students Accounts Infomarion</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Hall Charge</th>
                                                        <th>Delay Fine</th>
                                                        <th>Paid</th>
                                                        <th>Balance</th>
                                                        <th class="no-print">Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Student#</th>
                                                        <th>Total Payble</th>
                                                        <th>Paid</th>
                                                        <th>Balance</th>
                                                        <th class="no-print">Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($stuacc as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo ($key+1); ?></td>
                                                        <td><?php echo $value['HallCharge']; ?></td>
                                                        <td><?php echo $value['DelayFine']; ?></td>
                                                        <td><?php echo $value['Paid']; ?></td>
                                                    <td>
                            <?php $Balance=(($value['HallCharge']+$value['DelayFine'])-$value['Paid']) ;?>
                                                        <span class="badge <?php 
                                                            if ($Balance == 0) {
                                                                echo "bg-success";
                                                            } elseif ($Balance > 0) {
                                                                echo "bg-danger";
                                                            } elseif ($Balance < 0) {
                                                                echo "bg-info";
                                                            } else {
                                                                echo "bg-warning";
                                                            }
                                                        ?>"><?php echo $Balance; ?></span>
                                                    </td>
                                                        <td class="no-print">
                                                            <div class="btn-group" role="group" aria-label="Action buttons">
                                                                <a href="<?php echo site_url('StudentCL/StuLedDetails/' . $value['S_Id']); ?>" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-print" aria-hidden="true"></i></i> Details
                                                                </a>
                                                            </div>                                                            
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('SDashboard/footer');?>
                </footer>
            </div>
        </div>
        <?php $this->load->view('SDashboard/SiteScript');?>
    </body>
</html>