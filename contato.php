<?php
/**
 * 
 */
session_start();
    
require "_classes/DB.class.php";
require "_classes/ReceberDados.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

//FuncAux::checaF5();

/**
* View
*/
$view = new View();
        

/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt"); 


/**
 * Tratando os dados...
 */
$view->nome     = $recDados->getVariavel('txt_nome', true);
$view->email    = $recDados->getVariavel('txt_email', true);
$view->assunto  = $recDados->getVariavel('txt_assunto', true);
$view->mensagem = $recDados->getVariavel('txt_msg', true);

# Campo "txt_confemail" nao eh visivel para o usuario, trata-se de um teste anti-spam
$hidden = $recDados->getVariavel('txt_confemail');

//mb_detect_encoding($view->nome.'x', 'UTF-8, ISO-8859-1');

if ($recebe_form){
    
    $mysqli = DB::conectar();        
    $data = FuncAux::data_hora_por_extenso(); 


    /**
     * Verifica se nao eh spam.
     * 
     */
    if ($hidden) {                

        $verificarSPAM = simplexml_load_file("http://www.stopforumspam.com/api?email={$view->email}&username={$view->nome}");

        # "Yes" se houver na base de dados do site stopforumspam.com e "No" caso contrario
        $user_appears  = $verificarSPAM->appears[1];
        $email_appears = $verificarSPAM->appears[0];

        # Frequencia de tentativas registradas na base
        $user_freq  = $verificarSPAM->frequency[1];
        $email_freq = $verificarSPAM->frequency[0];


        /**
         * Se houver spam...
         */
        $sql  = "INSERT INTO spam ";
        $sql .= "(user, user_frequency, user_appears, email, email_frequency, email_appears, hidden, data) ";
        $sql .= "VALUES ";
        $sql .= "('{$view->nome}', {$user_freq}, '{$user_appears}', '{$view->email}', {$email_freq}, '{$email_appears}', '{$hidden}', '{$data}')";

        $mysqli->query($sql);

        $view->titulo = "<font color=\"red\">Tentativa de SPAM, mensagem não enviada!</font>";         
        require_once "views/mensagem.php";
        die();
    }
    
    
    
    
    /**
     *  Caso nao seja spam, inicia a validaçao dos campos!!!
     */
    if ($view->nome 	== "" || 
        $view->email    == "" || 
        $view->assunto  == "" || 
        $view->mensagem == "" ){

        $view->msg_erro = "Preencha todos os campos obrigatórios!!";	
    }
    elseif ( strstr($view->nome, "[0-9]") ){
        $view->msg_erro = "Seu nome não pode ser numérico!!";		
    }
    elseif ( !strstr($view->email, "@") || !strstr($view->email, ".") || strlen($view->email) < 6 ){
        $view->msg_erro = "Digite um e-mail válido!!";	
    }
    else{
                
        $mysqli = DB::conectar();       

          
        /**
         * Se estiver ok, insere os dados...
         */
        $sql  = "INSERT INTO contatos ";
        $sql .= "(nome, email, assunto, mensagem, data) ";
        $sql .= "VALUES ";
        $sql .= "('$view->nome', '$view->email', '$view->assunto', '$view->mensagem', '$data')";

        $mysqli->query($sql);
        $mysqli->close();    
        
        
        
        
        
       /**
        * Enviando confirmaçao
        */
        # E-mail de destino
        $to       = $view->email;

        # Assunto
        $subject  = "Contato.";

        # Mensagem
        $message  = "<p>Novo contato de " .$view->nome.".</p>";
        $message .= "<p>Veja a mensagem completa: http://projetochance.org.br/sistema</p>";



        # Cabeçalhos que definem o email como sendo em formato HTML
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        # Headers adicionais
        $headers .= 'To: Misael <misah@ig.com.br>' . "\r\n";
        $headers .= 'From: Projeto Chance <cursinho@projetochance.org.br>' . "\r\n";

        $view->mail = mail($to, $subject, $message, $headers);
        $view->mail = mail($to, $subject, $message, $headers);
        
        
        
        /**
         * Mensagem
         */
        $view->titulo = "Mensagem enviada com sucesso!";
        $view->frase  = "Assim que possível, entraremos em contato. Obrigado.";                
                
        require_once "views/mensagem.php";
        die();		
    }	
}

# View
require_once "views/contato.php";
?>