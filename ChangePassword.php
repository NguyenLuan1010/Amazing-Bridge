<?php include "connect.php";?>
<?php
if(isset($_POST['submit'])){
    $oldPassword=md5($_POST['oldPassword']);
    $query23="SELECT * FROM nguoi_dung where Password='$oldPassword'";
    $result23=$connect->query($query23);
    if(mysqli_num_rows($result23)==0){
        $alert3="Mật khẩu cũ không đúng .Mời nhập lại!";
    }else{
        $newPassword=md5($_POST['newPassword']);
        $query23="UPDATE admin SET Password='$newPassword'";
        $connect->query($query23);
        $alert3="Đổi mật khẩu thành công!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="amazingJS.js"></script>
    <link rel="stylesheet" href="amazingCSS.css">
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="login-body">
    <div class="sign-box">
        <form  method="post" class="sign-form">
            <p style="color:orange;"><?=isset($alert3)?$alert3:""?></p>
            <h3>Đăng nhập</h3>
            <input type="Password" name="oldPassword"  placeholder="Mật khẩu cũ"><br>
            <input type="password" name="newPassword" id="password" placeholder="Mật khẩu mới">
            <div class="eye-show">
                <b class="show"><i class="fas fa-eye" id="eye1" onclick="Show()"></i></b>
                <b class="show"><i class="fas fa-eye-slash"id="eye2" onclick="Show()"></i></b>
            </div><br>
           <button name="submit">Thay đổi</button>
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