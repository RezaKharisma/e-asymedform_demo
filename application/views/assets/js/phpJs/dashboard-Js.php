<script>
    $(function() {

        var start = new Date;

        setInterval(function() {

            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            // Add leading zeros
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;
            hours = (hours < 10 ? "0" : "") + hours;

            // Compose the string for display
            var currentTimeString = hours + ":" + minutes + ":" + seconds;
            $("#timeClock").html(currentTimeString);

        });
    });
</script>