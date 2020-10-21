<?php
    class Bot{

        private $name = "Chatbot";

        public function getName(){
            return $this -> name;
        }

        // controla o listener do callback 
        public function hears($message, callable $call){
            $call( new Bot);
            return $message;
        }

        //Responde com uma mensagem
        public function reply($response){
            echo $response;
        }

        // procura um valor dentro de um vetor informado
        public function ask($question, array $dic){
            $question = trim($question);
            foreach($dic as $key => $value){
                if($dic == $key ){
                    return $value;
                }
            }
        }        
    }

?>