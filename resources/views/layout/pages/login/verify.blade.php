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

<!-- form -->
    <form method="POST" action="{{route('verify-post')}}">
        @csrf
        <div class="form-group">
            <input type="text" name="code" class="form-control" placeholder="کد تایید" autofocus style="text-align: center" minlength="6" maxlength="6">
        </div>
        <div class="form-group d-flex justify-content-between">
            <a href="/resend" id="resend">ارسال مجدد کد</a>
            <p id="time">زمان باقی مانده:</p>
            <p id="time2"><span id="min">1</span>:<span id="sec">00</span></p>

        </div>
        <button class="btn btn-primary btn-block">ورود</button>
    </form>
    <!-- ./ form -->

</div>

<script>

    var count = 60;
    function settime() {
        count--;
        console.log(count);
        if(count == 59){
            document.getElementById('min').innerHTML = '00';
        }

        document.getElementById('sec').innerHTML = count.toString();

        if(count == 0){
            clearInterval(myInterval);
            document.getElementById('time').style.opacity = "0";
            document.getElementById('time2').style.opacity = "0";
            document.getElementById('resend').style.opacity = "1";
        }
    }
    const myInterval = setInterval( settime , 1000);
</script>

@include("layout.header_footer.login.footer")
