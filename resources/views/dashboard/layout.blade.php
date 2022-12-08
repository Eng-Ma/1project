<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>الداشبورد</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Layout config Js -->
    <script src="/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="/assets/css/app-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="/assets/css/custom-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    @include('dashboard.include.header')
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">القائمة</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link"
                           href="/">
                            <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">الرئيسية</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link"
                           href="/stores">
                            <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">المتاجر</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link"
                           href="/products">
                            <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">المنتجات</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link"
                           href="/payment-transactions">
                            <i class="mdi mdi-puzzle-outline"></i> <span data-key="t-widgets">عمليات الشراء</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- end main content-->
</div>

<script>
    document.getElementById("des-dev").style.display = "none"
</script>
@include('dashboard.include.scripts')
</body>

</html>
