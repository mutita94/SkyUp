<?php
session_start();
include("../condb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                <div class="signin-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">สมัครสมาชิก</h2>
                        <form method="POST" class="register-form">
                            <div class="form-group" >
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username"  placeholder="ชื่อผู้ใช้"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock" ></i></label>
                                <input type="password" name="pass"  placeholder="รหัสผ่าน"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" placeholder="อีเมล์"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-phone" ></i></label>
                                <input type="text" name="phone"  placeholder="เบอร์โทร"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="Submit" name="Submit"  class="form-submit" value="สมัครสมาชิก"/>
                            </div>
                        </form>
                <?php
                    if(isset($_POST['Submit'])){
                        $sql = "INSERT INTO member (m_id,m_name,m_pass,m_mail,m_phone)
                        VALUES('','".$_POST['username']."','".$_POST['pass']."','".$_POST['email']."','".$_POST['phone']."')";
                        mysqli_query($con,$sql) or die ("สมัครสมาชิกไม่สำเร็จ"); 
                        echo "<script>";
                        echo "alert('สมัครสมาชิกสำเร็จ');";
                        echo "window.location='singin.php';";
                        echo "</script>";
                    }
                ?>				
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>