    $('#employee_warning-table').DataTable().clear().destroy();
    var date = $('.date');
    date.datepicker({
        format: '<?php echo e(env('Date_Format_JS')); ?>',
        autoclose: true,
        todayHighlight: true
    });

    let table_table = $('#employee_warning-table').DataTable({
        initComplete: function () {
            this.api().columns([0]).every(function () {
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
            url: "<?php echo e(route('employee_warning.index',$employee->id)); ?>",
        },
    columns:[
    {
    data: 'subject',
    name: 'subject',

    },
    {
    data: 'warning_date',
    name: 'warning_date',
    },
    {
    data: 'status',
    name: 'status',
    render: function(data) {
    if (data == 'solved') {
    return "<td><div class = 'badge badge-success'><?php echo e(trans('file.Solved')); ?></div>"
        } else {
        return "<td><div class = 'badge badge-danger'><?php echo e(trans('file.Unsolved')); ?></div>"
        }
        }
        },
        {
        data: 'action',
        name: 'action',
        orderable: false
        }
        ],


        "order": [],
        'language': {
            'lengthMenu': '_MENU_ <?php echo e(__('records per page')); ?>',
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

    $(document).on('click', '.show_warning', function () {

        let id = $(this).attr('id');

        let target = '<?php echo e(route('employee_warning.details')); ?>/' + id;

        $.ajax({
            url: target,
            dataType: "json",
            success: function (result) {

        $('#warning_description_id').html(result.data.description);
        $('#warning_company_id_show').html(result.company_name);
        $('#warning_subject_id').html(result.data.subject);
        $('#warning_warning_type_id').html(result.warning_type_name);
        $('#warning_warning_to_id').html(result.warning_to_employee);
        $('#warning_warning_date_id').html(result.data.warning_date);
        $('#warning_status_id').html(result.data.status);

                $('#employee_warning_modal').modal('show');
                $('.modal-title').text("<?php echo e(__('Warning Info')); ?>");
            }
        });
    });
<?php /**PATH /media/reza/14b062b7-7b1b-444c-b04e-64d55e1a8761/Laravel/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro117 [Source Lengkap Aplikasi HRIS HRD Absensi Payroll Karyawan Laravel PHP]/peoplepro/resources/views/employee/core_hr/warning/index_js.blade.php ENDPATH**/ ?>