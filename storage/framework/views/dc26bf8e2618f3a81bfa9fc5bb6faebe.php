
<?php $__env->startSection('content'); ?>


<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>General setting</h1>
            </div>

            <?php echo $__env->make('inc.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(route('admin/gensettpost')); ?>" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>

                                <input type="hidden" name="_tccoken" value="st9bf5HoVlUm5wJcHN33ZavlOytj7f09HXwOWgcc">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="sitename">Site name</label>
                                        <input type="text" name="sitename" placeholder="site name"
                                            class="form-control form_control" value="<?php echo e($sname); ?>">
                                    </div>

                                   
                                    <div class="form-group col-md-3">
                                        <label for="signup_bonus">Referall bonus</label>
                                        <input type="text" name="refbonus" placeholder="Referal Bonus"
                                            class="form-control form_control"
                                            value="<?php echo e($refb); ?>">
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="">Minimum Widthrawal</label>
                                        <input type="number" name="minwid" class="form-control"
                                            placeholder="Minimum Widthrawal" value="<?php echo e($min_wid); ?>">

                                    </div>


                                    <div class="form-group col-md-6">

                                        <label for="">Maximum Widthrawal</label>
                                        <input type="number" name="maxwid" class="form-control"
                                            placeholder="Maximum Widthrawal" value="<?php echo e($max_wid); ?>">

                                    </div>


                                   

                                    <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mr-3">

                                    Smtp mail settings

                                <i class="far fa-times-circle text-danger ft-40"></i>
                                    
                                </h5>

                                  <div>

                                <!-- <button type="submit" class="btn btn-primary float-right">Update email configuration</button> -->

                                    </div>
                                
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <input type="hidden" name="email_method" value="smtp">
                                    <div class="col-md-4 my-3">

                                        <label for="">Email sent from</label>

                                        <input type="email" name="site_email" class="form-control form_control" value="<?php echo e($mailsent_from); ?>">

                                    </div>

                                    <div class="col-md-4 my-3">

                                        <label for="">Smtp host</label>
                                        <input type="text" name="smtp_host" class="form-control" value="<?php echo e($Smtp_host); ?>">

                                    </div>

                                    <div class="col-md-4 my-3">

                                        <label for="">Smtp username</label>
                                        <input type="text" name="smtp_username" class="form-control" value="<?php echo e($Smtp_username); ?>">

                                    </div>

                                    <div class="col-md-4 my-3">

                                        <label for="">Smtp password</label>
                                        <input type="password" name="smtp_password" class="form-control" value="<?php echo e($Smtp_password); ?>">

                                    </div>
                                    <div class="col-md-4 my-3">

                                        <label for="">Smtp port</label>
                                        <input type="text" name="smtp_port" class="form-control" value="<?php echo e($Smtp_port); ?>">

                                    </div>

                                    <div class="col-md-4 my-3">

                                        <label for="">Smtp encryption</label>
                                        <select name="Smtp_encryption" id="" class="form-control">
                                            <!-- <option  disabled>select option</option> -->
                                            <option selected value="<?php echo e($Smtp_encryption); ?>"><?php echo e($Smtp_encryption); ?></option>
                                            <option value="ssl">SSL</option>
                                            <option value="tls">TLS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label for="">Site Phone</label>
                                        <input type="phone" name="phone" class="form-control" value="<?php echo e($phone); ?>">
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <label for="">Contact Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo e($email); ?>">
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <label for="">Business Location</label>
                                        <input type="text" name="location" class="form-control" value="<?php echo e($email); ?>">
                                    </div>


                                </div>

                            </div>
                        </div>
                                    <div class="form-group col-md-12">

                                        <button type="submit"
                                            class="btn btn-primary float-right">Update general setting</button>

                                    </div>

                                </div>
                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\princ\Desktop\Digipay\resources\views/admin/generalsettings.blade.php ENDPATH**/ ?>