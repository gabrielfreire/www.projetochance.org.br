<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once './classes/Session.class.php';
require_once './classes/DB.class.php';
require_once './classes/ReceberDados.class.php';
require_once './classes/HTMLcombo.class.php';
require_once './classes/FuncAux.class.php';
require_once './classes/View.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::GET;
$id_depoimento = $recDados->getVariavel("id");


$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

# View



# Conexao
$pdo = DBpdo::connection();


if ($id_depoimento && !$recebe_form) {
    $sql  = "SELECT * FROM depoimentos WHERE id = {$id_depoimento}";
    
    $depoimento = $pdo->query($sql)->fetch_object(); 
    
    # Verifica se ja foi visto, se nao foi(status 0) edita para visualizado(status 1)
    if ($depoimento->status == 0) {
        $sql  = "UPDATE depoimentos SET status = 1 WHERE id = ".$id_depoimento;
        $pdo->query($sql);
    }
}

if ($recebe_form) {

    $nome     = $recDados->getVariavel('txt_nome', true);
    $email    = $recDados->getVariavel('txt_email', true);
    $mensagem = $recDados->getVariavel('txt_msg', true);
    
    
    $sql  = "UPDATE depoimentos SET nome = '$nome', email = '$email', mensagem = '$mensagem' ";
    $sql .= "WHERE id = ".$id_depoimento;

    $pdo->query($sql);

    header("Location:depoimentos.php");
}

$pdo->close();


require_once 'views/depoimento_form.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function ConfirmDel(nome) {  
        if ( confirm("Excluir permanentemente postagem de "+nome+"?") ){
                window.location.href = "depoimentos_action_del.php?id=<?php echo $depoimento->id ?>";
        }else{
                return false;  
        }  	
      }  
</script>
</head>
	
    <body>

        <form action="depoimento_form.php?id=<?php echo $depoimento->id ?>" id="form_depoimento" method="post">
            <table border="0">
                <tr>
                    <td><label>* Nome:</label></td>
                    <td>
                        <input type="text" name="txt_nome" value="<?php echo $depoimento->nome ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label>* E-mail:</label></td>
                    <td>
                        <input type="text" name="txt_email" value="<?php echo $depoimento->email ?>" />
                    </td>
                </tr>              
                <tr>
                    <td><label>* Mensagem:</label></td>
                    <td>
                        <textarea name="txt_msg"><?php echo $depoimento->mensagem ?></textarea>
                    </td>
                </tr>
            </table>
            
            <div>
                <h4>Depoimento postado no dia <?php echo $depoimento->data ?> !</h4>
                <input type="button" value="responder" onClick="return window.location.href = 'mailto:<?php echo $depoimento->email ?>'" />
                <input type="button" value="excluir" onClick="return ConfirmDel('<?php echo $depoimento->nome ?>');" />
                <input type="submit" name="bt" value="salvar" />
            </div>
        </form>        
    </body>
</html>
