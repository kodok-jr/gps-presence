window.dt = require('datatables.net-bs4').default;
require('@fortawesome/fontawesome-free/js/all')


$(function () {

    /*
    |--------------------------------------------------------------------------
    | DataTables Render
    |--------------------------------------------------------------------------
    */
    let lapattern_datatables = document.querySelectorAll('.lapattern-datatables');

    lapattern_datatables.forEach((el) => {
        let options = el.getAttribute('data-options');
        options = JSON.parse(options);
        dtable = $(el).DataTable({
            language: {
                search: '',
                searchPlaceholder: 'Search...'
            },
            ...options,

            initComplete: function () {
                $('.dataTables_wrapper select').select2({
                    minimumResultsForSearch: -1,
                });
            }
        });

        $('.dataTables_wrapper .filter-input').on('keyup', function () {
            dtable.column($(this).data('column')).search($(this).val()).draw();
        });

        $('.dataTables_wrapper .filter-label').on('click touch', function () {
            if ($('tfoot tr:first-child', $(el)).is(":hidden"))
                $(this).removeClass('filter-label-down').addClass('filter-label-up');
            else
                $(this).removeClass('filter-label-up').addClass('filter-label-down');
            $(el).find('tfoot tr:first-child').toggle();
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Toastr
    |--------------------------------------------------------------------------
    */
    // var toaster = $('#toaster');

    // function callToaster(positionClass) {
    //     toastr.options = {
    //         closeButton: true,
    //         debug: false,
    //         newestOnTop: false,
    //         progressBar: true,
    //         positionClass: positionClass,
    //         preventDuplicates: false,
    //         onclick: null,
    //         showDuration: "300",
    //         hideDuration: "1000",
    //         timeOut: "5000",
    //         extendedTimeOut: "1000",
    //         showEasing: "swing",
    //         hideEasing: "linear",
    //         showMethod: "fadeIn",
    //         hideMethod: "fadeOut"
    //     };
    //     toastr.success("Welcome to Sleek Dashboard", "Howdy!");
    // }

    // if (toaster.length != 0) {
    //     if (document.dir != "rtl") {
    //         callToaster("toast-top-right");
    //     } else {
    //         callToaster("toast-top-left");
    //     }

    // }

    /*
    |--------------------------------------------------------------------------
    | Select2
    |--------------------------------------------------------------------------
    */
    $('.select2-role-id').select2({
        placeholder: 'Select roles...',
        allowClear: true
    });

    $('.custom-select2').select2({
        placeholder: 'Select options...',
        allowClear: true
    });

    $('.custom-select2-user').select2({
        placeholder: 'Choose student...',
        allowClear: true
    });

    /** onkeyup slug role name */
    $('.role-slug').on('keyup', function () {
        var slug = $(this).val();

        slug = slug.toLowerCase();

        var regExp = /\s+/g;
        slug = slug.replace(regExp, '-');

        $('#slug').val(slug);
    });

});
