<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing in image"></figure>
                        <!--<a href="singup.php" class="signup-image-link">สมัครสมาชิก</a>-->
                    </div>

                    <div class="signin-form"><br><br>
                        <h4 class="form-title">เข้าสู่ระบบ สำหรับผู้ดูแลระบบ</h4>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="adname" id="adname" placeholder="ชื่อผู้ใช้งาน"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="รหัสผ่าน"/>
                            </div>
                           <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>จดจำการเข้าสู่ระบบ</label>
                            </div>-->
                            <div class="form-group form-button">
                                <input type="Submit" name="Submit" id="Submit" class="form-submit" value="เข้าสู่ระบบ"/>
                            </div>
                        </form>
                            <?php
                                include("../condb.php");
                                if(isset($_POST['Submit'])){
                                    $sql = "select * from admin where ad_name ='".$_POST['adname']."' and ad_pass ='".$_POST['password']."' LIMIT 1 ";
                                    $result = mysqli_query($con,$sql);
                                    $num = mysqli_num_rows($result);
                                    
                                    if($num == 1){
                                    $data = mysqli_fetch_array($result);
                                    $_SESSION['adid'] = $data['ad_id'];
                                    $_SESSION['adname'] = $data['ad_name'];
                                        
                                    echo "<script>";
                                    echo "alert('เข้าสู่ระบบสำเร็จ');";
                                    echo "window.location='../admin/index.php';";
                                    echo "</script>";	
                                    
                                    }else{
                                    echo "<script>";
                                    echo "alert('รหัสผ่านไม่ถูกต้อง');";
                                    echo "window.location='singin-admin.php';";
                                    echo "</script>";
                                    exit;
                                    }

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