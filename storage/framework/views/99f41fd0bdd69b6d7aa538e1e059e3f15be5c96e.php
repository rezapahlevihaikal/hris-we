<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button><?php echo e(session('msg')); ?></div>
<?php endif; ?><?php /**PATH /media/reza/14b062b7-7b1b-444c-b04e-64d55e1a8761/Laravel/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro/resources/views/shared/flash_message.blade.php ENDPATH**/ ?>