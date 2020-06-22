@include('layout.header_footer.recovery.header')

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="/assets/media/image/logo-F.png" alt="image">
        <img class="logo-dark" src="/assets/media/image/logo-dark.html" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>یکی از روش های زیر را انتخاب کنید</h5>

    <!-- form -->
    <form>
        <a href="{{route('recovery-phone')}}" class="btn btn-sm btn-outline-light mr-1"><h6>بازیابی با شماره تلفن</h6></a>
        <br>
        <br>
        <h6>یا</h6>
        <br>
        <a href="{{route('recovery-email')}}" class="btn btn-sm btn-outline-light ml-1"><h6>بازیابی با پست الکترونیک</h6></a>
        <br>
        <br>
            <a href="{{route('login')}}" class="btn btn-danger">بازگشت</a>
    </form>
    <!-- ./ form -->

</div>

@include('layout.header_footer.recovery.footer')
