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
    	<h1>Contato</h1>
        
        <?php if (isset($view->msg_erro)): ?>
            <h5 id="erro"><?php echo $view->msg_erro ?></h5> 
            
        <?php endif; ?>
        
       	<form name="form1" id="form_contato" action="contato" method="post">            
            <table>
                <tr>
                    <td><label>* Seu nome:</label></td>
                    <td>
                        <input type="text" name="txt_nome" value="<?php echo $view->nome; ?>" maxlength="30" />				
                    </td>
                </tr>
                <tr>
                    <td><label>* E-mail:</label></td>
                    <td>
                        <input type="text" name="txt_email" value="<?php echo $view->email; ?>" maxlength="50" />
                    </td>
                </tr>
                
                
                <tr id="confemail">
                    <td><label>* Confirmar e-mail:</label></td>
                    <td>
                        <input type="text" name="txt_confemail" maxlength="50" />
                    </td>
                </tr>
                
                
                <tr>
                    <td><label>* Assunto</label></td>
                    <td>
                        <input type="text" name="txt_assunto" value="<?php echo $view->assunto; ?>" maxlength="50" />
                    </td>
                </tr>
                <tr>
                    <td><label>* Mensagem:</label></td>
                    <td>
                        <textarea name="txt_msg"><?php echo $view->mensagem; ?></textarea>   
                    </td>
                </tr>                 
                <tr>
                    <td></td>
                    <td><p><i>(*) Campos obrigatórios</i></p></td>
                </tr>      
                <tr>
                    <td colspan="2" align="right">
                        <input type="submit" name="bt" value="Enviar dados" />
                        <input type="button" name="btlimpar" value="Limpar" onclick="limparFormContato()" />
                    </td>
                </tr>
            </table>
        </form> 
                       
    	<p id="contato">
            (11)2866-3441
            <br/><br/>
            >> <a href="mailto:cursinho@projetochance.org.br">cursinho@projetochance.org.br</a>
            <br/><br/><br/>
            <!--<i>Fale com o desenvolvedor: (11)97465-4654</i>-->
        </p>
       
    
    
    </div>

	<?php require "views/view_rodape.php"; ?>

</div>

</body>
</html>

