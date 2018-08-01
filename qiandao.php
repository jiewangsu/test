<?php
$day_list = array(strtotime('2016-06-29'),strtotime('2016-06-28'),strtotime('2016-06-27'),strtotime('2016-06-22'));
//$day_list = array('1467164018','1467100301','1466985253','1466901657','1466839901','1466839901','1466670876');

$days = getContinueDay(array_unique($day_list));
echo $days;

function getContinueDay($day_list)
{
    //昨天开始时间戳
    $beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));

    if($beginYesterday>$day_list[0]) {
        $days = 0;
    } else {
        $days = 1;
    }

    $count = count($day_list);
    for($i=0;$i<$count;$i++){
        if($i<$count-1){
            $res = compareDay($day_list[$i],$day_list[$i+1]);
            if($res) $days++;
            else break;
        }
    }

    return $days;
}

function compareDay($curDay,$nextDay)
{
    $lastBegin = mktime(0,0,0,date('m',$curDay),date('d',$curDay)-1,date('Y',$curDay));
    $lastEnd   = mktime(0,0,0,date('m',$curDay),date('d',$curDay),date('Y',$curDay))-1;

    if($nextDay>=$lastBegin && $nextDay<=$lastEnd){
        return true;
    }else{
        return false;
    }

}
