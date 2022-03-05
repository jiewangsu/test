<?php
$n=0.001;

$m=100;

echo randcount($n,$m);

function randcount($n,$n2){
    $beilv=1;
    while(true){
        if($n*$beilv>=1){
            $beilv=$beilv;
            break;
        }else{
            $beilv=$beilv*10;
        }

    }

    $k=rand($n*$beilv,$n2*$beilv);
    $result=$k/$beilv;
    return $result;

}