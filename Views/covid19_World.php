    
<?php
  $connect=new MySqli("localhost","root","","amazing_bridges");
  $query="SELECT * FROM quốc_gia";
  $result=$connect->query($query);
  $query2="SELECT dailyCovid FROM quốc_gia Where NationalID='1'";
  $result2=$connect->query($query2);

  $query3="SELECT dailyCovid FROM quốc_gia Where NationalID='2'";
  $result3=$connect->query($query3);

  $query4="SELECT dailyCovid FROM quốc_gia Where NationalID='3'";
  $result4=$connect->query($query4);
?>
    
<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<h1 id="Worldh1">Số liệu Covid trên thế giới</h1>
<br>
<div class="update">
        <?php foreach($result2 as $item):?>
   <div  class="today"> Nhiễm:<span id="first-covid-record"><?=$item['dailyCovid']?></span></div>&emsp;&emsp;&emsp;
        <?php endforeach;?>
        <?php foreach($result3 as $item):?>
   <div  class="today"> Tử vong:<span id="second-covid-record"><?=$item['dailyCovid']?></span></div>&emsp;&emsp;&emsp;
        <?php endforeach;?>
        <?php foreach($result4 as $item):?>
   <div  class="today"> Khỏi:<span id="third-covid-record"><?=$item['dailyCovid']?></span></div>
        <?php endforeach;?>
</div>
<br><br>
    <div class="first_chart">
        <span id="container3"></span>
        <span id="container4"></span>
    </div>
   <?php include "highcharts2.php" ?>
<br> <b id="title_second_chart">Thống kê theo quốc gia:</b><br><br>
<div class="second_chart">
        <div class="table">
           <section class="menu_table">
               <b>Nhiễm</b>
               <b id="Sum_table"> Tử vong</b>
               <b>Khỏi</b><br>
          </section>
           <hr>
           <br>
           <div class="second_menu_table">
               <ul>
                <?php foreach($result as $item):?>
                    <li id="covid-record1"><strong style="display: table-cell;font-size:17px"><?=$item['National_Name']?>:</strong>
                    <b style="color:red;" class="covid-world"><?=$item['first_data']?></b>
                     <b class="covid-world"><?=$item['second_data']?></b>
                     <b style="color:green" class="covid-world"><?=$item['third_data']?></b>
                    </li><hr>
                <?php endforeach;?> 
               </ul>
           </div>
           <br>
        </div>
</div>
<br><br><br><br>



