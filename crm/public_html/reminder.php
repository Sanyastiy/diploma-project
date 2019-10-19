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
    <body>
        <!-- Page Container -->
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div>
                    <div class="hero-static content content-full bg-white invisible bginv" data-toggle="appear">
                        <!-- Header -->
                        <div class="py-30 px-5 text-center">
                            <a class="font-w700" href="http://mangobox.ru/">
                                <img src="assets/img/logo.png" class="authlogo animated flip">
                            </a>
                            <h1 class="h2 font-w700 mt-50 mb-10">Не волнуйтесь, мы восстановим вам доступ</h1>
                            <h2 class="h4 font-w400 text-muted mb-0">Пожалуйста введите логин или E-mail</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Reminder Form -->
                        <div class="row justify-content-center px-5">
                            <div class="col-sm-8 col-md-6 col-xl-4">
                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-reminder" id="reset" method="post">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="reminder-credential" name="reminder-credential">
                                                <label for="reminder-credential">Логин или E-mail</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="reset" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                                            <i class="fa fa-asterisk mr-10"></i> Напомнить пароль
                                        </button>
                                        <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="login.php">
                                            <i class="si si-login text-muted mr-10"></i> Вход
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Reminder Form -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
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
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/op_auth_reminder.js"></script>
        
        <script>
        	$("#reset").submit(function(){
        		var ftel = $("#reminder-credential").val();
        		var femail = $("#reminder-credential").val();
    			$.ajax({
        			type: 'POST',
        			url: '/lib/resetpass.php',
        			data: "ftel="+ftel+"&femail="+femail,
        			success: function (data) {
        				pr = data;
        				if(data==0){
        					alert('Пароль изменен и отправлен на указанную почту');
        				}
        				if(data==1){
        					alert('Пароль изменен и отправлен на почту, привязанную к указанному номеру телефона');
        					//window.location.replace('login.html');
        				}
        				if(data==2){
        					alert('В Базе Данных нет зарегестрированных пользователей с указанными вами номеру телефона и email');
        					//window.location.replace('login.html');
        				}
        			}
    			});
    			return false;
			});

        </script>
    </body>
</html>