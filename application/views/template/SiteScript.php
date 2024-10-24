        <!-- SB Admin Main Page JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.6/b-3.1.2/b-html5-3.1.2/b-print-3.1.2/datatables.min.js"></script>




        <script>
            $(document).ready(function() {
                var table=$('.mydatatable').DataTable({
                    buttons:['copy', 'csv', 'excel', 'pdf', 'print'] 
                })

                table.buttons().container()
                .appendTo('.mdtbtn');
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