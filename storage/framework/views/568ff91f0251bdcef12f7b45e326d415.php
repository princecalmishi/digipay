
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            
            
            <div class="section-header pl-0 d-flex justify-content-between">
                <h1 class="pl-0">Dashboard</h1>
                <h4>
                                           
                </h4>
            </div>   
            

            <div class="mb-4">
                <code class="mb-2 d-inline-block text-dark">
                    Please set cron url to your server to dispatched return
                </code>
                <div class="input-group">
                    <input type="text" name="" class="form-control copy-text" value="curl -s <?php echo URL::to('/'); ?>/cron">
                    <div class="input-group-append">
                        <button class="input-group-text gr-bg-1 text-white copy" type="button"
                        id="button-addon2">Set cron url</button>
                    </div>
                </div>
            </div>

            <div class="row"> 
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-1">
                        <div class="icon">
                            <i class="fas fa-money-bill-wave-alt"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total invest</p>
                            <h4 class="card-stat-amount"><?php echo e($totalinvest); ?> KSH</h4>
                        </div>
                    </div>
                </div>
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-2">
                        <div class="icon">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total pending invest</p>
                            <h4 class="card-stat-amount"><?php echo e($pendinginvest); ?> KSH</h4>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-3">
                        <div class="icon">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total interest amount</p>
                            <h4 class="card-stat-amount"><?php echo e($totalreturns); ?> KSH</h4>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-4">
                        <div class="icon">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total user</p>
                            <h4 class="card-stat-amount"><?php echo e($totalusers); ?></h4>
                        </div>
                    </div>
                </div>

                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-5">
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total active user</p>
                            <h4 class="card-stat-amount"><?php echo e($activeuserscount); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-6">
                        <div class="icon">
                            <i class="fas fa-user-times"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total deactived user</p>
                            <h4 class="card-stat-amount"><?php echo e($deactiveuserscount); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-7">
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total withdraw</p>
                            <h4 class="card-stat-amount"><?php echo e($totalwith); ?> KSH</h4>
                        </div>
                    </div>
                </div>
                
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card-stat gr-bg-8">
                        <div class="icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="content">
                            <p class="caption">Total pending withdraw</p>
                            <h4 class="card-stat-amount"><?php echo e($pendingwith); ?> KSH</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon gr-bg-1 rounded-circle">
                            <i class="fas fa-dungeon"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Autometic gateways</h4>
                            </div>
                            <div class="card-body">
                                18
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon gr-bg-1 rounded-circle">
                            <i class="fas fa-dungeon"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Withdraw charge</h4>
                            </div>
                            <div class="card-body">
                                0.00 KSH
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon gr-bg-1 rounded-circle">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Withdraw gateways</h4>
                            </div>
                            <div class="card-body">
                                0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-xxxl-3 custom-xxl-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon gr-bg-1 rounded-circle">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Withdraw gateways</h4>
                            </div>
                            <div class="card-body">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="row"> 
                <div class="col-md-6 col-12 col-lg-6">
                    <div class="card invest-report-card">
                        <div class="card-header gr-bg-1">
                            <h4 class="text-white">Invest report</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-12 col-lg-6">
                    <div class="card invest-report-card">
                        <div class="card-header gr-bg-1">
                            <h4 class="text-white">Withdraw report</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-md-12  col-lg-12 col-12 all-users-table">
                    <div class="card-header">
                        <h5>Recent users</h5>
                    </div>
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Full name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recentusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentusers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($recentusers->id); ?></td>
                                                <td><?php echo e($recentusers->name); ?></td>

                                                <td><?php echo e($recentusers->phone); ?></td>
                                                <td><?php echo e($recentusers->email); ?></td>
                                                <td><?php echo e($recentusers->role); ?></td>
                                                <!-- <td><?php echo e($recentusers->role); ?></td> -->
                                                <!-- <td></td> -->
                                                <td><?php if($recentusers->status == 1): ?>
                                                    <span class='badge badge-success'>Active</span>
                                                    <?php else: ?>
                                                    <span class='badge badge-danger'>Blocked</span>

                                                    <?php endif; ?>
                                                 </td>
                                                <td>
                                                    <a href=""
                                                        class="btn btn-md btn-primary"><i class="fa fa-pen"></i></a>
                                                </td>
                                            </tr>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
      

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/admin/index.blade.php ENDPATH**/ ?>