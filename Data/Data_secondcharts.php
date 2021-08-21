
<?php
 $query1="SELECT date_charts, data3, data4 FROM high_charts where date_charts is not Null";
$result1=$connect->query($query1);
    $series_array = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $series3['name'] = 'Ca nhiễm';
    $series4['name'] = 'Tử vong';
    $series3['data'] = [];
    $series4['data'] = [];
    foreach($series_array as $key => $val){
        $date_arr = explode('-', $val['date_charts']);
        $date2[] = $date_arr[2].'-'.$date_arr[1];
        $series3['data'][] = (int)($val['data3']);
        $series4['data'][] = (int)($val['data4']);
    }
    $date2 = json_encode($date2);
    $series3 = json_encode($series3);
    $series4 = json_encode($series4);
?>