<?php include "connect.php"; ?>
<?php
 $result20=array();
  if(isset($_GET['search'])){
      $query20="SELECT * FROM bridges_posts where BHeadPost like '%".$_GET['search']."%' or 
      BBridgeDesign like '%".$_GET['search']."%' or BHistoryPost like '%".$_GET['search']."%'";
      $page=1;
      if(isset($_GET['page'])){
          $page=$_GET['page'];
      }
      $productPage=4;
      $from=($page-1)*$productPage;
      $totalProduct=$connect->query($query20);
      $totalPage=ceil(mysqli_num_rows($totalProduct)/$productPage);
      $query20.=" limit $from,$productPage";
      $result20=$connect->query($query20);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
<body style="background-image:url('Images/Big_images/SearchBack.jpg'); background-attachment: fixed;
  background-position:center;background-repeat:no-repeat;background-size:cover;">
<div class="header-box">
         <a href="/Amazing_Bridges/" class="header-img"><img width="200px" height="70px" src="Images/Amazing Bridges (2).png" alt="Amazing Bridges Logo"></a>
         <ul class="header-menu">
             <li class="header-news"><a href="News.php">NEWS</a></li>&nbsp;
             <li class="header-input">
             <form action="Searching.php" method="get">
                    <input type="hidden" name="action">
                    <input class="header-search" type="text" name="search" placeholder="T??m ki???m">
                    <button class="header-button"><i class="fas fa-search"></i></button>
                </form>
             </li>&emsp;
             <li class="header-nation">
                 <form action="NationBridge.php" method="post">
                    <select  name="national" >
                        <option hidden> Qu???c Gia</option>
                         <?php foreach($result1 as $item):?>
                            <option value="<?=$item['NationalID']?>"><?=$item['National_Name']?></option>
                        <?php endforeach;?>
                    </select>
                    <button class="header-button" name="submit"><i class="fas fa-search"></i></button>
                 </form>
             </li>&nbsp;
             <li class="header-charac hover-charac"><a href="">?????c ??i???m n???i b???t</a></li>&nbsp;
             <?php if(empty($_SESSION['customer'])):?>
                <li class="header-login"><a href="log_in.php">????ng nh???p</a></li>&nbsp;
             <?php elseif(isset($_SESSION['customer'])):?>
                <li class="header-login"><a href="/Amazing_Bridges/User.php"><img width="30px" src="Images/User_images/<?=$data_user['Images']??'';?>" alt=""><?=$_SESSION['customer']?>&nbsp;<i class="fas fa-caret-down"></i></a></li>
             <?php endif;?>
             <li class="header-covid"><a href="/Amazing_Bridges/Menu_covid19.php?option=tintuc"><h2><i class="fas fa-virus"></i>Covid19</h2></a></li>&nbsp;
         </ul>
      </div>
      <section class="under-header-menu">
            <ul class="menu-sub">
                <li class="first-list"><b>Th???i gian</b>
                    <ul>
                        <li><a href="showBridge/theOldest.php?YourOption=Lau-doi-nhat-the-gioi">L??u ?????i nh???t</a></li>
                        <li><a href="showBridge/Beautiful.php?YourOption=dep-nhat-the-gioi">V??? ?????p v?????t th???i gian</a></li>
                    </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b>Chi???u d??i</b>
                    <ul>
                        <li><a href="showBridge/theLongest.php?YourOption=dai-nhat-the-gioi"> D??i nh???t th??? gi???i</a></li>
                        <li><a href="showBridge/theBiggest.php?YourOption=cao-nhat-the-gioi">Cao nh???t th??? gi???i</a></li>
                    </ul>
                </li>&emsp;&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b> H??nh d???ng </b>
                     <ul>
                         <li><a href="showBridge/Design.php?YourOption=Thiet-ke-doc-dao">Thi???t k??? ?????c ????o </a></li>
                         <li><a href="showBridge/Inspire.php?YourOption=cam-hun-sang-tao">C???m h???ng s??ng t???o</a></li>
                         <li><a href="showBridge/DangerBridge.php?YourOption=nguy-hiem-nhat-the-gioi">Nguy hi???m nh???t th??? gi???i</a></li>
                     </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
                <li class="first-list"><b>L???ch s???</b>
                     <ul>
                         <li><a href="showBridge/History.php?YourOption=nguy-hiem-nhat-the-gioi">C??u chuy???n l???ch s??? </a></li>
                     </ul>
                </li>&emsp;&emsp;&emsp;&emsp;
            </ul> 
        </section> 
    </div>
        <div class="itemSearch" style="width:80%;height:1300px;margin:auto">
            <?php foreach($result20 as $item1):?>
                <a class="MainSearch" href="ConceptBridges.php?BPostID=<?=$item1['BPostID']?>" >
                    <img  src="Images/Big_images/<?=$item1['BBigImages']?>" alt="">
                    <div class="absoluteSearch"></div>
                    <div class="SearchList"><br><h2>&emsp;<?=$item1['BTitle']?></h2>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
        <div class="VNNEWSBOX">
            <div class="SearchPage">
                <?php for($i=1; $i<=$totalPage;$i++):?>
                    <a href="?action=&search=<?=$_GET['search']?>&page=<?=$i?>"><?=$i?></a>&emsp;&emsp;
                <?php endfor;?>
            </div>
        </div>    
            <br><br><br>
    <div class="searchFooter">
        <div class="Footer">
         <div class="Contact-left">
                 <a href=""><i class="fab fa-facebook-f"></i>&emsp;Amazing Bridges </a>
                 <a href=""><i class="fab fa-instagram"></i>&emsp;Amazing Bridges.Vn</a>
                 <a href=""><i class="fab fa-twitter"></i>&emsp;AmazingBridges.vn</a>
                 <a href=""><i class="fas fa-envelope"></i>&emsp;AmazingBridges@gmail.com</a><br><br>
                 <h6><i class="fas fa-atom"></i>Amazing Bridges website ???????c s??ng t???o b???i Marvelous team&emsp;&emsp;<i class="fas fa-map-marker-alt"></i>&emsp;Vi???t Nam</h6>
          </div>
          <div class="Contact-right">
          <br><br><br>
             <h3>H??y <a href="/Amazing_Bridges/signup.php">????ng k??</a> v?? <a href="/Amazing_Bridges/log_in.php">????ng nh???p</a> t??i kho???n ????? nh???n nh???ng th??ng b??o m???i nh???t t??? ch??ng t??i</h3>
             &nbsp;<div class="FooterMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9265584222285!2d105.81676191488347!3d21.035624385994563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d6e603741%3A0x208a848932ac2109!2sAptech%20Computer%20Education!5e0!3m2!1svi!2s!4v1622985107399!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>   
         </div>
        </div>
    </div> 
</body>
</html>

    