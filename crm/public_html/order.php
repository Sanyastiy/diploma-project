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
                                    <a class="font-w700" href="main.html">
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
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.php"><?echo $_SESSION['name']?></a>
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
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?echo $_SESSION['name']?><i class="fa fa-angle-down ml-5"></i>
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
                        <form action="be_pages_generic_search.php" method="post">
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
                                <h1 class="h2 font-w700 text-white mb-10">ORD.1185</h1>
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
                            <a class="breadcrumb-item" href="orders.php">Заказы</a>
                            <span class="breadcrumb-item active">ORD.1185</span>
                        </nav>
                    </div>
                </div>
                <!-- END Breadcrumb -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Progress -->
                    <h2 class="content-heading">
                        <button type="button" class="btn btn-sm btn-secondary float-right">
                            <i class="fa fa-check text-success mr-5"></i>Завершить
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary float-right mr-5">
                            <i class="fa fa-times text-danger mr-5"></i>Отменить
                        </button>
                        Прогресс
                    </h2>
                    <div class="row gutters-tiny">
                        <!-- Submitted -->
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-check fa-3x text-success"></i>
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-success">1. Подтверждён</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Submitted -->

                        <!-- Payment -->
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-check fa-3x text-success"></i>
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-success">2. Оплачен</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Payment -->

                        <!-- Packaging -->
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-spinner fa-3x fa-spin text-warning"></i>
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-warning">3. Упаковка</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Packaging -->

                        <!-- Completed -->
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-times fa-3x text-muted"></i>
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">4. Завершён</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Completed -->
                    </div>
                    <!-- END Progress -->

                    <!-- Products -->
                    <h2 class="content-heading">Продукты (5)</h2>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">ID</th>
                                            <th>Наименование</th>
                                            <th class="text-center">На складе</th>
                                            <th class="text-center">Колличество</th>
                                            <th class="text-right" style="width: 10%;">Цена/шт.</th>
                                            <th class="text-right" style="width: 10%;">Цена</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a class="font-w600" href="product_edit.php">PID.258</a>
                                            </td>
                                            <td>
                                                <a href="product_edit.php">Dark Souls III</a>
                                            </td>
                                            <td class="text-center">92</td>
                                            <td class="text-center font-w600">1</td>
                                            <td class="text-right">$69,00</td>
                                            <td class="text-right">$69,00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="font-w600" href="product_edit.php">PID.263</a>
                                            </td>
                                            <td>
                                                <a href="product_edit.php">Bloodborne</a>
                                            </td>
                                            <td class="text-center">32</td>
                                            <td class="text-center font-w600">1</td>
                                            <td class="text-right">$29,00</td>
                                            <td class="text-right">$29,00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="font-w600" href="product_edit.php">PID.214</a>
                                            </td>
                                            <td>
                                                <a href="product_edit.php">The Surge</a>
                                            </td>
                                            <td class="text-center">15</td>
                                            <td class="text-center font-w600">1</td>
                                            <td class="text-right">$59,00</td>
                                            <td class="text-right">$59,00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="font-w600" href="product_edit.php">PID.358</a>
                                            </td>
                                            <td>
                                                <a href="product_edit.php">Bioshock Collection</a>
                                            </td>
                                            <td class="text-center">77</td>
                                            <td class="text-center font-w600">1</td>
                                            <td class="text-right">$39,00</td>
                                            <td class="text-right">$39,00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="font-w600" href="product_edit.php">PID.425</a>
                                            </td>
                                            <td>
                                                <a href="product_edit.php">Until Dawn</a>
                                            </td>
                                            <td class="text-center">25</td>
                                            <td class="text-center font-w600">1</td>
                                            <td class="text-right">$49,00</td>
                                            <td class="text-right">$49,00</td>
                                        </tr>
                                        <tr class="table-success">
                                            <td colspan="5" class="text-right font-w600 text-uppercase">Итого:</td>
                                            <td class="text-right font-w600">$245,00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Products -->
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