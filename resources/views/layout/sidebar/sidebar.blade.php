
<div class="navigation">

    <div class="navigation-menu-tab">
        <div>
            <div class="navigation-menu-tab-header" data-toggle="tooltip" title="{{\Illuminate\Support\Facades\Auth::user()->name}}" data-placement="right">
                <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                    <figure class="avatar avatar-sm">
                        <img src="/assets/media/image/user/{{\Illuminate\Support\Facades\Auth::user()->image}}" class="rounded-circle" alt="avatar">
                    </figure>
                </a>
                <div class="dropdown-menu dropdown-menu-left dropdown-menu-big" id="prof">
                    <div class="p-3 text-center" data-backround-image="/assets/media/image/image5.jpg">
                        <figure class="avatar mb-3">
                            <img src="/assets/media/image/user/{{\Illuminate\Support\Facades\Auth::user()->image}}" class="rounded-circle" alt="image">
                        </figure>
                        <h6 class="d-flex align-items-center justify-content-center">
                            <h6 id="username">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                            <a href="{{route('change-user-data')}}" class="btn btn-primary btn-sm ml-2" data-toggle="tooltip" title="ویرایش پروفایل">
                                <i data-feather="edit-2"></i>
                            </a>
                        </h6>
                    </div>
                    <div class="dropdown-menu-body">
                        <div class="list-group list-group-flush">
                            <a href="{{route('change-password')}}" class="list-group-item">تغییر رمز عبور</a>
                            <form action='{{route('logout')}}' method="post">@csrf <button class="list-group-item text-danger">خروج</button></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-grow-1">
            <ul>
                @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $permission)
                    @if($permission->group_name == 'dashboard')
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="داشبرد" data-nav-target="#dashboard" id="dashboard-btn">
                                <i data-feather="bar-chart-2"></i>
                            </a>
                        </li>
                    @endif
                    @break
                @endforeach
                @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $permission)
                    @if($permission->group_name == 'active-sessions')
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="امنیت" data-nav-target="#active-sessions" id="active-sessions-btn">
                                <i data-feather="users"></i>
                            </a>
                        </li>
                        @break
                    @endif
                @endforeach
                @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $permission)
                    @if($permission->group_name == 'admin')
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="مدیریت" data-nav-target="#admin" id="admin-btn">
                                <i data-feather="user"></i>
                            </a>
                        </li>
                        @break
                    @endif
                @endforeach
            </ul>
        </div>

        <div>
            <ul>
                @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $permission)
                    @if($permission->group_name == 'setting')
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="right" title="تنظیمات" data-nav-target="#setting" id="setting-btn">
                                <i data-feather="settings"></i>
                            </a>
                        </li>
                        @break
                    @endif
                @endforeach

                <li>
                    <form action='{{route('logout')}}' method="post">@csrf <button style="background: none; border: none; color: white; width: 100%; height: 100%; margin-top: 25%; margin-bottom: 10% " data-toggle="tooltip" data-placement="right" title="" data-original-title="خروج"><i data-feather="log-out"></i></button></form>
                </li>

            </ul>
        </div>
    </div>

    <!-- begin::navigation menu -->
    <div class="navigation-menu-body">

        <!-- begin::navigation-logo -->
        <div>
            <div id="navigation-logo">
                <a href="{{route('dashboard')}}">
                    <img class="logo" src="/assets/media/image/logo-F.png" alt="logo">
                    <img class="logo-light" src="/assets/media/image/logo-light.png" alt="light logo">
                </a>
            </div>
        </div>
        <!-- end::navigation-logo -->

        <div class="navigation-menu-group">

            <div id="dashboard">
                <ul>
                    <li class="navigation-divider">داشبرد</li>
                    @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $sidebar)
                        @if($sidebar->group_name == 'dashboard' && $sidebar->route_name != null)
                            <li><a href="{{route($sidebar->route_name)}}" id="{{$sidebar->name}}">{{$sidebar->label}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div id="active-sessions">
                <ul>
                    <li class="navigation-divider">نشست های فعال</li>
                @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $sidebar)
                        @if($sidebar->group_name == 'active-sessions' && $sidebar->route_name != null)
                            <li><a href="{{route($sidebar->route_name)}}" id="{{$sidebar->name}}">{{$sidebar->label}}</a></li>
                        @endif
                @endforeach
                </ul>
            </div>

            <div id="admin">
                <ul>
                    <li class="navigation-divider">مدیریت</li>
                    @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $sidebar)
                        @if($sidebar->group_name == 'admin' && $sidebar->route_name != null)
                            <li><a href="{{route($sidebar->route_name)}}" id="{{$sidebar->name}}">{{$sidebar->label}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div id="setting">
                <ul>
                    <li class="navigation-divider">تنظیمات</li>
                    @foreach(GetSidebar(\Illuminate\Support\Facades\Auth::user()->role) as $sidebar)
                        @if($sidebar->group_name == 'setting' && $sidebar->route_name != null)
                            <li><a href="{{route($sidebar->route_name)}}" id="{{$sidebar->name}}">{{$sidebar->label}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>
        <!--ens:navigation menu group-->
    </div>
    <!-- end::navigation menu -->

</div>
