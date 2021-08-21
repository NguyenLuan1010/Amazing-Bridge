
<?php
  if(isset($_POST['submit'])){
      $bridgetitle=$_POST['bridgetitle'];
      $query22="SELECT * FROM news_bridges where BNEWS_Title='$bridgetitle'";
      $result22=$connect->query($query22);
      if(mysqli_num_rows($result22)!=0){
          $alert="*Đã tồn tại tin này.Hãy chọn tin mới khác!";
      }else{
        $bridgepost=$_POST['bridgepost'];
        $target_dir4 = "../Images/NEWS_images/";
        $file4=$_FILES["newimages"];
        $target_file4 = $target_dir4 . basename($file4["name"]);
        $file_4=$file4["name"];
        $fileFour=trim($file_4);
        $uploadOk4 = 1;
        $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
        if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg" 
        && $imageFileType4 != "gif" ) {
            $firstAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
            $uploadOk4 = 0;
        }
        if ($uploadOk4 == 0) {
            $firstAlert= "File của bạn không được Upload.";
        } else {
            if (move_uploaded_file($file4["tmp_name"], $target_file4)) {
                $firstAlert="File ". htmlspecialchars( basename($file4["name"])). " đã được Upload.";
            } else {
                $firstAlert= "Có lỗi xảy ra khi upload file của bạn.";
            }
        } 
        $query="INSERT INTO news_bridges (BNEWS_Title,BNEWS_Post,BigImages,Date) VALUES
        ('$bridgetitle','$bridgepost','$fileFour',now())";
        $connect->query($query);
      }
  }
?>

<form action="" method="post" class="NEWS_bridges"enctype="multipart/form-data"> 
    <h2>Thêm tin mới</h2>
   <br> <input type="text" name="bridgetitle" placeholder="Tiêu đề tin">
    <br><textarea name="bridgepost" id="bridgepost" ></textarea>
    <br><h2>Chọn ảnh</h2><input type="file" name="newimages"  id="fileNews">
    <br><button name="submit">Thên tin mới</button>
</form>