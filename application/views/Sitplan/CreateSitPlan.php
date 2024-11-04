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
                        <div class="col-12">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex align-items-center">
                                    <i class="fas fa-box me-2"></i>
                                    <h5 class="mb-0"><?php echo isset($sit_plan) && !empty($sit_plan) ? 'Edit Seat Plan' : 'Add Seat Plan'; ?></h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('hostel_sit_plan/makeplan'); ?>" method="post">
                                        <input type="hidden" name="id" value="<?php echo isset($sit_plan[0]['id']) ? $sit_plan[0]['id'] : ''; ?>">
                                        
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="floor" class="form-label">Floor:</label>
                                                <select id="floor" name="floor" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="0">Select Floor</option>
                                                    <?php foreach ($floor as $key => $value) {?>
                                                        <option value="<?php echo $value['name'] ;?>"><?php echo $value['name'] ;?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="room_num" class="form-label">Room Number:</label>
                                                <select id="room" name="room" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="0">Select Room</option>
                                                    <?php foreach ($room as $key => $value) {?>
                                                        <option value="<?php echo $value['name'] ;?>"><?php echo $value['name'] ;?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="sit_num" class="form-label">Seat Number:</label>
                                                <select id="sit" name="sit" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="0">Select Sit</option>
                                                    <?php foreach ($sit as $key => $value) {?>
                                                        <option value="<?php echo $value['name'] ;?>"><?php echo $value['name'] ;?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
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



