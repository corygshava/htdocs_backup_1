<?php
    $redirect_delay = isset($redirect_delay) ? $redirect_delay : 3;
    $thepage = isset($thepage) ? $thepage : "index.php";

    // PHP redirection after a delay
    header("refresh:$redirect_delay;url=$thepage");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body>
    <p>Redirecting in <span id="timer"><?php echo $redirect_delay; ?> seconds</span>...</p>
    <p>If you are not redirected, <a href="index.php">click here</a>.</p>

    <script>
        var thetime = <?php echo ($redirect_delay + 1);?>;

        // JavaScript function to update the timer
        function updateTimer(seconds) {
            document.getElementById('timer').innerText = seconds + ' seconds';
            if (seconds <= 0) {
                clearInterval(timerInterval);
            }
        }

        updateTimer(thetime);

        var timerInterval = setInterval(() => {
            updateTimer(thetime);
            thetime --;
        }, 1000);
    </script>
</body>
</html>
