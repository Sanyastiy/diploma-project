		<?
		$count_order = count_orders($_SESSION['ID_USER']);
		$completed_order = completed_order($_SESSION['ID_USER']);
		$salary = sum_salary($_SESSION['ID_USER']);
		?>
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
                                <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html"><?echo $_SESSION['Name']?></a>
                            </div>
                            <!-- END User Info -->
                        </div>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="content-side">
                        <!-- Search
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
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Заказов</div>
                                        <div class="font-size-h4"><?echo $count_order;?></div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Продаж</div>
                                        <div class="font-size-h4"><?echo $completed_order;?></div>
                                    </div>
                                    <div class="col-4">
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Заработано</div>
                                        <div class="font-size-h4"><?echo $salary;?> ₽</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Mini Stats -->
                        <!-- Profile -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-body-light">
                                <h3 class="block-title">
                                    <i class="fa fa-fw fa-pencil font-size-default mr-5"></i>Профиль
                                </h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                </div>
                            </div>
                            <div class="block-content">
                                <form id="setting" method="post">
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-name">Имя</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-name" name="side-overlay-profile-name" placeholder="Ваше имя.." value=<?echo $_SESSION['Name']?>>
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-fam">Фамилия</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-fam" name="side-overlay-profile-fam" placeholder="Ваша фамилия.." value=<?echo $_SESSION['fam']?>>
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-email">Email</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" id="side-overlay-profile-email" name="side-overlay-profile-email" placeholder="Ваш email.." value=<?echo $_SESSION['email']?>>
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-city">Город</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-city" name="side-overlay-profile-city" placeholder="Ваш город.." value=<?echo $_SESSION['city']?>>
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-adress">Адрес</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-adress" name="side-overlay-profile-adress" placeholder="Ваш адрес.." value='<?echo $_SESSION['adress']?>'>
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-radius">Радиус</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-radius" name="side-overlay-profile-radius" placeholder="Ваш радиус.." value=<?echo $_SESSION['radius']?>>
                                            <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-vk">Вконтакте</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-vk" name="side-overlay-profile-vk" placeholder="Ваш Vk.." value=<?echo $_SESSION['vk']?>>
                                            <span class="input-group-addon"><i class="fa fa-vk"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-telegram">Telegram</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-telegram" name="side-overlay-profile-telegram" placeholder="Ваш Telegram.." value=<?echo $_SESSION['telega']?>>
                                            <span class="input-group-addon"><i class="fa fa-telegram"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="side-overlay-profile-instagram">Instagram</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="side-overlay-profile-instagram" name="side-overlay-profile-instagram" placeholder="Ваш Instagram.." value=<?echo $_SESSION['insta']?>>
                                            <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
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

                        <!-- Settings 
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
                         -->
                    </div>
                    <!-- END Side Content -->
                </div>
                
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->
           