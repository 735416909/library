<?php
/**
 +-----------------------------------------------------------------------------
 * @ 数学例子 - 找顾客各种钱币张数
 +-----------------------------------------------------------------------------
 * 算法描述：一个顾客买了价值x元的商品（不考虑角、分），并将y元的钱交给售货员。
 * 编写算法：在各种币值的钱都很充裕的情况下，使售货员能用张数最少的钱币找给顾
 * 客。
 +-----------------------------------------------------------------------------
 * 问题分析：无论买商品的价值x是多少，找给他的钱最多需要以下6种币值，
 * 即  50，10，5，2，1
 +-----------------------------------------------------------------------------
 * 算法设计：（1）为了能达到找给顾客钱的张数最少的目的，应该先尽量多地取大面额
 * 的币种，由大面额到小面额币种逐渐进行。
 * （2）6种面额是没有等差规律的一维数据，为了能构造出循环不变式，将6种币值存储
 * 在数组B中。这样种币值就可表示为 B[i], i=1,2,3,4,5,6.为了能达到尽量多地找大
 * 面额币种的目的，6种币值应该由大到小存储。
 * （3）另外，为统计6种面额的数量，还应该设置有6个元素的累加器数组S
 +-----------------------------------------------------------------------------
 * 算法说明：（1）每求出一种面额所需的张数后，一定要把这部分金额减去：
 * y = y - a*b[j] , 否则将会重复计算。
 *（2）算法无论要求找的钱z是多大，都从50元开始统计，所以在输出时要注意合理性，
 * 不要输出无用的张数为0的信息。
 +-----------------------------------------------------------------------------
 * 算法分析：问题的规模是常量，时间复杂性肯定为O(1)
 +-----------------------------------------------------------------------------
 */

$b = array(0,50,20,10,5,2,1);

$x = 34; //购买商品价钱

$y = 124; // 顾客现付钱

$z = $y - $x; // 应找顾客总金额

$s = array();
for ($i=1; $i <= 6; $i++) { 
	$a = floor($z / $b[$i]); //求商，只留整数部分
	if ($a >= 1) {
		$s[$i] = $a;
		$z = $z - $a*$b[$i];
	} else {
		$s[$i] = 0;
	}
}

echo "<br>";
echo $y." - ".$x." = ". ($y-$x) ." ：<br><br>";

for ($i=1; $i <=6; $i++) { 
	if ($s[$i] <> 0) {
		echo $b[$i]." ----- ".$s[$i]." 张<br>";	
	}	
}



