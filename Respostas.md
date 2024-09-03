# target_sistemas

Respostas para as questões 4 e 5:

4) Descubra a lógica e complete o próximo elemento: 
a) 1, 3, 5, 7, ___ 
b) 2, 4, 8, 16, 32, 64, ____ 
c) 0, 1, 4, 9, 16, 25, 36, ____ 
d) 4, 16, 36, 64, ____ 
e) 1, 1, 2, 3, 5, 8, ____ 
f) 2,10, 12, 16, 17, 18, 19, ____

Respostas:

a) 9 (a sequência de contagem é dada com soma de 2 ao número atual para obtenção do próximo);
b) 128 (a sequência é dada através da multiplicação do número atual por 2 para obtenção do próximo);
c) 49 (a sequência é dada através da soma de números ímpares começando à partir do número 1);
d) 100 (a sequência é dada através da potenciaçãõ de números pares ao quadrado);
e) 13 (a sequência se dá através da soma do antecessor com o atual para se obter o próximo número);
f) não consegui chegar a uma resposta, se puderem me informar depois como se calcula, ficarei grato.


5) Você está em uma sala com três interruptores, cada um conectado a uma lâmpada em salas diferentes. Você não pode ver as lâmpadas da sala em que está, mas pode ligar e desligar os interruptores quantas vezes quiser. Seu objetivo é descobrir qual interruptor controla qual lâmpada. Como você faria para descobrir, usando apenas duas idas até uma das salas das lâmpadas, qual interruptor controla cada lâmpada?

Resposta:

Supondo que tenhamos interruptores: A, B e C:
> eu acionaria os interruptores A e B e os manteria ligados por alguns minutos;
> manteria o interruptor C desligado à todo tempo;
> desligaria o interruptor B;
> iria até a outra sala:
  > a lâmpada que estivesse ligada seria a do interruptor A (que mantive ativo);
  > a lâmpada que estivesse desligada mas quente, seria do interruptor B (o qual mantive ligado por determinado tempo e depois desliguei);
  >a lâmpada que estivesse desligada e fria, seria o interruptor C (tal qual nunca fora ligado).

  Desta maneira conseguiria resolver a situação indo apenas 1 única vez até a outra sala (considerando que o deslocamento seja rápido para a mesma).