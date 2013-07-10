<?php if (!$view) header("Location:../login.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function ConfirmDel(nome) {  
        if ( confirm("Excluir permanentemente postagem de "+nome+"?") ){
                window.location.href = "depoimentos_action_del.php?id=<?php echo $view->depoimento->id ?>";
        }else{
                return false;  
        }  	
      }  
</script>
</head>
	
    <body>

        <form action="depoimento_form.php?id=<?php echo $view->depoimento->id ?>" id="form_depoimento" method="post">
            <table border="0">
                <tr>
                    <td><label>* Nome:</label></td>
                    <td>
                        <input type="text" name="txt_nome" value="<?php echo $view->depoimento->nome ?>" />
                    </td>
                </tr>
                <tr>
                    <td><label>* E-mail:</label></td>
                    <td>
                        <input type="text" name="txt_email" value="<?php echo $view->depoimento->email ?>" />
                    </td>
                </tr>              
                <tr>
                    <td><label>* Mensagem:</label></td>
                    <td>
                        <textarea name="txt_msg"><?php echo $view->depoimento->mensagem ?></textarea>
                    </td>
                </tr>
            </table>
            
            <div>
                <h4>Depoimento postado no dia <?php echo $view->depoimento->data ?> !</h4>
                <input type="button" value="responder" onClick="return window.location.href = 'mailto:<?php echo $view->depoimento->email ?>'" />
                <input type="button" value="excluir" onClick="return ConfirmDel('<?php echo $view->depoimento->nome ?>');" />
                <input type="submit" name="bt" value="salvar" />
            </div>
        </form>        
    </body>
</html>
