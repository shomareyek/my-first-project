@include("layout.header_footer.header")

<!-- begin::header -->
<div class="header">

    @include('.layout.navbar.navbar')

</div>
<!-- end::header -->

<div id="main">

    <!-- begin::navigation -->
@include('layout.sidebar.sidebar')
<!-- end::navigation -->

    <!-- begin::main content -->
    <div class="main-content">

        <div class="page-header">
            <div class="container-fluid d-sm-flex justify-content-between">
                <h4>اطلاعات کاربری</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">تنظیمات</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">اطلاعات کاربری</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="needs-validation" novalidate method="post" action="{{route('change-user-data-post')}}" enctype="multipart/form-data">
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

                                    <div class="col-md-8">
                                        <label for="file" class="col-md-3 col-form-label">عکس حساب کاربری</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">انتخاب فایل </label>
                                        </div>
                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
						                        <strong>{{ $message }}</strong>
					                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div>
                                        <figure class="avatar avatar-xl">
                                            <img src="/assets/media/image/user/{{\Illuminate\Support\Facades\Auth::user()->image}}" class="rounded-circle" alt="avatar">
                                        </figure>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom02">نام کاربری</label>
                                        <input type="text" class="form-control" id="validationCustom02" placeholder="نام کاربری" value="{{$user->name}}" required name="username">
                                        <div class="invalid-feedback">قسمت نام کاربری الزامی است</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustomUsername">پست الکترونیک</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="validationCustomUsername" placeholder="پست الکترونیک" aria-describedby="inputGroupPrepend" value="{{$user->email}}" required name="email">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            </div>
                                            <div class="invalid-feedback">قسمت نام کاربری الزامی است</div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">شماره تلفن</label>
                                        <input type="text" class="form-control" id="validationCustom04" placeholder="شماره تلفن" value="{{$user->phone}}" name="phone">
                                        <div class="invalid-feedback">قسمت شماره تلفن الزامی است</div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">تایید</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@include("layout.header_footer.footer")
