<?php include "connect.php";?>
<?php 
    if(empty($_SESSION['CustomerID'])){
        header('Location: /Amazing_Bridges');
        exit();
    }
 $query34="SELECT * FROM nguoi_dung Where CustomerID=".$_SESSION['CustomerID'];
 $result34=$connect->query($query34);

 $query35="SELECT * FROM news_bridges order by BNEWSID DESC limit 1 ";
 $result35=$connect->query($query35);

 $query36="SELECT * FROM news_covid where Status='1' order by NPostID DESC limit 1";
 $result36=$connect->query( $query36);

 $query37="SELECT * FROM news_covid where Status='2' order by NPostID DESC limit 1";
 $result37=$connect->query( $query37);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang người dùng</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="amazingJS.js"></script>
    <link rel="stylesheet" href="amazingCSS.css">
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="HighchartsJS/code/highcharts.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="UserBody" style="background-image:url('Images/Normal_images/Brooklyn Bridge.jpg');background-repeat:no-repeat;background-size:cover;">
<div class="header-box">
         <a href="/Amazing_Bridges/" class="header-img"><img width="200px" height="70px" src="Images/Amazing Bridges (2).png" alt="Amazing Bridges Logo"></a>
         <ul class="header-menu">
             <li class="header-news"><a href="">NEWS</a></li>&nbsp;
             <li class="header-input">
             <form action="" method="get">
                    <input type="hidden" name="action">
                    <input class="header-search" type="search" name="search" value="" placeholder="Tìm kiếm">
                    <button class="header-button"><i class="fas fa-search"></i></button>
                </form>
             </li>&emsp;
             <li class="header-nation">
             <form action="NationBridge.php" method="post">
                    <select  name="national" >
                        <option hidden> Quốc Gia</option>
                         <?php foreach($result1 as $item):?>
                            <option value="<?=$item['NationalID']?>"><?=$item['National_Name']?></option>
                        <?php endforeach;?>
                    </select>
                    <button class="header-button" name="submit"><i class="fas fa-search"></i></button>
                 </form>
             </li>&nbsp;
             <li class="header-charac"><a href="" class="hover-charac">Đặc điểm nổi bật</a></li>&nbsp;
             <?php if(empty($_SESSION['CustomerID'])):?>
                <li class="header-login"><a href="log_in.php">Đăng nhập</a></li>&nbsp;
             <?php endif;?>
                <?php foreach( $result34 as $item):?>
                 <li class="header-login"><a href="/Amazing_Bridges/User.php"><img width="30px" src="Images/User_images/<?=$data_user['Images']??'';?>" alt="">&nbsp;<?=$_SESSION['customer']?>&nbsp;<i class="fas fa-caret-down"></i></a></li>
                <?php endforeach;?>
             <li class="header-covid"><a href="Menu_covid19.php?option=tintuc"><h2><i class="fas fa-virus"></i>Covid19</h2></a></li>&nbsp;
         </ul>
      </div>
      <section class="under-header-menu">
      <ul class="menu-sub">
                <li class="first-list"><b>Thời gian</b>
                    <ul>
                        <li><a href="">Lâu đời nhất</a></li>
                        <li><a href=""> Thời gian thi công đặc biệt</a></li>
                        <li><a href="">Vẻ đẹp vượt thời gian</a></li>
                    </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b>Chiều dài</b>
                    <ul>
                        <li><a href=""> Dài nhất thế giới</a></li>
                        <li><a href="">Rộng nhất thế giới</a></li>
                    </ul>
                </li>&emsp;&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b> Hình dạng </b>
                     <ul>
                         <li><a href="">Thiết kế độc đáo </a></li>
                         <li><a href="">Cảm hứng sáng tạo</a></li>
                         <li><a href="">Kiệt tác kiến trúc thế giới</a></li>
                     </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b>Lịch sử</b>
                     <ul>
                         <li><a href=""> Những kỹ sư nổi tiếng</a></li>
                         <li><a href="">Chiều sâu văn hóa</a> </li>
                         <li><a href="">Câu chuyện lịch sử </a></li>
                     </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
            </ul> 
        </section> 
<br><br><br><br><br><br>
    <div class="user-form">
        <div class="left-form">
        <br><br><br><br><br><br>
        <?php foreach( $result34 as $item):?>
           <img src="Images/User_images/<?=$item['Images']?> " alt="">
        <?php endforeach;?>   
             <form action="" method="post" enctype="multipart/form-data">
                 <input type="file" name="image3" ><br>
                 <button type='submit' name="submit">Tải lên</button>
             </form>
             <a id="logout"><p>Đăng xuất&emsp;<i class="fas fa-sign-out-alt"></i></p></a><br>
             <a href="/Amazing_Bridges/ChangePassword.php">Đổi mật khẩu</a>
        </div>
        <div class="rightUser">
            <h2>Tin mới trong ngày</h2>
            <?php foreach( $result35 as $item):?>
            <a href="MainNew.php?BNEWSID=<?=$item['BNEWSID']?>" class="itemRightUser">
              <img src="Images/NEWS_images/<?=$item['BigImages']?>" alt="">
              <b><?=$item['BNEWS_Title']?></b>
            </a>
            <?php endforeach;?>
            <?php foreach( $result36 as $item):?>
            <a href="tinchinh.php?NPostID=<?=$item['NPostID']?>" class="itemRightUser">
              <img src="Images/NEWS_images/<?=$item['NSmallImages']?>" alt="">
              <b><?=$item['NTitle']?></b>
              
            </a>
            <?php endforeach;?>
            <?php foreach( $result37 as $item):?>
            <a href="tinchinh.php?NPostID=<?=$item['NPostID']?>" class="itemRightUser">
              <img src="Images/NEWS_images/<?=$item['NSmallImages']?>" alt="">
              <b><?=$item['NTitle']?></b>
            </a>
            <?php endforeach;?>
        </div>
    </div>

<?php
if(isset($_POST['submit'])) {
    $target_dir2 = "Images/User_images/";
    $file2=$_FILES["image3"];
    $target_file2 = $target_dir2 . basename($file2["name"]);
    $file_3=addslashes($file2["name"]);
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" 
    && $imageFileType2 != "gif" ) {
        $firstAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
        $uploadOk2 = 0;
    }
    if ($uploadOk2 == 0) {
        $firstAlert= "File của bạn không được Upload.";
    } else {
        if (move_uploaded_file($file2["tmp_name"], $target_file2)) {
            $firstAlert="File ". htmlspecialchars( basename($file2["name"])). " đã được Upload.";
            $query="UPDATE nguoi_dung SET Images='$file_3' where CustomerID=".$_SESSION['CustomerID'];
            $connect->query($query);
        } else {
            $firstAlert= "Có lỗi xảy ra khi upload file của bạn.";
        }
    }
}  
?>

</body>
</html>
<script>
    $(function() {
        $('#logout').click(function() {
            location = 'logout.php';
        })
    })
</script>
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