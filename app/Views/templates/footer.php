        </div>
        </main>
        <?php if (session()->get('isLoggedIn')) { ?>
            <footer class="py-4 bg-light mt-auto footer-color">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; KachiGully <?= date('Y') ?></div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        <?php } ?>
        </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/api/sum().js"></script>

        <script src="<?= base_url(); ?>/public_html/assets/js/scripts.js"></script>
        <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {

                //$('.product-search').select2();
                //$('.create-invoice-customer-select').select2();

                // $('.product-search').select2({
                //placeholder: "Please select a product"
                //});

                // $("#invoiceListTable").dataTable(); 
                //$("#orderTable").dataTable(); 
                //$("#CustomerInvoiceorderTable").dataTable(); 

            });
        </script>

        </body>

        </html>