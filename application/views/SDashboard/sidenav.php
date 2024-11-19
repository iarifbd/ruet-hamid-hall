<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Heading for the navigation -->
                <div class="sb-sidenav-menu-heading text-uppercase">Your Trusted IT Consultant</div>
                
                <!-- Dashboard Link -->
                <a class="nav-link" href="<?php echo base_url(''); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <!-- Students Section -->
                <!-- <div class="sb-sidenav-menu-heading text-uppercase">Students</div> --> 
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Student Accounts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url('StudentCL/StuTopSheet'); ?>">Accounts Ledger</a>
                        <a class="nav-link" href="<?php echo base_url('Cart/index'); ?>">Make Invoice</a>
                        <a class="nav-link" href="<?php echo base_url('StudentCL'); ?>">Update Payments</a>
                    </nav>
                </div>

                <!-- Boarders Section -->
                <!-- <div class="sb-sidenav-menu-heading text-uppercase">Boarders</div> --> 
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#HostelLayouts" aria-expanded="false" aria-controls="HostelLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Boarders Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="HostelLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url('StudentCL'); ?>">Notice Board</a>
                        <a class="nav-link" href="<?php echo base_url('StudentCL'); ?>">Register Complaint</a>
                    </nav>
                </div>

                <!-- Settings Section -->
                <div class="sb-sidenav-menu-heading text-uppercase">Settings</div> 
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#SettingsLayouts" aria-expanded="false" aria-controls="SettingsLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Profile
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="SettingsLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?php echo base_url('StudentCL'); ?>">Update Information</a>
                        <a class="nav-link" href="<?php echo base_url('StudentCL'); ?>">Reset Password</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span class="font-weight-bold">Student</span>
        </div>
    </nav>
</div>
