
@include('layout.header_footer.header')

<!-- begin::header -->
<div class="header">

    @include('layout.navbar.navbar')

</div>
<!-- end::header -->

<!-- begin::main -->
<div id="main">

    <!-- begin::navigation -->
    @include('layout.sidebar.sidebar')
    <!-- end::navigation -->

    <!-- begin::main-content -->
    <main class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>پنل مدیریت</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">داشبرد</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">پنل مدیریت</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-body">
                                <h3 class="mb-3">
                                    321
                                    <small>تیکت جدید</small>
                                </h3>
                                <div class="progress mb-2" style="height: 5px">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                         style="width: 100%;"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="font-size-11 m-b-0">
                                    <span class="text-success">+ 1.2%</span> از دیروز
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body">
                                <h3 class="mb-3">
                                    70
                                    <small>تیکت حل شده</small>
                                </h3>
                                <div class="progress mb-2" style="height: 5px">
                                    <div class="progress-bar bg-success" role="progressbar"
                                         style="width: 10%;"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="font-size-11 m-b-0">
                                    <span class="text-danger">- 2.2%</span> از دیروز
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body">
                                <h4 class="mb-3">
                                    125
                                    <small>تیکت در انتظار</small>
                                </h4>
                                <div class="progress mb-2" style="height: 5px">
                                    <div class="progress-bar bg-info" role="progressbar"
                                         style="width: 55%;"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="font-size-11 m-b-0">
                                    <span class="text-success">+ 4.2%</span> از دیروز
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title">وضعیت تیکت</h6>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-light btn-sm dropdown-toggle" href="#" data-toggle="dropdown">1399</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">1398</a>
                                                <a href="#" class="dropdown-item">1397</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <ul class="list-inline">
                                            <li class="list-inline-item text-uppercase font-size-11">
                                                <i class="fa fa-circle text-primary mr-1"></i> تیکت‌های جدید
                                            </li>
                                            <li class="list-inline-item text-uppercase font-size-11">
                                                <i class="fa fa-circle text-success mr-1"></i> تیکت‌های حل شده
                                            </li>
                                            <li class="list-inline-item text-uppercase font-size-11">
                                                <i class="fa fa-circle text-info mr-1"></i> تیکت‌های در انتظار
                                            </li>
                                        </ul>
                                    </div>
                                    <canvas id="chart-ticket-status"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">امتیاز کلی</h6>
                                    <p class="text-muted card-subtitle">اندازه کیفیت یا تلاش تیم پشتیبانی     .</p>
                                    <div class="d-flex align-items-end">
                                        <h1 class="m-r-10 m-b-0">4.2</h1>
                                        <div class="font-size-18">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-muted"></i>
                                        </div>
                                    </div>
                                    <hr class="m-b-0">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <strong class="m-r-20">5.0</strong>
                                                <div class="font-size-14">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">3,230</div>
                                                <div>58%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <strong class="m-r-20">4.0</strong>
                                                <div class="font-size-14">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">2,230</div>
                                                <div>24%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <strong class="m-r-20">3.0</strong>
                                                <div class="font-size-14">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">1,230</div>
                                                <div>10%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <strong class="m-r-20">2.0</strong>
                                                <div class="font-size-14">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">1,230</div>
                                                <div>5%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <strong class="m-r-20">1.0</strong>
                                                <div class="font-size-14">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star text-muted"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">7</div>
                                                <div>2%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">رضایت مشتری</h6>
                                    <h1>
                                        9.8
                                        <small class="text-success">2.1%</small>
                                    </h1>
                                    <p class="text-muted">امتیاز بهره‌وری</p>
                                    <div class="progress" style="height: 10px">
                                        <div class="progress-bar" role="progressbar" style="width: 15%"
                                             aria-valuenow="15"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 30%"
                                             aria-valuenow="30"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                             aria-valuenow="20"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="list-group list-group-flush m-t-10">
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-circle m-r-10 text-primary"></i>
                                                <span>عالی</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">3,230</div>
                                                <div>58%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-circle m-r-10 text-danger"></i>
                                                <span>خیلی خوب</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">3,230</div>
                                                <div>58%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-circle m-r-10 text-warning"></i>
                                                <span>خوب</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">3,230</div>
                                                <div>58%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-circle m-r-10 text-info"></i>
                                                <span>متوسط</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">3,230</div>
                                                <div>58%</div>
                                            </div>
                                        </div>
                                        <div class="list-group-item p-t-b-10 p-l-r-0 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <i class="fa fa-circle m-r-10 text-success"></i>
                                                <span>ضعیف</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-20">3,230</div>
                                                <div>58%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



@include("layout.header_footer.footer")
