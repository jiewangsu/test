<?php
//$num1 =  "1.2344";
//$ww = strlen(substr(strrchr($num1, "."), 1));
//echo $ww;exit();
$number = 100;
$num_max = 99;  //操作数的最大值



$tmp_arr = [];
for($i=0;$arrs<=10000;$i++)
{

    $m2=rand(1,$num_max);
    //mt_rand（20,30）/10
    $num= randcount(0.001,100);

    $daluan = [$m2,$num];
    shuffle($daluan);
//    $num1 = $num*$m2;
//    $num2 = $num.'*'.$m2;
    $num1 = $daluan[0]*$daluan[1];
    $num2 = $daluan[0].'*'.$daluan[1];

    if (!in_array($num,$tmp_arr)) {
//        if (strlen(substr(strrchr($num1, "."), 1)) <=2) {
//            $arr[] =$num2.'='. $num1;
//            $arr1[] =(string)$num;
//            $tmp_arr[] = $num;
//            $arr++;
//        }
    }
    if (strlen(substr(strrchr($num1, "."), 1)) <=2) {
       $arr[] =$num2.'='. $num1;
       $arr1[] =(string)$num;
        $tmp_arr[] = $num;
       $arrs++;
    }
}
//echo '<pre>';
//print_r(array_count_values($arr));exit();
//$tmp_arr1 = array_count_values($arr);
//$i = 0;
//foreach ($tmp_arr1 as $k=>$v){
//
//    if ($v > 1) {
//        $i++;
//    }
//}

echo '<pre>';
print_r($arr);exit();
//print_r($i);exit();
function randcount($n,$n2){
    $beilv=1;
    while(true){
        if($n*$beilv>=1){
            $beilv=$beilv;
            break;
        }else{
            $beilv=$beilv*10;
            if (is_int($beilv)) {
                continue;
            }
        }

    }

    $k=rand($n*$beilv,$n2*$beilv);
    $result=$k/$beilv;
    if(is_int($result)){
        return randcount($n,$n2);
    }

    return $result;

}