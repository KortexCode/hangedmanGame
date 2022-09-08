<?php
//Lista de palabras
$possibleWord = ["Minecraft", "Tauni", "Luzdeluna", "Warcraft", "hermanito"];
//Intentos
const maxAttempts = 6;
$attempts = 0;

echo "\n";

function clear(){

    if(PHP_OS ==="WINNT")
    system("cls");
    else
    system("clear");
}

//INICIALIZACIÓN DE JUEGO
echo "¡¡😺Hangman game!! \n\n";
//elección aleatoria de las palabras
$choosenWord = rand(0, count($possibleWord) - 1); //busca el indice aleatorio
$choosenWord = strtolower($possibleWord[$choosenWord]); // elige la palabra aleatoria
$wordLength = strlen($choosenWord); //peso del string
$input ="";
$hideWord = str_pad($input, $wordLength, "_"); // se rellena un string vacio
 
do {
   
    echo "Encuentra la palabra de $wordLength letras \n";
   
    echo $hideWord."\n";
    if($hideWord){
      
        $player_letter = readline("Ingresa una letra:");
          
        while(strlen($player_letter)>1 || strlen($player_letter)<=0){
          
            echo "No debes ingresar más de una letra ni dejar vacío\n";
            sleep(2);
            clear();
            $player_letter = readline("Ingresa una letra:");
            
        }
    }
    echo "\n"; 
    $player_letter = strtolower($player_letter);

    if(str_contains($choosenWord, $player_letter)){

        $offset = 0;
        while(($letterPosition = strpos($choosenWord, $player_letter, $offset)) !== false){

            $hideWord[$letterPosition] = $player_letter;
            $offset = $letterPosition + 1;      
        }
    }
    else{   
        $hangman = array(
            "
             -----
             |   |
             O   |
                 |
                 |
                 |
            ",
            "
             -----
             |   |
             O   |
             |   |
                 |
                 |
            ",
            "
            -----
            |   |
            O   |
           /|   |
                |
                |
           ",
            "
             -----
             |   |
             O   |
            /|\  |
                 |
                 |
            ",
            "
             -----
             |   |
             O   |
            /|\  |
            /    |
                 |
            ",
            "
             -----
             |   |
             O   |
            /|\  |
            / \  |
            "
        
        
        );

        $attempts++;
        echo "Letra incorrecta te quedan ".(maxAttempts - $attempts)." intentos \n";
        echo $hangman[$attempts - 1]."\n";
        sleep(2); 
        
        
    }
    clear();
} while ($attempts < maxAttempts && !($hideWord === $choosenWord));
    
if($hideWord === $choosenWord){
    echo "Felicidades, completaste la palabra 😁!! \n";
    echo  
    "
    O  Me salvaste 😆!!
   /|\  
   / \  
   ";
    echo "\n";
}
else{
    echo "Perdiste, intentalo de nuevo 😋!! \n";
    echo  
    "
    O  No estoy muerto, pero si esto no fuera un juego lo estaría 😐
   /|\  
   / \  
   ";
    echo "\n"; 
}





