<?php
$m_v = array();        //目标随机方案

$m_blk = array();    //空格数情况,从小到大排列
$m_que = array();    //空格题数

$m_cnt = array();    //取出的某空格数的题数

//$test_level = 0;    //测试变量

function CheckQue($i)    //检查题数是否够取,$i为已取的相应空格数题的数量
{
    global $m_que;
    global $m_cnt;
    echo " CheckQue ".$i."_".$m_cnt[$i]."<".$m_que[$i]."; ";
    return ($m_cnt[$i] <= $m_que[$i]);            //取值正常,已经不可能取到这么多题时，返回错误
}
function CheckLimit($num, $blk)                    //检查剩下的空数与题数是否有可能的解
{
    echo " Limit num".$num.", blk".$blk."; ";
    global $m_blk;
    return $num>=0?($num*$m_blk[count($m_blk)-1]>=$blk && $num*$m_blk[0]<=$blk):true;
}
function CheckMax($blk)        //检查一次题库中空数是否存在选出总空数的可能
{
    global $m_blk;
    global $m_que;
    $t = 0;
    for($i=0; $i<count($m_que); $t+=$m_que[$i]*$m_blk[$i],++$i);
    echo " t ".$t." blk ".$blk."; ";
    return $t>=$blk;
}

function SituationVR($nNum , $nBlk)        //找到一个方案并返回。nNum目标题数，nBlk目标空数，v每题空格数,且从小到大排列
{
    //global $test_level;//测试
    //$test_level += 1;
    //echo "<br>".$test_level.">";

    global $m_v;
    global $m_blk;
    global $m_cnt;


    $v = array_keys($m_blk);                     //拷贝一个原空数队列的序列出来作为新数列去取序号，这样使得$m_cnt可准确计数

    for ( $i=0; count($v)>0; $m_cnt[$i] -= 1)
    {
        echo "<br>"."#";
        $ii = mt_rand(0,count($v)-1);             //取一题空数为$i，并将记录删除已取过的序号,取出来的是序号的序号
        $i = $v[$ii];                            //空格队列索引
        $b = $m_blk[$i];                        //空格数
        $m_cnt[$i] += 1;                //计数
        unset( $v[$ii]);
        $v = array_values($v);
        echo " ii".$ii." i".$i." b".$b."; ";

        if (!CheckQue($i))                         //检查取题数是否正常范围，超出重取，取不出返回假
        {
            continue;
        }

        array_push($m_v, $b);                    //进栈
        $t = array_sum($m_v);                    //求当前累积空数
        //var_dump($m_v);    var_dump($v);echo $t;

        $ret = CheckLimit( $nNum-count($m_v),$nBlk-$t);

        if ($ret)                                //检查满足题数的结果存在的可能性
        {
            if ($t == $nBlk)                    //情况一，得到方案返回真
            {
                return true;
            }
            else if ($t<$nBlk)                    //情况二，方案待完成
            {
                if (SituationVR($nNum ,$nBlk))    //递归，成功返回真失败继续
                {
                    return true;
                }
            }                //其它均为失败方案，继续即可
        }
        array_pop($m_v);    //取值不当，出栈
    }
    //echo "<br>".$test_level."<";
    //$test_level -= 1;
    return false;                //没有成功返回，默认返回假
}


//测试
$m_blk = array(1, 2, 3);
$m_que = array(1, 5, 1);
$m_cnt = array(0, 0, 0, 0, 0);
$nNum = -1;        //取几题，不限题数则置为非正数
$nBlk = 10;        //取几个空

echo '<pre>';
print_r($m_blk);
echo '<pre>';
print_r($m_que);
echo "<br>";
if(CheckMax($nBlk))
{
    $bRet = SituationVR($nNum ,$nBlk);//找出一个随机方案
    echo "<br>";echo($bRet?"success! ":"failed! ");
    echo '<pre>';
    print_r($m_v);
}
