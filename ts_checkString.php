<?php

declare(strict_types=1);

/**
 * Analisaremos a ocorrência da letra 'A' em uma palavra, frase ou texto.
 */
class LetterAAnalyzer
{
   private string $text;

   public function __construct(string $text)
   {
      $this->text = $text;
   }

   /**
    * Realiza a análise da ocorrência da letra 'A'.
    *
    * @return array<string, int|bool>
    */
   public function analyze(): array
   {
      $lowercaseText = strtolower($this->text);
      $totalCount = substr_count($lowercaseText, 'a');

      if ($totalCount === 0) {
         return ['found' => false];
      }

      return [
         'found' => true,
         'total' => $totalCount,
         'uppercase' => substr_count($this->text, 'A'),
         'lowercase' => substr_count($this->text, 'a')
      ];
   }
}

/**
 * Exibe os resultados da análise.
 */
class ResultDisplayer
{
   /**
    * Mostra o resultado das análises de maneira formatada.
    *
    * @param array<string, int|bool> $results
    */
   public function display(array $results): void
   {
      if (!$results['found']) {
         echo "Letra 'A' não encontrada no texto.\n";
         return;
      }

      $this->displayOccurrences($results);
   }

   /**
    * Exibe as ocorrências da letra 'A'.
    *
    * @param array<string, int> $results
    */
   private function displayOccurrences(array $results): void
   {
      $uppercase = $results['uppercase'];
      $lowercase = $results['lowercase'];

      if ($results['total'] === 1) {
         $case = $uppercase === 1 ? "maiúscula" : "minúscula";
         echo "Há apenas uma letra 'A' {$case}.\n";
         return;
      }

      if ($uppercase > 0 && $lowercase === 0) {
         $this->displaySingleCaseOccurrences($uppercase, true);
      } elseif ($lowercase > 0 && $uppercase === 0) {
         $this->displaySingleCaseOccurrences($lowercase, false);
      } else {
         $this->displayMixedCaseOccurrences($uppercase, $lowercase);
      }
   }

   /**
    * Exibe ocorrências de um único caso (maiúsculo ou minúsculo).
    */
   private function displaySingleCaseOccurrences(int $count, bool $isUppercase): void
   {
      $case = $isUppercase ? "maiúsculas" : "minúsculas";
      $conjugation = $this->getConjugation($count);
      echo "Há apenas letras 'A' {$case} ({$count} {$conjugation}).\n";
   }

   /**
    * Exibe ocorrências mistas (maiúsculas e minúsculas).
    */
   private function displayMixedCaseOccurrences(int $uppercase, int $lowercase): void
   {
      if ($uppercase === 1 && $lowercase === 1) {
         echo "Maiúsculas: 1 ocorrência,\nMinúsculas: 1 ocorrência.\n";
         return;
      }

      echo "Há letras 'A' maiúsculas e minúsculas, sendo:\n";
      echo "Maiúsculas: {$uppercase} {$this->getConjugation($uppercase)},\n";
      echo "Minúsculas: {$lowercase} {$this->getConjugation($lowercase)}.\n";
   }

   /**
    * Retorna a conjugação correta para o número de ocorrências.
    */
   private function getConjugation(int $count): string
   {
      return $count === 1 ? "ocorrência" : "ocorrências";
   }
}

/**
 * Função principal para executar o programa.
 */
function main(): void
{
   echo "Entre com uma letra, palavra ou frase: ";
   $input = trim(fgets(STDIN) ?: '');

   $analyzer = new LetterAAnalyzer($input);
   $results = $analyzer->analyze();

   $displayer = new ResultDisplayer();
   $displayer->display($results);
}

main();
