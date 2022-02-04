<script>
    $(document).ready(function() {

        // Get semesters By Section
        $('select[name="classroom_id"]').on('change', function() {
            var classroom_id = $(this).val();
            $('select[name="semester_id"]').empty();
            if (classroom_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('semesters')); ?>/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="semester_id"]').empty();
                        $('select[name="semester_id"]').append('<option></option>');
                        $.each(data, function(key, value) {
                            $('select[name="semester_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

    });

</script><?php /**PATH /home/altayeb/Desktop/university/resources/views/layouts/extends/ajax-get-semesters.blade.php ENDPATH**/ ?>