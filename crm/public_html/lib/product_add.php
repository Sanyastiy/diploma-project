<?
session_start();
if(!$_SESSION['cookie']){
    header('Location: login.php');
    exit;
}
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
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
        <link rel="stylesheet" href="assets/js/plugins/dropzonejs/min/dropzone.min.css">


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
            <aside id="side-overlay">
                <!-- Side Overlay Scroll Container -->
                <div id="side-overlay-scroll">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow">
                        <div class="content-header-section align-parent">
                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Side Overlay -->

                            <!-- User Info -->
                            <div class="content-header-item">
                                <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar15.jpg" alt="">
                                </a>
                                <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                            </div>
                            <!-- END User Info -->
                        </div>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="content-side">
                        <!-- Search -->
                        <div class="block pull-t pull-r-l">
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <form action="be_pages_generic_search.html" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-secondary px-10">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Search -->

                        <!-- Mini Stats -->
                        <div class="block pull-r-l">
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Клиентов</div>
                                        <div class="font-size-h4">460</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Продаж</div>
                                        <div class="font-size-h4">728</div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Заработано</div>
                                        <div class="font-size-h4">$7,860</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Mini Stats -->
                        <!-- Profile -->
                        <div id="impupd" class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title">
                                    <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Профиль
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <form action="be_pages_dashboard.html" method="post" onsubmit="return false;">
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-name">Имя</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-name" name="side-overlay-profile-name" placeholder="Ваше имя.." value=<?echo $_SESSION['Name']?>>
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-email">Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" placeholder="Ваш email.." value="john.smith@example.com">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password">Новый пароль</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="side-overlay-profile-password" name="side-overlay-profile-password" placeholder="Новый пароль..">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-password-confirm">Подтвердите новый пароль</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="side-overlay-profile-password-confirm" name="side-overlay-profile-password-confirm" placeholder="Подтвердите новый пароль..">
                                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
                                                <i class="fa fa-refresh mr-5"></i> Обновить
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Profile -->
                        <!-- Settings -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title">
                                    <i class="fa fa-fw fa-wrench font-size-default mr-5"></i>Настройки
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row gutters-tiny">
                                    <div class="col-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-status" name="side-overlay-settings-status" value="1" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Online Status</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-public-profile" name="side-overlay-settings-public-profile" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Public Profile</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-notifications" name="side-overlay-settings-notifications" value="1" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Notifications</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-updates" name="side-overlay-settings-updates" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">Auto updates</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-api-access" name="side-overlay-settings-api-access" value="1" checked>
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">API Access</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="side-overlay-settings-limit-requests" name="side-overlay-settings-limit-requests" value="1">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">API Requests</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Settings -->
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
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
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html">J. Smith</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark" href="login.php">
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
                                J. Smith<i class="fa fa-angle-down ml-5"></i>
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
                <div class="bg-image" style="background-image: url('assets/img/photos/photo8@2x.jpg');">
                    <div class="bg-black-op-75">
                        <div class="content content-top content-full text-center">
                            <div class="py-20">
                                <h1 class="h2 font-w700 text-white mb-10">Новый товар</h1>
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
                            <a class="breadcrumb-item" href="products.php">Товары</a>
                            <span class="breadcrumb-item active">Новый товар</span>
                        </nav>
                    </div>
                </div>
                <!-- END Breadcrumb -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Update Product -->
                    <h2 class="content-heading"></h2>
                    <div class="row gutters-tiny">
                        <!-- Basic Info -->
                        <div class="col-md-7">
                            <form id="product_add" method="post">
                                <div class="block block-rounded block-themed">
                                    <div class="block-header bg-gd-primary">
                                        <h3 class="block-title">Основная информация</h3>
                                        <div class="block-options">
                                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Сохранить
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group row">
                                            <label class="col-12">Артикул</label>
                                            <div class="col-12">
                                                <div class="form-control-plaintext">2599</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="ecom-product-name">Наименование</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control name_g" id="ecom-product-name" name="ecom-product-name" placeholder="Название товара">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 cat" for="example-select2">Категория</label>
                                            <div class="col-12">
                                                <!-- Select2 (.js-select2 class is initialized in Codebase() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <select class="js-select2 form-control cat" id="category-product" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <?
                                                include("bd.php");
                                                $result = mysqli_query($link,"SELECT id,name FROM Category");
                                                    foreach($result as $item){
                                                            echo "<option value='".$item[id]."'>".$item[name]."</option>";
                                                    }
                                                ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 cat" for="example-select2">Подкатегория</label>
                                            <div class="col-12">
                                                <!-- Select2 (.js-select2 class is initialized in Codebase() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <?php
                                                switch("category-poduct"){
                                                	case 1:
                                                		{
                                                		<select class="js-select2 form-control subcat" id="sub-category-product" name="sub-example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="1" selected>Video Games</option>
                                                    <option value="2">Electronics</option>
                                                    <option value="3">Mobile Phones</option>
                                                    <option value="4">House</option>
                                                    <option value="5">Hobby</option>
                                                    <option value="6">Auto - Moto</option>
                                                    <option value="7">Kids</option>
                                                    <option value="8">Health</option>
                                                    <option value="9">Fashion</option>
                                                </select>
                                                		}
                                                		
                                                }
                                                ?>
                                                <select class="js-select2 form-control subcat" id="sub-category-product" name="sub-example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                    <option value="1" selected>Video Games</option>
                                                    <option value="2">Electronics</option>
                                                    <option value="3">Mobile Phones</option>
                                                    <option value="4">House</option>
                                                    <option value="5">Hobby</option>
                                                    <option value="6">Auto - Moto</option>
                                                    <option value="7">Kids</option>
                                                    <option value="8">Health</option>
                                                    <option value="9">Fashion</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row desc">
                                            <label class="col-12 desc" for="ecom-product-description-short">Описание</label>
                                            <div class="col-12 desc">
                                                <textarea class="form-control desc" id="ecom-product-description-short" name="ecom-product-description-short" placeholder="Введите описание" rows="6"></textarea>
                                            </div>
                                        </div>
                                       <!-- <div class="form-group row">
                                            <label class="col-12" for="ecom-product-stock">Размеры В х Ш х Г</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ecom-product-stock" name="ecom-product-stock" placeholder="0" value="0"> Х 
                                                    <input type="text" class="form-control" id="ecom-product-stock" name="ecom-product-stock" placeholder="0" value="0"> Х
                                                    <input type="text" class="form-control" id="ecom-product-stock" name="ecom-product-stock" placeholder="0" value="0">
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="form-group row">
                                            <label class="col-12" for="ecom-product-stock">Вес</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="ecom-product-stock" name="ecom-product-stock" placeholder="0" value="0">
                                                </div>
                                            </div>
                                        </div>  -->
                                        <div class="form-group row">
                                            <label class="col-12 count" for="ecom-product-stock">Количество</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-archive"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="ecom-product-stock" name="ecom-product-stock" placeholder="0" value="85">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 price" for="ecom-product-price">Цена</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-rouble"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="ecom-product-price" name="ecom-product-price" placeholder="Цена в рублях" value="69,00">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <!-- END Basic Info -->

                        <!-- More Options -->
                        <div class="col-md-5">
                            <!-- Status -->
                            <form action="product_edit.php" method="post" onsubmit="return false;">
                                <div class="block block-rounded block-themed">
                                    <div class="block-header bg-gd-primary">
                                        <h3 class="block-title">Публикация Вконтакте</h3>
                                        <div class="block-options">
                                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Сохранить
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group row">
                                            <label class="col-12">Опубликовать</label>
                                            <div class="col-12">
                                                <label class="css-control css-control-success css-switch">
                                                    <input type="checkbox" class="css-control-input" id="ecom-product-published" name="ecom-product-published" checked>
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END Status -->
                            <!-- Images -->
                            <div class="block block-rounded block-themed">
                                <div class="block-header bg-gd-primary">
                                    <h3 class="block-title">Изображения</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- Existing Images -->
                                    <div class="row gutters-tiny items-push">
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="options-container">
                                                <img class="img-fluid options-item" src="assets/img/photos/photo8.jpg" alt="">
                                                <div class="options-overlay bg-black-op-75">
                                                    <div class="options-overlay-content">
                                                        <a class="btn btn-sm btn-rounded btn-alt-danger min-width-75" href="javascript:void(0)">
                                                            <i class="fa fa-times"></i> Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4">
                                            <div class="options-container">
                                                <img class="img-fluid options-item" src="assets/img/photos/photo18.jpg" alt="">
                                                <div class="options-overlay bg-black-op-75">
                                                    <div class="options-overlay-content">
                                                        <a class="btn btn-sm btn-rounded btn-alt-danger min-width-75" href="javascript:void(0)">
                                                            <i class="fa fa-times"></i> Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Existing Images -->

                                    <!-- DropzoneJS Container -->
                                    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
                                    <form class="dropzone" id="my-dropzone" action="/lib/upload_photo.php"></form>
                                </div>
                            </div>
                            <!-- END Images -->
                        </div>
                        <!-- END More Options -->
                    </div>
                    <!-- END Update Product -->
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

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
        <script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="assets/js/plugins/select2/select2.full.min.js"></script>
        <script src="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="assets/js/plugins/dropzonejs/min/dropzone.min.js"></script>
        
        <script>
        	$("#product_add").submit(function(){
        		var fname = $("#ecom-product-name").val();
        		var fcat = $("#category-product").val();
        		var fsubcat = $("#sub-category-product").val();
        		var fdesc = $("#ecom-product-description-short").val();
        		var fcount = $("#ecom-product-stock").val();
        		var fprice = $("#ecom-product-price").val();
				
    			$.ajax({
        			type: 'POST',
        			url: '/lib/add.php',
        			data: "fname="+fname+"&fcat="+fcat+"&fsubcat="+fsubcat+"&fdesc="+fdesc+"&fcount="+fcount+"&fprice="+fprice,
        			success: function (data) {
        				pr = data;
        				if(data==0){
        					alert('Товар не добавлен');
        				}
        				if(data==1){
        					alert('Возможно по вашему коду уже зарегистрированы!');
        					//window.location.replace('login.html');
        				}
        				if(data==2){
        					alert('Товар добавлен');
        					//window.location.replace('login.html');
        				}
        			}
    			});
    			return false;
			});

        </script>
        
		<script>
		Dropzone.options.myDropzone = {
    		init: function() {
        		thisDropzone = this;
        		
        		$.get('/lib/upload_photo.php', function(data) {
 
        			$.each(data, function(key,value){
                 
                		var mockFile = { name: value.name, size: value.size };
                 
                		thisDropzone.options.addedfile.call(thisDropzone, mockFile);
 
                		thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "/photo_goods/"+value.name);
                 
            		});
            	 
        		});
		 	}
		};
		</script>

        <!-- Page JS Code -->
        <script>
            jQuery(function () {
                // Init page helpers (CKEditor + BS Maxlength + Select + Tags Inputs plugins)
                Codebase.helpers(['ckeditor', 'maxlength', 'select2', 'tags-inputs']);
            });
            
        </script>
    </body>
</html>