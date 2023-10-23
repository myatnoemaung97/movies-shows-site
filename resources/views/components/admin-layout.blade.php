<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Kino Wave</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- bootstrap 5.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>
    <!-- Data Table-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Kino Wave</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/articles" class="nav-link {{ request()->is('admin/articles') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Articles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/movies" class="nav-link {{ request()->is('admin/movies') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Movies</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/shows" class="nav-link {{ request()->is('admin/shows') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Shows</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/people" class="nav-link {{ request()->is('admin/people') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>People</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        {{ $slot }}
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Data Table-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            tags: true,
            multiple: true,
            tokenSeparator: ','
        });

        $("select").on("select2:select", function (evt) {
            const element = evt.params.data.element;
            const $element = $(element);

            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });
    });
</script>
<script>
    var movieTable = $('#movies').DataTable({
        'serverSide': true,
        'processing': true,
        'ajax': {
            url: '/admin/movies/',
            error: function(xhr, testStatus, errorThrown) {

            }
        },

        "columns": [{
            "data": "id"
        },
            {
                "data": "title"
            },
            {
                "data": "age_rating"
            },
            {
                'data': 'release_date'
            },
            {
                'data': 'run_time'
            },
            {
                "data": "action"
            }
        ]
    });

    var peopleTable = $('#people').DataTable({
        'serverSide': true,
        'processing': true,
        'ajax': {
            url: '/admin/people/',
            error: function(xhr, testStatus, errorThrown) {

            }
        },

        "columns": [{
            "data": "id"
        },
            {
                "data": "name"
            },
            {
                "data": "image"
            },
            {
                "data": "action"
            }
        ]
    });

    $(document).on('click', '.deleteMovieButton', function(a) {
        a.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Do you want to delete this vacancy?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/movies/' + id,
                    type: 'DELETE',
                    success: function() {
                        movieTable.ajax.reload();
                    }
                });

                Swal.fire(
                    'Deleted!',
                    'Vacancy has been deleted.',
                    'success'
                )
            }
        })
    });

    $(document).on('click', '.deletePersonButton', function(a) {
        a.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: 'Do you want to delete this profile?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            confirmButtonColor: '#FF0000',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/people/' + id,
                    type: 'DELETE',
                    success: function() {
                        peopleTable.ajax.reload();
                    }
                });

                Swal.fire(
                    'Deleted!',
                    'Profile has been deleted.',
                    'success'
                )
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        let token = document.head.querySelector('meta[name="csrf-token"]');
        if(token)
        {
            $.ajaxSetup({
                headers : {
                    'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        @if(session('create'))
        Toast.fire({
            icon: 'success',
            title: '{{session('create')}} created successfully!'
        })
        @endif
        @if(session('update'))
        Toast.fire({
            icon: 'success',
            title: "{{session('update')}} updated successfully!"
        })
        @endif
        @if(session('delete'))
        Toast.fire({
            icon: 'success',
            title: "{{session('delete')}} deleted successfully!"
        })
        @endif
    });
</script>
</body>
</html>
