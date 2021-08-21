<?php
   //Ảnh cỡ lớn
   
    if(isset($_POST['submit'])){
        // echo '<pre>';
        // var_dump($_POST);
        // die;
        $title=$_POST['name'];
        $query25="SELECT * FROM bridges_posts Where BTitle='$title'";
       $connect->query($query25);
        if(mysqli_num_rows($connect->query($query25))!=0){
            $alert="Đã tồn tại bài viết này";
        }else{
        $nation=$_POST['Nations'];
        $Intro_post=addslashes($_POST['Post-intro']);
        $Design_post=addslashes($_POST['Post-design']);
        $History_post=addslashes($_POST['Post-history']);

        $target_dir = "../Images/Big_images/";
        $file=$_FILES["image1"];
        $target_file = $target_dir . basename($file["name"]);
        $file_1=$file["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
        && $imageFileType != "gif" ) {
            $firstAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            $firstAlert= "File của bạn không được Upload.";
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $firstAlert="File ". htmlspecialchars( basename($file["name"])). " đã được Upload.";
            } else {
                $firstAlert= "Có lỗi xảy ra khi upload file của bạn.";
            }
        } 

    
/////////////////////////////////////////////////////////////////////////

//Ảnh cỡ vừa


    $target_dir1 = "../Images/Normal_images/";
    $file1=$_FILES["image2"];
    $target_file1 = $target_dir1 . basename($file1["name"]);
    $file_2=$file1["name"];
    $uploadOk1 = 1;
    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" 
    && $imageFileType1 != "gif" ) {
        $firstAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
        $uploadOk1 = 0;
    }
    if ($uploadOk1 == 0) {
        $firstAlert= "File của bạn không được Upload.";
    } else {
        if (move_uploaded_file($file1["tmp_name"], $target_file1)) {
            $firstAlert="File ". htmlspecialchars( basename($file1["name"])). " đã được Upload.";
        } else {
            $firstAlert= "Có lỗi xảy ra khi upload file của bạn.";
        }
    } 

/////////////////////////////////////////////////////////////////////////


//Ảnh background:


    $target_dir2 = "../Images/Big_images/";
    $file2=$_FILES["image3"];
    $target_file2 = $target_dir2 . basename($file2["name"]);
    $file_3=$file2["name"];
    $uploadOk2 = 1;
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" 
    && $imageFileType2 != "gif" ) {
        $firstAlert= " Chỉ các file JPG, JPEG, PNG & GIF được cho phép upload!.";
        $uploadOk2 = 0;
    }
    if ($uploadOk2 == 0) {
        $firstAlert= "File của bạn không được Upload.";
    } else {
        if (move_uploaded_file($file2["tmp_name"], $target_file2)) {
            $firstAlert="File ". htmlspecialchars( basename($file2["name"])). " đã được Upload.";
        } else {
            $firstAlert= "Có lỗi xảy ra khi upload file của bạn.";
        }
    } 

/////////////////////////////////////////////////////////////////////////
//Up File cho người dùng download :
$target_dir11 = "../Download_Post/";
    $file11=$_FILES["downloadPost"];
    $target_file11 = $target_dir11 . basename($file11["name"]);
    $file_11=$file11["name"];
    $uploadOk11 = 1;
    $imageFileType11 = strtolower(pathinfo($target_file11,PATHINFO_EXTENSION));
    if ($uploadOk11 == 0) {
        $firstAlert11= "File của bạn không được Upload.";
    } else {
        if (move_uploaded_file($file11["tmp_name"], $target_file11)) {
            $firstAlert11="File ". htmlspecialchars( basename($file11["name"])). " đã được Upload.";
        } else {
            $firstAlert11= "Có lỗi xảy ra khi upload file của bạn.";
        }
    } 
//////////////////////////////////

    $query25="INSERT INTO bridges_posts (BPostID,NationalID,BTitle,BHeadPost,BBridgeDesign,BHistoryPost,DownloadPost,BBigImages,BNormalImages,BBackImages) VALUES (NULL, '$nation', '$title', '$Intro_post', '$Design_post', '$History_post','$file_11','$file_1', '$file_2', '$file_3'); ";                                     
    // echo $query25;die;
    $connect->query($query25);
        
     $id_post=mysqli_insert_id($connect);
     //Danh sách ảnh khác nhau:

   $files=$_FILES['ListImage'];
   $file_name=$files['name'];  
   foreach($file_name as $key1=>$value1){
       move_uploaded_file($files['tmp_name'][$key1],'../Images/List_Images/'.$value1);
       $secondAlert="File đã được Upload.";
       $connect->query("INSERT INTO listimages (BPostID,ListImages) VAlues('$id_post','$value1')");
   }

/////////////////////////////////////////////////////////////////////////
//Danh sách ảnh liên quan tới thiết kế cây cầu:

$files1=$_FILES['DesignImage'];
$file_name1=$files1['name'];
foreach($file_name1 as $key2=>$value2){
    move_uploaded_file($files1['tmp_name'][$key2],'../Images/Design_images/'.$value2);
    $secondAlert="File đã được Upload.";
    $connect->query("INSERT INTO listimages (BPostID,DesignImages) VAlues('$id_post','$value2')");
}

/////////////////////////////////////////////////////////////////////////
//Danh sách liên quan đến lịch sử cây cầu
$files2=$_FILES['HistoryImage'];
$file_name2=$files2['name'];
foreach($file_name2 as $key3=>$value3){
move_uploaded_file($files2['tmp_name'][$key3],'../Images/History_images/'.$value3);
$secondAlert="File đã được Upload.";
$connect->query("INSERT INTO listimages (BPostID,HistoryImages) VAlues('$id_post','$value3')");
}
    }
  }
 
/////////////////////////////////////////////////////////////////////////
?>

<!-- 1,1,6,7,3,8,10,3,18,64,41,80,92,125,71,82,73,104,165,187,181,152,175,114,131,143,31 -->
<!-- 1,1,7,14,17,25,35,38,56,120,161,241,333,458,529,611,684,788,953,1140,1321,1473,1539,1762,1893,2036,2067 -->
<!-- 148988607,149880933,150184171,151661490,152475767,153172690 -->
<!-- 3148118,3163494,3178814,3193122,3206189,3216272,3226929,3240616,3255261,3283071,3296193,3306575,3317205,3330632,3344507,3357997,3370869 -->