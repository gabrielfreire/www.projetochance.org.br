<?php if (!$view) header("Location:../default.php"); ?>

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
