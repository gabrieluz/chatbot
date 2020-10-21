<?php
    //Fazemos a importação da classe Bot
    include("Bot.php");

    //Cria o objeto para manipular o chatbot
    $bot = new Bot();

    $questions =[
        "O que é php" => "É uma linguagem Server Side para web.",
        "O que é um carro" => "É uma maquina que leva pessoas.",
        "O que é ML" => "É um sistema computacional que permite o aprendizado por equacionamento matemático",
    ];

    #recebe o valor enviado
    if(isset($_GET['msg'])){
        $msg = strtolower(($_GET['msg']));

        // processa a requisição e utiliza o motor do bot para ler o valor
        $bot->hears($msg, function (Bot $botty){
            global $msg;
            global $questions;
        
            // Generics questions
            $generics = ['oi','olá','ola','bom dia', 'boa tarde'];
        
            if(in_array($msg, $generics)){
                //mostra a resposta no chat
                $botty->reply('olá. Em que posso te ajudar?');
            
            //se não encontrou, então vai procurar na lista de questions
            }elseif($botty->ask($msg, $questions)==""){
                $botty->reply('Desculpa. não entendi a pergunta.');
                $botty->reply($botty->ask($msg, $questions));
            //se encontrou uma chave que coincide com a pergunta
            }else{
                $botty->reply($botty->ask($msg, $questions));
            };
        });
    }
?>