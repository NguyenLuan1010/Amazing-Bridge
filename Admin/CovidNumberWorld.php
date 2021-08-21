<?php 
  if(isset($_POST['submit3'])){
      $nhiem=$_POST['Nhiem'];
      $tuvong=$_POST['TuVong'];
      $khoi=$_POST['Khoi'];
      $query29="UPDATE quốc_gia SET dailyCovid='$nhiem' where NationalID='1'";
      $connect->query($query29);
      $query30="UPDATE quốc_gia SET dailyCovid='$tuvong' where NationalID='2'";
      $connect->query($query30);
      $query31="UPDATE quốc_gia SET dailyCovid='$khoi' where NationalID='3'";
      $connect->query($query31);
  };
  if(isset($_POST['submit4'])){
    $covidWorld=$_POST['CovidOnWorld'];
    $CaNhiem=$_POST['CaNhiem'];
    $CaTuVong=$_POST['CaTuVong'];
    $CaKhoi=$_POST['CaKhoi'];
    $query31="UPDATE quốc_gia SET first_data='$CaNhiem' ,second_data='$CaTuVong',third_data='$CaKhoi' where NationalID='$covidWorld'";
    $connect->query($query31);
    $alert="Thêm thành công!";
  };
  if(isset($_POST['submit5'])){
      $Nation=$_POST['national'];
      $query32="SELECT * FROM quốc_gia where National_Name='$Nation'";
      $result32=$connect->query($query32);
      $canhiem=$_POST['canhiem'];
            $catuvong=$_POST['catuvong'];
            $cakhoi=$_POST['cakhoi'];
      if(mysqli_num_rows($result32)!=0){
          $alert5="Đã tồn tại quốc gia này!Mời nhập quốc gia khác";
      }else{
            $query32="INSERT INTO quốc_gia (National_Name,first_data,second_data,third_data) VALUES
                                           ('$Nation','$canhiem','$catuvong','$cakhoi')";
              $connect->query($query32);    
              $alert5="Thêm thành công";                         
      }
  }
?>
<form action="" method="post" class="daily-covid2">
   <h2>Số ca nhiễm trên thế giới</h2><br>
   <input type="number" name="Nhiem" placeholder="Ca nhiễm">
   <input type="number" name="TuVong" placeholder="Ca tử vong">
   <input type="number" name="Khoi" placeholder="Ca khỏi"><br>
   <button name="submit3">Thêm mới</button>
</form>
<?php 
$query="SELECT * FROM quốc_gia";
$result=$connect->query($query);
?>
<form action="" method="post" class="CovidWorld">
    <h2>Thống kê theo quốc gia</h2>
    <section style="color:red;font-size:20px;margin-left:34%"><?=isset($alert)?$alert:""?></section>
    <select name="CovidOnWorld">
      <?php foreach($result as $item):?>
        <option value="<?=$item['NationalID']?>"><?=$item['National_Name']?></option>
      <?php endforeach;?>  
    </select>
    <div>
        <input type="number" name="CaNhiem" placeholder="Nhiễm">
        <input type="number" name="CaTuVong" placeholder="Tử vong">
        <input type="number" name="CaKhoi" placeholder="Khỏi">
    </div>
    <button name="submit4">Thêm mới</button>
</form>
<form action="" method="post" class="addNation">
    <h2>Thêm trường cho bảng quốc_gia</h2>
    <section style="color:red;font-size:20px;margin-left:22%"><?=isset($alert5)?$alert5:""?></section>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <input type="text" name="national" placeholder="Quốc gia"><br><br>
    <input type="text" name="canhiem" placeholder="Ca nhiễm ">
    <input type="text" name="catuvong" placeholder="Ca tử vong">
    <input type="text" name="cakhoi" placeholder="Ca khỏi"><br>
    <input type="submit" name="submit5" value="Thêm trường" id="addSubmit2">
</form>