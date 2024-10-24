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
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header">
                                    <h3>Search Sales Records</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('Sales/get_by_date'); ?>" method="post">
                                        <div class="mb-3">
                                            <label for="from_date" class="form-label">From Date</label>
                                            <input type="date" class="form-control" id="from_date" name="from_date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="to_date" class="form-label">To Date</label>
                                            <input type="date" class="form-control" id="to_date" name="to_date" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
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