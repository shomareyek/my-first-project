
@include("layout.header_footer.recovery.header")

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="/assets/media/image/logo-F.png" alt="image">
        <img class="logo-dark" src="/assets/media/image/logo-dark.html" alt="image2">
    </div>
    <!-- ./ logo -->

    <h5>بازیابی رمز عبور</h5>

    @if($errors->all() != null)
        <ul class="alert alert-danger" style="margin-bottom: 30px">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
@endif

<!-- form -->
    <form method="POST" action="{{route('recovery-phone-post')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="phone-num" class="form-control" placeholder="شماره تلفن" value="{{old('phone-num')}}" maxlength="11">
        </div>

        <button class="btn btn-primary btn-block">تایید</button>
    </form>
    <!-- ./ form -->

</div>

@include("layout.header_footer.recovery.footer")
