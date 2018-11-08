<?php
ob_start();
if (isset($_POST['submit'])){
    $kodeOtp = $_POST['kodeOtp'];  
    if($_COOKIE['OTP']==$kodeOtp){
        header('location:page2.php');
    }else{
        echo "Wrong OTP code";
    }   
}
ob_end_flush();
?>

<html>
    <head>
        <title>Test OTP</title>
    </head>
    <body>
    <form action="form-otp.php" method="post">
        <table>
            <tr>
                <td>Kode OTP</td>
                <td><input type="text" name="kodeOtp" value=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit" >Login</button></td>
            </tr>
        </table>
    </form>
    </body>
</html>