<?php
session_start();
$connect=new MySqli("localhost","root","","amazing_bridges");

//Hiển thị tên quốc gia 
$query1="SELECT * FROM quốc_gia";
$result1=$connect->query($query1);
//Hiển thị hình ảnh cho background trang chủ
$query="SELECT BackImage FROM bridge_images WHERE BImage='1'";
$result=$connect->query($query);

//Hiển thị ảnh header cho NEWS
 $query3="SELECT NHeadImage FROM news where NPostID='1'";
 $result3=$connect->query($query3);
 
//Chức năng đăng ký
if(isset($_POST['signup'])){
    $username=$_POST['Username'];
    $query="SELECT * FROM nguoi_dung Where Username='$username'";
    $result=$connect->query($query);
    $email=$_POST['Email'];
    $password=md5($_POST['Password']);
    $repassword=md5($_POST['RePassword']);
    $pattern="/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";
    if(empty($username) || empty($email) || empty($password)){
       $err_signup="*Vui lòng điền đầy đủ thông tin";
    }else{
      if(is_numeric($username)){
           $err_signup="*Tên đăng nhập không chỉ chứa ký tự số";
      }else{
        if(strlen($username)<6){
          $err_signup="*Tên đăng nhập phải nhiều hơn 5 ký tự";
        }else{
          if(mysqli_num_rows($result)!=0){
            $err_signup="*Đã tồn tại tên này.Vui lòng chọn một tên khác";
          }else{
            if(!preg_match($pattern,$email)){
            $err_signup="*Hãy nhập đúng địa chỉ Email!";
            }else{
                if(strlen($password)<6 ){
                      $err_signup="*Mật khẩu phải có từ 6 ký tự";
                }else{
                if($password != $repassword){
                     $err_signup="*Mật khẩu không khớp.Hãy thử lại!";
                }else{
                    $query="INSERT INTO nguoi_dung (Username,Email,Password) VALUES ('$username','$email','$password')";
                    $connect->query($query);
                    header("location:/Amazing_Bridges/log_in.php");
                }
              }
             }
            }
          }
        }
      }
      
  }

  //Chức năng đăng nhập
  if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $query="SELECT * FROM nguoi_dung Where Username='$username' and Password='$password'";
    $result=$connect->query($query);
    if(empty($username) || empty($password)){
      $err_login="*Vui lòng điền đầy đủ thông tin";
    }else{
      if(mysqli_num_rows($result)==0){
        $err_login="*Tên  hoặc mật khẩu sai";
       }else{
        $data = mysqli_fetch_array($result);
        if($data['Status']==0){
          $err_login="*Tài khoản đã bị khóa!";
        }else{
          $_SESSION['CustomerID']=$data['CustomerID'];
          $_SESSION['customer']=$data['Username'];
          header("location:/Amazing_Bridges/");
        }
    }
  } 
}
?>