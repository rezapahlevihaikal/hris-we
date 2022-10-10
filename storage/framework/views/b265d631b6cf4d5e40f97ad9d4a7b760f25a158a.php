
<?php $__env->startSection('content'); ?>


    <section>

        <div class="container">

            <?php echo e(__('There are some errors on')); ?>


            <button><a href="<?php echo e(URL::previous()); ?>"><?php echo e(__('Go Back')); ?></a></button>

        </div>

        <div class="container">

        <?php if(isset($failures)): ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo e(trans('file.Errors')); ?>:</strong>

                <ul>
                    <?php $__currentLoopData = $failures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $failure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>Row No -<?php echo e($failure->row()); ?></li>
                        <?php $__currentLoopData = $failure->errors(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
    <?php endif; ?>

        </div>

    </section>

    <?php $__env->stopSection(); ?>





<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /media/reza/14b062b7-7b1b-444c-b04e-64d55e1a8761/Laravel/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro/resources/views/employee/importError.blade.php ENDPATH**/ ?>