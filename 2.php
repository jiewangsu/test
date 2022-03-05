<!DOCTYPE HTML>
<html>
<head>

<?php


    if($_POST['file']=='是')
    {
        header("Content-type:application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=test_data.xls");
        //header('Content-Type:application/pdf');
        //header('Content-Disposition:attachment;filename="01simple.pdf"');

    }  
    $answer=$_POST["answer"];
    $number=$_POST["number"];
    $operand=$_POST["operand"];
    $negative=$_POST["negative"];
    $num_max=$_POST["number_max"];
    $type=$_POST["type"];
    $deal=$_POST["deal"];
    if($type=='加')
    {
        $operator=array('+');
    }   
    else if($type=='减')
    {
        $operator=array('-');
    }
    else if($type=='加减')
    {
        $operator=array('+','-');
    }
    else if($type=='乘除')
    {
        $operator=array('*','/');
    }
    else if($type=='加减乘除')
    {
        $operator=array('+','-','*','/');
    }
    if($operand==2)
    {
        for($i=0;$i<$number;$i++)
        {
            $m1=rand(1,$num_max);
            $m2=rand(1,$num_max);
            shuffle($operator);
            $sel1=$operator[0];
            if($sel1=="+")
            {
                $num=$m1+$m2;
            }
            else if($sel1=="-")
            {
                $num=$m1-$m2;
            }
            else if($sel1=="*")
            {
                $num=$m1*$m2;
            }
            else if($sel1=="/")
            {
                if($deal=='有余数')
                {
                    $num=intval(floor($m1/$m2)).'......'.$m1%$m2;
                }
            
                else $num=$m1/$m2;
            }
            if($num<0&&$negative=='否')
            {
                echo $m2,$sel1,$m1,'=';
                $num=$m2-$m1;
                if($answer=='是')
                {
                    echo $num;
                }
                echo '<br>';
            }
            else 
            {
                echo $m1,$sel1,$m2,'=';
                if($answer=='是')
                {
                    echo $num;
                }
                echo '<br>';
            }
        }
    }
    if($operand==3)
    {
        for($i=0;$i<$number;$i++)
        {
            $m1=rand(1,$num_max);
            $m2=rand(1,$num_max);
            $m3=rand(1,$num_max);
            shuffle($operator);
            $sel1=$operator[0];
            shuffle($operator);
            $sel2=$operator[0];
            if($sel1=='/'&&$m2!=$m3)
            {
                $str=(string)$m1.$sel1.'('.(string)$m2.$sel2.(string)$m3.')';
                $result=eval("return $str;");
                echo $str,'=';
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';
            }
            else if($sel1=='*'||$sel1=='-'&&$sel2=='+'||$sel2=='-'&&$m2!=$m3)
            {
                $str=(string)$m1.$sel1.'('.(string)$m2.$sel2.(string)$m3.')';
                $result=eval("return $str;");
                if($result<0&&$negative=='否')
                {
                    if($sel1=='-')
                    {
                        $str='('.(string)$m2.$sel2.(string)$m3.')'.$sel1.(string)$m1;
                        $result=eval("return $str;");
                    }
                    else if($sel2=='-')
                    {
                        $str=(string)$m1.$sel1.'('.(string)$m3.$sel2.(string)$m2.')';
                        $result=eval("return $str;");
                    }
                }
                
                echo $str,'=';
            
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';
                
            }
            else 
            {
                $str=(string)$m1.$sel1.(string)$m2.$sel2.(string)$m3; 
                $result=eval("return $str;");
                if($result<0&&$negative=='否')
                {
                    if($sel1=='-')$sel1='+';
                    if($sel2=='-')$sel2='+';
                    $str=(string)$m1.$sel1.(string)$m2.$sel2.(string)$m3; 
                    $result=eval("return $str;");
                }
                echo $str,'=';
               
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';
            }
    
        }
    }
    if($operand==4)
    {
        for($i=0;$i<$number;$i++)
        {
            $m1=rand(1,$num_max);
            $m2=rand(1,$num_max);
            $m3=rand(1,$num_max);
            $m4=rand(1,$num_max);
            shuffle($operator);
            $sel1=$operator[0];
            shuffle($operator);
            $sel2=$operator[0];
            shuffle($operator);
            $sel3=$operator[0];
            if($sel2=='/'&&$m3!=$m4)
            {
                $str=(string)$m1.$sel1.(string)$m2.$sel2.'('.(string)$m3.$sel3.(string)$m4.')';
                $result=eval("return $str;");
                if($result<0&&$negative=='否')
                {
                    $str=(string)$m2.$sel1.(string)$m1.$sel2.'('.(string)$m3.$sel3.(string)$m4.')';
                    $result=eval("return $str;");
                }
                echo $str,'=';
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';
                
            }
            else if($sel2=='*'||$sel2=='-'&&$sel3=='+'||$sel3=='-'&&$m3!=$m4)
            {
                $str=(string)$m1.$sel1.(string)$m2.$sel2.'('.(string)$m3.$sel3.(string)$m4.')';
                $result=eval("return $str;");
                if($result<0&&$negative=='否')
                {
                    if($sel2=='-')
                    {
                        $str=(string)$m3.$sel3.(string)$m4.$sel2.'('.(string)$m1.$sel1.(string)$m2.')';
                        $result=eval("return $str;");
                        
                    }
                    else
                    {
                        if($sel1=='-')$sel1='+';
                        if($sel3=='-')$sel3='+';
                        $str=(string)$m1.$sel1.(string)$m2.$sel2.'('.(string)$m3.$sel3.(string)$m4.')';
                        $result=eval("return $str;");
                        
                    }
                }
                echo $str,'=';
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';
            }
            else if($sel2=='*'||$sel2=='/'&&$sel1=='+'||$sel1=='-')
            {
                $str='('.(string)$m1.$sel1.(string)$m2.')'.$sel2.(string)$m3.$sel3.(string)$m4;
                $result=eval("return $str;");
                if($result<0&&$negative=='否')
                {
                    if($sel1=='-')$sel1='+';
                    if($sel3=='-')$sel3='+';
                    $str='('.(string)$m1.$sel1.(string)$m2.')'.$sel2.(string)$m3.$sel3.(string)$m4;
                    $result=eval("return $str;");
                }
                echo $str,'=';
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';   
            }
            else
            {
                $str=(string)$m1.$sel1.(string)$m2.$sel2.(string)$m3.$sel3.(string)$m4;
                $result=eval("return $str;");
                if($result<0&&$negative=='否')
                {
                    if($sel1=='-')$sel1='+';
                    if($sel2=='-')$sel3='+';
                    if($sel3=='-')$sel3='+';
                    $str=(string)$m1.$sel1.(string)$m2.$sel2.(string)$m3.$sel3.(string)$m4;
                    $result=eval("return $str;");
                }
                echo $str,'=';
                if($answer=='是')
                {
                    echo $result;
                }
                echo '<br>';    
            }
        }
    }
    
?>


</head>
</html>