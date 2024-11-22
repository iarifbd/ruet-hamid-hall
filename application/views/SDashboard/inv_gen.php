<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('SDashboard/header');?>
        <style type="text/css">
            @media print {
                .no-print {
                    display: none;
                }
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
        <?php $this->load->view('SDashboard/topnav');?>
        <div id="layoutSidenav">
            <?php $this->load->view('SDashboard/sidenav'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mt-5">
                            <div class="col-6">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Due Ledger</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th class="no-print">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $T=0;foreach ($stuacc as $key => $value):
                                                        $T=$T+$value['TotalDue'];
                                                     ?>
                                                    <tr>
                                                        <td><?php echo ($key+1); ?></td>
                                                        <td><?php echo $value['gdate']; ?></td>
                                                        <td><?php echo $value['TotalDue']; ?></td>
                                                        <td>
                                                            <a href="<?php echo base_url('Cart/add/'.$value['gdate'].'/'.$value['TotalDue'].'/'.$value['S_Id']); ?>" class="btn btn-primary btn-sm"><i class="fa-regular fa-credit-card"></i> Pay</a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL#</th>
                                                        <th>Date</th>
                                                        <th><?php echo 'Total='. $T; ?></th>
                                                        <th class="no-print">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                      
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Invoice:</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <?php if ($this->cart->total_items() > 0): ?>
                                                <table class="table table-striped table-hover table-bordered mydatatable">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($this->cart->contents() as $item): ?>
                                                            <tr>
                                                                <td><?php echo $item['name']; ?></td>
                                                                
                                                                <td><?php echo number_format($item['subtotal'], 2); ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('cart/remove/' . $item['rowid']); ?>" class="btn btn-sm btn-danger">Remove</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <h3>Total: <?php echo number_format($this->cart->total(), 2) .'BDT'; ?></h3>
                                                <a href="<?php echo site_url('Cart/checkout'); ?>" class="btn btn-success mb-5">Proceed to Checkout</a>
                                            <?php else: ?>
                                                <p>Your cart is empty.</p>
                                            <?php endif; ?>
                                        </div>  
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <?php $this->load->view('SDashboard/footer');?>
                </footer>
            </div>
        </div>
        <?php $this->load->view('SDashboard/SiteScript');?>
    </body>
</html>