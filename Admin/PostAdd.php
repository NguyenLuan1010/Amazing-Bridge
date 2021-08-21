
<?php include "View/PostAdd-connect.php" ?>
<?php $nation=$connect->query("SELECT * FROM quốc_gia")?>

<form action="" method="post" class="Post" enctype="multipart/form-data">
    <br><h2 style="color:blue">Thêm bài viết về các cây cầu</h2><br>

    <input type="text" name="name" placeholder="Tên Cây cầu">

    <select name="Nations" id="Nation">
    <option hidden>Quốc Gia</option>
    <?php foreach($nation as $item):?>
     <option value="<?=$item['NationalID']?>"><?=$item['National_Name']?></option>
    <?php endforeach;?>
    </select><br><br><br>
    <section style="color:red"><?=isset($firstAlert)?$firstAlert:""?></section>
    <section><strong style="font-size:23px">Ảnh cỡ lớn:</strong><input type="file" name="image1" ></section><br><br>
    <section><strong style="font-size:23px">Ảnh cỡ vừa:</strong><input type="file" name="image2"></section><br><br>
    <section><strong style="font-size:23px">Ảnh background:</strong><input type="file" name="image3"></section><br><br>

    <section>
        <h2 style="color:blue">Danh Sách các file ảnh</h2>
        <section style="color:red"><?=isset($secondAlert)?$secondAlert:""?></section>
        <br><strong style="font-size:23px">Loạt ảnh khác nhau về cầu:</strong><input type="file" name="ListImage[]" multiple="multiple" >
        <br><strong style="font-size:23px">Loạt ảnh liên quan tới thiết kế cây cầu:</strong><input type="file" name="DesignImage[]" multiple="multiple"><br>
        <br><strong style="font-size:23px">Loạt ảnh liên quan tới lịch sử</strong><input type="file" name="HistoryImage[]" multiple="multiple" ><br>
    </section>
       <br><br><br> <h2 style="color:blue">Giới thiệu sơ qua:</h2><br>
    <textarea style="width:100%;height:300px;font-size:20px;border:2px solid blue" name="Post-intro" id="Post-intro"></textarea>
    

    <h2 style="color:blue">Thiết kế của cây cầu:</h2><br>
    <textarea style="width:100%;height:300px;font-size:20px;border:2px solid blue" name="Post-design" id="Post-design"></textarea>
    

    <h2 style="color:blue">Lịch sử của cây cầu:</h2><br>
    <textarea style="width:100%;height:300px;font-size:20px;border:2px solid blue" name="Post-history" id="Post-history"></textarea>
    <br><br><br>
    <section><strong style="font-size:20px">Phần download bài viết</strong><input type="file" name="downloadPost" ></section>
    <br><br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <input type="submit" style="background:blue;color:white;line-height:50px;cursor:pointer" name="submit" value="Thêm bài viết">
</form>
