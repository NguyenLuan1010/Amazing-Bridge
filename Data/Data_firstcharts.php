<?php
 $query1="SELECT date_charts, data1, data2 FROM high_charts where date_charts is not Null";
$result1=$connect->query($query1);
    $series_array = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $series1['name'] = 'Số ca theo ngày';
    $series2['name'] = 'Tổng Số ca';
    $series1['data'] = [];
    $series2['data'] = [];
    foreach($series_array as $key => $val){
        $date_arr = explode('-', $val['date_charts']);
        $date[] = $date_arr[2].'-'.$date_arr[1];
        $series1['data'][] = (int)($val['data1']);
        $series2['data'][] = (int)($val['data2']);
    }
    $date = json_encode($date);
    $series1 = json_encode($series1);
    $series2 = json_encode($series2);
?>
