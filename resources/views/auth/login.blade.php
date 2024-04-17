
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="https://invest.digitalafrica.live/asset/theme3/images/icon/icon.png">

    <title>
               
                Login page - DigiPay
    </title>

    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/cookie.css">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/animate.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/slick.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/font-awsome.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/iziToast.min.css">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme1/frontend/css/color.php?primary_color=D77600">
</head>

<body>
            <div id="preloader"></div>
    
    <main id="main" class="main-img">
                <section class="auth-section">
        <div class="auth-wrapper">
            <div class="auth-top-part">
                <a href="" class="auth-logo">
                    <img class="img-fluid rounded sm-device-img text-align" src="logo.PNG"
                        width="100%" alt="pp">
                </a>
                <p class="mb-0"><span class="me-2">Haven&#039;t an account?</span> <a class="btn main-btn btn-sm" href="{{route('register')}}">Register</a></p>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4">Login your account</h3>
                    <form method="POST" action="{{ route('login') }}">@csrf
                        <div class="mb-3">
                            <label for="formGroupExampleInput">Email</label>
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput">Pasword</label>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <p class="text-end"><a href="{{ route('password.request') }}"
                                class="sp_text_dark">Forget password?</a></p>
                                                <button class="btn main-btn w-100 mt-3" type="submit"> Log in </button>
                    </form>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                                            Copyright 2023 DigiPay. all rights reserved.
                                    </p>
            </div>
        </div>
        <div class="auth-thumb-area" style="background-image: url('https://invest.digitalafrica.live/asset/theme3/images/bg/plan.jpg')">
            <div class="auth-thumb">
                <img src="https://invest.digitalafrica.live/asset/theme3/images/frontendlogin/frontend_login_image.jpg" alt="image">
            </div>
        </div>
    </section>
    </main>

    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/jquery.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/slick.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/wow.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/jquery.paroller.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/TweenMax.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/php-email-form/validate.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/main.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/iziToast.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/jquery.uploadPreview.min.js"></script>

        <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='sp_text_danger'>@changeLang('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
    


    
    
    
    

    <script>
        'use strict';
        


        $(document).ready(function() {
            $('#trial_subscribe').on('click', function(e) {

                e.preventDefault();
                var email = $('#trial_email').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: "https://invest.digitalafrica.live/subscribe",
                    data: {
                        email: email
                    },
                    success: function(response) {

                        if (response.fails) {
                            notify('error', response.errorMsg.email)

                        }

                        if (response.success) {
                            $('#email').val('');
                            notify('success', response.successMsg)

                        }
                    }
                });
            })


        });
    </script>


    <script>
        'use strict'
        var url = "https://invest.digitalafrica.live/changeLang";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>


</body>


</html>
