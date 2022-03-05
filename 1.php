
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form name="form1" method="post" action="2.php">

是否包括导出：   
<select name="file" id="answer">
<option value="是">是</option>
<option value="否">否</option>
</select>
<br />
是否包括答案：   
<select name="answer" id="answer">
<option value="是">是</option>
<option value="否">否</option>
</select>
<br />
出题数量：
<input type="text" name="number" id="XH" />

<br />
操作数的数目：
<select name="operand" id="operand">
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>

<br />
结果是否允许出现负数
<select name="negative" id="negative">
<option value="是">是</option>
<option value="否">否</option>
</select>

<br />  
操作数的最大值
<input type="text" name="number_max" id="XH" />
<br />

题目的类型：
<select name="type" id="type">
<option value="加">加</option>
<option value="减">减</option>
<option value="加减">加减</option>
<option value="乘除">乘除</option>
<option value="加减乘除">加减乘除</option>
</select>

<br />
有余数?保留小数点位数
<select name="deal" id="deal">
<option value="保留小数点位数">保留小数点位数</option>
<option value="有余数">有余数</option>

</select>
<br />
<br />
<input type='submit' name='sub'/>
</form>



</body>
</html>

