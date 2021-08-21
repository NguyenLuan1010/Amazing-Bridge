<?php include "connect.php";?>
<?php
  $query="SELECT * FROM bridges_posts ";
  $result=$connect->query($query);
  if(isset($_SESSION['CustomerID'])){

      $query="SELECT * FROM nguoi_dung where CustomerID = ".$_SESSION['CustomerID'];
      $data_user = $connect->query($query);
      $data_user = mysqli_fetch_array($data_user);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazing Bridges</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="amazingJS.js"></script>
    <script src="owlCarousel/js/owl.carousel.min.js"></script>
    <script src="HighchartsJS/code/highcharts.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="SHORTCUT ICON" href='Images/Amazing Bridges (2).png'>
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
                <li class="header-login"><a href="/Amazing_Bridges/User.php"><img width="30px" src="Images/User_images/<?=$data_user['Images']??'';?>" alt="">&nbsp;<?=$_SESSION['customer']?>&nbsp;<i class="fas fa-caret-down"></i></a></li>
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
        <?php include "home.php";?>
      <?php
      if(isset($_GET['option'])){
          switch($_GET['option']){
            case 'home':{
                include "Views/home.php";
                break;
                } 
              case 'user':{
                  include "Views/User.php";
                  break;
                };

            }
        }
      ?>
    
</body>
</html>