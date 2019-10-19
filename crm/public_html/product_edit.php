<?
session_start();

if(!$_SESSION['cookie']){
    header('Location: login.php');
    exit;
}
$goodid=$_GET['id_g'];
include("lib/bd.php");
$result = mysqli_query($link,"SELECT * FROM Category");
$subresult=mysqli_query($link,"SELECT * FROM Sub_category");
$res = mysqli_query($link,"SELECT * FROM Goods WHERE ID=".$goodid);
$rez=mysqli_fetch_array($res);
$name=$rez['Name'];
$desc=$rez['Description'];
$subcat=$rez['Sub_category'];
$cat=$rez['Category'];
$count=$rez['Count'];
$price=$rez['Price'];
$art = $rez['Article'];
include("lib/procedure.php");

$cat_name = get_category($cat);
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
        <script type="text/javascript" src="/lib/linkedselect.js"></script>
        <!-- END Stylesheets -->
        
    </head>
    <body class="pagesbg">
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o side-scroll page-header-glass page-header-inverse main-content-boxed">
            <!-- Side Overlay-->
            <?include("block/side-overlay.php");?>

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
                <div class="bg-image" style="background-image: url('assets/img/photos/photo8@2x.jpg');">
                    <div class="bg-black-op-75">
                        <div class="content content-top content-full text-center">
                            <div class="py-20">
                                <h1 class="h2 font-w700 text-white mb-10"><?echo $name?></h1>
                                <h2 class="h4 font-w400 text-white-op mb-0">В категории <a class="text-primary-light link-effect"><?echo $cat_name;?></a></h2>
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
                            <span class="breadcrumb-item active"><?echo $name?></span>
                        </nav>
                    </div>
                </div>
                <!-- END Breadcrumb -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Overview -->
                    <h2 class="content-heading">Общая информация</h2>
                    <div class="row gutters-tiny">
                        <!-- In Orders -->
                        <div class="col-md-6 col-xl-4">
                            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-shopping-basket fa-2x text-info-light"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="39">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Заказан</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END In Orders -->

                        <!-- Stock -->
                        <div class="col-md-6 col-xl-4">
                            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-check fa-2x text-success-light"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-success" data-toggle="countTo" data-to="85">0</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Колличество</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Stock -->

                        <!-- Delete Product -->
                        <div class="col-xl-4">
                            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full block-sticky-options">
                                    <div class="block-options">
                                        <div class="block-options-item">
                                            <i class="fa fa-archive fa-2x text-danger-light"></i>
                                        </div>
                                    </div>
                                    <div class="py-20 text-center">
                                        <div class="font-size-h2 font-w700 mb-0 text-danger">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Удалить</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Delete Product -->
                    </div>
                    <!-- END Overview -->

                    <!-- Update Product -->
                    <h2 class="content-heading">Обновить товар</h2>
                    <div class="row gutters-tiny">
                        <!-- Basic Info -->
                        <div class="col-md-7">
                            <form id="product_update" action="product_edit.html" method="post" onsubmit="return false;">
                                <div class="block block-rounded block-themed">
                                    <div class="block-header bg-gd-primary">
                                        <h3 class="block-title">Базовая информация</h3>
                                        <div class="block-options">
                                            <button type="submit" class="btn btn-sm btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Сохранить
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group row">
                                            <label class="col-12" for="idproduct">Артикул</label>
                                            <div class="col-12">
                                                <div class="form-control-plaintext"><?echo $art;?></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="ecom-product-name">Наименование</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="ecom-product-name" name="ecom-product-name" placeholder="Имя товара" value='<?echo $name?>'>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12" for="example-select2" >Категория</label>
                                            <div class="col-12">
                                                <!-- Select2 (.js-select2 class is initialized in Codebase() -> uiHelperSelect2()) -->
                                                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                                                <select class="js-select2 form-control" id="category" name="example-select2" style="width: 100%;" data-placeholder=<?echo $cat?>>
                                                    <?
                                                        $resd=false;
                                                        while($item=mysqli_fetch_array($result))
                                                        {
                                                    	   echo "<option value='".$item[0]."'>".$item['Name']."</option>";
                                                        }
                                                	?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-select2">Подкатегория</label>
                                            <div class="col-12">
                                        <select class="js-select2 form-control" id="sub_category" name="example-select22" style="width: 100%;" data-placeholder=<?echo $subcat?>>
                                        	</select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="Статус">Статус товара</label>
                                            	<div class="col-12">
                                        <select class="js-select2 form-control" id="status" name="status" style="width: 100%;" data-placeholder="Статус">
                                                    <option value="1">Производится</option>";
                                                    <option value="2">Не производится</option>";
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="ecom-product-description-short">Описание</label>
                                            <div class="col-12">
                                                <textarea class="form-control" id="ecom-product-description-short" name="ecom-product-description-short" placeholder="Введите описание" rows="6"><?echo $desc?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="ecom-product-stock">Колличество</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-archive"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="ecom-product-stock" name="ecom-product-stock" placeholder="0" value=<?echo $count?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="ecom-product-price">Цена</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-rouble"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="ecom-product-price" name="ecom-product-price" placeholder="Цена в рублях" value='<?echo $price?>'>
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
                            <!-- Images -->
                            <div class="block block-rounded block-themed">
                                <div class="block-header bg-gd-primary">
                                    <h3 class="block-title">Изображения</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- Existing Images -->
                                    <div class="row gutters-tiny items-push">
                                    	<?
                                    		/*$path = "photo_goods/".$_SESSION[ID_USER]."/".$goodid;
                                    		$entries = scandir($path);
                                    		$filelist = array();
                                    		foreach($entries as $entry){
                                    			if(($entry!=".")&&($entry!="..")){
                                    				$filelist[]=$entry;
                                    			}
                                    		}*/
                                    		$search_photo = mysqli_query($link,"SELECT * FROM photo_goods WHERE url_photo LIKE '%$art%'");

                                    		while($search_photo_m = mysqli_fetch_array($search_photo)){
                                    			$vk_photo = $search_photo_m[2];
                                    			$url_photo = str_replace('../','',$search_photo_m[1]);
                                    			echo "<div class='col-sm-6 col-xl-4'><div class='options-container'>";
                                            	echo "<img class='img-fluid options-item' src='".$url_photo."'  alt=''>";
                                            	echo "<div class='options-overlay bg-black-op-75'>";
                                            	echo "<div class='options-overlay-content'>";
                                            	echo "<a class='btn btn-sm btn-rounded btn-alt-danger min-width-75' id='".$vk_photo."' href='javascript:void(0)'>";
                                            	echo "<i class='fa fa-times'></i> Удалить";
                                            	echo "</a></div></div></div></div>";
                                    		}
                                    		/*foreach($filelist as $photo){
                                    			echo "<div class='col-sm-6 col-xl-4'><div class='options-container'>";
                                            	echo "<img class='img-fluid options-item' src='".$path."/".$photo."' alt=''>";
                                            	echo "<div class='options-overlay bg-black-op-75'>";
                                            	echo "<div class='options-overlay-content'>";
                                            	echo "<a class='btn btn-sm btn-rounded btn-alt-danger min-width-75' href='javascript:void(0)'>";
                                            	echo "<i class='fa fa-times'></i> Удалить";
                                            	echo "</a></div></div></div></div>";
                                    		}*/
                                    	?>
                                        <!--<div class="col-sm-6 col-xl-4">
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
                                        </div>-->
                                    </div>
                                    <!-- END Existing Images -->

                                    <!-- DropzoneJS Container -->
                                    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
                                    <form class="dropzone" action="lib/upload_photo.php"></form>
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
        <script src="assets/js/script.js"></script>
        <script src="assets/js/plugins/ckeditor/ckeditor.js"></script>
        <script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <!--<script src="assets/js/plugins/select2/select2.full.min.js"></script>-->
        <script src="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="assets/js/plugins/dropzonejs/min/dropzone.min.js"></script>
        <!-- Page JS Plugins -->

        <script>
            var myModal = new ModalApp.ModalProcess({ id: 'myModal', title: 'Обновление товара' });
            myModal.init();
            $(document).ready(function() { 
                $('#category option[value="<?echo $cat?>"]').prop('selected', true);
                $("#category").click();

                
            }); 

        	$("#product_update").submit(function(){
        		var fid = <?echo $goodid;?>;
        		var fname = $("#ecom-product-name").val();
        		var fcat = $("#category").val();//category
        		var fsubcat = $("#sub_category").val();//sub_catategory
        		var fstatus = $("#status").val();//sub_catategory
        		var fdesc = $("#ecom-product-description-short").val();
        		var fcount = $("#ecom-product-stock").val();
        		var fprice = $("#ecom-product-price").val();

    			$.ajax({
        			type: 'POST',
        			url: '/lib/update.php',
        			data: "fid="+fid+"&fname="+fname+"&fcat="+fcat+"&fsubcat="+fsubcat+"&fstatus="+fstatus+"&fdesc="+fdesc+"&fcount="+fcount+"&fprice="+fprice,
        			success: function (data) {
                        myModal.changeBody(data);
                        myModal.showModal();
        			}
    			});
    			return false;
			});

            $('#myModal').on('hidden.bs.modal', function() {
                  location.reload();
            });

            jQuery(function () {
                Codebase.helpers(['ckeditor', 'maxlength', 'select2', 'tags-inputs']);
            });
            
            $("#category").click(function(){
            	$id = $(this).val();
				$.ajax({
        			type: 'POST',
        			url: '/lib/subcat.php',
        			data: "id_cat="+$id,
        			success: function (data) {
        				document.getElementById('sub_category').innerHTML = data;
                        $('#sub_category option[value="<?echo $subcat?>"]').prop('selected', true);
        			}
    			});
			});
			
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