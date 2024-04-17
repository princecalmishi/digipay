
<?php $__env->startSection('content'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5 mt-4">
            <h1 class="display-2 text-white mb-3 animated slideInDown">Features</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item" aria-current="page">Features</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <?php echo $__env->make('inc.features', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- About End -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/features.blade.php ENDPATH**/ ?>