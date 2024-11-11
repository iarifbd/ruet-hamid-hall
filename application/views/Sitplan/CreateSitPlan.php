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
                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header d-flex align-items-center">
                                    <i class="fas fa-box me-2"></i>
                                    <h5 class="mb-0">Create Sit Plan</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo site_url('hostel_sit_plan/makeplan'); ?>" method="post">
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="floor" class="form-label">Hall Name:</label>
                                                <input class="form-control" type="text" name="Hall_name"required>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="floor" class="form-label">Floor:</label>
                                                <select id="floor" name="floor" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="0">Select Floor</option>
                                                    <?php foreach ($floor as $key => $value) {?>
                                                        <option value="<?php echo $value['name'] ;?>"><?php echo $value['name'] ;?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="room_num" class="form-label">Room Number:</label>
                                                <select id="room" name="room" class="form-control selectpicker" data-live-search="true" data-width="100%" required>
                                                    <option value="0">Select Room</option>
                                                    <?php foreach ($room as $key => $value) {?>
                                                        <option value="<?php echo $value['name'] ;?>"><?php echo $value['name'] ;?></option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-3">
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
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                              <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Hall Name</th>
                                                        <th>Floor No</th>
                                                        <th>Room No</th>
                                                        <th>Sit no</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Hall Name</th>
                                                        <th>Floor No</th>
                                                        <th>Room No</th>
                                                        <th>Sit no</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($sit_plan as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo ($key+1) ;?></td>
                                                        <td><?php echo $value['hall_name']; ?></td>
                                                        <td><?php echo $value['floor']; ?></td>
                                                        <td><?php echo $value['room_num']; ?></td>
                                                        <td><?php echo $value['sit_num']; ?></td>
                                                        <td><span class="badge <?php echo ($value['status']=='vacant') ? "bg-success" : "bg-danger"; ?>"><?php echo $value['status']; ?></span></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </div>
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



