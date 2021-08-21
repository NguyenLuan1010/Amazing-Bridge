<?php 
  if(isset($_POST['username'])){
      $username=$_POST['username'];
      $password=md5($_POST['password']);
    $query="SELECT * FROM admin Where Username='$username' and Password='$password'";
    $result=$connect->query($query);
    if(empty($username) || empty($password)){
      $alert="*Vui lòng điền đầy đủ thông tin";
    }else{
      if(mysqli_num_rows($result)==0){
        $alert="*Tên  hoặc mật khẩu sai";
       }else{
          $_SESSION['admin']=$username;
          header("location:.");
        }
    }
  } 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang Admin</title>
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="../amazingCSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<div class="warning"><?=isset($alert)?$alert:""?></div>
    <form action="" method="post" class="formAdmin">
    <h1>Đăng nhập tài khoản Admin</h1>
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit"  value="Đăng nhập">
    </form>
    <br><br><br><br><br><br><br><br><br><br>
    <div class="Footer">
         <div class="Contact-left">
         <br><br><br>
                 <a href=""><i class="fab fa-facebook-f"></i>&emsp;Amazing Bridges </a>
                 <a href=""><i class="fab fa-instagram"></i>&emsp;Amazing Bridges.Vn</a>
                 <a href=""><i class="fab fa-twitter"></i>&emsp;AmazingBridges.vn</a>
                 <a href=""><i class="fas fa-envelope"></i>&emsp;AmazingBridges@gmail.com</a><br><br>
                 <h6><i class="fas fa-atom"></i>Amazing Bridges website được sáng tạo bởi Marvelous team&emsp;&emsp;<i class="fas fa-map-marker-alt"></i>&emsp;Việt Nam</h6>
          </div>
          <div class="Contact-right">
          <br><br><br>
             <h3>Hãy <a href="/Amazing_Bridges/signup.php">đăng ký</a> và <a href="/Amazing_Bridges/log_in.php">đăng nhập</a> tài khoản để nhận những thông báo mới nhất từ chúng tôi</h3>
             &nbsp;<div class="FooterMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9265584222285!2d105.81676191488347!3d21.035624385994563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d6e603741%3A0x208a848932ac2109!2sAptech%20Computer%20Education!5e0!3m2!1svi!2s!4v1622985107399!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>   
         </div>
    </div>
</body>
</html>