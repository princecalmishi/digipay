
<?php $__env->startSection('content'); ?>
      


<div class="dashboard-body-part">

        
        <div class="row gy-4">

        <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row g-sm-4 g-3 justify-content-between">
                <div class="col-xl-4 col-lg-6">
                    <div class="user-account-number h-100">
                        <div class="card-dot mb-sm-4 mb-2">
                            <!-- <span class="dot-1"></span>
                            <span class="dot-2"></span> -->
                        </div>
                        <p class="caption mb-2">Savings Account : <?php echo e($accno); ?></p>
                        <h3 class="acc-number">
                        <?php echo e($bal); ?> KSH
                        </h3>
                        <i class="bi bi-wallet2"></i>
                        
                    </div>
                </div>
                

                <div class="col-xl-4 col-lg-6">
                    <div class="row g-sm-4 g-3">
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-1">
                                <div class="icon">
                                    <i class="bi bi-piggy-bank text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">Fixed Savings : <?php echo e($accnofixed); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e($balfix); ?> KSH</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-3">
                                <div class="icon">
                                    <i class="bi bi-hourglass-split text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">Total deposit</p>
                                    <h5 class="title text-white">
                                    <?php echo e($totaldeposit); ?> KSH</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-12 col-6">
                            <div class="d-box-three gr-bg-2">
                                <div class="icon">
                                    <i class="bi bi-cash-coin text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">Total invest</p>
                                    <h5 class="title text-white">
                                        <?php echo e($totalinvest); ?> KSH</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-6">
                            <div class="d-box-three gr-bg-4">
                                <div class="icon">
                                    <i class="bi bi-wallet2 text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">Goal Savings</p>
                                    <h5 class="title text-white">
                                    <?php echo e($goalsum); ?> KSH
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 mt-1 d-box-two-wrapper d-sm-flex d-none">
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <span class="caption-title">My Total Investments</span>
                        <h3 class="d-box-two-amount">
                            <?php echo e($mytotalinvestcount); ?></h3>
                        <a href="<?php echo e(route('investment')); ?>" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-money-check"></i>
                        </div>
                        <span class="caption-title">Savings</span>
                        <h3 class="d-box-two-amount">
                            <?php echo e($mysavigs); ?> KSH 
                            <!-- <?php echo e($accno); ?> -->
                        </h3>
                        <a href="<?php echo e(route('savings')); ?>" class="link-btn"><i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <span class="caption-title">Budget</span>
                        <h3 class="d-box-two-amount">
                        <?php echo e($pendingwith); ?> KSH 
                        </h3>
                        <a href="<?php echo e(route('budget0')); ?>" class="link-btn"><i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <span class="caption-title">Refferal earnings</span>
                        <h3 class="d-box-two-amount">
                            <?php echo e($checkifuserreferedsomeone); ?> KSH
                        </h3>
                        <a href="#" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

           

            <!-- mobile screen card start -->
            <div class="d-sm-none mt-4">
                <div class="site-card">
                    <div class="card-body">
                        <h5 class="mb-4">More options</h5>
                        <div class="row gy-3 mobile-box-wrapper">
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('savings')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Savings</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('budget0')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Budget</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('investmenthistory')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">My Investment</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('banking')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Send to Bank</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('buygoods')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Buy Goods</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('paybill')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Pay Bill</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('transferlogs')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Transfer log</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('widthrawlogs')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Widthraw log</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mobile-box link-item">
                                    <a href="<?php echo e(route('transferlogs')); ?>" class="item-link"></a>
                                    <i class="bi bi-journal-text"></i>
                                    <h6 class="title">Interest log</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile screen card end -->


             <!-- //notification screen -->


<style>.table_component {
    overflow: auto;
    width: 100%;
}

.table_component table {
    border: 1px solid #dededf;
    height: 100%;
    width: 100%;
    table-layout: auto;
    border-collapse: collapse;
    border-spacing: 1px;
    text-align: left;
}

.table_component caption {
    caption-side: top;
    text-align: left;
}

.table_component th {
    border: 1px solid #dededf;
    background-color: #ffffff;
    color: #08b553;
    padding: 5px;
}

.table_component td {
    border: 1px solid #dededf;
    background-color: #ffffff;
    color: #000000;
    padding: 5px;
}
</style>
<div class="table_component" role="region" tabindex="0" style="border-radius: 25px;  background: #ffffff;">
    <table style="border-radius: 25px;">
    <center><caption>Notifications</caption></center>
        <thead>
        <?php if($notificount > 1): ?>
            <tr>
                <th>Id</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
       
            <?php $__currentLoopData = $notifi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->id); ?></td>
                <td><?php echo e($data->message); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <td class="text-center no-data-table" colspan="100%">Nothing found here yet !</td>

            
        <?php endif; ?>
    </tbody>
</table>
</div>


    <!-- notification screen ends -->

    <div class="table_component" role="region" tabindex="0" style="border-radius: 25px;">
    <table>
    <center><caption>Upcoming Payments</caption></center>
        <thead>
        <?php if($goalscount > 1): ?>
            <tr>
                <th style="width:70px;"></th>
                <th>Name</th>
                <th>Target</th>
                <th>Frequency</th>
                <th>Start</th>
                <th>Widthrawal Date</th>
            </tr>
        </thead>
        <tbody>
       
            <?php $__currentLoopData = $goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><img src="/savings.png" alt="" style="height:50px; width:70px;"></td>
                <td><?php echo e($goal->name); ?></td>
                <td><?php echo e($goal->target_amount); ?></td>
                <td>KSH <?php echo e($goal->frequency_amount); ?> ,<?php echo e($goal->frequency); ?></td>
                <td><?php echo e($goal->start_date); ?></td>
                <td><?php echo e($goal->withdraw_date); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <td class="text-center no-data-table" colspan="100%">Nothing found here yet !</td>

        <?php endif; ?>
       
    </tbody>
</table>
</div>


            <div class="mt-4">
                <label>Your refferal link</label>
                <div class="input-group mb-3">
                    <input type="text" id="refer-link" class="form-control copy-text"
                        value="<?php echo URL::to('/'); ?>/register?refered_by=<?php echo e($checkifuserhasrefcode); ?>" placeholder="referallink.com/refer"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                    <button type="button" class="input-group-text copy cmn-btn"
                        id="basic-addon2">Copy</button>
                </div>
            </div>


            
              <div class="row">
                <div class="col-md-12">
                    <div class="site-card">
                        <div class="card-header">
                            <h5 class="mb-0">Reference tree</h5>
                        </div>
                        <?php if($checkifuserreferedsomeonecount < 1): ?>
                        <div class="card-body">
                                <div class="col-md-12 text-center mt-5">
                                    <i class="far fa-sad-tear display-1"></i>
                                    <p class="mt-2">
                                        No reference user found
                                    </p>
                                </div>
                         </div>
                         <?php else: ?>

                         <div class="card-body">
                                  <ul class="sp-referral">
                                    <li class="single-child root-child">
                                        <p>
                                            <img src="/newui/user.png">
                                            <span class="mb-0"><?php echo e(Auth()->user()->name); ?> </span>
                                        </p>
                                        <?php $__currentLoopData = $referedusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $referedusers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <ul class="sub-child-list step-2">
                                          <li class="single-child">
                                            <p>
                                              <img src="/newui/user.png">
                                                  <span class="mb-0"><?php echo e($referedusers->name); ?> </span>
                                            </p>                                       
                                          </li>
                                        </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                          </div>

                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="planDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="" method="post">
                    <input type="hidden" name="_token" value="9ViQcIgE4bNedRgF5EkXhZhuwXtJkAzTBFqH2Kxi">                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Plan</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            </section>
    </main>

    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.newui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/home.blade.php ENDPATH**/ ?>