<script>
        $(document).ready(function() {

            // Get Subjects By Section
            $('select[name="year_id"], select[name="classroom_id"], select[name="section_id"], select[name="semester_id"]').on('change', function() {
                var year_id = $('#year_id').val(),
                    section_id = $('#section_id').val(),
                    classroom_id = $('#classroom_id').val(),
                    semester_id = $('#semester_id').val();

                $('select[name="subject_teacher_id"]').empty();

                if (year_id && section_id && classroom_id && semester_id) {
                    $.ajax({
                        url: "{{ URL::to('get-subject-for-grades-ajax') }}/" + section_id + "/" + classroom_id + "/" + semester_id + "/" + year_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subject_teacher_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subject_teacher_id"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

    </script>