
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
                            <h6 class="card-title">دسترسی ها</h6>
                            <div class="table-responsive">
                                @if($result != null)
                                    <div class="col-md-6">
                                        <ul class="alert-info" style="margin-bottom: 10px; margin-top: 10px; border-radius: 2px; padding: 3px;">
                                            <li>{{$result}}</li>
                                        </ul>
                                    </div>
                                @endif
                                    @if($errors->all() != null)
                                        <div class="col-md-6">
                                            <ul class="alert alert-danger" style="margin-bottom: 30px">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">آیدی</th>
                                        <th scope="col">نام</th>
                                        <th scope="col">دسترسی ها</th>
                                        <th scope="col">#</th>
                                        <th scope="col">#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td scope="row">{{$role->id}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @foreach($permissionRoles as $permissionRole)
                                                    @if($permissionRole->role_id == $role->id)
                                                        {{$permissionRole->permission_name}} ،
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td><a href="/admin/edit/role/{{$role->id}}" class="btn btn-info">ویرایش</a></td>
                                            <td>
                                                <form action="{{route('delete-role', $role->id)}}" method="POST"> @csrf @method('delete') <button class="btn btn-danger">حذف</button></form>
                                            </td>
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

