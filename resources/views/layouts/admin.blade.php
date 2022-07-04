<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/toastr/toastr.css">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>


    <div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

        @guest
        @else
            <div class="wrapper">

                <!-- Preloader -->
                {{-- <div class="preloader flex-column justify-content-center align-items-center">
                    <img class="animation__wobble" src="{{ asset('public/backend') }}/dist/img/AdminLTELogo.png"
                    alt="AdminLTELogo" height="60" width="60">
                </div> --}}

                <!-- Navbar -->
                @include('layouts.admin_partieal.navbar')
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                @include('layouts.admin_partieal.sidebar')

            @endguest
            <!-- Content Wrapper. Contains page content -->
            @yield('admin_content')

            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('public/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/backend') }}/dist/js/adminlte.js"></script>

        <!-- PAGE /PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('public/backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/raphael/raphael.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="{{ asset('public/backend') }}/plugins/chart.js/Chart.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/backend') }}/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('public/backend') }}/dist/js/pages/dashboard2.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

        <script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/jszip/jszip.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
        <script>
            $(document).on("click", "#delete", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                        title: "Are you Want to delete?",
                        text: "Once Delete, This will be Permanently Delete!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = link;
                        } else {
                            swal("Safe Data!");
                        }
                    });
            });
        </script>
        {{-- before  logout showing alert message --}}
        <script>
            $(document).on("click", "#logout", function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                swal({
                        title: "Are you Want to logout?",
                        text: "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = link;
                        } else {
                            swal("Not Logout!");
                        }
                    });
            });
        </script>


        <script>
            @if (Session::has('messege'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('messege') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('messege') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('messege') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('messege') }}");
                        break;
                }
            @endif
        </script>



        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
</body>

</html>
