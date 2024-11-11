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
                                                    <option value="" disabled selected>Select Hall Name</option>
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
                                                </select>
                                            </div>

                                            <!-- Room Number -->
                                            <div class="col-md-4 mb-3">
                                                <label for="roomNumber" class="form-label">Room Number</label>
                                                <select name="roomNumber" id="roomNumber"class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="" disabled selected>Select Room Number</option>
                                                </select>
                                            </div>

                                            <!-- Seat Number -->
                                            <div class="col-md-4 mb-3">
                                                <label for="seatNumber" class="form-label">Seat Number</label>
                                                <select name="seatNumber" id="seatNumber"class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="" disabled selected>Select Seat Number</option>
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
                            <h1>Hostel Alocation Status:</h1>
                            <hr>
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
    <script type="text/javascript">
        $(document).ready(function() {
            // When hall_name changes, fetch corresponding floors
            $('#hall_name').change(function() {
                var hall_name = $(this).val(); // Get the selected hall_name
                
                if (hall_name != '') {
                    $.ajax({
                        url: '<?= base_url('Hostel_sit_plan/ajaxfloor'); ?>',
                        method: 'POST',
                        data: { hall_name: hall_name },
                        success: function(data) {
                            $('#floor').html(data); // Update the floor dropdown with the response
                            $('#roomNumber').html('<option value="" disabled selected>Select Room Number</option>'); // Reset Room dropdown
                            $('.selectpicker').selectpicker('refresh'); // Refresh the selectpicker UI (if using Bootstrap Select)
                        },
                        error: function(xhr, status, error) {
                            alert("Error fetching data: " + error); // Handle errors
                        }
                    });
                } else {
                    // If no hall_name selected, reset the floor dropdown
                    $('#floor').html('<option value="">Select Floor</option>');
                    $('#roomNumber').html('<option value="">Select Room Number</option>'); // Reset Room dropdown
                    $('.selectpicker').selectpicker('refresh');
                }
            });

            // When floor changes, fetch corresponding rooms
            $('#floor').change(function() {
                var hall_name = $('#hall_name').val(); // Get the selected hall_name
                var floor = $(this).val(); // Get the selected floor
                
                if (hall_name != '' && floor != '') {
                    $.ajax({
                        url: '<?= base_url('Hostel_sit_plan/ajaxroom'); ?>',
                        method: 'POST',
                        data: { hall_name: hall_name, floor: floor },
                        success: function(data) {
                            $('#roomNumber').html(data); // Update the roomNumber dropdown with the response
                            $('.selectpicker').selectpicker('refresh'); // Refresh the selectpicker UI (if using Bootstrap Select)
                        },
                        error: function(xhr, status, error) {
                            alert("Error fetching rooms: " + error); // Handle errors
                        }
                    });
                } else {
                    // If no floor selected, reset the roomNumber dropdown
                    $('#roomNumber').html('<option value="">Select Room Number</option>');
                    $('.selectpicker').selectpicker('refresh');
                }
            });

            // When room changes, fetch corresponding sit
            $('#roomNumber').change(function() {
                var hall_name = $('#hall_name').val(); 
                var floor = $('#floor').val(); 
                var roomNumber = $(this).val(); 
                
                if (hall_name != '' && floor != '' && roomNumber != '') {
                    $.ajax({
                        url: '<?= base_url('Hostel_sit_plan/ajaxsit'); ?>',
                        method: 'POST',
                        data: { hall_name: hall_name, floor: floor,roomNumber:roomNumber },
                        success: function(data) {
                            $('#seatNumber').html(data); 
                            $('.selectpicker').selectpicker('refresh'); 
                        },
                        error: function(xhr, status, error) {
                            alert("Error fetching rooms: " + error); // Handle errors
                        }
                    });
                } else {
                    // If no room selected, reset the sit dropdown
                    $('#seatNumber').html('<option value="">Select sit Number</option>');
                    $('.selectpicker').selectpicker('refresh');
                }
            });

        });

    </script>

</body>
</html>



