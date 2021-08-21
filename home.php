<div class="centerBackground">
    <div class="insideCenter">
        <img src="Images/Amazing Bridges (2).png" alt="">
        <h3>Một trang web giúp bạn tìm hiểu và khám phá về những cây cầu </h3><br>
        <h3>Không chỉ đẹp và có thiết kế độc đáo nhất thế giới</h3><br>
        <h3>Mà đằng sau đó là những câu chuyện lịch sử,nguồn cảm hứng</h3><br>
        <h3>đã tạo ra những tác phẩm được coi như là biểu tượng nhân loại</h3>
    </div>  
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><div class="underCenter">
        <img id="centerlogo" src="Images/Amazing Bridges (2).png" alt=""><br><br><br>
        <a href="Bridges List.php"><section>Khám phá ngay</section></a>
        </div>
      <br><br>
    <div class="owl-carousel owl-theme" id="myCarousel" style="background-color:gray">
        <?php foreach ($result as $item):?>
            <div class="item"><a href="ConceptBridges.php?BPostID=<?=$item['BPostID']?>"><img src="Images/Big_images/<?=$item['BBigImages']?>" alt=""></a></div>
        <?php endforeach;?>
    </div>
    <div class="Footer">
         <div class="Contact-left">
         <br><br><br>
                 <a href=""><i class="fab fa-facebook-f"></i>&emsp;Amazing Bridges </a>
                 <a href=""><i class="fab fa-instagram"></i>&emsp;Amazing Bridges.Vn</a>
                 <a href=""><i class="fab fa-twitter"></i>&emsp;AmazingBridges.vn</a>
                 <a href=""><i class="fas fa-envelope"></i>&emsp;AmazingBridges@gmail.com</a><br><br>
                 <h6><i class="fas fa-atom"></i>Amazing Bridges website được sáng tạo bởi Marvelous team&emsp;&emsp;<i class="fas fa-map-marker-alt"></i>&emsp;Việt Nam</h6>
          </div>
          <div class="Contact-right">
          <br><br><br>
             <h3>Hãy <a href="/Amazing_Bridges/signup.php">đăng ký</a> và <a href="/Amazing_Bridges/log_in.php">đăng nhập</a> tài khoản để nhận những thông báo mới nhất từ chúng tôi</h3>
             &nbsp;<div class="FooterMap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9265584222285!2d105.81676191488347!3d21.035624385994563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d6e603741%3A0x208a848932ac2109!2sAptech%20Computer%20Education!5e0!3m2!1svi!2s!4v1622985107399!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>   
         </div>
    </div>
</div>
<script>
$('.owl-carousel').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:6000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:2
        }
    }
   
})</script>