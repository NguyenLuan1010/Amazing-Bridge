    
<?php
  $connect=new MySqli("localhost","root","","amazing_bridges");
  $query="SELECT * FROM quốc_gia";
  $result=$connect->query($query);
  $query="SELECT Tinhthanh,covid_today,sum_covid FROM tinh_thanh";
  $result=$connect->query($query);

  $query2="SELECT daily_covid_VietNam FROM tinh_thanh Where TableID='1'";
  $result2=$connect->query($query2);

  $query3="SELECT daily_covid_VietNam FROM tinh_thanh Where TableID='10'";
  $result3=$connect->query($query3);
?>
    
<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<h1 id="Titleh1">Số liệu Covid tại Việt Nam</h1>
<br><div class="update">
        <?php foreach($result2 as $item):?>
   <div  class="today"> Hôm nay:<span id="first-covid-record"><?=$item['daily_covid_VietNam']?></span></div>&emsp;&emsp;&emsp;
        <?php endforeach;?>
        <?php foreach($result3 as $item):?>
   <div  class="today"> Tổng:<span id="first-covid-record"><?=$item['daily_covid_VietNam']?></span></div>
        <?php endforeach;?>
</div>

    <br><br><div class="first_chart">
        <span id="container"></span>
        <span id="container2"></span>
    </div>
   <?php include "highcharts1.php" ?>
<br> <b id="title_second_chart">Thống kê theo tỉnh thành:</b><br><br>
<div class="second_chart">
        <div class="table">
           <section class="menu_table">
               <b>Hôm nay</b>
               <b id="Sum_table"> Tổng</b>
          </section>
           <hr>
           <br>
           <div class="second_menu_table">
               <ul>
                <?php foreach($result as $item):?>
                    <li id="covid-record2"><strong style="display: table-cell;font-size:17px;color:"><?=$item['Tinhthanh']?>:</strong>
                    <b  class="covid-Vietnam"><?=$item['covid_today']?></b>
                     <b class="covid-Vietnam"><?=$item['sum_covid']?></b></li><hr>
                <?php endforeach;?> 
               </ul>
           </div>
           <br>
        </div>
</div>

<br><br><br><br>

