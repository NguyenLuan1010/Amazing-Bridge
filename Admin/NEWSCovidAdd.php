<?php include "NEWSCovidConnect.php" ?>
<div class="CovidForm">
    <form action="" method="post" enctype="multipart/form-data" class="VNCovid">
        <h2>Thêm tin về Covid tại Việt Nam</h2>
        <section style="color:red"><?=isset($alert)?$alert:""?></section>
        <input type="text" name="VNTitle" placeholder="Tiêu đề bài viết">
        <b>Nội dung</b><textarea name="VNPost" id="VNPost"></textarea>
        <b>Tải ảnh cỡ nhỏ</b><input type="file" name="VNfile1">
        <b>Tải ảnh cỡ lớn</b><input type="file" name="VNfile2">
        <input type="submit" name="submit" value="Thêm vào tin">
    </form>
    <br><br>
    <form action="" method="post" enctype="multipart/form-data" class="VNCovid">
        <h2>Thêm tin về Covid trên thế giới</h2>
        <section style="color:red"><?=isset($alert2)?$alert2:""?></section>
        <input type="text" name="WorldTitle" placeholder="Tiêu đề bài viết">
        <b>Nội dung</b><textarea name="WorldPost" id="WorldPost"></textarea>
        <b>Tải ảnh cỡ nhỏ</b><input type="file" name="Worrldfile1">
        <b>Tải ảnh cỡ lớn</b><input type="file" name="Worrldfile2">
        <input type="submit" name="submit1" value="Thêm vào tin">
    </form>
</div>    