<?php
include 'config/library.php';
if (isset($_POST['kirim_otp'])){
    $cookie = 'OTP';
    $no_hp = $_POST['no_hp'];
    $kode_otp = randomString(6); 
    setcookie($cookie, $kode_otp, time() + (86400 * 7), '/'); // 86400 = 1 day 
    header("location:config/sample_api_otp_send_json.php?no_hp=$no_hp&kode_otp=$kode_otp"); 
    exit();    
}
?>
<html>
    <head>
        <title>Test OTP</title>
    </head>
    <body>
    <form action="form-login.php" method="post">
        <table>
            <tr>
                <td>Nomor HP</td>
                <td> <input type="text" name="no_hp" value="<?php echo isset($_GET['no_hp']) ? $_GET['no_hp'] : "";?>"><input type="submit" name="kirim_otp" value="SEND OTP"></td>
            </tr>
        </table>
    </form>
    </body>
</html>


