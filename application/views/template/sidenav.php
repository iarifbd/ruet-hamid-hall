            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Your Trusted It Consultent</div>
                            <a class="nav-link" href="<?php echo base_url(''); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-industry"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a class="nav-link" href="<?php echo base_url('Products/add_product'); ?>">Add New Product</a> -->
                                    <a class="nav-link" href="<?php echo base_url('Products'); ?>">Manage Products</a>
                                    <a class="nav-link" href="<?php echo base_url('Products/settings'); ?>">Settings</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#StoreLayout" aria-expanded="false" aria-controls="StoreLayout">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Store
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="StoreLayout" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('Store/add'); ?>">Add New Product</a>
                                    <a class="nav-link" href="<?php echo base_url('Store/storeInfo'); ?>">Edit info</a>
                                    <a class="nav-link" href="<?php echo base_url('Store'); ?>">Store Observe</a>
                                    <a class="nav-link" href="<?php echo base_url('Store/short_list'); ?>">Short List</a>
                                    <a class="nav-link" href="<?php echo base_url('Store/expired_list'); ?>">Expire List</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Quotation
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('Quotetion'); ?>">Create</a>
                                    <a class="nav-link" href="<?php echo base_url('Quotetion/list'); ?>">Manage Quotetion</a>
                                    <a class="nav-link" href="<?php echo base_url('Editor'); ?>">Manage T&C</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#InvoicePages" aria-expanded="false" aria-controls="InvoicePages">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice"></i></div>
                                Invoice
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="InvoicePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url('Invoice'); ?>">Create</a>
                                    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Reports</div>
                            <a class="nav-link" href="<?php echo base_url('Sales'); ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Sales Report
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>