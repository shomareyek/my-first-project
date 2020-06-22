
@include('.layout.header_footer.header')

<!-- begin::header -->
<div class="header">

    @include('.layout.navbar.navbar')

</div>
<!-- end::header -->

<!-- begin::main -->
<div id="main">

    <!-- begin::navigation -->
@include('.layout.sidebar.sidebar')
<!-- end::navigation -->

    <!-- begin::main-content -->
    <main class="main-content">

        <!-- begin::page-header -->
        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>لیست کاربران</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">مدیریت</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لیست کاربران</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">نشست های فعال</h6>
                            <div class="table-responsive">
                                @if($result != null)
                                    <div class="col-md-6">
                                        <ul class="alert-info" style="margin-bottom: 10px; margin-top: 10px; border-radius: 2px; padding: 3px;">
                                            <li>{{$result}}</li>
                                        </ul>
                                    </div>
                                @endif
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">آیدی</th>
                                        <th scope="col">عکس</th>
                                        <th scope="col">نام</th>
                                        <th scope="col">پست الکترونیک</th>
                                        <th scope="col">شماره تلفن</th>
                                        <th scope="col">نوع حساب</th>
                                        <th scope="col">#</th>
                                    </tr>
                                    </thead>
                                        @csrf
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td scope="row">{{$user->id}}</td>
                                                    <td>
                                                        <figure class="avatar"><img src="/assets/media/image/user/{{$user->image}}" class="rounded-circle" alt="avatar"></figure>
                                                    </td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>{{$user->role}}</td>
                                                    <td><a href="/admin/edit/user/{{$user->id}}" class="btn btn-info">ویرایش</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



@include(".layout.header_footer.footer")

