<!-- Plugin scripts -->
<script src="/vendors/bundle.js"></script>

<!-- App scripts -->
<script src="/assets/js/app.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=6LcGzKQZAAAAAPRzMcupnVUz7h5dDPuyc3d0ulQs"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{env('RECAPTCHA_SITEKEY')}}", {action: 'login'}).then(function(token) {
            if(token) {
                document.getElementById('recaptcha_v3').value = token;
            }
        });
    });
</script>



</body>

</html>
