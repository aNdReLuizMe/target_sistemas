<?php

declare(strict_types=1);

/**
 * @param int $index
 * @return int
 */
function calcSum(int $index): int
{
   $sum = 0;
   for ($k = 2; $k <= $index; $k++) {
      $sum += $k;
   }
   return $sum;
}

$index = 12;
$result = calcSum($index);

echo "O valor final de SOMA é: $result" . PHP_EOL;
