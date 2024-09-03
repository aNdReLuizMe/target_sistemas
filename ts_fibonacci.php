<?php

declare(strict_types=1);

/**
 * Verifica se um número pertence à sequência de Fibonacci.
 *
 * @param int $number
 * @return bool
 */
function isFibonacci(int $number): bool
{
   if ($number < 0) {
      return false;
   }

   $a = 0;
   $b = 1;

   while ($a < $number) {
      $temp = $a;
      $a = $b;
      $b = $temp + $b;
   }

   return $a === $number;
}

/**
 * Criamos uma sequência de Fibonacci até o número digitado.
 *
 * @param int $limit
 * @return array
 */
function generateFibonacciSequence(int $limit): array
{
   $sequence = [0, 1];
   while (($next = end($sequence) + prev($sequence)) <= $limit) {
      $sequence[] = $next;
   }
   return $sequence;
}

/**
 * @return int
 */
function getValidNumber(): int
{
   do {
      echo "Digite um número inteiro não-negativo: ";
      $input = trim(fgets(STDIN));
   } while (!ctype_digit($input));
   return (int)$input;
}

/**
 * Processa o número e exibe o resultado.
 *
 * @param int $number
 */
function processNumber(int $number): void
{
   if (isFibonacci($number)) {
      echo "O número $number pertence à sequência de Fibonacci." . PHP_EOL;
   } else {
      $sequence = generateFibonacciSequence($number);
      echo "O número $number não pertence à sequência de Fibonacci." . PHP_EOL;
      echo "A sequência de Fibonacci até $number é: " . implode(', ', $sequence) . "." . PHP_EOL;
   }
}

/**
 * Função principal para executar o script.
 *
 * Verifica se a entrada é através de CLI ou por método GET.
 */
function main(): void
{
   if (PHP_SAPI === 'cli') {
      $number = getValidNumber();
   } else {
      $number = filter_input(INPUT_GET, 'number', FILTER_VALIDATE_INT, [
         'options' => ['min_range' => 0]
      ]);
      if ($number === false) {
         die("Por favor, insira um número válido (inteiro não-negativo).");
      }
   }
   processNumber($number);
}

main();
