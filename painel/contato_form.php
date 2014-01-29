<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/DB.class.php';
require_once '../_classes/ReceberDados.class.php';
require_once '../_classes/HTMLcombo.class.php';
require_once '../_classes/FuncAux.class.php';
require_once '../_classes/View.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::GET;
$id_contato = $recDados->getVariavel("id");


$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

# View
$view = new View();


# Conexao
$mysqli = DB::conectar();


if ($id_contato && !$recebe_form) {
    $sql  = "SELECT * FROM contatos WHERE id = {$id_contato}";
    
    $view->contato = $mysqli->query($sql)->fetch_object();    
    
    # Verifica se ja foi visto, se nao foi(status 0) edita para visualizado(status 1)
    if ($view->contato->status == 0) {
        $sql  = "UPDATE contatos SET status = 1 WHERE id = ".$id_contato;
        $mysqli->query($sql);
    }
}

if ($recebe_form) {

    $nome     = $recDados->getVariavel('txt_nome', true);
    $email    = $recDados->getVariavel('txt_email', true);
    $assunto  = $recDados->getVariavel('txt_assunto', true);
    $mensagem = $recDados->getVariavel('txt_msg', true);
    
    
    $sql  = "UPDATE contatos SET nome = '$nome', email = '$email', assunto='$assunto', ";
    $sql .= "mensagem = '$mensagem' ";
    $sql .= "WHERE id = ".$id_contato;

    $mysqli->query($sql);

    header("Location:contatos.php");
}

$mysqli->close();


require_once 'views/contato_form.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function ConfirmDel(nome) {  
        if ( confirm("Excluir permanentemente o contato de "+nome+"?") ){
                window.location.href = "contatos_action_del.php?id=<?php echo $view->contato->id ?>";
        }else{
                return false;  
        }  	
      }  
      
//    return novaJanela('views/contato_resposta.php') 
//    function novaJanela(URL){
//        window.open(URL, '', 'top=200px, left=320px, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=500, height=250');
//    }
</script>
</head>
	
    <body>

        <form action="contato_form.php?id=<?php echo $view->contato->id ?>" method="post" id="form_contato">		
            <table>
                <tr>
                    <td><label>* Nome:</label></td>
                    <td>
                        <input type="text" name="txt_nome" value="<?php echo $view->contato->nome; ?>" maxlength="30" />				
                    </td>
                </tr>
                <tr>
                    <td><label>* E-mail:</label></td>
                    <td>
                        <input type="text" name="txt_email" value="<?php echo $view->contato->email; ?>" maxlength="50" />
                    </td>
                </tr>
                <tr>
                    <td><label>* Assunto</label></td>
                    <td>
                        <input type="text" name="txt_assunto" value="<?php echo $view->contato->assunto; ?>" maxlength="50" />
                    </td>
                </tr>
                <tr>
                    <td><label>* Mensagem:</label></td>
                    <td>
                        <textarea name="txt_msg"><?php echo $view->contato->mensagem; ?></textarea>   
                    </td>
                </tr>      
            </table>
        
            <div>
                <h4>Contato efetuado no dia <?php echo $view->contato->data ?> !</h4>
                <input type="button" value="responder" onClick="return window.location.href = 'mailto:<?php echo $view->contato->email ?>'" />
                <input type="button" value="excluir" onClick="return ConfirmDel('<?php echo $view->contato->nome ?>');" />
                <input type="submit" name="bt" value="salvar" />
            </div>
            
        </form> 
<!--        <a href="" class="link">Salvar</a>-->
    </body>
</html>
