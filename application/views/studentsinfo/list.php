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
                                <a href="<?php echo site_url('StudentInfo'); ?>" class="btn btn-primary mb-3">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
                                </a>
                            </div> <!-- <?php echo "<pre>";print_r($stuinfo); ?> -->
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Students Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>Student#</th>
                                                        <th>Reg_No</th>
                                                        <th>Name</th>
                                                        <th>Room</th>
                                                        <th>Dept</th>
                                                        <th>Batch</th>
                                                        <th>Mobile</th>
                                                        <th>Hall_Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Student#</th>
                                                        <th>Reg_No</th>
                                                        <th>Name</th>
                                                        <th>Room</th>
                                                        <th>Dept</th>
                                                        <th>Batch</th>
                                                        <th>Mobile</th>
                                                        <th>Hall_Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($stuinfo as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo $value['S_Id']; ?></td>
                                                        <td><?php echo $value['Reg_No']; ?></td>
                                                        <td><?php echo $value['Name']; ?></td>
                                                        <td><?php echo $value['Room']; ?></td>
                                                        <td><?php echo $value['Dept']; ?></td>
                                                        <td><?php echo $value['Batch']; ?></td>
                                                        <td><?php echo $value['Mobile']; ?></td>
                                                        <td><?php echo $value['Hall_Name']; ?></td> 
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Action buttons">
                                                                <a href="<?php echo site_url('StudentInfo/getstudent/' . $value['S_Id']); ?>" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-print" aria-hidden="true"></i></i> Print
                                                                </a>
                                                                <a href="<?php echo site_url('StudentInfo/#/' . $value['id']); ?>" class="btn btn-warning btn-sm">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <a href="<?php echo site_url('StudentInfo/#/' . $value['id']); ?>" onclick="return confirm('Are you sure you want to delete this Quotetion?');" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash-alt"></i> Delete
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