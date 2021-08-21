<?php
   $query6="SELECT* FROM news_covid Where Status='1' ORDER BY NPostID DESC LIMIT 1;";
   $result6=$connect->query($query6);

   $query7="SELECT * FROM news_covid where Status='2'  LIMIT 6";
   $result7=$connect->query($query7);
 
   $query8="SELECT * FROM news_covid  Where  Status='1'  LIMIT 6;";
   $result8=$connect->query($query8);
?>

    <img src="Images/Big_images/Banner Covid19.jpg"class="covidImage" alt="">

 <?php foreach($result6 as $item):?>
    <a href="tinchinh.php?NPostID=<?=$item['NPostID']?>"><div class="new-header">
        <img src="Images/NEWS_images/<?=$item['NSmallImages']?>" alt="">
          <div class="main-content">
            <h3><?=$item['NTitle']?></h3>
            <p>
            <?=$item['NPosts']?>
            </p>
        </div>
    </div></a>
 <?php endforeach;?>   
 <?php foreach($result8 as $item):?>
    <a href="tinchinh.php?NPostID=<?=$item['NPostID']?>" class="listPostCovid">
        <div href="" class="centerPostCovid">
                  <img src="Images/NEWS_images/<?=$item['NSmallImages']?>" alt="">
                  <div class="covidNew"><br><h3><?=$item['NTitle']?></h3><br>
                  <p><?=$item['NPosts']?></p></div>
        </div>
    </a>
 <?php endforeach;?>   
 <?php foreach($result7 as $item):?>
            <a href="tinchinh.php?NPostID=<?=$item['NPostID']?>" class="Left-new">
                    <div class="covidContent">
                        <br><h3><?=$item['NTitle']?></h3>
                        <br><p><?=$item['NPosts']?></p>
                    </div>    
                    <br><img src="Images/NEWS_images/<?=$item['NSmallImages']?>" alt="">
            </a>
 <?php endforeach;?>    

    