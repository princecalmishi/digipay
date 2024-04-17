
<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5" style="background-color:green !important;">
        <div class="container py-5">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-6 mb-3" style="color:white !important;">Have Any Query? Feel Free To Contact Us</h1>
                <p class="mb-5"></p>
            </div>
            <div class="row contact-info position-relative g-0 mb-5">
                <div class="col-lg-6">
                    <a href="tel:+0123456789" class="d-flex justify-content-lg-center bg-primary p-4">
                        <div class="icon-box-light flex-shrink-0">
                            <i class="bi bi-phone text-dark"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-white">Call Us</h5>
                            <h2 class="text-white mb-0"><?php
                            $comm = DB::table('settings')
                              ->where('id', '1')                            
                              ->pluck('phone');
                              foreach($comm as $comm)
                              echo $comm;
                            ?></h2>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="mailto:info@example.com" class="d-flex justify-content-lg-center bg-primary p-4">
                        <div class="icon-box-light flex-shrink-0">
                            <i class="bi bi-envelope text-dark"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-white">Mail Us</h5>
                            <h2 class="text-white mb-0"><?php
                            $comm = DB::table('settings')
                              ->where('id', '1')                            
                              ->pluck('email');
                              foreach($comm as $comm)
                              echo $comm;
                            ?></h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row g-5">    <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="mb-4" style="color:white !important;">Write us a message using the form below and we will respond in time !</p>
                    <form action="<?php echo e(route('contactform')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" name="message" id="message" style="height: 200px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/contact.blade.php ENDPATH**/ ?>