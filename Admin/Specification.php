<?php
  if(isset($_POST['submit'])){
      $Post=$_POST['postID'];
      $query10="SELECT* FROM bridge_specifications where BPostID='$Post'";
      if(mysqli_num_rows($connect->query($query10))!=0){
          $alert="*Đã tồn tại thông số này.Hãy chọn một bài viết khác!";
      }else{
         $national=$_POST['nations'];
         $location=addslashes($_POST['location']);
         $mapiframe=addslashes($_POST['map']);
         $coor=addslashes($_POST['coor']);
         $long=addslashes($_POST['long']);
         $height=addslashes($_POST['height']);
         $type=addslashes($_POST['type']);
         $height=$_POST['height'];
         $mana=$_POST['management'];
         $material=$_POST['material'];
         $heightFromWater=$_POST['heightwater'];
         $query10="INSERT INTO `bridge_specifications` (`SBridgeID`, `BPostID`, `National`, `Location`, `MapLine`, `Coordinates`, `Management`, `BridgeType`, `Material`, `Long`, `Height`, `HeightFromWater`) VALUES (NULL, '$Post', ' $national', '$location', '$mapiframe', '$coor', '$mana', '$type', ' $material', '$long', '$height', ' $heightFromWater');";
         $connect->query($query10);
         $alert="Thêm thông số thành công";
      }
  }
?>
<?php $post=$connect->query("SELECT * FROM bridges_posts")?>
<form action="" method="post" class="Specification">
<h2>Thông số kỹ thuật của cây cầu</h2>
<div style="color:red;font-size:20px;position:relative;left:54%;top:70px;"><?=isset($alert)?$alert:""?></div>
<br><select name="postID">
    <option hidden>Chọn bài viết</option>
    <?php foreach($post as $item):?>
        <option value="<?=$item['BPostID']?>"><?=$item['BTitle']?></option>
    <?php endforeach;?>
</select>
<input type="text" name="nations" placeholder="Điền tên quốc gia">
<br><br><textarea name="location" placeholder="vị trí"></textarea>
<br><br><input type="text" name="map" placeholder="Map iframe lấy từ Google Map với width và height là 100%" class="mappanel">
<br><br><input type="text" name="coor" placeholder="Tọa Độ" class="addSpe">
<input type="text" name="long" placeholder="Chiều dài" class="Longpanel">
<br><br><input type="text" name="management" placeholder="Đơn vị quản lý" class="addSpe">
<input type="text" name="height" placeholder="Chiều cao"class="Longpanel" >
<br><br><input type="text" name="type" placeholder="Kiểu cầu" class="addSpe">
<input type="text" name="heightwater" placeholder="Chiều cao từ mực nước biển" class="Longpanel">
<br><br><input type="text" name="material" placeholder="Vật liệu" class="addSpe"><br><br>
<button name="submit">Thêm vào</button>
</form>