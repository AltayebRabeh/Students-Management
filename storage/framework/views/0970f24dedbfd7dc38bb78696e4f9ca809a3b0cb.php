<script>
    $(document).ready(function() {

        // Get Classrooms By Section
        $('select[name="section_id"]').on('change', function() {

            var id = $(this).parents('form').attr('id');

            var section_id = $(this).val();
            $('#' + id + ' select[name="classroom_id"]').empty();
            if (section_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('classrooms')); ?>/" + section_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#' + id + ' select[name="classroom_id"]').empty();
                        $('#' + id + ' select[name="classroom_id"]').append('<option></option>');
                        $.each(data, function(key, value) {
                            $('#' + id + ' select[name="classroom_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
            $('#' + id + ' select[name="semester_id"]').empty();
        });

    });

</script>
<?php /**PATH E:\Altayeb (Don't tuch)\Students-Management\resources\views/layouts/extends/ajax-get-classrooms.blade.php ENDPATH**/ ?>