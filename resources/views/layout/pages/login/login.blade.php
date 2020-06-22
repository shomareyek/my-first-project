
@include("layout.header_footer.login.header")

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="/assets/media/image/logo-F.png" alt="image">
        <img class="logo-dark" src="/assets/media/image/logo-dark.html" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>ورود</h5>

    @if($errors->all() != null)
        <ul class="alert alert-danger" style="margin-bottom: 30px">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    @if(session('change-pass') != null)
        <ul class="alert alert-info" style="margin-bottom: 30px">
                <li>{{session('change-pass')}}</li>
        </ul>
    @endif

    <!-- form -->
    <form method="POST" action="{{route('login-post')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="پست الکترونیک" value="{{old('email')}}" autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="رمزعبور">
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="{{route('recovery-way')}}">بازگردانی رمزعبور</a>
        </div>

        <button class="btn btn-primary btn-block g-recaptcha" data-action="submit" data-callback="onClick">ورود</button>
        <input type="hidden" name="recaptcha_v3" id="recaptcha_v3">
    </form>
    <!-- ./ form -->

</div>

@include("layout.header_footer.login.footer")
