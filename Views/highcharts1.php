<?php require "Data/Data_firstcharts.php"; ?>
<script>
$(function () {
    $('#container').highcharts({
        title: {
            text: '<strong style="color:red"> Số ca theo ngày</strong>',
            x: -17 
        },
        credits:{
            enabled:false
        },
        chart: {
            type: "areaspline",
           
        },
        tooltip: {
            formatter:function() {
                 return  'Ngày:'+ this.x +'<br>' + this.y;
          },
        },
        colors:['#ff7675', '#81ecec'],
        xAxis:{
            categories:<?=$date;?>,
        },
        yAxis: {
            title: {
                text: false
            }
        },
        tooltip: {
            enabled:true,
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series:[<?=$series1?>],    
    });
});
$(function () {
    $('#container2').highcharts({
        title: {
            text: '<strong style="color:red">Tổng số ca</strong>',
            x: -17 
        },
        credits:{
            enabled:false
        },
        chart: {
            type: "areaspline",
           
        },
        tooltip: {
            formatter:function() {
                 return  'Ngày:'+ this.x +'<br>' + this.y;
          },
        },
        colors:['#ff7675', '#81ecec'],
        xAxis:{
            categories:<?=$date;?>,
        },
        yAxis: {
            title: {
                text: false
            }
        },
        tooltip: {
            enabled:true,
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },   
        series:[<?=$series2?>],
    });
});
</script>





