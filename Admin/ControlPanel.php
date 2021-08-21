<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../jquery-3.5.1.min.js"></script>
    <script src="../amazingJS.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <link rel="SHORTCUT ICON" href='../Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="../amazingCSS.css">
</head>
<body>
<div class="headPanel">
    <h2>Admin Control Panel</h2>
    <ul>
       <li><a href="" class="userHover"><b>Quản trị:</b>&emsp;<?=$_SESSION['admin']?></a>
       <ul class="underPanel">
            <a href="?option=Change-Password">Đổi mật khẩu</a> |
            <a href="?option=Logout">Đăng xuất</a> 
        </ul></li>
    </ul>
</div>
<div class="listOption">
    <ul >
        <li><a href="?option=PostAdd">Thêm bài viết</a></li>
        <li><a href="?option=Specifications">Thông số kỹ thuật</a></li>
        <li><a href="?option=new-bridges-add">Thêm tin tức-Cây cầu</a></li>
        <li><a href="?option=new-covid-add">Thêm tin tức-Covid</a></li>
        <li><a href="?option=mana-comment">Quản lý Comment</a></li>
        <li><a href="?option=du-lieu-covid-Viet-Nam">Dữ liệu Covid Việt Nam</a></li>
        <li><a href="?option=du-lieu-covid-The-gioi">Dữ liệu Covid trên thế giới</a></li>
        <li><a href="?option=bieu-do-covid">Biểu đồ </a></li>
        
    </ul>
</div>
<?php
if(isset($_GET['option'])){
    switch($_GET['option']){
        case 'PostAdd':{
            include "PostAdd.php";
            break;
        };
        case 'Specifications':{
            include "Specification.php";
            break;
        };
        case 'Logout':{
           unset($_SESSION['admin']);
           header("location:/Amazing_Bridges/");
        };
        case 'new-bridges-add':{
            include "NewsBridgesAdd.php";
            break;
        }
        case 'new-covid-add':{
           include "NEWSCovidAdd.php";
           break;
        };
        case 'Change-Password':{
            include "ChangePassword.php";
            break;
        };
        case 'du-lieu-covid-Viet-Nam':{
            include "CovidNumberVN.php";
            break;
        };
        case'du-lieu-covid-The-gioi':{
            include "CovidNumberWorld.php";
            break;
        };
        case 'bieu-do-covid':{
            include "CovidChart.php";
            break;
        };
        case 'mana-comment':{
            include "ManaComment.php";
            break;
        }
    }
}
?>
</body>
</html>