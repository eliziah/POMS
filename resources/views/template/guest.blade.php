<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | POMS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

    <!-- REQUIRED SCRIPTS -->
    
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition layout-top-nav">

    @include('sweetalert::alert')

    <div class="wrapper">
        
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light pl-3">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/guest/dashboard" class="navbar-brand">
                        <img src="/assets/dist/img/pomsv2crop.png" alt="AdminLTE Logo" class="brand-image "
                             style="opacity: .8">
                        <span class="brand-text">POMS (Guest)</span>
                      </a>
                </li>
              <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="/guest/dashboard" role="button">Portfolio Dashboard</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="/guest/dashboard/internal" role="button">Internal Dashboard</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="/guest/dashboard/external" role="button">External Dashboard</a>
              </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                
                @auth
                <li class="nav-item">
                    <a class="nav-link d-inline btn btn-sm btn-outline-warning mr-2" href="/" ><i class="fas fa-door-open"></i>
                    </a>
                </li>
                @endauth
                <li class="nav-item">
                    
                    <a class="nav-link d-inline" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        

        @yield('content')

        <!-- Content Wrapper. Contains page content -->
        {{-- content here --}}
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 <a href="absi.ph">ABSI</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <script>
        $(function() {
            var url = window.location;
            // for single sidebar menu
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');

            // for sidebar menu and treeview
            $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview")
                .css({
                    'display': 'block'
                })
                .addClass('menu-open').prev('a')
                .addClass('active');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                responsive: true
            });

        });
        $(document).ready(function() {
            $('.makethistable').DataTable({
                responsive: true
            });

        });
        $(document).ready(function() {
            $('#realtimebudget').on('input', function() {
                var delta_old = $(this).data('old');
                var delta = this.value - delta_old;
                $('#realtimedelta').val(delta);
            })
        });
        $(document).ready(function() {
            $('.project_table').DataTable({
                responsive: true,
                ordering: false,
                lengthMenu: [8, 15, 30, 50, 100]
            });
        });
        
        $(document).ready(function() {
            const xValues = ["08/03","08/10","08/17","08/24","08/31","09/07","09/14"];
            const yValues = [54,63,63,72,72,89,89];

            new Chart("trend_chart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor:"rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        tension: 0,
                        data: yValues,
                        fill:false                    
                    }]
                },
                options: {
                    legend: {display: false}
                }
            });
        });

        // $(document).ready(function() {
        //     $('.carousel').carousel({
        //         interval: false,
        //     });
        // });
        
    </script>

    <script type="text/javascript">
        $(document).on('click', '#btn-delete', function(e) {
            e.preventDefault();
            var form = $(this).closest("form");
            Swal.fire({
                title: 'Are you sure?',
                text: "You will not be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#82868b',
                confirmButtonText: 'Yes, delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });

        
        $(document).ready(function() {
            $('.guest_logs_table').DataTable({
                responsive: true,
                ordering: false,
                searching: false,
                dom: 'rtip',
                lengthMenu: [6, 15, 30, 50, 100]
            });
        });
    </script>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        $(".log-out").on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#82868b',
                confirmButtonText: 'Yes, Log Out !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#logging-out').submit()
                }
            })
        });
    </script>

</body>

</html>
