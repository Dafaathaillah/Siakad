        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; {{date('Y')}} SIAKADS</b> All rights reserved.
            </div>
        </div>
        <script src="{{url('admin/scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
        <script src="{{url('admin/scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript">
            
        </script>
        @yield('addscript')
        <script src="{{url('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{url('admin/scripts/flot/jquery.flot.js')}}" type="text/javascript"></script>
        <script src="{{url('admin/scripts/flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
        <script src="{{url('admin/scripts/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{url('admin/scripts/common.js')}}" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
        });
        </script>
    </body>