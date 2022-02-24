<script>
        $(document).ready(function() {

            // Get Subjects By Section
            $('select[name="year_id"], select[name="classroom_id"], select[name="section_id"], select[name="semester_id"]').on('change', function() {

                var id = $(this).parents('form').attr('id');

                var year_id = $('#' + id + ' select[name="year_id"]').val(),
                    section_id = $('#' + id + ' select[name="section_id"]').val(),
                    classroom_id = $('#' + id + ' select[name="classroom_id"]').val(),
                    semester_id = $('#' + id + ' select[name="semester_id"]').val();

                $('#' + id + ' select[name="subject_teacher_id"]').empty();

                if (year_id && section_id && classroom_id && semester_id) {
                    $.ajax({
                        url: "{{ URL::to('get-subject-for-grades-ajax') }}/" + section_id + "/" + classroom_id + "/" + semester_id + "/" + year_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#' + id + ' select[name="subject_teacher_id"]').empty().append('<option disable></option>');
                            $.each(data, function(key, value) {
                                $('#' + id + ' select[name="subject_teacher_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work Hi');
                }
            });
        });
    </script>
