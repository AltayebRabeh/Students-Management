<script>
    $(document).ready(function() {

        // Get semesters By Section
        $('select[name="classroom_id"]').on('change', function() {

            var id = $(this).parents('form').attr('id');

            var classroom_id = $(this).val();
            $('#' + id + ' select[name="semester_id"]').empty();
            if (classroom_id) {
                $.ajax({
                    url: "{{ URL::to('semesters') }}/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#' + id + ' select[name="semester_id"]').empty();
                        $('#' + id + ' select[name="semester_id"]').append('<option></option>');
                        $.each(data, function(key, value) {
                            $('#' + id + ' select[name="semester_id"]').append('<option value="' +
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
