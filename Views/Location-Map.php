<?php 
$connect=new MySqli("localhost","root","","amazing_bridges");
 $query3="SELECT a.MapLine
 FROM bridge_specifications a Join bridges_posts b
 WHere a.BPostID = b.BPostID and b.BPostID=".$_GET['BPostID'];
 $result3=$connect->query($query3);
?>
<?php foreach($result3 as $item):?>
    <?=$item['MapLine']?>
<?php endforeach;?>