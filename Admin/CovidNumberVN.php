
<?php
if(isset($_POST['submit'])){
  $CovidID=$_POST['ListCovid'];
  $CovidToday=$_POST['CovidToday'];
  $Sumcovid=$_POST['SumCovid'];
  $query26="UPDATE tinh_thanh SET covid_today='$CovidToday' ,sum_covid='$Sumcovid' where TableID='$CovidID'";
  $connect->query($query26);
  $alert="Thêm thành công số liệu";
};
if(isset($_POST['submit1'])){
   $pro=$_POST['tinhthanh'];
   $query27="SELECT * FROM tinh_thanh where Tinhthanh='$pro'";
   $result27=$connect->query($query27);
   $TotalCovid=$_POST['sumcovid'];
      $dailyCovid=$_POST['covidtoday'];
   if(mysqli_num_rows($result27)!=0){
      $alert1="Đã tồn tại tỉnh thành này!";
   }else{
      $query27="INSERT INTO tinh_thanh(Tinhthanh,covid_today,sum_covid) VALUES
      ('$pro','$dailyCovid',' $TotalCovid')";
      $connect->query($query27);
   }
};
if(isset($_POST['submit2'])){
   $firstNumber=$_POST['Today'];
   $secondNumber=$_POST['Sum'];
   $query28="UPDATE tinh_thanh SET daily_covid_VietNam='$firstNumber' where TableID='1'";
   $connect->query($query28);
   $query29="UPDATE tinh_thanh SET daily_covid_VietNam='$secondNumber' where TableID='10'";
   $connect->query($query29);
   $alert2="ok";
}
?>
<form action="" method="post" class="daily-covid">
   <h2>Số ca nhiễm tại Việt Nam</h2>
   <input type="number" name="Today" placeholder="Hôm nay">
   <input type="number" name="Sum" placeholder="Tổng"><br>
   <input type="submit" name="submit2" value="Thêm vào" id="SumSubmit">
</form>
<?php 
$query33="SELECT * from tinh_thanh";
$result33=$connect->query($query33);?>
<form action="" method="post" class="NumberCovidVN">
<br><br><h2>Thống Kê theo tỉnh thành</h2>
   <div class="covidContent">
   <section style="color:red;font-size:20px"><?=isset($alert)?$alert:""?></section>
      <select name="ListCovid">
      <?php foreach($result33 as $item):?>
         <option value="<?=$item['TableID']?>"><?=$item['Tinhthanh']?></option>
         <?php endforeach;?>
      </select>
      <strong><b>Hôm nay</b><b>Tổng</b></strong>
      <input type="number" name="CovidToday">
      <input type="number" name="SumCovid">
      <input id="VNSubmit" type="submit" name="submit" value="Gửi dữ liệu">
   </div>
</form>

<form action="" method="post" class="addTinh">
    <br><h2>Thêm trường cho bảng tinh_thanh</h2><br><br>
    <section style="color:red;font-size:20px"><?=isset($alert1)?$alert1:""?></section><br>
    <input type="text" name="tinhthanh" placeholder="Tỉnh thành">
    <input type="text" name="covidtoday" placeholder="Ca mắc hôm nay">
    <input type="text" name="sumcovid" placeholder="Tổng ca mắc"><br>
    <input type="submit" name="submit1" value="Thêm trường" id="addSubmit">
</form>