<?php

/**
 * Aqui verificamos se o número pertence à sequência de Fibonacci.
 * Para que essa verificiação seja eficiente, de maneira curta e elegante, utilizamos o cálculo direto
 * para o número áureo e o aplicamos na fórmula de Binet.
 *
 * @param int $number => número a ser verificado
 * @return bool => se o número pertence à sequência? verdadeiro : falso
 */
function isFibonacci(int $number): bool
{
   if ($number < 0) {
      return false;
   }

   $sqrt5 = sqrt(5);
   $phi = (1 + $sqrt5) / 2;
   $a = pow($phi, $number) / $sqrt5;

   return abs($a - round($a)) < 1e-10;
}

/**
 * Função para gerar a sequência de Fibonacci até o limite especificado.
 *
 * @param int $limit => maior número que desejamos incluir na sequência
 * @return array => a sequência de Fibonacci gerada até o $limit
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
 * Obtém um número válido do usuário via CLI.
 *
 * @return int => retorno do número *válido* inserido pelo usuário como inteiro
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
 * Função main para executar o script, verificando se a entrada é através de CLI ou por método GET.
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

   if (isFibonacci($number)) {
      echo "O número $number pertence à sequência de Fibonacci.\n";
   } else {
      $sequence = generateFibonacciSequence($number);
      echo "O número $number não pertence à sequência de Fibonacci.\n";
      echo "A sequência de Fibonacci até $number é: " . implode(', ', $sequence) . ".\n";
   }
}

/**
 * Lembrando que para executar o script via terminal ou shell é necessário ter o php instalado,
 * e rodar o comando 'php ts_fibonacci.php'
 * Se for executar via web precisa iniciar um servidor local.
 */

main();
