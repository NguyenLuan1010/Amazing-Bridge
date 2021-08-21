<?php
  if(isset($_POST['submit'])){
      $CovidTitle=$_POST['VNTitle'];
      $query21="SELECT*FROM news_covid where NTitle='$CovidTitle' and Status='1'";
      $result21=$connect->query($query21);
      if(mysqli_num_rows($result21)!=0){
          $alert="Bài viết này đã tồn tại.Hãy chọn bài viết khác!";
      }else{
        $covidPost=$_POST['VNPost'];
        ////Ảnh tin covid cỡ nhỏ
        $target_dir5 = "../Images/NEWS_images/";
        $file5=$_FILES["VNfile1"];
        $target_file5 = $target_dir5 . basename($file5["name"]);
        $file_5=$file5["name"];
        $fileFive=trim($file_5);
        $uploadOk5 = 1;
        $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));
        if($imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg" 
        && $imageFileType5 != "gif" ) {
            $thirdAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
            $uploadOk5 = 0;
        }
        if ($uploadOk5 == 0) {
            $thirdAlert= "File của bạn không được Upload.";
        } else {
            if (move_uploaded_file($file5["tmp_name"], $target_file5)) {
                $thirdAlert="File ". htmlspecialchars( basename($file5["name"])). " đã được Upload.";
            } else {
                $thirdAlert= "Có lỗi xảy ra khi upload file của bạn.";
            }
        } 
/////////////////////////////////////////////////////////////////////////////////
         //Ảnh tin covid cỡ lớn
        $target_dir6 = "../Images/NEWS_images/";
        $file6=$_FILES["VNfile2"];
        $target_file6 = $target_dir6 . basename($file6["name"]);
        $file_6=$file6["name"];
        $fileSix=trim($file_6);
        $uploadOk6 = 1;
        $imageFileType6 = strtolower(pathinfo($target_file6,PATHINFO_EXTENSION));
        if($imageFileType6 != "jpg" && $imageFileType6 != "png" && $imageFileType6 != "jpeg" 
        && $imageFileType6 != "gif" ) {
            $fourthAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
            $uploadOk6 = 0;
        }
        if ($uploadOk6 == 0) {
            $fourthAlert= "File của bạn không được Upload.";
        } else {
            if (move_uploaded_file($file6["tmp_name"], $target_file6)) {
                $fourthAlert="File ". htmlspecialchars( basename($file6 ["name"])). " đã được Upload.";
            } else {
                $fourthAlert= "Có lỗi xảy ra khi upload file của bạn.";
            }
        } 
////////////////////////////////////////////////////////////////////////////////
        $query21="INSERT INTO news_covid (NTitle,NPosts,NSmallImages,NBigImages,NDate,Status) VALUES
        ('$CovidTitle','$covidPost','$fileFive','$fileSix',now(),'1')";
        $connect->query($query21);
        $alert="Thêm bài viết thành công!";
      }
     }
  
?>
 <?php
  if(isset($_POST['submit1'])){
      $CovidTitle2=$_POST['WorldTitle'];
      $query22="SELECT*FROM news_covid where NTitle='$CovidTitle2' and Status='2'";
      $result22=$connect->query($query22);
      if(mysqli_num_rows($result22)!=0){
          $alert2="Bài viết này đã tồn tại.Hãy chọn bài viết khác!";
      }else{
        $covidPost2=$_POST['WorldPost'];
        ////Ảnh tin covid cỡ nhỏ
        $target_dir7 = "../Images/NEWS_images/";
        $file7=$_FILES["Worrldfile1"];
        $target_file7= $target_dir7 . basename($file7["name"]);
        $file_7=$file7["name"];
        $fileSeven=trim($file_7);
        $uploadOk7 = 1;
        $imageFileType7 = strtolower(pathinfo($target_file7,PATHINFO_EXTENSION));
        if($imageFileType7 != "jpg" && $imageFileType7 != "png" && $imageFileType7 != "jpeg" 
        && $imageFileType7 != "gif" ) {
            $fifthAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
            $uploadOk7 = 0;
        }
        if ($uploadOk7 == 0) {
            $fifthAlert= "File của bạn không được Upload.";
        } else {
            if (move_uploaded_file($file7["tmp_name"], $target_file7)) {
                $fifthAlert="File ". htmlspecialchars( basename($file7["name"])). " đã được Upload.";
            } else {
                $fifthAlert= "Có lỗi xảy ra khi upload file của bạn.";
            }
        } 
/////////////////////////////////////////////////////////////////////////////////
         //Ảnh tin covid cỡ lớn
        $target_dir8 = "../Images/NEWS_images/";
        $file8=$_FILES["Worrldfile2"];
        $target_file8 = $target_dir8 . basename($file8["name"]);
        $file_8=$file8["name"];
        $fileEight=trim($file_8);
        $uploadOk8 = 1;
        $imageFileType8 = strtolower(pathinfo($target_file8,PATHINFO_EXTENSION));
        if($imageFileType8 != "jpg" && $imageFileType8 != "png" && $imageFileType8 != "jpeg" 
        && $imageFileType8 != "gif" ) {
            $sixthAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
            $uploadOk8 = 0;
        }
        if ($uploadOk8 == 0) {
            $sixthAlert= "File của bạn không được Upload.";
        } else {
            if (move_uploaded_file($file8["tmp_name"], $target_file8)) {
                $sixthAlert="File ". htmlspecialchars( basename($file8 ["name"])). " đã được Upload.";
            } else {
                $sixthAlert= "Có lỗi xảy ra khi upload file của bạn.";
            }
        } 
////////////////////////////////////////////////////////////////////////////////
        $query22="INSERT INTO news_covid (NTitle,NPosts,NSmallImages,NBigImages,NDate,Status) VALUES
        ('$CovidTitle2','$covidPost2','$fileSeven','$fileEight',now(),'2')";
        $connect->query($query22);
        $alert2="Thêm bài viết thành công!";
      }
     }
  
?>