<?php
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
    <link rel="SHORTCUT ICON" href='../Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="amazingCSS.css">
</head>
<body>
    <?php
    if(empty($_SESSION['admin'])){
     include "login_admin.php";
     }else{
         include "ControlPanel.php";
     }
    ?>
</body>
</html>