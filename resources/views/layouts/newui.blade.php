
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="9ViQcIgE4bNedRgF5EkXhZhuwXtJkAzTBFqH2Kxi">
    <link rel="shortcut icon" type="image/png" href="https://invest.digitalafrica.live/asset/theme3/images/icon/icon.png">
    <title>
           DigiPay - Dashboard
    </title>

    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/selectric.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/animate.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/font-awsome.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/theme3/frontend/css/iziToast.min.css">
    <link href="https://invest.digitalafrica.live/asset/theme3/frontend/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .modal-backdrop.fade.show {
                display: none;
            }

            @media (max-width: 991px) {
                #header.header-inner-pages {
                    display: block;
                    background: transparent !important;
                    position: absolute;
                }

                .dashboard-body-part {
                    padding-top: 80px;
                    position: relative;
                    z-index: 1;
                }

                .dashboard-body-part::before {
                    position: absolute;
                    content: '';
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 160px;
                    background: linear-gradient(to top, #2f5b88, #153352);
                    z-index: -1;
                }
            }

            .sp-referral .single-child {
                padding: 6px 10px;
                border-radius: 5px;
            }

            .sp-referral .single-child+.single-child {
                margin-top: 15px;
            }

            .sp-referral .single-child p {
                display: flex;
                align-items: center;
                margin-bottom: 0;
            }

            .sp-referral .single-child p img {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                object-fit: cover;
                -o-object-fit: cover;
            }

            .sp-referral .single-child p span {
                width: calc(100% - 35px);
                font-size: 14px;
                padding-left: 10px;
            }

            .sp-referral>.single-child.root-child>p img {
                border: 2px solid #c3c3c3;
            }

            .sub-child-list {
                position: relative;
                padding-left: 35px;
            }

            .sub-child-list::before {
                position: absolute;
                content: '';
                top: 0;
                left: 17px;
                width: 1px;
                height: 100%;
                background-color: #a1a1a1;
            }

            .sub-child-list>.single-child {
                position: relative;
            }

            .sub-child-list>.single-child::before {
                position: absolute;
                content: '';
                left: -18px;
                top: 21px;
                width: 30px;
                height: 5px;
                border-left: 1px solid #a1a1a1;
                border-bottom: 1px solid #a1a1a1;
                border-radius: 0 0 0 5px;
            }

            .sub-child-list>.single-child>p img {
                border: 2px solid #c3c3c3;
            }
        </style>
    
</head>

<body>
            <div id="preloader"></div>
    
    
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="d-flex flex-wrap align-items-center">
                <div class="logo me-auto me-lg-0 ">
                    <a href="{{route('admin/dashboard')}}">
                                                    <img class="img-fluid rounded sm-device-img text-align"
                                src="logo.PNG" width="100%" alt="pp">
                                            </a>
                </div>
            </div>
            <div class="header-right d-flex">
                
                <div class="dropdown ms-3">
                    <button class="dropdown-toggle user-toggle-menu" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="newui/user.png" alt="pp">
                                                <span class="ms-2">{{Auth()->user()->name}}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/2fa">2fa</a></li>
                        <li><a class="dropdown-item" href="/profile/setting">Settings</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header><!-- End Header -->

    <main id="main" class="dashboard-main">
        <section class="dashboard-section">

            <div class="d-sidebar">
    <ul class="d-sidebar-menu">
      <li class="{{ (request()->is('home')) ? 'active' : '' }}">
        <a href="{{route('home')}}"><i data-feather="home"></i> Dashboard</a>
      </li>

    

      <li class="has_submenu {{ (request()->is('investment')) ? 'active' : '' }}">
        <a href="#0"><i data-feather="zap"></i> Investment</a>
        <ul class="submenu">
          <li class="{{ (request()->is('investment')) ? 'active' : '' }}">
            <a href="{{route('investment')}}"><i data-feather="chevrons-right"></i></i> Investment plans</a>
          </li>
          <li class="">
            <a href="{{route('investment')}}"><i data-feather="chevrons-right"></i> Invest log</a>
          </li>
        </ul> 
      </li>

      <li class="has_submenu {{ (request()->is('budget0')) ? 'active' : '' }}">
        <a href="#0"><i data-feather="award"></i> Budgets</a>
        <ul class="submenu">
          <li class="">
            <a href="{{route('budget0')}}"><i data-feather="chevrons-right"></i></i> This Week</a>
          </li>
          <li class="">
            <a href="{{route('budget1')}}"><i data-feather="chevrons-right"></i> This Month</a>
          </li>
          <li class="">
            <a href="{{route('budget2')}}"><i data-feather="chevrons-right"></i> This Year</a>
          </li>
        </ul> 
      </li>


      <li class="has_submenu {{ (request()->is('deposit')) ? 'active' : '' }}">
        <a href="#0"><i data-feather="briefcase"></i> Transact</a>
        <ul class="submenu">
          <li class="">
            <a href="{{route('deposit')}}"><i data-feather="chevrons-right"></i> Deposit to Digipay</a>
          </li>
          <!-- <li class="">
            <a href="{{route('digipay')}}"><i data-feather="chevrons-right"></i> Another DigiPay Account</a>
          </li> -->
          <!-- <li class="">
            <a href="{{route('mobile')}}"><i data-feather="chevrons-right"></i> Mobile wallet</a>
          </li> -->
          <li class="{{ (request()->is('banking')) ? 'active' : '' }}">
            <a href="{{route('banking')}}"><i data-feather="chevrons-right"></i> Another Bank</a>
          </li>
          <li class="{{ (request()->is('paybill')) ? 'active' : '' }}">
            <a href="{{route('paybill')}}"><i data-feather="chevrons-right"></i> Pay Bill</a>
          </li>
          <li class="{{ (request()->is('buygoods')) ? 'active' : '' }}">
            <a href="{{route('buygoods')}}"><i data-feather="chevrons-right"></i> Buy Goods</a>
          </li>
         
        </ul>
      </li>

      <li class="has_submenu {{ (request()->is('mobile')) ? 'active' : '' }}">
        <a href="#0"><i data-feather="credit-card"></i> Withdraw</a>
        <ul class="submenu">
          <li class="{{ (request()->is('mobile')) ? 'active' : '' }}">
            <a href="{{route('mobile')}}"><i data-feather="chevrons-right"></i> Withdraw</a>
          </li>
          <li class="{{ (request()->is('widthrawlogs')) ? 'active' : '' }}">
            <a href="{{route('widthrawlogs')}}"><i data-feather="chevrons-right"></i> Withdraw log</a>
          </li>
        </ul>
      </li>

        <li class="{{ (request()->is('savings')) ? 'active' : '' }}">
        <a href="{{route('savings')}}"><i data-feather="list"></i> Savings</a>
      </li>

      <li class="{{ (request()->is('digipay')) ? 'active' : '' }}">          

        <a href="{{route('digipay')}}"><i data-feather="repeat"></i> Transfer money</a>
      </li>

       <li class="{{ (request()->is('transferlogs')) ? 'active' : '' }}">
            <a href="{{route('transferlogs')}}">
            <i data-feather="file-text"></i>
                Money transfer log
            </a>
        </li>


      <!-- <li class="{{ (request()->is('')) ? 'active' : '' }}">
        <a href=""><i data-feather="file-text"></i> Interest log</a>
      </li> -->
      <li class="{{ (request()->is('transactionlogs')) ? 'active' : '' }}">
        <a href="{{route('transactionlogs')}}"><i data-feather="file-text"></i> Transaction log</a>
      </li>
     
      <li class="">
        <a href="{{route('contact')}}"><i data-feather="life-buoy"></i> Support</a>
      </li>
      <li>
        <a href="{{route('logout')}}"><i data-feather="log-out"></i> Logout</a>
      </li>
    </ul>
    <!-- <div class="d-plan-notice mt-4 mx-3">
        <p class="mb-0">Your current plan
            -N/A</p>
        <a href="https://invest.digitalafrica.live/investmentplan">Update plan <i class="fas fa-arrow-up"></i></a>
    </div> -->
</div>


<!-- mobile bottom menu start -->
<div class="mobile-bottom-menu-wrapper">
  <ul class="mobile-bottom-menu">
    <li>
      <a href="{{route('deposit')}}" class="{{ (request()->is('deposit')) ? 'active' : '' }}">
        <i class="bi bi-wallet2"></i>
        <span>Deposit</span>
      </a>
    </li>
    <li>
      <a href="{{route('investment')}}" class="{{ (request()->is('investment')) ? 'active' : '' }}">
        <i class="bi bi-piggy-bank"></i>
        <span>Invest</span>
      </a>
    </li>
    <li>
      <a href="{{route('home')}}" class="{{ (request()->is('home')) ? 'active' : '' }}">
        <i class="bi bi-house-door"></i>
        <span>Home</span>
      </a>
    </li>
    <li>
      <a href="{{route('mobile')}}" class="{{ (request()->is('mobile')) ? 'active' : '' }}">
        <i class="bi bi-cash-coin"></i>
        <span>Withdraw</span>
      </a>
    </li>
    <li>
      <a href="{{route('digipay')}}" class="{{ (request()->is('digipay')) ? 'active' : 'digipay' }}">
        <i class="bi bi-shuffle"></i>
        <span>Transfer</span>
      </a>
    </li>
  </ul>
</div>
<!-- mobile bottom menu end -->               




<main class="">
@include('inc.messages')

@yield('content')
</main> 


<script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/jquery.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/purecounter/purecounter.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/feather.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/vendor/php-email-form/validate.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/selectric.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/iziToast.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/jquery.uploadPreview.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/theme3/frontend/js/user_dashboard.js"></script>

            <script>
            'use strict';

            $('.planDelete').on('click', function() {
                const modal = $('#planDelete');

                modal.find('form').attr('action', $(this).data('href'))

                modal.modal('show')


            })

            var copyButton = document.querySelector('.copy');
            var copyInput = document.querySelector('.copy-text');
            copyButton.addEventListener('click', function(e) {
                e.preventDefault();
                var text = copyInput.select();
                document.execCommand('copy');
            });
            copyInput.addEventListener('click', function() {
                this.select();
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

        feather.replace();

        // responsive menu slideing
        $(".d-sidebar-menu>li>a").on("click", function() {
            var element = $(this).parent("li");
            if (element.hasClass("open")) {
                element.removeClass("open");
                element.find("li").removeClass("open");
                element.find("ul").slideUp(500, "linear");
            } else {
                element.addClass("open");
                element.children("ul").slideDown();
                element.siblings("li").children("ul").slideUp();
                element.siblings("li").removeClass("open");
                element.siblings("li").find("li").removeClass("open");
                element.siblings("li").find("ul").slideUp();
            }
        });

        $('.sidebar-open-btn').on('click', function() {
            $(this).toggleClass('active');
            $('.d-sidebar').toggleClass('active');
        });
    </script>
</body>

</html>
