<?php

unset($argv[0]);

$numbers = [];

function checkBalance($argv) {

     $index = 0;
     foreach ($argv as $key => $argument) {
         if(strpos($argument, ',')) {
             $weights = array_map( 'intval',explode(",", $argument) );
         } else {
             $numbers[$index++] = $argument;
         }
     }

     if ($numbers[0] == $numbers[1]) {
         return 'In balans';
     } else {
         if (! empty($weights)) {
             $rest = abs($numbers[0] - $numbers[1]);
             rsort($weights);

            while ($rest > 0) {
                foreach ($weights as $weight) {
                    if ($weight <= $rest) {
                        $rest = $rest - $weight;
                        $result[] = $weight;
                        break;
                    }
                }
            }
           return implode(',', $result);
         }
         return "Niet in balans";
     }

}


print(checkBalance($argv) . "\n");

