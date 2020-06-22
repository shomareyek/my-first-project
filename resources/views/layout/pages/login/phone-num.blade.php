@include("layout.header_footer.login.header")

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="/assets/media/image/logo-F.png" alt="image">
        <img class="logo-dark" src="/assets/media/image/logo-dark.html" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>تایید دومرحله ای</h5>
    @if($errors->all() != null)
        <ul class="alert alert-danger" style="margin-bottom: 30px">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <!-- form -->
    <form method="POST" action="{{route('phone-num-post')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="phone-num" class="form-control" placeholder="شماره تلفن" value="{{old('phone')}}" autofocus maxlength="11">
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">مرا به خاطر بسپار</label>
            </div>
        </div>
        <button class="btn btn-primary btn-block">تایید</button>
    </form>
    <!-- ./ form -->

</div>

@include("layout.header_footer.login.footer")
