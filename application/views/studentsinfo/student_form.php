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
                <div class="container-fluid px-4">
                    <div class="row mt-5">
                        <div class="col-12 text-end">
                            <a href="<?php echo site_url('StudentInfo/Studentform'); ?>" class="btn btn-primary mb-3">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex align-items-center">
                                    <i class="fas fa-box me-2"></i>
                                    <h5 class="mb-0"><?php echo isset($student) && !empty($student) ? 'Edit Student Information' : 'Add Student Information'; ?></h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('student/save'); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo isset($student[0]['id']) ? $student[0]['id'] : ''; ?>">
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="S_Id" class="form-label">Student ID:</label>
                                                <input type="text" id="S_Id" name="S_Id" class="form-control" value="<?php echo isset($student[0]['S_Id']) ? $student[0]['S_Id'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Reg_No" class="form-label">Registration No:</label>
                                                <input type="text" id="Reg_No" name="Reg_No" class="form-control" value="<?php echo isset($student[0]['Reg_No']) ? $student[0]['Reg_No'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Name" class="form-label">Name:</label>
                                                <input type="text" id="Name" name="Name" class="form-control" value="<?php echo isset($student[0]['Name']) ? $student[0]['Name'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Room" class="form-label">Room:</label>
                                                <input type="number" id="Room" name="Room" class="form-control" value="<?php echo isset($student[0]['Room']) ? $student[0]['Room'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Dept" class="form-label">Department:</label>
                                                <input type="text" id="Dept" name="Dept" class="form-control" value="<?php echo isset($student[0]['Dept']) ? $student[0]['Dept'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Batch" class="form-label">Batch:</label>
                                                <input type="number" id="Batch" name="Batch" class="form-control" value="<?php echo isset($student[0]['Batch']) ? $student[0]['Batch'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="F_Name" class="form-label">Father's Name:</label>
                                                <input type="text" id="F_Name" name="F_Name" class="form-control" value="<?php echo isset($student[0]['F_Name']) ? $student[0]['F_Name'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="M_Name" class="form-label">Mother's Name:</label>
                                                <input type="text" id="M_Name" name="M_Name" class="form-control" value="<?php echo isset($student[0]['M_Name']) ? $student[0]['M_Name'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Address" class="form-label">Address:</label>
                                                <input type="text" id="Address" name="Address" class="form-control" value="<?php echo isset($student[0]['Address']) ? $student[0]['Address'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Mobile" class="form-label">Mobile:</label>
                                                <input type="number" id="Mobile" name="Mobile" class="form-control" value="<?php echo isset($student[0]['Mobile']) ? $student[0]['Mobile'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Gur_Mobile" class="form-label">Guardian Mobile:</label>
                                                <input type="text" id="Gur_Mobile" name="Gur_Mobile" class="form-control" value="<?php echo isset($student[0]['Gur_Mobile']) ? $student[0]['Gur_Mobile'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Blood" class="form-label">Blood Group:</label>
                                                <input type="text" id="Blood" name="Blood" class="form-control" value="<?php echo isset($student[0]['Blood']) ? $student[0]['Blood'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Religion" class="form-label">Religion:</label>
                                                <input type="text" id="Religion" name="Religion" class="form-control" value="<?php echo isset($student[0]['Religion']) ? $student[0]['Religion'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="Hall_Name" class="form-label">Hall Name:</label>
                                                <input type="text" id="Hall_Name" name="Hall_Name" class="form-control" value="<?php echo isset($student[0]['Hall_Name']) ? $student[0]['Hall_Name'] : ''; ?>" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><?php echo isset($student) && !empty($student) ? 'Update' : 'Submit'; ?></button>
                                    </form>
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
                <?php $this->load->view('template/footer'); ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view('template/SiteScript'); ?>
</body>
</html>
