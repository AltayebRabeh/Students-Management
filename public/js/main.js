$(document).ready(function() {

    $(document).ready(function() {
        $('.delete-with-modal').click(function() {
            $('.modal-body').text($(this).data('message'));
            $('form#deleteWithModal').attr('action', $(this).data('href'));
        })
    });

    $('.section_id').select2({
        multiple: false,
        theme: 'bootstrap4',
        closeOnSelect: true,
    });
    $('.subject_id').select2({
        multiple: false,
        theme: 'bootstrap4',
        closeOnSelect: true,
    });

    $('.permissions').select2({
        multiple: true,
        theme: 'bootstrap4',
        closeOnSelect: true,
    });
    // $('.classroom_id').select2({
    //     multiple: false,
    //     theme: 'bootstrap4',
    //     closeOnSelect: true,
    // });
    // $('.semester_id').select2({
    //     multiple: false,
    //     theme: 'bootstrap4',
    //     closeOnSelect: true,
    // });
    $('.teacher_id').select2({
        multiple: false,
        theme: 'bootstrap4',
        closeOnSelect: true,
    });

    $('.year_id').select2({
        multiple: false,
        theme: 'bootstrap4',
        closeOnSelect: true,
    });

    $('.print-btn').click(function() {

        oldData = $(document.body).html();

        if ($(this).data("landscape")) {

            var css = '@page {size: 11.69in 8.27in;margin:10px 5px 5px}',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.css.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }
            head.appendChild(style);
        }

        newData = $('#printDocument').html();
        $(document.body).html(newData);

        window.print();
        $(document.body).html(oldData);
    });

});