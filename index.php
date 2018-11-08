<html>
<body>
<?php
    if(!isset($_COOKIE['OTP'])) {
        echo "Cookie is not set <br/>";
        echo "<a href='form-login.php'>Login First</a>";
    } else {
        header('location:page2.php');
    }
?>
</body>
</html>