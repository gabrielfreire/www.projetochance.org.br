<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once './classes/Session.class.php';
require_once './classes/DBpdo.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}


$id_contato = isset($_GET["id"])  ? $_GET["id"] : null;


# Conexao
$pdo = DBpdo::connection();


if ($id_contato) {
    $sql  = "SELECT * FROM contato WHERE id = ?";
    
    $stmte = $pdo->prepare($sql);
    $stmte->bindParam(1, $id_contato, PDO::PARAM_INT);
    $stmte->execute();
    
    $contato = $stmte->fetch(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
	
    <body>

        <h4>Contato</h4>
        <table class="table-contato">      
            <tr>
                <td><label>*Nome</label></td>
                <td><input type="text" name="nome" id="nome" value="<?php echo $contato->nome ?>" /></td>
            </tr>
            <tr>
                <td><label>Telefone</label></td>
                <td><input type="text" name="telefone" id="telefone" value="<?php echo $contato->telefone ?>" /></td>
            </tr>
            <tr>
                <td><label>*Email</label></td>
                <td><input type="text" name="email" id="email" value="<?php echo $contato->email ?>" /></td>
            </tr>
            <tr>
                <td><label>*Assunto</label></td>
                <td><input type="text" name="assunto" id="assunto" value="<?php echo $contato->assunto ?>" /></td>
            </tr>
            <tr>
                <td><label>*Mensagem</label></td>
                <td><textarea name="mensagem" id="mensagem" cols="50" rows="7"><?php echo $contato->mensagem ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="mailto:<?php echo $contato->email ?>">Responder</a>
                </td>                
            </tr>
        </table>
    </body>
</html>
