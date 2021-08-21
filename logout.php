<?php 
    session_start();
    unset($_SESSION['CustomerID']);
    unset($_SESSION['customer']);
    echo "<script>location = '/Amazing_Bridges';</script>";
    
?>
