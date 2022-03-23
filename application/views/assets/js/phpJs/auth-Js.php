<script>
    $(document).ready(function() {
        $("#eyeButton").on('click', function() {
            if ($("#Password").attr("type") == 'text') {
                $("#Password").attr("type", "password");
                $("#eyeButton").html("<i class='fa fa-eye-slash'></i>");
            } else if ($("#Password").attr("type") == 'password') {
                $("#Password").attr("type", "text");
                $("#eyeButton").html("<i class='fa fa-eye'></i>");
            }
        });
    });
</script>