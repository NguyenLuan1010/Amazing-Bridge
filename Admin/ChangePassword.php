<?php
if(isset($_POST['submit'])){
    $oldPassword=md5($_POST['oldPassword']);
    $query23="SELECT * FROM admin where Password='$oldPassword' and Status='1'";
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
<form action="" method="post" class="changePassword">
    <h2>Thay đổi mật khẩu</h2>
    <section style="color:red"><?=isset($alert3)?$alert3:""?></section>
  <input type="password" name="oldPassword" placeholder="Nhập mật khẩu cũ">
  <input type="password" name="newPassword" placeholder="Nhập mật khẩu mới">
  <input type="submit" name="submit" value="Thay đổi">
</form>