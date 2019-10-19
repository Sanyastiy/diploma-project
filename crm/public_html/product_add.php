
<?
session_start();
if(!$_SESSION['cookie']){
    header('Location: login.php');
    exit;
}
include("lib/bd.php");
$result = mysqli_query($link,"SELECT * FROM Category");
$subresult=mysqli_query($link,"SELECT * FROM Sub_category");
include("lib/procedure.php");

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
                                <h1 class="h2 font-w700 text-white mb-10">Новый товар</h1>
                            </div>1
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
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group row">
                                            <label class="col-12" for="name">Наименование</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control name_g" id="name_product" name="name_product" placeholder="Название товара">
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
                                                    		if(($item['ID']==$cat)&(!$resd))
                                                    		{
                                                            echo "<option selected value='".$item[0]."'>".$item['Name']."</option>";
                                                            $resd=true;
                                                    		}
                                                    		else
                                                    		{
                                                    			echo "<option value='".$item[0]."'>".$item['Name']."</option>";
                                                    		}
                                                    }
                                                	?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="example-select2">Подкатегория</label>
                                            	<div class="col-12">
                                        <select class="js-select2 form-control subcat" id="sub_category" name="example-select22" style="width: 100%;" data-placeholder=<?echo $subcat?>>
                                        	
                                        	</select>
                                            </div>
                                        </div>
                                                
                                        <div class="form-group row desc">
                                            <label class="col-12 desc" for="desc">Описание</label>
                                            <div class="col-12 desc">
                                                <textarea class="form-control desc" id="desc_product" name="desc_product" placeholder="Введите описание" rows="6"></textarea>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-12" for="ecom-product-stock">Размеры В х Ш х Г (в сантиметрах)</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="height" name="height" placeholder="0" value="0"> Х 
                                                    <input type="text" class="form-control" id="width" name="width" placeholder="0" value="0"> Х
                                                    <input type="text" class="form-control" id="depth" name="depth" placeholder="0" value="0">
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="form-group row">
                                            <label class="col-12" for="weigth">Вес</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="weigth" name="weigth" placeholder="0" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 count" for="count">Количество</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-archive"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="count" name="count" placeholder="0" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 price" for="price">Цена</label>
                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-fw fa-rouble"></i>
                                                    </span>
                                                    <input type="text" class="form-control" id="price_product" name="price_product" placeholder="Цена в рублях" value="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-options" id="add_button" style="display: none">
                                            <button type="submit" class="btn btn-lg btn-alt-primary">
                                                <i class="fa fa-save mr-5"></i>Добавить
                                            </button>
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
                                    <!-- DropzoneJS Container -->
                                    <!-- For more info and examples you can check out http://www.dropzonejs.com/#usage -->
                                    <form class="dropzone" id="my-awesome-dropzone" action="lib/upload_photo.php"></form>
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
        <!--<script src="assets/js/plugins/select2/select2.full.min.js"></script>-->
        <script src="assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="assets/js/plugins/dropzonejs/min/dropzone.min.js"></script>
        <script src="assets/js/script.js"></script>
        
        <script>
            var photo_string = '';
            var myModal = new ModalApp.ModalProcess({ id: 'myModal', title: 'Добавление товара' });
            myModal.init();
        	$(document).ready(function() { 
				$("#category").click();
			});
        	$("#product_add").submit(function(){
        		var fname = $("#name_product").val();
        		var fcat = $("#category").val();
        		var fsubcat = $("#sub_category").val();
        		var fdesc = $("#desc_product").val();
        		var fcount = $("#count").val();
        		var fprice = $("#price_product").val();

    			$.ajax({
        			type: 'POST',
        			url: '/lib/add.php',
        			data: "fname="+fname+"&fcat="+fcat+"&fsubcat="+fsubcat+"&fstatus=1"+"&fdesc="+fdesc+"&fcount="+fcount+"&fprice="+fprice+"&photos="+photo_string,
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
                // Init page helpers (CKEditor + BS Maxlength + Select + Tags Inputs plugins)
                Codebase.helpers(['ckeditor', 'maxlength', 'tags-inputs']);
            });

        Dropzone.options.myAwesomeDropzone = {
        	maxFiles: 5,
   	        accept: function(file, done) {
   		       var url=file.name;
   		       $.ajax({
        	       type: 'POST',
        	       url: '/lib/add_photo.php',
        	       data: "ID_GOODS="+'1'+"&PHOTO_URL="+url,
        	       success: function (data) {
                        photo_string = photo_string + data;
                        $('#add_button').show();
        	       }
    	       });
    	   done();
  	     }
        };

    $("#category").click(function(){
        $id = $(this).val();
		$.ajax({
        	type: 'POST',
        	url: '/lib/subcat.php',
        	data: "id_cat="+$id,
        	success: function (data) {
        		document.getElementById('sub_category').innerHTML = data;
        		
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