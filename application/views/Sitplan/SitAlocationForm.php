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
                            <a href="<?php echo site_url('hostel_sit_plan'); ?>" class="btn btn-primary mb-3">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Seat
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex align-items-center">
                                    <i class="fas fa-box me-2"></i>
                                    <h5 class="mb-0">Student Seat Allotment</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('hostel_sit_plan/saveAlotment'); ?>" method="post">
                                        <div class="row">
                                            <!-- Student ID -->
                                            <div class="col-md-4 mb-3">
                                                <label for="studentId" class="form-label">Student ID</label>
                                                <input type="number" name="studentId" class="form-control" id="studentId" placeholder="Enter Student ID" required>
                                            </div>

                                            <!-- Student ID -->
                                            <div class="col-md-4 mb-3">
                                                <label for="hall_name" class="form-label">Hall Name</label>
                                                <select name="hall_name" id="hall_name"class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="" disabled selected>Select Seat Number</option>
                                                    <?php foreach ($vsit_plan as $key => $hall_name) {?>
                                                       <option value="<?php echo $hall_name['hall_name']; ?>"><?php echo $hall_name['hall_name']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <!-- Floor -->
                                            <div class="col-md-4 mb-3">
                                                <label for="floor" class="form-label">Floor</label>
                                                <select name="floor" id="floor" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="" disabled selected>Select Floor</option>
                                                    <?php foreach ($vsit_plan as $key => $floor) {?>
                                                       <option value="<?php echo $floor['floor']; ?>"><?php echo $floor['floor']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <!-- Room Number -->
                                            <div class="col-md-4 mb-3">
                                                <label for="roomNumber" class="form-label">Room Number</label>
                                                <select name="roomNumber" id="roomNumber"class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="" disabled selected>Select Room Number</option>
                                                    <?php foreach ($vsit_plan as $key => $room_num) {?>
                                                       <option value="<?php echo $room_num['room_num']; ?>"><?php echo $room_num['room_num']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <!-- Seat Number -->
                                            <div class="col-md-4 mb-3">
                                                <label for="seatNumber" class="form-label">Seat Number</label>
                                                <select name="seatNumber" id="seatNumber"class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="" disabled selected>Select Seat Number</option>
                                                    <?php foreach ($vsit_plan as $key => $sit_num) {?>
                                                       <option value="<?php echo $sit_num['sit_num']; ?>"><?php echo $sit_num['sit_num']; ?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <!-- Allocation Date -->
                                            <div class="col-md-4 mb-3">
                                                <label for="allocationDate" class="form-label">Allocation Date</label>
                                                <input type="date" name="allocationDate" class="form-control" id="allocationDate" value="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="card-footer ">
                                            <button type="submit" class="btn btn-primary">Save Allotment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <hr>
                            <h1>Hostel ALocation Status:</h1>
                        </div>
                            <?php 
                                foreach ($sit_plan as $item) {
                                    $status_class = ($item['status'] == 'vacant') ? 'bg-success' : 'bg-danger';
                                    echo '
                                    <div class="col-md-2 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">' . $item['hall_name'] . '</h5>
                                                <p class="card-text">
                                                    <strong>Floor:</strong> ' . $item['floor'] . '<br>
                                                    <strong>Room Number:</strong> ' . $item['room_num'] . '<br>
                                                    <strong>Seat Number:</strong> ' . $item['sit_num'] . '<br>
                                                    <strong>Student Id:</strong> ' . $item['S_Id'] . '<br>
                                                    <strong>Status:</strong> <span class="badge ' . $status_class . '">' . ucfirst($item['status']) . '</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            ?>
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



