$('#payment_method-table').DataTable().clear().destroy();

var table_table = $('#payment_method-table').DataTable({
initComplete: function () {
    this.api().columns([2]).every(function () {
        var column = this;
        var select = $('<select><option value=""></option></select>')
            .appendTo($(column.footer()).empty())
            .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                );

                column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
            });

        column.data().unique().sort().each(function (d, j) {
            select.append('<option value="' + d + '">' + d + '</option>');
            $('select').selectpicker('refresh');
        });
    });
},
responsive: true,
fixedHeader: {
header: true,
footer: true
},
processing: true,
serverSide: true,
ajax: {
url: "<?php echo e(route('payment_method.index')); ?>",

},


columns: [
{
data: 'method_name',
name: 'method_name',
},
{
data: 'payment_percentage',
name: 'payment_percentage',
},
{
data: 'account_number',
name: 'account_number',
},
{
data: 'action',
name: 'action',
orderable: false
}
],


"order": [],
'language': {
'lengthMenu': '_MENU_ <?php echo e(__("records per page")); ?>',
"info": '<?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)',
"search": '<?php echo e(trans("file.Search")); ?>',
'paginate': {
'previous': '<?php echo e(trans("file.Previous")); ?>',
'next': '<?php echo e(trans("file.Next")); ?>'
}
},
'columnDefs': [
{
"orderable": false,
'targets': [0, 3],
},

],


'select': {style: 'multi', selector: 'td:first-child'},
'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],

});
new $.fn.dataTable.FixedHeader(table_table);

$('#payment_method_submit').on('click', function(event) {
event.preventDefault();
let method_name = $('input[name="method_name"]').val();
let payment_percentage = $('input[name="payment_percentage"]').val();
let account_number = $('input[name="account_number"]').val();


$.ajax({
url: "<?php echo e(route('payment_method.store')); ?>",
method: "POST",
data: { method_name:method_name,payment_percentage:payment_percentage,account_number:account_number},
success: function (data) {
var html = '';
if (data.errors) {
html = '<div class="alert alert-danger">';
    for (var count = 0; count < data.errors.length; count++) {
    html += '<p>' + data.errors[count] + '</p>';
    }
    html += '</div>';
}
if (data.success) {
html = '<div class="alert alert-success">' + data.success + '</div>';
$('#payment_method_form')[0].reset();
$('#payment_method-table').DataTable().ajax.reload();
}
$('.payment_result').html(html).slideDown(300).delay(5000).slideUp(300);

}
});

});

$(document).on('click', '.payment_edit', function(){
var id = $(this).attr('id');
$('.payment_result').html('');

var target = "<?php echo e(route('payment_method.index')); ?>/"+id+'/edit';
$.ajax({
url:target,
dataType:"json",
success:function(html){

$('#method_name_edit').val(html.data.method_name);
$('#payment_percentage_edit').val(html.data.payment_percentage);
$('#account_number_edit').val(html.data.account_number);

$('#hidden_payment_id').val(html.data.id);
$('#PaymentEditModal').modal('show');
}
})

});

$('#payment_method_edit_submit').on('click', function(event) {
event.preventDefault();
let method_name_edit = $('input[name="method_name_edit"]').val();
let payment_percentage_edit = $('input[name="payment_percentage_edit"]').val();
let account_number_edit = $('input[name="account_number_edit"]').val();

let hidden_payment_id= $('#hidden_payment_id').val();

$.ajax({
url: "<?php echo e(route('payment_method.update')); ?>",
method: "POST",
data: { method_name_edit:method_name_edit,payment_percentage_edit:payment_percentage_edit,account_number_edit:account_number_edit,hidden_payment_id:hidden_payment_id},
success: function (data) {
var html = '';
if (data.errors) {
html = '<div class="alert alert-danger">';
    for (var count = 0; count < data.errors.length; count++) {
    html += '<p>' + data.errors[count] + '</p>';
    }
    html += '</div>';
}
if (data.success) {
html = '<div class="alert alert-success">' + data.success + '</div>';
$('#payment_method_form_edit')[0].reset();
$('#payment_method-table').DataTable().ajax.reload();
}
$('.payment_result_edit').html(html).slideDown(300).delay(3000).slideUp(300);
setTimeout(function(){
$('#PaymentEditModal').modal('hide')
}, 5000);

}
});

});



$(document).on('click', '.payment_delete', function() {

let delete_id = $(this).attr('id');
let target = "<?php echo e(route('payment_method.index')); ?>/" + delete_id + '/delete';
if (confirm('<?php echo e(__('Are You Sure you want to delete this data')); ?>')) {
$.ajax({
url: target,
success: function (data) {
var html = '';
html = '<div class="alert alert-success">' + data.success + '</div>';
setTimeout(function () {
$('#payment_method-table').DataTable().ajax.reload();
}, 2000);
$('.payment_result').html(html).slideDown(300).delay(3000).slideUp(300);

}
})
}

});

$('#payment_close').on('click', function() {
$('#payment_method_form')[0].reset();
$('#payment_method-table').DataTable().ajax.reload();
});<?php /**PATH /media/reza/14b062b7-7b1b-444c-b04e-64d55e1a8761/Laravel/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro/resources/views/settings/variables_method/JS_DT/payment_method_js.blade.php ENDPATH**/ ?>