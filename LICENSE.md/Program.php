<?php
$start = 1.4;
$delta = 0.1;
$kolvo = 11;
for ($i = 0; $i < 5; $i++)
{
	$a[$i] = $start;
}
echo "Наиб. вероятный"." Выигрыш Вероятность в плюсе Коэффициенты"."\n";
for ($main4 = 0; $main4 < $kolvo; $main4++)
{
	$a[3] = $start;
for ($main3 = 0; $main3 < $kolvo; $main3++)
{
	$a[2] = $start;
for ($main2 = 0; $main2 < $kolvo; $main2++)
{
	$a[1] = $start;
for ($main1 = 0; $main1 < $kolvo; $main1++)
{
	$a[0] = $start;
for ($main = 0; $main < $kolvo; $main++)	//Цикл по перебору первого коэфф.
{
	$Schet = $Schet + 1;
	for ($i = 0; $i< 5; $i++)
	{
		$fors[$i] = $a[$i] - 1;		//Вычитаем из каждого коэфф. единицу
	}
	for ($l = 0; $l< 4; $l++)
	{
		$Ver[$l] = 1/$a[$l] - 0.03;	// Переводим коэфф. в вероятность с учётом маржи
	}
	$num = 0;
	for ($i1 = 0; $i1 < 2; $i1++)
	{
		$fors[0] = $a[0] - 1;
		for ($i = 0; $i< 2; $i++)
		{
			$fors[2] = $a[2] - 1;
			for ($j = 0; $j < 2; $j++)
			{
				$fors[3] = $a[3] - 1;
				for ($k = 0; $k < 2; $k++)
				{
					$fors[1] = $a[1] - 1;
					for ($m = 0; $m < 2; $m++)
					{
						$VerO[$num] = $Ver[0];
						for ($ip = 1; $ip< count($a); $ip++)
						{
							$VerO[$num] = $VerO[$num] * $Ver[$ip];	//Считаем вероятность события
						}
						//echo " "."$VerO[$num]"." ";
						$Sum[$num] = 0;
						for ($nums = 0; $nums< count($a); $nums++)
						{
							$Sum[$num] = $fors[$nums] + $Sum[$num];		//Считаемсуммувыигрыша. $fors = коэфф - 1 или -1
						}
						//echo " "."$Sum[$num]"." "."\n";
						$num++;
						$Ver[1] = 1 - $Ver[1];
						$fors[1] = -1;
					}
					$Ver[3] = 1 - $Ver[3];
					$fors[3] = -1;
				}
				$Ver[2] = 1 - $Ver[2];
				$fors[2] = -1;
			}
			$Ver[0] = 1 - $Ver[0];
			$fors[0] = -1;
		}
		$Ver[4] = 1 - $Ver[4];
		$fors[4] = -1;
	}
	$max = max ($VerO);			//наибольшая вероятность
	$maxkey = array_keys($VerO, max($VerO))[0];	//выигрыш при этом (номер в массиве выигрышей)
	//echo "$maxkey";
	/*	for ($i = 0; $i< 16; $i++)
		{
			$Sumsum = $Sumsum + $VerO[$i];  проверка - равна ли сумма вероятностей единице?
		}
		echo "Sumsum = "."$Sumsum"." "; */
	//echo "$max"." ".$Sum[$maxkey];
	$PLUS = 0;
	for ($i = 0; $i< 32; $i++)
	{
		if ($Sum [$i] > 0)
		{
			$PLUS = $PLUS + $VerO[$i];
		}
	}
	if ($PLUS> 0.43)		//выводим только те случаи, где вероятность больше заданного кол-ва процентов
	{
		echo "$max"." "."$Sum[$maxkey]"." "."$PLUS"." ";
		for ($ia = 0; $ia< count ($a); $ia++)
		{
			echo "$a[$ia]"." ";
		}
		echo "\n";
	}
$a[0] = $a[0] + $delta;
}
$a[1] = $a[1] + $delta;
}
$a[2] = $a[2] + $delta;
}
$a[3] = $a[3] + $delta;
}
$a[4] = $a[4] + $delta;
}
echo "$Schet";
?>
