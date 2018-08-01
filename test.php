<?php
/**字符串的截取

 **/
//判断空号中的第一次出现，并返回字符串的剩余部分：
// strstr查找字符串首次出现的位置，并返回出现以后所有的值
//strrchr 和strstr一样
$in['astime']="2018-07-10 18:00:00";
$in['astime']= strstr($in['astime']," ");
//var_dump($in['astime']);
//echo "<pre>";
////字符串的截取也可以获得到。
//$in['astime']=substr($in['astime'],11);
//echo $in['astime'];

/**
*explode
 **/


function demo($data){
    $in['astime']=explode(' ',$data)[1];
    return $in['astime'];
}
$test=demo($in['astime']);
var_dump($test);


//今天凌晨的时间戳。

echo "<br>";
var_dump(strtotime(date('Y-m-d')));

echo "<br>";
//strpos 查找字符串在令一个字符串中第一次出现的位置。
//echo substr($str,strpos($str,'/')+5);
//输出 456/789/abc
$str='123/456/789/abc';
$array=explode('/', $str);
$a= $array[2]."/".$array[3];
echo $a;
echo "<br>";
// 输出 123

//字符串的替换手机号4位数用*替换
//字符串的截取法
$str="13703980175";
$new_str=substr($str,0,3)."****".substr($str,7);
echo $new_str."<br>";
//字符串的替换str_replace是搜索到值之后进行替换，然后返回替换过的值
$new_str1=str_replace(0,'****',$str);
//substr_replace是直接从哪里开始替换到哪里结束，不直接进行搜索，然后返回替换过后的所有的值。
$new_str1=substr_replace($str,'****',3,4);

echo $new_str1;