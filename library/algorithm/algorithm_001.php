<?php
/**
 +-----------------------------------------------------------------------------
 * @ 斐波那契数列的应用
 +-----------------------------------------------------------------------------
 * 算法题目：楼梯上有n阶台阶，上楼时可以一步上1阶，也可以一步上2阶，
 * 编写算法共计算有多少种不同的上楼梯方法。
 +-----------------------------------------------------------------------------
 * 数学模型：此问题如果按照习惯，从前向后思考，也就是从第一阶开始，考虑怎么样
 * 走到第二阶、第三阶、第四阶。。。则很难找出问题的规律；而反过来先思考到第n阶
 * 有哪几种情况？答案就简单了，只有两种情况。1）从第n-1阶到第n阶；2）从第n-2阶
 * 到第n阶。此为反向思维法
 *
 *			{ 1				  n=1
 * f(n) = 	  2				  n=2
 *		  	  f(n-1)+f(n-2)   n>2
 *			}
 +-----------------------------------------------------------------------------
 */

echo fun(20); //算法使用

/**
 * 阶梯总数计算算法
 * @param $n 总阶梯数，默认20
 * @return 递归返回 int
 */
function fun($n = 20) {
	if ($n > 30) { /* 防止n阶过大导致计算机死机 */
		echo "n超过30后普通计算机难以计算，终止运行！";
		exit();
	}
	if ($n == 1) {/* 只有一阶就只有一种方法*/
		return(1);
	}
	if ($n == 2) {/* 有两阶就有一步一阶和一步两阶两种方法 */
		return(2);
	} else { /* 每跨一步是一阶和两阶的可能相加 */
		return(fun($n-1)+fun($n-2));
	}
}
