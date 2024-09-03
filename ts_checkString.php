<?php

/**
 * 2) Escreva um programa que verifique, em uma string, a existência da letra ‘a’,
 * seja maiúscula ou minúscula, além de informar a quantidade de vezes em que ela ocorre.
 * 
 * IMPORTANTE: Essa string pode ser informada através de qualquer entrada de sua preferência
 * ou pode ser previamente definida no código;
 * 
 *  Resposta: ↓↓↓↓↓↓↓↓
 */


/**
 * Verifica a ocorrênica da letra 'A' no texto (sem distinção entre maiúscula ou minúscula).
 *
 * @param string $text
 * @return array
 */
function analyzeLetterA(string $text): array
{
   $lowercaseText = strtolower($text);
   $totalCount = substr_count($lowercaseText, 'a');

   if ($totalCount === 0) {
      return ['found' => false];
   }

   $uppercaseCount = substr_count($text, 'A');
   $lowercaseCount = substr_count($text, 'a');

   return [
      'found' => true,
      'total' => $totalCount,
      'uppercase' => $uppercaseCount,
      'lowercase' => $lowercaseCount
   ];
}

/**
 * MOstra o resultado das análises de maneira formatada.
 *
 * @param array $results
 */
function displayResults(array $results): void
{
   if (!$results['found']) {
      echo "Letra 'A' não encontrada no texto.\n";
      return;
   }

   if ($results['total'] === 1) {
      $case = $results['uppercase'] === 1 ? "maiúscula" : "minúscula";
      echo "Há apenas uma letra 'A' {$case}.\n";
   } elseif ($results['uppercase'] > 0 && $results['lowercase'] === 0) {
      $conjugation = $results['uppercase'] === 1 ? "ocorrência" : "ocorrências";
      echo "Há apenas letras 'A' maiúsculas ({$results['uppercase']} {$conjugation}).\n";
   } elseif ($results['lowercase'] > 0 && $results['uppercase'] === 0) {
      $conjugation = $results['lowercase'] === 1 ? "ocorrência" : "ocorrências";
      echo "Há apenas letras 'a' minúsculas ({$results['lowercase']} {$conjugation}).\n";
   } else {
      $conjugationUppercase = $results['uppercase'] === 1 ? "ocorrência" : "ocorrências";
      $conjugationLowercase = $results['lowercase'] === 1 ? "ocorrência" : "ocorrências";

      if ($results['uppercase'] === 1 && $results['lowercase'] === 1) {
         echo "Maiúsculas: 1 ocorrência, \n" . "Minúsculas: 1 ocorrência.\n";
      } else {
         echo "Há letras 'A' maiúsculas e minúsculas, sendo:\n";
         echo "Maiúsculas: {$results['uppercase']} {$conjugationUppercase},\n";
         echo "Minúsculas: {$results['lowercase']} {$conjugationLowercase}.\n";
      }
   }
}

/**
 * Chamada do input para entrada do texto pelo usuário
 */
echo "Entre com uma letra, palavra ou frase: ";
$input = trim(fgets(STDIN));

/**
 * Retorno da análise e mostra de resultados
 */
$results = analyzeLetterA($input);
displayResults($results);
