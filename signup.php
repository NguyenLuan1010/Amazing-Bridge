<?php include "connect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="amazingJS.js"></script>
    <link rel="stylesheet" href="amazingCSS.css">
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="signup-body">
    <div class="signup-box">
        <p style="color:orange;font-size:20px"><?=isset($err_signup)?$err_signup:""?></p>
        <form action="" method="post" class="signup-form">
            <h3>Đăng ký</h3>
            <input type="text" name="Username" placeholder="Tên đăng nhập">
            <input type="text" name="Email" placeholder="Email">
            <input type="password" name="Password" id="password" placeholder="Password">
            <div class="eye-show">
                <b class="show"><i class="fas fa-eye" id="eye1" onclick="Show()"></i></b>
                <b class="show"><i class="fas fa-eye-slash"id="eye2" onclick="Show()"></i></b>
            </div>
            <input type="password" name="RePassword"  placeholder="Confirm Password">
            <button name="signup">Tạo tài khoản</button>
        </form>
    </div>
    <script>
    isBool=true;
     function Show(){
         if(isBool){
             document.getElementById('password').setAttribute('type','text');
             document.getElementById('eye2').style.display='none';
             document.getElementById('eye1').style.display='block';
             isBool=false;
         }else{
             document.getElementById('password').setAttribute('type','password');
             document.getElementById('eye2').style.display='block';
             document.getElementById('eye1').style.display='none';
             isBool=true;
         }
     }
     </script>
</body>
</html>