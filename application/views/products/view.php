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
                                <a href="<?php echo site_url('Products'); ?>" class="btn btn-primary mb-3">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Details Product Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            
                                            <?php
                                            // Sample array
                                            $array = $product;

                                            // Iterate through the array
                                            foreach ($array as $key => $value) {?>
                                             <?php if($key=='productImage'){ ?>
                                            <li class="list-group-item"><strong> <?php echo $key; ?></strong> <a href="<?php echo base_url('uploads/images/').$value; ?>" target="_blank"><?php echo $value; ?></a></li>
                                            <?php }elseif($key=='shipment_pdf'){?>
                                            <li class="list-group-item"><strong><?php echo $key; ?></strong> <a href="<?php echo base_url('uploads/').$value; ?>" target="_blank"> <?php echo $value; ?></a></li>
                                            <?php }else{ ?>
                                                <li class="list-group-item"><strong><?php echo $key; ?></strong> <?php echo $value; ?></li>
                                            <?php }; ?>
                                            <?php } ; ?>

                                        </ul>
                                        <div class="mt-4">
                                            <a href="<?php echo site_url('Products'); ?>" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i> Back to List
                                            </a>
                                        </div>
                                    </div>
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
