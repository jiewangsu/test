<?php
$ctime = date("Y-m-d H:i:s", time()-30);
var_dump($ctime);
echo "<pre>";
$data=date("Y-m-d",strtotime("+2 day"));
var_dump($data);
echo "<br>";
$ctime1=date("Y-m-d H:i:s",1532330903982);
echo $ctime1;