<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<style type="text/css">
	body{
		font-family:Arial, Helvetica, sans-serif;}
	img{
		height:80px;
		width:140px;}
	div{
		background-color:#999;
		width:100%;
		padding:5px 0;}		
	table{
		margin:auto;}
	label{
		margin:0;
		font-size:12px;
                font-weight: bold;
		color:#FFF;
                float: right;}
        p{
                font-size:14px;
                margin: 5px;
                font-weight: bold;}
	input[type=button]{
		margin-top:10px;
                float:right;}
</style>
</head>

<body>

    <img src="_imagens/logo.png" alt="Projeto Chance" />
    
    <?php if ($view->erro) { echo "<p>".$view->erro."</p>"; } ?>

    <?php if ($view->pass): ?>
        <p>Senha alterada com sucesso.</p>

    <?php else: ?>  
        <div>
            <form action="alterar-senha.php" method="post">
                <table>
                        <tr>
                        <td><label>Digite a senha atual</label></td>
                        <td><input type="password" name="txt_senha_atual" /></td>
                    </tr>
                    <tr>
                        <td><label>Digite sua nova senha</label></td>
                        <td><input type="password" name="txt_senha_nova" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value= "Prosseguir"/></td>
                    </tr>
                </table>
            </form>
        </div>
    <?php endif; ?>
        
    <input type="button" value= "Fechar" onClick="self.close()">
</body>
</html>