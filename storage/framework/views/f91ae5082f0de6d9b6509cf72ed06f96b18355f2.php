<?php if(Session::has('success')): ?>
    <div class="bg-green-lightest text-green-darker p-6 shadow-md" role="alert">
        <div class="flex justify-center">
            <p><?php echo e(Session::get('success')); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="bg-red-lightest text-red-darker p-6 shadow-md" role="alert" >
        <div class="flex justify-center">
            <p><?php echo Session::get('error'); ?></p>
        </div>
    </div>
<?php endif; ?><?php /**PATH /media/reza/14b062b7-7b1b-444c-b04e-64d55e1a8761/Laravel/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro/resources/views/vendor/translation/notifications.blade.php ENDPATH**/ ?>