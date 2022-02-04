<script>
    $(document).ready(function() {
        
        // Get Classrooms By Section
        $('select[name="section_id"]').on('change', function() {
            var section_id = $(this).val();
            $('select[name="classroom_id"]').empty();
            if (section_id) {
                $.ajax({
                    url: "<?php echo e(URL::to('classrooms')); ?>/" + section_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classroom_id"]').empty();
                        $('select[name="classroom_id"]').append('<option></option>');
                        $.each(data, function(key, value) {
                            $('select[name="classroom_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
            $('select[name="semester_id"]').empty();
        });
        
    });

</script>
<?php /**PATH /home/altayeb/Desktop/university/resources/views/layouts/extends/ajax-get-classrooms.blade.php ENDPATH**/ ?>