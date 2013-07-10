<?php if (!$view) header("Location:../default.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
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
                        <td><input type="text" name="txt_nome" /></td>
                        <td><input type="text" name="txt_email" /></td>
                        <td><input type="text" name="txt_ra" /></td>
                        <td><input type="submit" value=" buscar " name="bt_busca" /></td>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($aluno = $view->aluno->fetch_object()): ?>
                    
                        <?php 
                        # Os que nao foram vistos deixa marcado em verde
                        if ($aluno->status == 0) {
                            $style = 'style="background: #c7f1c8;"';
                        }
                        else{
                            $style = null;
                        }
                        ?>
                    
                        <tr <?php echo $style ?>>                    
                            <td>
                                <a href="aluno_form.php?id=<?php echo $aluno->id ?>" id="aluno">
                                    <?php echo $aluno->nome ?>
                                </a>
                            </td>
                            <td><?php echo $aluno->email ?></td>
                            <td><?php echo $aluno->ra ?></td>
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
                            <?php for($i=1; $i <= $view->total_paginas; $i++): ?>

                                <?php 
                                if ($view->pagina == $i): 
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
