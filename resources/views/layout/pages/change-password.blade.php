@include('.layout.header_footer.login.header')

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

<!-- form -->
    <form method="POST" action="{{route('change-password-post')}}">
        @csrf
        <div class="form-group">
            <input type="password" name="new-password" class="form-control" placeholder="رمزعبور جدید" value="{{old('new-password')}}" autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="repassword" class="form-control" placeholder="تکرار رمزعبور">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="رمزعبور">
        </div>

        <button class="btn btn-primary btn-block" data-action="submit" data-callback="onClick">تایید</button>
        <a class="btn btn-danger btn-block" href="{{route('dashboard')}}">بازگشت</a>
    </form>
    <!-- ./ form -->

</div>

@include('.layout.header_footer.login.footer')
