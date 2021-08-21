
<?php include "connect.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="amazingJS.js"></script>
    <link rel="stylesheet" href="amazingCSS.css">
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="login-body">
    <div class="sign-box">
        <form  method="post" class="sign-form">
            <p style="color:orange;"><?=isset($err_login)?$err_login:""?></p>
            <h3>Đăng nhập</h3>
            <input type="text" name="username" placeholder="Tên đăng nhập"><br>
            <input type="password" name="password" id="password" placeholder="Mật khẩu">
            <div class="eye-show">
                <b class="show"><i class="fas fa-eye" id="eye1" onclick="Show()"></i></b>
                <b class="show"><i class="fas fa-eye-slash"id="eye2" onclick="Show()"></i></b>
            </div><br>
           <button name="login">Đăng nhập</button>
          <br><a href="signup.php">Tạo tài khoản</a>&emsp;
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