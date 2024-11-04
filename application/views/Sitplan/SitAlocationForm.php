<?php	

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
                            <a href="<?php echo site_url('hostel_sit_plan/add'); ?>" class="btn btn-primary mb-3">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Seat
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex align-items-center">
                                    <i class="fas fa-box me-2"></i>
                                    <h5 class="mb-0"><?php echo isset($sit_plan) && !empty($sit_plan) ? 'Edit Seat Information' : 'Add Seat Information'; ?></h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('hostel_sit_plan/save'); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo isset($sit_plan[0]['id']) ? $sit_plan[0]['id'] : ''; ?>">
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="floor" class="form-label">Floor:</label>
                                                <input type="text" id="floor" name="floor" class="form-control" value="<?php echo isset($sit_plan[0]['floor']) ? $sit_plan[0]['floor'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="room_num" class="form-label">Room Number:</label>
                                                <input type="text" id="room_num" name="room_num" class="form-control" value="<?php echo isset($sit_plan[0]['room_num']) ? $sit_plan[0]['room_num'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="sit_num" class="form-label">Seat Number:</label>
                                                <input type="text" id="sit_num" name="sit_num" class="form-control" value="<?php echo isset($sit_plan[0]['sit_num']) ? $sit_plan[0]['sit_num'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="S_Id" class="form-label">Student ID:</label>
                                                <input type="number" id="S_Id" name="S_Id" class="form-control" value="<?php echo isset($sit_plan[0]['S_Id']) ? $sit_plan[0]['S_Id'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="adate" class="form-label">Allocation Date:</label>
                                                <input type="date" id="adate" name="adate" class="form-control" value="<?php echo isset($sit_plan[0]['adate']) ? $sit_plan[0]['adate'] : ''; ?>" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="vdate" class="form-label">Vacate Date:</label>
                                                <input type="date" id="vdate" name="vdate" class="form-control" value="<?php echo isset($sit_plan[0]['vdate']) ? $sit_plan[0]['vdate'] : ''; ?>">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="status" class="form-label">Status:</label>
                                                <select id="status" name="status" class="form-control" required>
                                                    <option value="vacant" <?php echo (isset($sit_plan[0]['status']) && $sit_plan[0]['status'] == 'vacant') ? 'selected' : ''; ?>>Vacant</option>
                                                    <option value="occupied" <?php echo (isset($sit_plan[0]['status']) && $sit_plan[0]['status'] == 'occupied') ? 'selected' : ''; ?>>Occupied</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><?php echo isset($sit_plan) && !empty($sit_plan) ? 'Update' : 'Submit'; ?></button>
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




?>