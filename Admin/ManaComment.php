<?php
  $query19="SELECT *  FROM comments INNER JOIN bridges_posts ON comments.BPostID= bridges_posts.BPostID
                                    INNER JOIN nguoi_dung ON comments.CustomerID = nguoi_dung.CustomerID  ";
  $result19=$connect->query($query19);

  if(isset($_GET['CustomerID'])){
    echo"<script>confirm('Bạn chắc chắn muốn chặn tài khoản này!')</script>";
    $query211="UPDATE nguoi_dung SET Status='0' WHERE CustomerID=".$_GET['CustomerID'];
    $connect->query($query211);
    $query222="DELETE FROM comments where CustomerID=".$_GET['CustomerID'];
    $connect->query($query222);
    header("Refresh:0;url=/Amazing_Bridges/admin/?option=mana-comment");
  }
  
  $query22="SELECT *  FROM news_comment INNER JOIN news_covid ON news_comment.NPostID=news_covid.NPostID
                                        INNER JOIN nguoi_dung ON news_comment.CustomerID=nguoi_dung.CustomerID";
  $result22=$connect->query($query22);
  if(isset($_GET['CustomerID2'])){
    echo"<script>confirm('Bạn chắc chắn muốn chặn tài khoản này!')</script>";
    $query213="UPDATE nguoi_dung SET Status='0' WHERE CustomerID=".$_GET['CustomerID2'];
    $connect->query($query213);
    $query224="DELETE FROM news_comment where CustomerID=".$_GET['CustomerID2'];
    $connect->query($query224);
    header("Refresh:0;url=/Amazing_Bridges/admin/?option=mana-comment");
  }
?>
<div class="commentBox">
  <div class="manaComment">
    <h2>Comment trong các bài viết</h2><br>
    <div class="Title">
      <strong>Tên người dùng</strong>
      <strong>Nội dung comment</strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      <strong>Bài viết chứa comment</strong>
      <strong>Thao tác</strong>
    </div><br>
     <div class="Title2">
       <?php foreach($result19 as $item):?> 
        <div ><?=$item['Username']?></div>
        <p><?=$item['Comment']?></p>
        <span><?=$item['BTitle']?></span>
        <a href="/Amazing_Bridges/admin/?option=mana-comment&CustomerID=<?=$item['CustomerID']?>">Chặn và xóa</a>
      <?php endforeach;?>
     </div>
    </div><br>
    <div class="manaComment2">
    <h2>Comment trong các tin covid</h2><br>
    <div class="Title3">
      <strong>Tên người dùng</strong>
      <strong>Nội dung comment</strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      <strong>Bài viết chứa comment</strong>&emsp;&emsp;&emsp;&emsp;
      <strong>Thao tác</strong>
    </div><br>
      <div class="Title4">
      <?php foreach($result22 as $item):?> 
        <div ><?=$item['Username']?></div>
        <p><?=$item['Comment']?></p>
        <section><?=$item['NTitle']?></section><br>
        <a href="/Amazing_Bridges/admin/?option=mana-comment&CustomerID2=<?=$item['CustomerID']?>">Chặn và xóa</a>
      <?php endforeach;?>
      </div>
    </div>
  </div>