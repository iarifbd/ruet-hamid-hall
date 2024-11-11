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
                            <div class="col-12 text-end">
                                <a href="<?php echo site_url('Hostel_sit_plan'); ?>" class="btn btn-primary mb-3">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Boarder
                                </a>
                            </div> <!-- <?php echo "<pre>";print_r($stuinfo); ?> -->
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Boarders Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Student#</th>
                                                        <th>Hall Name</th>
                                                        <th>Floor</th>
                                                        <th>Room</th>
                                                        <th>Sit</th>
                                                        <th>Check In</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Student#</th>
                                                        <th>Hall Name</th>
                                                        <th>Floor</th>
                                                        <th>Room</th>
                                                        <th>Sit</th>
                                                        <th>Check In</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($osit_plan as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo ($key+1); ?></td>
                                                        <td><?php echo $value['S_Id']; ?></td>
                                                        <td><?php echo $value['hall_name']; ?></td>
                                                        <td><?php echo $value['floor']; ?></td>
                                                        <td><?php echo $value['room_num']; ?></td>
                                                        <td><?php echo $value['sit_num']; ?></td>
                                                        <td><?php echo $value['adate']; ?></td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Action buttons">
                                                                <a href="<?php echo base_url('Hostel_sit_plan/checkout') ;?>" class="btn btn-primary btn-sm" target="_blank">
                                                                    <i class="fa fa-print" aria-hidden="true"></i></i> Check Out
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