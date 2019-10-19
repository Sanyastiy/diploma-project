<?
session_start();
if(!$_SESSION['cookie']){
    header('Location: login.php');
    exit;
}
include("lib/procedure.php");
$count_g = count_orders($_SESSION['ID_USER']);
$cancel = canceled_goods($_SESSION['ID_USER']);
$pay_count = pay_goods($_SESSION['ID_USER']);
$completed =  completed_order($_SESSION['ID_USER']);
?>

<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
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

            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
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
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html"><?echo $_SESSION['Name']?></a>
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
                                <a class="dropdown-item" href="login.html">
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
                                <h1 class="h2 font-w700 text-white mb-10">Заказы</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Breadcrumb -->
                <div class="bg-body-light border-b">
                    <div class="content py-5 text-center">
                        <nav class="breadcrumb bg-body-light mb-0">
                            <a class="breadcrumb-item" href="main.php">Панель управления</a>
                            <span class="breadcrumb-item active">Заказы</span>
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
                        <!--<div class="dropdown float-right">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-orders-stats-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Сегодня
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-orders-stats-drop">
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
                        </div>-->
                        Статистика
                    </div>
                    <div class="row gutters-tiny">
                        <!-- Pending -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-sun" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-spinner fa-spin text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" >4</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Оплата</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Pending -->

                        <!-- Canceled -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-cherry" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-times text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?echo $cancel?>">2</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Отменённые</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Canceled -->

                        <!-- Completed -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-lake" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-check text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?echo $completed?>">8</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Завершённые</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Completed -->

                        <!-- All -->
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-rounded block-transparent bg-gd-duske" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-archive text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?echo $count_g?>">15</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-white-op">Все</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END All -->
                    </div>
                    <!-- END Statistics -->

                    <!-- Orders -->
                    <div class="content-heading">
                        <!--<div class="dropdown float-right">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-orders-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Сегодня
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-orders-drop">
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
                        </div>-->
                        <!--<div class="dropdown float-right mr-5">
                            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-orders-filter-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Все
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ecom-orders-filter-drop">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-spinner fa-spin text-warning mr-5"></i>Оплата
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-refresh fa-spin text-info mr-5"></i>Активные
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-times text-danger mr-5"></i>Отменённые
                                </a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-check text-success mr-5"></i>Завершённые
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item active" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-circle-o mr-5"></i>Все
                                </a>
                            </div>
                        </div>-->
                        Orders (<?echo $count_order;?>)
                    </div>
                    <div class="block block-rounded">
                        <div class="block-content bg-body-light">
                            <!-- Search -->
                            <form action="orders.html" method="post" onsubmit="return false;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search orders..">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-secondary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END Search -->
                        </div>
                        <div class="block-content">
                            <!-- Orders Table -->
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;">ID</th>
                                        <th>Статус</th>
                                        <th class="d-none d-sm-table-cell">Дата</th>
                                        <th class="d-none d-sm-table-cell">Товары</th>
                                        <th class="d-none d-sm-table-cell"></th>
                                        <th class="text-right">Сумма</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1851</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/27                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">6</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$222</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600" >ORD.1850</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/26                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$745</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600" >ORD.1849</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/25                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">3</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$984</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600" >ORD.1848</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">Активен</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/24                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$802</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1847</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/23                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">1</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$753</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1846</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">Оплата</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/22                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">5</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$549</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1845</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/21                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">4</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$524</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1844</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/20                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">2</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$377</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1843</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/19                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">9</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$700</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1842</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Завершён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/18                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">8</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$647</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1841</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger">Отменён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/17                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$870</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1840</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">Оплата</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/16                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$569</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1839</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">Оплата</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/15                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$482</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1838</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-danger">Отменён</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/14                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">3</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$673</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font-w600">ORD.1837</a>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">Оплата</span>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            2017/10/13                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="javascript:void(0)">7</a>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <a href="be_pages_ecom_customer.php"></a>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-black">$420</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- END Orders Table -->

                            <!-- Navigation -->
                            <nav aria-label="Orders navigation">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <i class="fa fa-angle-left"></i>
                                            </span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="javascript:void(0)">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">2</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript:void(0)">...</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">8</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)">9</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                            <span aria-hidden="true">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- END Navigation -->
                        </div>
                    </div>
                    <!-- END Orders -->
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
    </body>
</html>