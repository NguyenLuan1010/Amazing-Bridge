<?php include "connect.php";?>
<?php
$query="SELECT * FROM bridges_posts where BPostID=".$_GET['BPostID'];
$result=$connect->query($query);

$query2="SELECT b.BPostID,b.BTitle,a.*
FROM bridge_specifications a Join bridges_posts b
WHere a.BPostID = b.BPostID  and b.BPostID=".$_GET['BPostID'];
$result2=$connect->query($query2);

$query3="SELECT b.BPostID, a.* FROM listimages a join bridges_posts b where a.BPostID=b.BPostID and b.BPostID=".$_GET['BPostID'];
$result3=$connect->query($query3);

$query0="SELECT b.Username,b.Images,a.* FROM comments a JOIN nguoi_dung b where a.CustomerID=b.CustomerID and BPostID= ".$_GET['BPostID'];
$result0=$connect->query($query0);

if(isset($_POST['comment'])){
    $comment=$_POST['comment'];
    if(empty($comment)){
        $alert="*Hãy để lại ý kiến của mình";
    }else{
    if(isset($_SESSION['customer'])){
            $BPostID=$_GET['BPostID'];
            $query4="SELECT * FROM nguoi_dung where UserName='".$_SESSION['customer']."'";
            $customerID=mysqli_fetch_array($connect->query($query4));
            $customerID=$customerID['CustomerID'];
            $connect->query("Insert Into comments(BPostID,CustomerID,Comment,Date,Status) Values ('$BPostID','$customerID','$comment',now(),'1')");
            header("Refresh:0;url=ConceptBridges.php?BPostID=".$_GET['BPostID']);
        }else{
            $_SESSION['comment']=$comment;
            echo "<script>alert('Hãy đăng nhập để bình luận');location='/Amazing_Bridges/log_in.php';</script>";
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
    <?php foreach($result as $item):?>
        <title><?=$item['BTitle']?></title>
    <?php endforeach;?>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="amazingJS.js"></script>
    <script src="owlCarousel/js/owl.carousel.min.js"></script>
    <script src="HighchartsJS/code/highcharts.js"></script>
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="owlCarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="owlCarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="amazingCSS.css">   
</head>
<body>
<div>
      <div class="header-box">
         <a href="/Amazing_Bridges/" class="header-img"><img width="200px" height="70px" src="Images/Amazing Bridges (2).png" alt="Amazing Bridges Logo"></a>
         <ul class="header-menu">
             <li class="header-news"><a href="News.php">NEWS</a></li>&nbsp;
             <li class="header-input">
             <form action="Searching.php" method="get">
                    <input type="hidden" name="action">
                    <input class="header-search" type="text" name="search" placeholder="Tìm kiếm">
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
             <li class="header-charac hover-charac"><a href="">Đặc điểm nổi bật</a></li>&nbsp;
             <?php if(empty($_SESSION['customer'])):?>
                <li class="header-login"><a href="log_in.php">Đăng nhập</a></li>&nbsp;
             <?php elseif(isset($_SESSION['customer'])):?>
                <li class="header-login"><a href="/Amazing_Bridges/User.php"><img width="30px" src="Images/User_images/<?=$data_user['Images']??'';?>" alt=""><?=$_SESSION['customer']?>&nbsp;<i class="fas fa-caret-down"></i></a></li>
             <?php endif;?>
             <li class="header-covid"><a href="/Amazing_Bridges/Menu_covid19.php?option=tintuc"><h2><i class="fas fa-virus"></i>Covid19</h2></a></li>&nbsp;
         </ul>
      </div>
      <section class="under-header-menu">
            <ul class="menu-sub">
                <li class="first-list"><b>Thời gian</b>
                    <ul>
                        <li><a href="showBridge/theOldest.php?YourOption=Lau-doi-nhat-the-gioi">Lâu đời nhất</a></li>
                        <li><a href="showBridge/Beautiful.php?YourOption=dep-nhat-the-gioi">Vẻ đẹp vượt thời gian</a></li>
                    </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b>Chiều dài</b>
                    <ul>
                        <li><a href="showBridge/theLongest.php?YourOption=dai-nhat-the-gioi"> Dài nhất thế giới</a></li>
                        <li><a href="showBridge/theBiggest.php?YourOption=cao-nhat-the-gioi">Cao nhất thế giới</a></li>
                    </ul>
                </li>&emsp;&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b> Hình dạng </b>
                     <ul>
                         <li><a href="showBridge/Design.php?YourOption=Thiet-ke-doc-dao">Thiết kế độc đáo </a></li>
                         <li><a href="showBridge/Inspire.php?YourOption=cam-hun-sang-tao">Cảm hứng sáng tạo</a></li>
                         <li><a href="showBridge/DangerBridge.php?YourOption=nguy-hiem-nhat-the-gioi">Nguy hiểm nhất thế giới</a></li>
                     </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b>Lịch sử</b>
                     <ul>
                         <li><a href="showBridge/History.php?YourOption=nguy-hiem-nhat-the-gioi">Câu chuyện lịch sử </a></li>
                     </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
            </ul> 
        </section> 
    </div>
    <div class="headerConcept">
        <?php foreach($result as $item):?>
        <img src="Images/Big_images/<?=$item['BBackImages']?>" alt="">
        <?php endforeach;?>
         <div class="insideHeaderConcept">
             <?php foreach($result2 as $item):?>
                <br><h2><?=$item['BTitle']?></h2>
                <br><p>Quốc gia: &emsp;<?=$item['National']?></p>
                <p>Vị trí:&emsp;<?=$item['Location']?></p>
                <p>Tọa độ:&emsp;<?=$item['Coordinates']?></p>
                <p>Đơn vị quản lý:&emsp;<?=$item['Management']?></p>
              
                <h2>Thông số kỹ thuật</h2>
                <p>Kiểu cầu:&emsp;<?=$item['BridgeType']?></p>
                <p>Vật liệu:&emsp;<?=$item['Material']?></p>
                <p>Tổng chiều dài:&emsp;<?=$item['Long']?></p>
                <p>Cao:&emsp;<?=$item['Height']?></p>
                <p>Độ cao từ mực nước:&emsp;<?=$item['HeightFromWater']?></p>
               <h2><a href="Views/Location-Map.php?BPostID=<?=$item['BPostID']?>">Vị trí trên bản đồ <i class="fas fa-map-marked-alt"></i></a></h2>
               <?php endforeach;?>
         </div>
    </div>
  <div class="PostBox1">  
    <div class="imageBox">
    <?php foreach($result3 as $item):?>
            <img src="Images/List_Images/<?=$item['ListImages']?>" alt="">
    <?php endforeach;?>        
    </div>
    <div class="postBridges">
        <?php foreach($result as $item):?>
            <p id="firstPost"><?=$item['BHeadPost']?></p>
        <?php endforeach;?>
    </div>
  </div> 
  <div class="PostBox2">
    <div class="postBridges2"> 
        <?php foreach($result as $item):?>
            <p ><?=$item['BBridgeDesign']?></p>
        <?php endforeach;?>
    </div>
    <div class="leftBridgeImage">
        <?php foreach($result3 as $item):?>
            <img src="Images/Design_images/<?=$item['DesignImages']?>" alt="">
        <?php endforeach;?>
    </div>
  </div> <br><br><br><br><br><br><br><br><br><br>
  <div class="PostBox3">
  <div class="RightBridgeImage">
        <?php foreach($result3 as $item):?>
            <img src="Images/History_images/<?=$item['HistoryImages']?>" alt="">
         <?php endforeach;?>
    </div>   
    <div  class="postBridges3">
        <?php foreach($result as $item):?>
            <p ><?=$item['BHistoryPost']?></p>
        <?php endforeach;?>
    </div> 
  </div>
  <?php foreach($result as $item):?>
    <a href="Download_Post/<?=$item['DownloadPost']?>" download class="downloadPost">Bạn có thể tải bài viết tại đây</a>
  <?php endforeach;?> 
  <br><br><br><br>
  <div class="CommentForm">
      <h2>Ý kiến của bạn</h2>
      <br>
      <section style="color:red;"><?=isset($alert)?$alert:""?></section>
      <br><br>
      <form action="" method="post">
        <input type="text" name="comment" placeholder="Điền ý kiến">
        <button name="submit">Gửi ý kiến</button>
      </form>
    </div>
    <div class="Usercomment">
       <?php foreach($result0 as $item):?>
        <div>
            <br><img width="50px"src="Images/User_images/<?=$item['Images']?>" alt="">
            <b>&emsp;<?=$item['Username']?></b>&emsp;<span>:<?=$item['Comment']?></span>
            &emsp; &emsp; &emsp;
            <span style="color:tomato" id="Date"> Ngày:<?=$item['Date']?></span>
        </div>
       <?php endforeach;?>
    </div>
<br><br><br><br>
<a href="https://www.vietnamairlines.com/vn/vi/home" class="planes">
    <div>
    <?php foreach($result as $item):?>
       <p>Bạn có thể tìm hiểu các chuyến bay đến <?=$item['BTitle']?> tại đây</p>
        <button>Tìm hiểu thêm</button>
    <?php endforeach;?>
    </div>
     <img src="Images/Big_images/VietNam airline.jpeg" alt="">
</a>
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