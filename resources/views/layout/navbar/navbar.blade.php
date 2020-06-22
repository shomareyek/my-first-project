<div>
    <ul class="navbar-nav">

        <!-- begin::navigation-toggler -->
        <li class="nav-item navigation-toggler">
            <a href="#" class="nav-link" title="Hide navigation">
                <i data-feather="arrow-left"></i>
            </a>
        </li>
        <li class="nav-item navigation-toggler mobile-toggler">
            <a href="#" class="nav-link" title="Show navigation">
                <i data-feather="menu"></i>
            </a>
        </li>
        <!-- end::navigation-toggler -->
    </ul>
</div>

<div>
    <ul class="navbar-nav">

        <!-- begin::header search -->
        <li class="nav-item">
            <a href="#" class="nav-link" title="جست‌و‌جو" data-toggle="dropdown">
                <i data-feather="search"></i>
            </a>
            <div class="dropdown-menu p-2 dropdown-menu-right">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="جستجو">
                        <div class="input-group-prepend">
                            <button class="btn" type="button">
                                <i data-feather="search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- end::header search -->

        <!-- begin::header minimize/maximize -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" title="تمام صفحه" data-toggle="fullscreen">
                <i class="maximize" data-feather="maximize"></i>
                <i class="minimize" data-feather="minimize"></i>
            </a>
        </li>
        <!-- end::header minimize/maximize -->

        <!-- begin::header notification dropdown -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link nav-link-notify" title="اطلاعیه‌ها" data-toggle="dropdown">
                <i data-feather="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-left dropdown-menu-big">
                <div class="p-4 text-center d-flex justify-content-between"
                     data-backround-image="assets/media/image/image1.jpg">
                    <h6 class="mb-0">اطلاعیه‌ها</h6>
                    <small class="font-size-11 opacity-7">1 اطلاعیه خوانده نشده</small>
                </div>
                <div>
                    <ul class="list-group list-group-flush">
                        <li>
                            <a href="#" class="list-group-item d-flex hide-show-toggler">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-success-bright text-success rounded-circle">
                                                    <i class="ti-user"></i>
                                                </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                        ثبت نام خریدار جدید
                                        <i title="Mark as read" data-toggle="tooltip"
                                           class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                    </p>
                                    <span class="text-muted small">20 دقیقه قبل</span>
                                </div>
                            </a>
                        </li>
                        <li class="text-divider small pb-2 pl-3 pt-3">
                            <span>اطلاعیه‌های قبلی</span>
                        </li>
                        <li>
                            <a href="#" class="list-group-item d-flex hide-show-toggler">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                    <i class="ti-package"></i>
                                                </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                        سفارش جدید دریافت شد
                                        <i title="Mark as unread" data-toggle="tooltip"
                                           class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                    </p>
                                    <span class="text-muted small">45 ثانیه قبل</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="list-group-item d-flex align-items-center hide-show-toggler">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-danger-bright text-danger rounded-circle">
                                                    <i class="ti-server"></i>
                                                </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                        به سقف مجاز سرور نزدیک شده اید
                                        <i title="Mark as unread" data-toggle="tooltip"
                                           class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                    </p>
                                    <span class="text-muted small">55 ثانیه قبل</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="list-group-item d-flex align-items-center hide-show-toggler">
                                <div>
                                    <figure class="avatar avatar-sm m-r-15">
                                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                    <i class="ti-layers"></i>
                                                </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0 line-height-20 d-flex justify-content-between">
                                        اپ های دارای بروزسانی
                                        <i title="Mark as unread" data-toggle="tooltip"
                                           class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                    </p>
                                    <span class="text-muted small">دیروز</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="p-2 text-right">
                    <ul class="list-inline small">
                        <li class="list-inline-item">
                            <a href="#">علامتگذاری به عنوان خوانده شده</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- end::header notification dropdown -->

        <!-- begin::user menu -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" title="User menu" data-toggle="dropdown">
                <i data-feather="settings"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-left dropdown-menu-big">
                <div class="p-4 text-center d-flex justify-content-between"
                     data-backround-image="assets/media/image/image1.jpg">
                    <h6 class="mb-0">تنظیمات</h6>
                </div>
                <div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                <label class="custom-control-label" for="customSwitch1">مجوز ارسال اطلاعیه</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                <label class="custom-control-label" for="customSwitch2">پنهان کردن درخواست ها</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                <label class="custom-control-label" for="customSwitch3">افزایش سرعت انجام دستورات</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                <label class="custom-control-label" for="customSwitch4">پنهان کردن منو</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                <label class="custom-control-label" for="customSwitch5">به خاطرسپاری بازدید</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch6">
                                <label class="custom-control-label" for="customSwitch6">فعالسازی تولید گزارش خودکار</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
        <!-- end::user menu -->
    </ul>

    <!-- begin::mobile header toggler -->
    <ul class="navbar-nav d-flex align-items-center">
        <li class="nav-item header-toggler">
            <a href="#" class="nav-link">
                <i data-feather="arrow-down"></i>
            </a>
        </li>
    </ul>
    <!-- end::mobile header toggler -->
</div>
