
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
                <h4>ویرایش دسترسی</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">مدیریت</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ویرایش دسترسی</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="needs-validation" method="post" action="{{route('edit-role-post', $role->id)}}">
                                @csrf
                                @if($errors->all() != null)
                                    <div class="col-md-6">
                                        <ul class="alert-danger" style="margin-bottom: 10px; margin-top: 10px; border-radius: 2px; padding: 3px;">
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if($result != null)
                                    <div class="col-md-6">
                                        <ul class="alert-info" style="margin-bottom: 10px; margin-top: 10px; border-radius: 2px; padding: 3px;">
                                            <li>{{$result}}</li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">نام کاربری</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="نام دسترسی" required name="role-name" value="{{$role->name}}">
                                        <div class="invalid-feedback">قسمت نام کاربری الزامی است</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">دسترسی ها</label>
                                        <select class="select2-example" multiple name="roles[]">
                                            @foreach($groups as $group)
                                                <optgroup label="{{$group}}">
                                                    @foreach($permissionRoles as $permissionRole)
                                                        @if($permissionRole->group === $group)
                                                            <option value="{{$permissionRole->id}}" selected>{{$permissionRole->label}}</option>
                                                        @endif
                                                    @endforeach
                                                    @if($diffs != null)
                                                        @foreach($diffs as $diff)
                                                           @if($diff->group === $group)
                                                               <option value="{{$diff->id}}">{{$diff->label}}</option>
                                                           @endif
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <button class="btn btn-primary" type="submit">تایید</button>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{route('roles')}}" class="btn btn-danger">بازگشت</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>



@include(".layout.header_footer.footer")
