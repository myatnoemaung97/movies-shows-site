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
                        <a href="/admin/users" class="nav-link {{ Str::startsWith(request()->path(), 'admin/users') ? 'active' : '' }}">
                            <i class="fa-solid fa-user nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/articles" class="nav-link {{ Str::startsWith(request()->path(), 'admin/articles') ? 'active' : '' }}">
                            <i class="fa-solid fa-newspaper nav-icon"></i>
                            <p>Articles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/movies" class="nav-link {{ Str::startsWith(request()->path(), 'admin/movies') ? 'active' : '' }}">
                            <i class="fa-solid fa-film nav-icon"></i>
                            <p>Movies</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/shows" class="nav-link {{ Str::startsWith(request()->path(), 'admin/shows') ? 'active' : '' }}">
                            <i class="fa-solid fa-tv nav-icon"></i>
                            <p>Shows</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/people" class="nav-link {{ Str::startsWith(request()->path(), 'admin/people') ? 'active' : '' }}">
                            <i class="fa-solid fa-masks-theater nav-icon"></i>
                            <p>Artists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/playlists" class="nav-link {{ Str::startsWith(request()->path(), 'admin/lists') ? 'active' : '' }}">
                            <i class="fa-solid fa-list nav-icon"></i>
                            <p>Lists</p>
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
        @if(session('draft'))
        Toast.fire({
            icon: 'success',
            title: "{{session('draft')}} saved to draft!"
        })
        @endif
        @if(session('publish'))
        Toast.fire({
            icon: 'success',
            title: "{{session('publish')}} published successfully!"
        })
        @endif
        @if(session('unpublish'))
        Toast.fire({
            icon: 'success',
            title: "{{session('unpublish')}} unpublished successfully!"
        })
        @endif
        @if(session('pin'))
        Toast.fire({
            icon: 'success',
            title: "{{session('pin')}} has been pinned"
        })
        @endif
        @if(session('unpin'))
        Toast.fire({
            icon: 'success',
            title: "{{session('pin')}} has been unpinned"
        })
        @endif
    });
</script>
</body>
</html>
