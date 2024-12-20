$(document).ready(function() {
    $("#registrationForm").submit(function(event) {
        event.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: 'submit.php', // Server-side script
            type: 'POST',
            data: formData,
            success: function(response) {
                $("#result").html(response);
                $("#registrationForm")[0].reset();
            },
            error: function() {
                $("#result").html("<p style='color: red;'>An error occurred. Please try again.</p>");
            }
        });
    });
});
