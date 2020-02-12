<?php


function array_push_assoc($array,$key, $value){
    $array[$key]= $value;
    return $array;
}

function colle ($x,$y,$coord){
    
$tableau = [];

for ($j=0; $j <= $y; $j++) { 
    for ($i=0; $i <= $x ; $i++) {
        if(in_array([$i,$j],$coord) == 1){
        $tableau = array_push_assoc($tableau, $i.",".$j, 1);
        }else{
        $tableau = array_push_assoc($tableau, $i.",".$j, 0);

        }
    }
}

echo PHP_EOL;
for ($j=0; $j < $y; $j++) { 

    echo '+';
    for ($i=0; $i < $x ; $i++) { 
        echo '---+';

    }
    echo PHP_EOL;
    echo '|';
    for ($i=0; $i < $x; $i++) { 
        if($tableau["$i,$j"]==1){
            echo ' X |';
        }else{
            echo '   |';
        }

    }
    echo PHP_EOL;
        
    }
    echo '+';
    for ($i=0; $i < $x ; $i++) { 
        echo '---+';
    }
echo PHP_EOL;
return $tableau;
}
$tableau = colle(6,6,[[0,0],[3,4]]);
$array =[[0,0],[3,4]];
        
while(true){
        
        $requete = readline();
        if($requete != "display"){
        $requete = explode(" ",$requete);
        $command = $requete[0];
        $coord1 = $requete[1].$requete[2];
        $coord1 = substr($coord1,1,-1);
        }else{
            $command = $requete; 
        }

        if ($requete[0] == "query"){

                if ( $tableau[$coord1] == 1){
                    echo 'full'.PHP_EOL;
                }
                else{
                    echo 'empty'.PHP_EOL;
                }
            }
        else if($requete[0] == 'add'){
            if ( $tableau[$coord1] == 1){
                echo 'A cross already exist at this location';
                
            }
            else{
                $coord1 = explode(',', $coord1);
                array_push($array, [$coord1[0],$coord1[1]]);
                $tableau["$coord1[0],$coord1[1]"]=1;

                
            }
        }

        else if($requete[0] == 'remove'){
                if ( $tableau[$coord1] == 0){
                    echo 'No cross exists at this location !';
                }
                else{
                    $coord1 = explode(',', $coord1);
                    unset($array[array_search([$coord1[0],$coord1[1]], $array)]);
                    $tableau["$coord1[0],$coord1[1]"]=0;


                }
            }
        else if($command == 'display'){
            
            colle(6,6,$array);
        }
    }
    

