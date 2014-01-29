<?php

session_start();

require_once './classes/Session.class.php';
require_once './classes/DBpdo.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



# Busca
$busca = isset($_POST['busca']) ? $_POST['busca'] : null;

# Conexao
$pdo = DBpdo::connection();

/**
 * Paginacao
 */
$limite = 11;
$pagina = isset($_GET['pag']) ? $_GET['pag'] : 1;

$inicio = ($pagina * $limite) - $limite;
$total_paginas = 1;

if ( $busca ) {    
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $ra    = $_POST['ra'];
    
    
    $sql = "SELECT * FROM aluno WHERE nome LIKE '%{$nome}%' AND email LIKE '%{$email}%' AND registro LIKE '%{$ra}%'";
    $stmte = $pdo->prepare($sql);
    $stmte->bindParam(1,  $nome,  PDO::PARAM_STR);
    $stmte->bindParam(2,  $email, PDO::PARAM_STR);
    $stmte->bindParam(3,  $ra,    PDO::PARAM_INT);
    $stmte->execute();
}
else{
    $sql = "SELECT * FROM aluno ORDER BY id DESC LIMIT {$inicio}, {$limite}";
    $stmte = $pdo->prepare($sql);
    $stmte->execute();
    
    $sql = "SELECT COUNT(*) AS total FROM aluno";
    $stmte2 = $pdo->prepare($sql);
    $stmte2->execute();
    $rs = $stmte2->fetch(PDO::FETCH_OBJ);

    $total_paginas = ceil((int)$rs->total/$limite);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function ConfirmDel(nome) {  
        if ( confirm("Excluir permanentemente o aluno "+nome+"?") ){
                return true;
        }else{
                return false;  
        }  	
      }   
</script>
</head>
	
    <body>

        <form action="alunos.php" method="post">
            <table id="table_lista" border="0" cellspacing="0">
                <thead>
                    <tr>
                        <td class="titulo"><label>Nome</label></td>
                        <td class="titulo"><label>E-mail</label></td>
                        <td class="titulo"><label>Registro do aluno</label></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="nome" /></td>
                        <td><input type="text" name="email" /></td>
                        <td><input type="text" name="ra" /></td>
                        <td><input type="submit" value=" buscar " name="busca" /></td>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($aluno = $stmte->fetch(PDO::FETCH_OBJ)): ?>
          
                        <tr>                    
                            <td>
                                <a href="aluno_form.php?id=<?php echo $aluno->id ?>" id="aluno">
                                    <?php echo $aluno->nome ?>
                                </a>
                            </td>
                            <td><?php echo $aluno->email ?></td>
                            <td><?php echo $aluno->registro ?></td>
                            <td>
                                <a href="alunos_action_del.php?id=<?php echo $aluno->id ?>" class="link"
                                   onClick="return ConfirmDel('<?php echo $aluno->nome ?>');">
                                    remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="4">
                            <?php for($i=1; $i <= $total_paginas; $i++): ?>

                                <?php 
                                if ($pagina == $i): 
                                    $style = 'style="background:#000"'; 
                                else:
                                    $style = null;
                                endif; ?>
                            
                                <a class="pag" <?php echo $style ?> href="alunos.php?pag=<?php echo $i ?>">
                                    <?php echo $i ?>
                                </a>
                            <?php endfor; ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </body>
</html>
