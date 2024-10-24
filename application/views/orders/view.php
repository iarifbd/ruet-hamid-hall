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
                                <a href="<?php echo site_url('Oders/create'); ?>" class="btn btn-primary mb-3">
                                    <i class="fas fa-plus"></i> Add New Order
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header d-flex align-items-center">
                                        <i class="fas fa-box me-2"></i>
                                        <h5 class="mb-0">Order Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <h2 class="h4">Order Details</h2>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Product Id:</strong> <?php echo $product[0]['product_id']; ?></li>
                                            <li class="list-group-item"><strong>Name:</strong> <?php echo $product[0]['product_name']; ?></li>
                                            <li class="list-group-item"><strong>Brand:</strong> <?php echo $product[0]['brand_name']; ?></li>
                                            <li class="list-group-item"><strong>Categories:</strong> <?php echo $product[0]['categories']; ?></li>
                                            <li class="list-group-item"><strong>Unit Price:</strong> <?php echo $product[0]['unit_price']; ?></li>
                                            <li class="list-group-item"><strong>Quantity:</strong> <?php echo $product[0]['order_quantity']; ?></li>
                                            <li class="list-group-item"><strong>Sub Total:</strong> <?php echo $product[0]['sub_total']; ?></li>
                                            <li class="list-group-item"><strong>Discount:</strong> <?php echo $product[0]['discount']; ?></li>
                                            <li class="list-group-item"><strong>Total:</strong> <?php echo $product[0]['total_price']; ?></li>
                                        </ul>
                                        <div class="mt-4">
                                            <a href="<?php echo site_url('Oders'); ?>" class="btn btn-secondary">
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

        <!-- SB Admin Main Page JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        

        <!-- ***************Bootstrap Select**************** -->
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap Select JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <!-- *********************************************** -->

        <!-- datatable -->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.mydatatable').DataTable();
            });
        </script>

        <!-- area chat -->
        <script>
            // Get the chart data passed from the controller
            var chartData = <?= $area_chart_data; ?>;

            // Initialize the Chart
            var ctx = document.getElementById('myAreaChart').getContext('2d');
            var myAreaChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>


        <!-- Bar Chart Script -->
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';

            // Bar Chart Example
            var ctx = document.getElementById("myBarChart");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($bar_chart_data['labels']); ?>, // Dynamic labels from PHP
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: <?= json_encode($bar_chart_data['data']); ?>, // Dynamic data from PHP
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        </script>

        <!-- goto top page -->
        <script type="text/javascript">
        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
        </script>

        <!-- highlighting text -->
        <script>
        document.getElementById('btnNavbarSearch').addEventListener('click', function() {
            let searchText = document.getElementById('pageSearch').value.trim().toLowerCase();
            
            // Clear any existing highlights
            document.body.querySelectorAll('.highlight').forEach(function(element) {
                element.classList.remove('highlight');
                element.innerHTML = element.innerHTML.replace(/<span class='highlight'>(.*?)<\/span>/gi, '$1');
            });

            if (searchText !== '') {
                let regex = new RegExp(`(${searchText})`, 'gi');
                let textNodes = getTextNodes(document.body);

                textNodes.forEach(node => {
                    if (regex.test(node.nodeValue)) {
                        let parent = node.parentNode;
                        let span = document.createElement('span');
                        span.className = 'highlight';
                        let highlightedText = node.nodeValue.replace(regex, "<span class='highlight'>$1</span>");
                        parent.innerHTML = parent.innerHTML.replace(node.nodeValue, highlightedText);
                        parent.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            }
        });

        // Helper function to get all text nodes in the document
        function getTextNodes(node) {
            let textNodes = [];
            let walker = document.createTreeWalker(node, NodeFilter.SHOW_TEXT, null, false);
            let currentNode;
            while (currentNode = walker.nextNode()) {
                textNodes.push(currentNode);
            }
            return textNodes;
        }

        // Optional: Clear highlights when the search input is empty
        document.getElementById('pageSearch').addEventListener('input', function() {
            if (this.value === '') {
                document.body.querySelectorAll('.highlight').forEach(function(element) {
                    element.classList.remove('highlight');
                    element.innerHTML = element.innerHTML.replace(/<span class='highlight'>(.*?)<\/span>/gi, '$1');
                });
            }
        });
        </script>


    </body>
</html>
