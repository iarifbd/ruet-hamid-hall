            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Your Trusted It Consultent</div>
                            <a class="nav-link" href="<?php echo base_url(''); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Students</div> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-industry"></i></div>
                                Student
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('StudentInfo'); ?>">Manage Student</a>
                                    <a class="nav-link" href="<?php echo base_url('StudentInfo/Studentform'); ?>">Add Student</a>
                                    <a class="nav-link" href="<?php echo base_url('StudentInfo/StuAcc'); ?>">Student Account Info</a>
                                </nav>
                            </div>  
                            <div class="sb-sidenav-menu-heading">Boarders</div> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#HostelLayouts" aria-expanded="false" aria-controls="HostelLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-industry"></i></div>
                                Boarders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>   
                            <div class="collapse" id="HostelLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('Hostel_sit_plan'); ?>">Add boarder</a>
                                    <a class="nav-link" href="<?php echo base_url('FineCL'); ?>">Apply HC/F</a>
                                    <a class="nav-link" href="<?php echo base_url('Hostel_sit_plan'); ?>">Mange Border</a>
                                </nav>
                            </div>  
                            <div class="sb-sidenav-menu-heading">Settings</div> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#SettingsLayouts" aria-expanded="false" aria-controls="SettingsLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-industry"></i></div>
                                Make Allotment Plan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>   
                            <div class="collapse" id="SettingsLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('Hostel_sit_plan/CreateSitPlan'); ?>">Manage Plan</a>
                                    <a class="nav-link" href="<?php echo base_url('Hostel_sit_plan'); ?>">New Floor</a>
                                    <a class="nav-link" href="<?php echo base_url('Hostel_sit_plan'); ?>">New Room</a>
                                    <a class="nav-link" href="<?php echo base_url('Hostel_sit_plan'); ?>">New Sit</a>
                                </nav>
                            </div>                  
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>