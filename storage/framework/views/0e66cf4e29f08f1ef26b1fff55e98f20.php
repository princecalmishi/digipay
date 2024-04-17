
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="ep5pqrgXKF61j0KUK7NgRdnmS9gg6oB5m5hpBny8">

    <link rel="shortcut icon" type="image/png" href="https://invest.digitalafrica.live/asset/theme3/images/icon/icon.png">

    <title>
                    Digital invest-
                Register user
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
            
    <section class="auth-section auth-section-two">
        <div class="auth-wrapper">
            <div class="auth-top-part">
                <a href="" class="auth-logo">
                    <img class="img-fluid rounded sm-device-img text-align" src="logo.PNG" width="100%" alt="pp">
                </a>
                <p class="mb-0"><span class="me-2">Already registered?</span> <a class="btn main-btn btn-sm" href="<?php echo e(route('login')); ?>">Login</a></p>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4">Create an account</h3>
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                      <?php echo csrf_field(); ?>
                      <div class="row gy-3">
                            <div class="col-lg-12">
                                                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput">Full name</label>
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                                   </div>
                            <!-- <div class="col-md-6">
                                <label for="formGroupExampleInput">Last name</label>
                                <input type="text" class="form-control" name="lname" value="" id="last_name" placeholder="Last name">
                            </div> -->
                            <div class="col-md-6">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="" id="phone" placeholder="Phone">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>    
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput">Referred By: </label>
                                <?php if(isset($_GET['refered_by'])): ?>
                              <input readonly type="text" readonly id="refered_by" name="refered_by" class="form-control" value="<?php echo e($_GET['refered_by']); ?>">
                              <?php elseif(!isset($_GET['refered_by'])): ?>
                              <input readonly type="text" class="form-control" name="refered_by" value="Null" id="refered_by" placeholder="refered_by">
                              <?php endif; ?>
                            </div>

                            <div class="col-md-12">
                                <label for="formGroupExampleInput">Email</label>
                                <label for="inputEmail4">Email</label>
                              <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($message); ?></strong>
                                      </span>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                            
                                </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput">Pasword</label>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($message); ?></strong>
                                      </span>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                               
                                 </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput"> Confirm pasword</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="col-md-6">
                                                            </div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="check" id="exampleCheck1" required>
                                    <label class="form-check-label" for="exampleCheck1">I agree to the <a href="#"  class="color-change">Privacy policy</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn main-btn w-100" type="submit"> Register </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                                            Copyright 2023 digital invest. all rights reserved.
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
                    "<span class='sp_text_danger'>{{__('Captcha field is required.')</span>";
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
<?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/auth/register.blade.php ENDPATH**/ ?>