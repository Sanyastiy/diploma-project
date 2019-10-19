<?
session_start();
$fimpid=$_SESSION['ID_USER'];
if(!$_SESSION['cookie']){
    header('Location: login.php');
    exit;
}
include("lib/procedure.php");
$count_g = "51";//count_goods($_SESSION['ID_USER']);
$count_o = "18";//count_orders($_SESSION['ID_USER']);
$salary = sum_salary($_SESSION['ID_USER']);
$not_end = not_end($_SESSION['ID_USER']);
?>
<!doctype html>
	<html lang="en" class="no-focus">
    <head>
    	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<title>MangoBox - панель управления для поставщиков</title>
		
        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="http://mangobox.ru/favicon.ico">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body class="pagesbg">
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o side-scroll page-header-glass page-header-inverse main-content-boxed">
            <!-- Side Overlay-->
            <?include("block/side-overlay.php");?>
            <!-- END Side Overlay -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->

                                <!-- Logo -->
                                <div class="content-header-item">
                                    <a class="font-w700" href="main.php">
                                        <img src="assets/img/logo.png" class="mainlogo">
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->

                        <!-- Side User -->
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase"><?echo $_SESSION['Name']?></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark" href="login.php?opt=logout">
                                            <i class="si si-logout"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Visible only in normal mode -->
                        </div>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
                                <li>
                                    <a href="main.php">Главная</a>
                                </li>
                                <li>
                                    <a href="admin/mainadm.php">Администрирвоание</a>
                                </li>
                                <li>
                                    <a href="orders.php">Заказы</a>
                                </li>
                                <li>
                                    <a href="products.php">Товары</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?echo $_SESSION['Name']?><i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                <!-- Toggle Side Overlay -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                    <i class="si si-wrench mr-5"></i> Настройки
                                </a>
                                <!-- END Side Overlay -->

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php">
                                    <i class="si si-logout mr-5"></i> Выйти
                                </a>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-tasks"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </span>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-image" style="background-image: url('assets/img/photos/photo26@2x.jpg');">
                    <div class="bg-black-op-75">
                        <div class="content content-top content-full text-center">
                            <div class="py-20">
                                <h1 class="h2 font-w700 text-white mb-10">Панель управления</h1>
                                <h2 class="h4 font-w400 text-white-op mb-0">Добро пожаловать, <?echo $_SESSION['Name']?>! У вас <a class="text-primary-light link-effect" href="orders.php"><?echo $not_end?> незавершённых заказов!</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Breadcrumb -->
                <div class="bg-body-light border-b">
                    <div class="content py-5 text-center">
                        <nav class="breadcrumb bg-body-light mb-0">
                            <a class="breadcrumb-item" href="http:\\mangobox.ru\">MangoBox</a>
                            <span class="breadcrumb-item active">Панель управления</span>
                        </nav>
                    </div>
                </div>
                <!-- END Breadcrumb -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Statistics -->
                    <!-- CountTo ([data-toggle="countTo"] is initialized in Codebase() -> uiHelperCoreAppearCountTo()) -->
                    <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
                    <div class="content-heading">
                        <div class="dropdown float-right">
                           
                           <!--
                           <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-dashboard-stats-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Сегодня
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-dashboard-stats-drop">
                                <a class="dropdown-item active" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Сегодня
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Неделя
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Месяц
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Год
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-circle-o mr-5"></i>Всё время
                                </a>
                            </div>
                            -->
                            
                        </div>
                        Статистика
                    </div>
                    <div class="row gutters-tiny">
                        <!-- Earnings -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-elegance" >
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-area-chart text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="55345" data-after="₽"></div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Заработано</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Earnings -->

                        <!-- Orders -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-duske" href="orders.php">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-archive text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?echo $count_o?>">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Заказы</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Orders -->

                        <!-- New Customers -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-sea" href="products.php">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-cart-arrow-down text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?echo $count_g;?>">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Товары</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END New Customers -->

                        <!-- Conversion Rate -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-aqua" href="product_add.php">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="si si-handbag text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white"><i class="fa fa-cart-plus text-white"></i></div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Добавить товар</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Conversion Rate -->
                    </div>
                    <!-- END Statistics -->

                    <!-- Orders Overview -->
                    <!--<div class="content-heading">
                        <div class="dropdown float-right">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-orders-overview-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Неделя
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-orders-overview-drop">
                                <a class="dropdown-item active" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Неделя
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Месяц
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i>Год
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-circle-o mr-5"></i>Всё время
                                </a>
                            </div>
                        </div>
                        Orders <small class="d-none d-sm-inline">Overview</small>
                    </div>-->

                    <!-- Chart.js Chart (initialized in js/pages/be_pages_ecom_dashboard.js), for more examples you can check out http://www.chartjs.org/docs/ -->
                   <!-- <div class="row gutters-tiny">
                        <!-- Orders Earnings Chart -->
                        <!--<div class="col-md-6">
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header">
                                    <h3 class="block-title">
                                        Earnings
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full bg-body-light text-center">
                                    <div class="row gutters-tiny">
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">All</div>
                                            <div class="font-size-h3 font-w600">9,587₽</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Profit</div>
                                            <div class="font-size-h3 font-w600 text-success">8,087₽</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Expenses</div>
                                            <div class="font-size-h3 font-w600 text-danger">1,500₽</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all">
                                        <!-- Earnings Chart Container -->
                                        <!--<canvas class="js-chartjs-ecom-dashboard-earnings"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- END Orders Earnings Chart -->

                        <!-- Orders Volume Chart -->
                        <!--<div class="col-md-6">
                            <div class="block block-rounded block-mode-loading-refresh">
                                <div class="block-header">
                                    <h3 class="block-title">
                                        Volume
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full bg-body-light text-center">
                                    <div class="row gutters-tiny">
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Все</div>
                                            <div class="font-size-h3 font-w600">183</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Завершённые</div>
                                            <div class="font-size-h3 font-w600 text-success">175</div>
                                        </div>
                                        <div class="col-4">
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Отменённые</div>
                                            <div class="font-size-h3 font-w600 text-danger">8</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all">
                                        <!-- Orders Chart Container -->
                                        <!--<canvas class="js-chartjs-ecom-dashboard-orders"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Orders Volume Chart -->
                    <!--</div>
                    <!-- END Orders Overview -->

                    <!-- Latest Orders and Top Products 
                    <div class="row gutters-tiny">
                        <!-- Latest Orders
                        <div class="col-xl-6">
                            <h2 class="content-heading">Последние заказы</h2>
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 100px;">ID</th>
                                                <th>Статус</th>
                                                <!--<th class="d-none d-sm-table-cell">Customer</th>
                                                <th class="text-right">Сумма</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1851</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Ralph Murray</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$815</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1850</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Brian Stevens</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$198</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1849</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Brian Stevens</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$986</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1848</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Adam McCoy</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$899</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1847</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Melissa Rice</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$811</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1846</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Albert Ray</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$244</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1845</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">Canceled</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Wayne Garcia</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$968</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1844</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">Processing</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Jose Wagner</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$706</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1843</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Amanda Powell</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$329</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a class="font-w600" href="order.php">ORD.1842</a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <!--<td class="d-none d-sm-table-cell">
                                                    <a href="be_pages_ecom_customer.html">Melissa Rice</a>
                                                </td>
                                                <td class="text-right">
                                                    <span class="text-black">$261</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Latest Orders -->

                        <!-- Top Products
                        <div class="col-xl-6">
                            <h2 class="content-heading">Топ товаров</h2>
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <table class="table table-borderless table-striped">
                                        <thead>
                                            <tr>
                                                <th class="d-none d-sm-table-cell" style="width: 100px;">ID</th>
                                                <th>Наименование</th>
                                                <th class="text-center">Заказов</th>
                                                <th class="d-none d-sm-table-cell text-center">Рейтинг</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.258</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Dark Souls III</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">912</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.198</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Bioshock Collection</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">895</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.852</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Alien Isolation</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">820</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.741</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Bloodborne</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">793</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.985</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Forza Motorsport 7</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">782</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.056</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Fifa 18</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">776</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.036</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Gears of War 4</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">680</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.682</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Minecraft</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">670</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.478</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Dishonored 2</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">640</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="d-none d-sm-table-cell">
                                                    <a class="font-w600" href="product_edit.php">PID.952</a>
                                                </td>
                                                <td>
                                                    <a href="product_edit.php">Gran Turismo Sport</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="text-gray-dark" href="orders.php">630</a>
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <div class="text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END Top Products -->
                    </div>
                    <!-- END Latest Orders and Top Products -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Разработано <a class="font-w600" href="https://bitweb.tech/" target="_blank">Digital-агентством BitWeb</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://mangobox.ru/" target="_blank">MangoBox</a> &copy; <span class="js-year-copy">2018</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>
		
		<script src="assets/js/script.js"></script>
        

        <!-- Page JS Plugins -->
        <script>
        var myModal = new ModalApp.ModalProcess({ id: 'myModal', title: 'Обновление данных' });
                myModal.init();
        	$("#setting").submit(function(){
        		var fname = $("#side-overlay-profile-name").val();
        		var ffam = $("#side-overlay-profile-fam").val();
        		var femail = $("#side-overlay-profile-email").val();
        		var fcity = $("#side-overlay-profile-city").val();
        		var fadress = $("#side-overlay-profile-adress").val();
        		var fradius = $("#side-overlay-profile-radius").val();
        		var fvk = $("#side-overlay-profile-vk").val();
        		var ftelegram = $("#side-overlay-profile-telegram").val();
        		var finstagram = $("#side-overlay-profile-instagram").val();
        		var fpass = $("#side-overlay-profile-password").val();
        		var fpassconf = $("#side-overlay-profile-password-confirm").val();
				
    			$.ajax({
        			type: 'POST',
        			url: '/lib/importer_update.php',
        			data: "fname="+fname+"&ffam="+ffam+"&femail="+femail+"&fcity="+fcity+"&fadress="+fadress+"&fradius="+fradius+"&fvk="+fvk+"&ftelegram="+ftelegram+"&finstagram="+finstagram+"&fpass="+fpass+"&fpassconf="+fpassconf,
        			success: function (data) 
        			{
                        myModal.changeBody(data);
                        myModal.showModal();
        			}
    			});
    			return false;
			});
            $('#myModal').on('hidden.bs.modal', function() {
                  location.reload();
            });
        </script>
        
        
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_ecom_dashboard.js"></script>
    </body>
</html>