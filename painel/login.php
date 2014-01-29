<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : null;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
	
    <body>
        
        <div id="caixaLogin">
            <form action="login_action.php" method="post">
                <table border="0">
                    <tr>                    
                        <td><label for="login">Email</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="login" autofocus /></td>
                    </tr>
                    <tr>                    
                        <td><label for="senha">Senha</label></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="senha" /></td>
                    </tr>
                    
                    <?php if ($erro): ?>
                        <tr>
                            <td><label id="erro">Dados inválidos</label></td>
                        </tr>
                    <?php endif; ?>
                    
                    <tr>
                        <td><input type="submit" value=" Enviar " /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
