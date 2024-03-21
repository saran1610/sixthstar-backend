$(document).ready(function(){
    $('#studentForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "add_student.php",
            data: $(this).serialize(),
            success: function(response){
                $('#studentTableBody').html(response);
            }
        });
    });
});
