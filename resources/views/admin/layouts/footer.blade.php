     <!-- JAVASCRIPT -->
     <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Upcube.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- DataTables  & Plugins -->
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<!-- DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
   <!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
    <!-- DataTables Buttons JavaScript (Optional) -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>

     <script src="{{asset ('adminAssets/libs/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset("adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
     <script src="{{asset ("adminAssets/libs/metismenu/metisMenu.min.js") }}"></script>
     <script src="{{asset ("adminAssets/libs/simplebar/simplebar.min.js") }}"></script>
     <script src="{{ asset("adminAssets/libs/node-waves/waves.min.js") }}"></script>
     <!-- apexcharts -->
     <script src="{{ asset("adminAssets/libs/apexcharts/apexcharts.min.js") }}"></script>

     <!-- jquery.vectormap map -->
     <script src="{{ asset("adminAssets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
     <script src="{{ asset("adminAssets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js") }}"></script>

     <!-- Required datatable js -->
     <script src="{{ asset("adminAssets/libs/datatables.net/js/jquery.dataTables.min.js") }}"></script>
     <script src="{{ asset("adminAssets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>

     <!-- Responsive examples -->
     <script src="{{ asset("adminAssets/libs/datatables.net-responsive/js/dataTables.responsive.min.js") }}"></script>
     <script src="{{ asset("adminAssets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js") }}"></script>

     <script src="{{ asset("adminAssets/js/pages/dashboard.init.js") }}"></script>

     <!-- App js -->
     <script src="{{asset ("adminAssets/js/app.js") }}"></script>


     @include('sweetalert::alert')

    @stack('js')
