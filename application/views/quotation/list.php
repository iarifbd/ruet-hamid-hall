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
                                <a href="<?php echo site_url('Quotetion'); ?>" class="btn btn-primary mb-3">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Create Quotetion
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Quotetion Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered mydatatable">
                                                <thead class="table-striped">
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Quotetion #</th>
                                                        <th>Descriptions</th>
                                                        <th>Grand Total</th>
                                                        <th>Discount</th>
                                                        <th>Net Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>SL #</th>
                                                        <th>Quotetion #</th>
                                                        <th>Descriptions</th>
                                                        <th>Grand Total</th>
                                                        <th>Discount</th>
                                                        <th>Net Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($QutesInfo as $key => $value): ?>
                                                    <tr>
                                                        <td><?php echo ($key+1); ?></td>
                                                        <td><?php echo $value['quotation_number']; ?></td>
                                                        <td><b>Quotetion Date: </b> 
                                                            <?php echo $value['qdate']; ?>
                                                            , 
                                                            <b>Validity Expair:</b>
                                                            <?php echo $value['vdate']; ?>
                                                            , 
                                                            <b>Name:</b> 
                                                            <?php echo $value['contact_person']; ?>
                                                            , 
                                                            <b>Company:</b> 
                                                            <?php echo $value['company_name']; ?>
                                                            , 
                                                            <b>Phone/Mobile:</b> 
                                                            <?php echo $value['contact']; ?>
                                                            , 
                                                            <b>Address:</b> 
                                                            <?php echo $value['address']; ?>
                                                                
                                                        </td>
                                                        <td><?php echo $value['grand_total']; ?></td>
                                                        <td><?php echo $value['discount']; ?></td>
                                                        <td><?php echo $value['net_total']; ?></td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Action buttons">
                                                                <a href="<?php echo site_url('Quotetion/print_quotation/' . $value['id']); ?>" class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-print" aria-hidden="true"></i></i> Print
                                                                </a>
                                                                <a href="<?php echo site_url('Quotetion/edit/' . $value['id']); ?>" class="btn btn-warning btn-sm">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <a href="<?php echo site_url('Quotetion/delete/' . $value['id']); ?>" onclick="return confirm('Are you sure you want to delete this Quotetion?');" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </a>
                                                                <a href="<?php echo site_url('Invoice/makeinvo/' . $value['id']); ?>"  class="btn btn-success btn-sm">
                                                                    <i class="fa fa-file" aria-hidden="true"></i> Invoice
                                                                </a>
                                                            </div>                                                            
                                                        </td>
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
                    <?php $this->load->view('template/footer');?>
                </footer>
            </div>
        </div>
        <?php $this->load->view('template/SiteScript');?>
    </body>
</html>