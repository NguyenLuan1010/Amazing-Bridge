<?php
  if(isset($_POST['submitChart'])){
      $date=$_POST['date'];
      $data1=$_POST['firstData'];
      $data2=$_POST['secondData'];
      $data3=$_POST['thirdData'];
      $data4=$_POST['fourthData'];
      $query35="INSERT INTO high_charts (date_charts,data1,data2,data3,data4) VALUES
                                         ('$date','$data1','$data2','$data3','$data4')";
              $connect->query($query35);                           
    $alert6="Thêm mới thành công";
  }
?>
<form action="" method="post" class="VNChart">
  <h2>Biểu đồ Covid tại Việt Nam</h2>
  <section style="color:red"><?=isset($alert6)?$alert6:""?></section>
  <input type="text" name="date" >
  <input type="number" name="firstData" placeholder="Số ca theo ngày">
  <input type="number" name="secondData" placeholder="Tổng số ca"><br><br><br>
  <input type="number" name="thirdData" placeholder="Ca nhiễm">
  <input type="number" name="fourthData" placeholder="Tử vong">
 &emsp;  &emsp; &emsp;<button name="submitChart">Thêm mới</button>
</form>