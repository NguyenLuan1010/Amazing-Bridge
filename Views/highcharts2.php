<?php require "Data/Data_secondcharts.php"; ?>
<script>
$(function () {
    $('#container3').highcharts({
        title: {
            text: '<strong style="color:red"> Ca nhiễm</strong>',
            x: -17 //center
        },
        credits:{
            enabled:false
        },
        chart: {
            type: "line",
        },
        tooltip: {
            formatter:function() {
                 return  'Ngày:'+ this.x +'<br>' + this.y;
          },
        },
        colors:['#ff7675', '#81ecec'],
        xAxis:{
            categories:<?=$date2;?>,
        },
        yAxis: {
            title: {
                text: false
            }
        },
        tooltip: {
            enabled:true,
        
           style:{
              
           },
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series:[<?=$series3?>],
        
    });
});
$(function () {
    $('#container4').highcharts({
        title: {
            text: '<strong style="color:red"> Tử vong </strong>',
            x: -17 //center
        },
        credits:{
            enabled:false
        },
        chart: {
            type: "line",
        },
        tooltip: {
            formatter:function() {
                 return  'Ngày:'+ this.x +'<br>' + this.y;
          },
        },
        colors:['#ff7675', '#81ecec'],
        xAxis:{
            categories:<?=$date2;?>,
        },
        yAxis: {
            title: {
                text: false
            }
        },
        tooltip: {
            enabled:true,
        
           style:{
              
           },
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series:[<?=$series4?>],
        
    });
});
</script>





