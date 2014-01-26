<!DOCTYPE html>
<html>
    <head>
        <title>.:: Projeto Chance ::.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
    </head>
    <body>
        <div id="main">    
            <?php include "./includes/header.php"; ?>

            
            <div id="content">                              
                <?php include "./includes/left.php"; ?>                
                
                <div id="sub-content">
                    <h1>Contato</h1>
                    
                    <form action="#" method="post" id="form-contato" >
                        <table>      
                            <tr>
                                <td><label>*Nome</label></td>
                                <td><input type="text" name="nome" id="nome" class="input input-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>Telefone</label></td>
                                <td><input type="text" name="telefone" id="telefone" class="input input-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Email</label></td>
                                <td><input type="text" name="email" id="email" class="input input-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Assunto</label></td>
                                <td><input type="text" name="assunto" id="assunto" class="input input-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Mensagem</label></td>
                                <td><textarea name="mensagem" id="mensagem" class="textArea textArea-xlarge"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Enviar" class="btn" />                                 
                                </td>                
                            </tr>
                        </table>
                    </form>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        
        <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="js/jquery.contato.js"></script>
    </body>
</html>