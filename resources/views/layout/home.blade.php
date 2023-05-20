<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard - Pasar Polis</title>
    <link rel="apple-touch-icon" href="{{asset('assets/image/logo.jpg')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/image/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/tables/datatable/responsive.bootstrap.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- END: Custom CSS-->


    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/pages/page-blog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                                <div class="badge badge-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <a class="d-flex" href="javascript:void(0)">
                                <div class="media d-flex align-items-start">
                                    <div class="media-left">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading"><span class="font-weight-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read all notifications</a></li>
                    </ul>
                </li>
                @php
                    if (auth()->user()->role_id == '1') {
                        $dataUser = App\Models\Admin::where('users_id',auth()->user()->id)->first();
                        $role = App\Models\Role::where('id',auth()->user()->role_id)->first();
                    }
                @endphp
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ $dataUser->name }}</span><span class="user-status">{{ Illuminate\Support\Str::ucfirst($role->name) }}</span></div><span class="avatar"><img class="round" src="{{asset('assets/image/logo.jpg')}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="#" onclick="logout()"><i class="mr-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header mb-2">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{asset('/')}}html/ltr/vertical-menu-template/index.html">
                        <span class="brand-logo">
                           
                        </span>
                        <h2 class="brand-text text-primary fw-bold"><img src="{{asset('/assets/image/logo.png')}}" style="width:100%"></h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item @if(URL::current() == URL::to('/admin')) active @elseif(URL::current() == URL::to('/admin/dashboard')) active @endif"><a class="d-flex align-items-center shadow-none" href="{{route('admin.dashboard')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
                </li>

                <li class=" navigation-header"><span data-i18n="User Management">User Management</span><i data-feather="more-horizontal"></i>
                </li>
                
                <li class=" nav-item @if(URL::current() == URL::to('/admin/role')) active @elseif(URL::current() == URL::to('/admin/role/form')) active @endif"><a class="d-flex align-items-center shadow-none" href="{{route('admin.role')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Role">Role</span></a>
                </li>
                <li class=" nav-item @if(URL::current() == URL::to('/admin/admin')) active @elseif(URL::current() == URL::to('/admin/admin/form')) active @endif"><a class="d-flex align-items-center shadow-none" href="{{route('admin.admin')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Admin">Admin</span></a>
                </li>
                <li class=" nav-item @if(URL::current() == URL::to('/admin/hrd')) active @elseif(URL::current() == URL::to('/admin/hrd/form')) active @endif"><a class="d-flex align-items-center shadow-none" href="{{route('admin.hrd')}}"><i data-feather="trello"></i><span class="menu-title text-truncate" data-i18n="HRD">HRD</span></a>
                </li>
                <li class=" nav-item @if(URL::current() == URL::to('/admin/employee')) active @elseif(URL::current() == URL::to('/admin/employee/form')) active @endif"><a class="d-flex align-items-center shadow-none" href="{{route('admin.employee')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Karyawan">Karyawan</span></a>
                </li>

                <li class=" navigation-header"><span data-i18n="Product Management">Product Management</span><i data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item @if(URL::current() == URL::to('/admin/product')) active @elseif(URL::current() == URL::to('/admin/product/form')) active @endif"><a class="d-flex align-items-center shadow-none" href="{{route('admin.product')}}"><i data-feather="box"></i><span class="menu-title text-truncate" data-i18n="Asuransi">Asuransi</span></a>
                </li>
                
            </ul>   
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Content Start -->
                @yield('content')
                <!-- Content end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; @php echo date('Y') @endphp<a class="ml-25 text-primary" href="#" target="_blank">PasarPolis</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('/')}}app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('/')}}app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/tables/datatable/responsive.bootstrap.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('/')}}app-assets/js/core/app-menu.js"></script>
    <script src="{{asset('/')}}app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('/')}}app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="{{asset('/')}}app-assets/js/scripts/pages/app-invoice-list.js"></script>
    <script src="{{asset('/')}}app-assets/js/scripts/pages/page-blog-edit.js"></script>
    <!-- END: Page JS-->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        function logout() {
            Swal.fire({
                title: 'Apakah anda yakin ingin keluar ?',
                text: "Keluar akun akan menghapus data anda dari cookie",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar Akun!',
                cancelButtonText: 'Batal',
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location="{{ route('admin.logout') }}"
                }
            })
        }
    </script>
    <script src="https://cdn.tiny.cloud/1/4jbq30469jnnu3qv44azpvwa93cg0pws63fqlsconmahlro3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '.editor',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
    @stack('js')
</body>
<!-- END: Body-->

</html>