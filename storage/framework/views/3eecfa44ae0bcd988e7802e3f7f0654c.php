
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
                    Digital invest-
                Dashboard
    </title>
    <link rel="shortcut icon" type="image/png" href="https://invest.digitalafrica.live/asset/theme3/images/icon/icon.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/font-awsome.min.css">
    <input type="hidden" name="_token" value="9kFZHVHset954dYJNL6V2wi3SmmV9oX1cweH4Sfe">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/component-custom-switch.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/animate.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/izitoast.min.css">
        <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet"
        href="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet"
        href="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/style.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/components.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/custom.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/daterangepicker.css">
    <link rel="stylesheet" href="https://invest.digitalafrica.live/asset/admin/css/iconpicker.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg main-navbar">
    
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li class="bars-icon-navbar">
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg ">
                    <i data-feather="menu"></i>
                </a>
            </li>
        </ul>
       
    </form>


    <ul class="navbar-nav navbar-right">



        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                <div class="d-lg-inline-block text-capitalize">Hi,
                    <?php echo e(Auth()->user()->name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <!-- <a href="" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a> -->

                <a href="<?php echo e(route('logout')); ?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
            <div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo e(route('admin/dashboard')); ?>"><?php echo e(config('app.name')); ?></a>
        </div>

        <ul class="sidebar-menu">

            <li class="nav-item dropdown <?php echo e((request()->is('admin/dashboard')) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('admin/dashboard')); ?>" class="nav-link ">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-menu-caption">Administration</li>

            
                <!-- <li class="nav-item dropdown ">
                    <a href="https://invest.digitalafrica.live/admin/roles" class="nav-link ">
                        <i data-feather="users"></i>
                        <span>Manage role</span>
                    </a>
                </li> -->

            
                <li class="nav-item dropdown <?php echo e((request()->is('admin/admins')) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin/admins')); ?>" class="nav-link ">
                        <i data-feather="user-check"></i>
                        <span>Manage admins</span>
                    </a>
                </li>
            

            <li class="sidebar-menu-caption">Manage plan</li>

                <li class="nav-item dropdown <?php echo e((request()->is('admin/plans')) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin/plans')); ?>" class="nav-link ">
                        <i data-feather="box"></i>
                        <span>Manage plan</span>
                    </a>
                </li>
                <li class="nav-item dropdown <?php echo e((request()->is('admin/plancategories')) ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin/plancategories')); ?>" class="nav-link ">
                        <i data-feather="box"></i>
                        <span>Plan categories</span>
                    </a>
                </li>



                <li class="sidebar-menu-caption">User Savings</li>

                    <li class="nav-item dropdown <?php echo e((request()->is('admin/usergoals')) ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin/usergoals')); ?>" class="nav-link ">
                            <i data-feather="box"></i>
                            <span>User Goals</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown <?php echo e((request()->is('admin/plancategories')) ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin/fixedsavings')); ?>" class="nav-link ">
                            <i data-feather="user"></i>
                            <span>Fixed Savings</span>
                        </a>
                    </li>
            

            <li class="sidebar-menu-caption">User management</li>

                            <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="user"></i>
                        <span>Manage users                         </span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e((request()->is('admin/users')) ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('admin/users')); ?>">Manage users</a>
                        </li>

                        
                        <!-- <li class="<?php echo e((request()->is('admin/kyc')) ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('admin/kyc')); ?>">Kyc setting</a>
                        </li>


                        <li class="<?php echo e((request()->is('admin/kycrequest')) ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('admin/kycrequest')); ?>">Kyc request</a>
                        </li> -->


                    </ul>
                </li>

                

                
            
                    <li class="nav-item dropdown <?php echo e((request()->is('admin/kycrequest')) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="inbox"></i>
                        <span>Ticket</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e((request()->is('admin/alltickets')) ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(route('admin/alltickets')); ?>">All tickets</a>
                        </li>
                        <li class="<?php echo e((request()->is('admin/pendingtickets')) ? 'active' : ''); ?>">
                            <a class="nav-link"
                                href="<?php echo e(route('admin/pendingtickets')); ?>">Pending ticket</a>
                        </li>
                    </ul>
                </li>
            
                    <!-- <li class="nav-item dropdown ">
                    <a href="https://invest.digitalafrica.live/admin/referral" class="nav-link ">
                        <i data-feather="link"></i>
                        <span>Manage referral</span>
                    </a>
                </li> -->
            



            <!--  <li class="sidebar-menu-caption">Payment and payout</li>

                           <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="database"></i>
                        <span>Manual payments</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/manual/payments">Manual payments</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/pending/payments">Pending payments</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/accepted/payments">Accepted payments</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/rejected/payments">Rejected payments</a>
                        </li>

                    </ul>
                </li> -->
            
                            <li class="nav-item dropdown { (request()->is('admin/pendingwith')) ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="package"></i>
                        <span>Manage withdraw</span></a>
                    <ul class="dropdown-menu">
                        <!-- <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/withdraw/method">Withdraw method</a>
                        </li> -->
                        <li class="<?php echo e((request()->is('admin/pendingwith')) ? 'active' : ''); ?>">
                            <a class="nav-link"
                                href="<?php echo e(route('admin/pendingwith')); ?>">Pending withdraws</a>
                        </li>
                        <li class="">
                            <a class="nav-link"
                                href="<?php echo e(route('admin/approvedwith')); ?>">Approved withdraws</a>
                        </li>
                        <li class="">
                            <a class="nav-link"
                                href="<?php echo e(route('admin/rejectedwith')); ?>">Rejected withdraws</a>
                        </li>
                    </ul>
                </li>
            

                            <li class="nav-item dropdown ">
                                <a href="<?php echo e(route('admin/managedeposits')); ?>" class="nav-link ">
                                    <i data-feather="table"></i>
                                    <span>Manage deposits</span>
                                </a>
                            </li>
            
                            <li class="sidebar-menu-caption">System settings</li>
            
                <!-- <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="credit-card"></i>
                        <span>Gateway settings</span></a>
                    <ul class="dropdown-menu">

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway">Create gateway</a>
                        </li>


                        <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/gateway/paypal">Paypal</a>
                        </li>
                        <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/gateway/stripe">Stripe</a>
                        </li>
                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/coin">Coinpayments</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/razorpay">Razorpay</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/vougepay">Vougepay</a>
                        </li>

                        <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/gateway/mollie">Mollie</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/nowpayments">Nowpayments</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/fullerwave">Flutterwave</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/paystack">Paystack</a>
                        </li>


                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/paghiper">Paghiper</a>
                        </li>


                        <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/gateway/gourl">Gourl.io</a>
                        </li>

                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/perfectmoney">Perfect money</a>
                        </li>


                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/mercadopago">Mercadopago</a>
                        </li>


                        <li class="">
                            <a class="nav-link" href="https://invest.digitalafrica.live/admin/gateway/paytm">Paytm</a>
                        </li>


                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/gateway/bank">Bank payment</a>
                        </li>
                    </ul>
                </li> -->
            
                            <!-- <li class="menu-header">Email settings</li>

                <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="mail"></i>
                        <span>Email manager</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/email/config">Email configure</a>
                        </li>
                        <li class="">
                            <a class="nav-link"
                                href="https://invest.digitalafrica.live/admin/email/templates">Email templates</a>
                        </li>
                    </ul>
                </li>
         -->
            
                <li class="menu-header">System settings</li>

                <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i data-feather="settings"></i>
                        <span>General settings</span></a>
                    <ul class="dropdown-menu">
                        <li class="">
                            <a class="nav-link"
                                href="<?php echo e(route('admin/generalsettings')); ?>">General settings</a>
                        </li>
                       

                        <li>
                            <a class="nav-link"
                                href="<?php echo e(route('cacheclear')); ?>">Cache clear</a>
                        </li>
                    </ul>
                </li>
            
        
                            <li class="sidebar-menu-caption"></li>

                <li class="nav-item dropdown ">
                    <a href="" class="nav-link ">
                        <span></span>
                    </a>
                </li>
            



            
                


        </ul>
    </aside>
</div>


<main class="">
<?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
</main> 


<!-- <div class="card-footer">
                                <div class="mt-2">
        <nav class="d-inline-block">

            <ul class="pagination mb-0">
                                
                                    
                                                                <li class="page-item active">
                            <a class="page-link" href="https://invest.digitalafrica.live/admin/dashboard?page=1">1</a>
                        </li>
                                            <li class="page-item ">
                            <a class="page-link" href="https://invest.digitalafrica.live/admin/dashboard?page=2">2</a>
                        </li>
                                                        
                                    <li class="page-item">
                        <a class="page-link" href="https://invest.digitalafrica.live/admin/dashboard?page=2">

                        </a>
                    </li>
                            </ul>
        </nav>
    </div> -->

                            </div>
                                            </div>
                </div>
            </div>
        </section>
    </div>
            <footer class="main-footer">
    <div class="footer-left">
        Copyright 2024 DigiPay Invest. All rights reserved.
    </div>

</footer>
        </div>
    </div>

    
    <!-- General JS Scripts -->
    <script src="https://invest.digitalafrica.live/asset/admin/js/jquery.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/proper.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/bootstrap.min.js"></script>
    
    <script src="https://invest.digitalafrica.live/asset/admin/js/feather.min.js"></script>

    <script src="https://invest.digitalafrica.live/asset/admin/js/nicescroll.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/summernote-bs4.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/daterangepicker.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/moment.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/stisla.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/scripts.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/izitoast.min.js"></script>
    <script src="https://invest.digitalafrica.live/asset/admin/js/iconpicker.js"></script>

    <script src="https://invest.digitalafrica.live/asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="https://invest.digitalafrica.live/asset/admin/js/sortable.min.js"></script>

        <script src="https://invest.digitalafrica.live/asset/admin/js/chart.min.js"></script>

    <script>
        'use strict'

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ["December"],
                datasets: [{
                    label: 'Total Invests',
                    barThickness: 10,
                    maxBarThickness: 12,
                    data: ["13100.00000000"],
                    backgroundColor: ['#2C86DB'],
                    borderColor: [
                        '#2C86DB'
                    ],
                    borderWidth: 2,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });



        var ctx3 = document.getElementById('myChart3').getContext('2d');
        var myChart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Withdraw',
                    barThickness: 10,
                    maxBarThickness: 12,
                    data: [],
                    backgroundColor: ['#2C86DB'],
                    borderColor: [
                        '#2C86DB'
                    ],
                    borderWidth: 2
                }]
            },
            options: { 
                scales: { 
                    y: { 
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



    <script>
        $(function(){
            $('#search_text').on('keyup', function(){
                let val = $(this).val();
                let model = $('#model').val();

                let url = "https://invest.digitalafrica.live/admin/search/filter";

                $.ajax({
                    method:"GET",
                    url : url,
                    data:{
                        colum : $(this).data('colum'),
                        val : val,
                        model : model,
                        type : 'text'
                    },
                    success:function(response){
                       $('#filter_data').html(response)
                    }
                })
            })


            $('#dateFilter').on('change', function(){
                let val = $(this).val();
                let model = $('#model').val();

                let url = "https://invest.digitalafrica.live/admin/search/filter";

                $.ajax({
                    method:"GET",
                    url : url,
                    data:{
                        colum : $(this).data('colum'),
                        val : val,
                        model : model,
                        type : 'text'
                    },
                    success:function(response){
                        $('#filter_data').html(response)
                    }
                })
            })


            $('#optionFilter').on('change', function(){
                let val = $(this).val();
                let model = $('#model').val();

                let url = "https://invest.digitalafrica.live/admin/search/filter";

                $.ajax({
                    method:"GET",
                    url : url,
                    data:{
                        colum : $(this).data('colum'),
                        val : val,
                        model : model,
                        type : 'text'
                    },
                    success:function(response){
                        $('#filter_data').html(response)
                    }
                })
            })
        })
    </script>

<!-- 
            <script>
            "use strict";
            iziToast.success({
                message: "Login Successful",
                position: 'topRight'
            });
        </script> -->
            
    
   
</body>

</html>
<?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/layouts/admin.blade.php ENDPATH**/ ?>