<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_scripts/java_script.js"></script>
</head>

<body>

<div id="site">
	
	<?php require "views/view_topo.php"; ?>
    
    <div id="content">
        <h1>Deixe seu depoimento</h1>
        <?php if (isset($view->msg_erro))    echo "<h5 id=\"erro\">"   .$view->msg_erro.   "</h5>"; ?> 
        <?php if (isset($view->msg_sucesso)) echo "<h5 id=\"sucesso\">".$view->msg_sucesso."</h5>"; ?>  
        
        <form action="depoimentos" id="form_depoimento" method="post">
            <table border="0">
                <tr>
                    <td>
                        <input type="text" name="txt_nome" value="<?php echo $view->nome ? $view->nome : "Nome ou empresa" ?>" 
                               onfocus="limpar(this);" onblur="escrever(this);" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="txt_email" value="<?php echo $view->email ? $view->email : "E-mail (não será divulgado)" ?>" 
                               onfocus="limpar(this);" onblur="escrever(this);" />
                    </td>
                </tr>              
                <tr>
                    <td>
                        <textarea name="txt_msg" onfocus="limpar(this);" onblur="escrever(this);"><?php echo $view->mensagem ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <input type="submit" name="bt" value="Postar" />
                        </p>
                    </td>
                </tr>
            </table>
        </form>
        
        
        
        
        
        <table id="comentarios" cellspacing="0" border="0">
            <tr>
                <td colspan="2"><u>Últimas postagens</u></td>
            </tr>
            <?php if ($view->depoimentos->num_rows==0): ?>
                <tr>
                    <td colspan="2"><p>Nenhum depoimento ainda, seja o primeiro a deixar o seu...</p></td>
                </tr>
            <?php endif; ?>
            
            <?php while ($depoimento = $view->depoimentos->fetch_object()): ?>
                <tr>
                    <td class="top_depoimento"><b><?php echo $depoimento->nome ?></b></td>
                    <td class="top_depoimento"></td>
                </tr> 
                <tr>
                    <td valign="top"><i><?php echo "em ".$depoimento->data ?></i></td>
                    <td><label><?php echo $depoimento->mensagem ?></label></td>
                </tr>
                <tr><td class="entre_comentario" colspan="2"></td></tr>
            <?php endwhile; ?>
        </table>
    </div>
    
        <?php require "views/view_rodape.php"; ?>
  
</div>

</body>
</html>

