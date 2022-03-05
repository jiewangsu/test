<?php

//选择排序
$arr = [6,7,4,9,1,8,2,5,3];

for ($i=0;$i<count($arr);$i++ ){
    $minPos = $i;
    for ($j=$i+1;$j<count($arr);$j++){
        if ($arr[$j] < $arr[$minPos]) {
            $minPos = $j;
        }
    }
    $tmp = $arr[$i];
    $arr[$i] = $arr[$minPos];
    $arr[$minPos] = $tmp;
}
//var_dump($arr);
$numbers = range(1,10);
//var_dump($numbers);exit();
//shuffle 将数组顺序随即打乱
shuffle ($numbers);

//var_dump($numbers);exit();
//array_slice 取该数组中的某一段
$num=6;
$result = array_slice($numbers,0,10);
print_r($result);

$arr = [5,3,6,9,1,7,2,4,8];
//        选择排序
//        for ($i = 0;$i<count($arr);$i++){
//            $min = $i;
//            for ($j=$i+1;$j<count($arr); $j++){
//                if ($arr[$j] < $arr[$min]) {
//                    print_r($j);
//                    $min = $j;
//                }
//            }
//            $tmp = $arr[$i];
//            $arr[$i] = $arr[$min];
//            $arr[$min] = $tmp;
//        }

//冒泡排序
//        for ($i=8;$i>0;$i--){
//            for ($j=0;$j<$i;$j++){
//                if ($arr[$j] > $arr[$j+1]) {
//                    $tmp = $arr[$i];
//                    $arr[$i] = $arr[$j];
//                    $arr[$j] = $tmp;
//                }
//            }
//        }


$data = array(
    array('id'=>7, 'name'=>'Apple',  'oid'=> array('age'=>18) ),
    array('id'=>8, 'name'=>'Bed',    'oid'=> array('age'=>13) ),
    array('id'=>6, 'name'=>'Cos',    'oid'=> array('age'=>16)),
    array('id'=>5, 'name'=>'Cos',    'oid'=> array('age'=>14) ),
    array('id'=>5, 'name'=>'Cos',    'oid'=> array('age'=>6) ),
);

foreach ($data as $k=>$v){
    $filed[] = array_column($v,'age');
}
array_multisort($filed,SORT_ASC,$data);
print_r($data);
