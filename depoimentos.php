<?php
session_start();
require "./classes/Session.class.php";
require "./classes/Aluno.class.php";
require "./classes/Depoimento.class.php";


if ( Session::getAlunoLogado() ) {
    $aluno = new Aluno();
    $aluno->id = Session::getIdAluno();
    $aluno = $aluno->getObject();
}

$depoimento = new Depoimento();
$depoimentos = $depoimento->getObjects();
?>

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
                    <h1>Deixe seu depoimento</h1>
                    
                    <h3>Depoimentos (<?php echo $depoimento->getTotalRegistros() ?>)</h3>
                    
                    
                    <?php if ( Session::getAlunoLogado() ): ?>
                        
                        <!-- div novo depoimento -->
                        <div class="box-new-depo">
                            <div><?php echo $aluno->nome ?></div>
                            <img src="images/<?php echo $aluno->foto ?>" alt="" title="<?php ?>" />

                            <textarea id="mensagem" placeholder="Escreva algo sobre o Projeto Chance..."></textarea>
                            <button id="btn-new-depo">Publicar</button>
                        </div>
                    <?php else: ?>
                        
                        <!-- mensagem para se logar -->
                        <div class="logado-none">
                            Somente alunos matriculados podem deixar um depoimento, faça já sua 
                            <a href="matricula.html">matrícula</a> ou realize seu <a href="portal.html">login</a> para postar algo...
                        </div>
                    <?php endif; ?>
                    
                        
                        
                        

                    <div id="pai-depos">
                        <?php if ( $depoimento->getTotalRegistros() === 0): ?>

                            <div class="depo-none">Seja o primeiro a deixar o seu...</div>
                        <?php else: ?>


                            <!-- todos os depoimentos -->
                            <?php foreach ( $depoimentos as $depoimento ): ?>
                                <div class="box-depo">      
                                    <input type="hidden" name="id" value="<?php echo $depoimento->id_depo ?>" />

                                    <img src="images/<?php echo $depoimento->foto ?>" alt="" title="<?php echo $depoimento->nome ?>" />

                                    <div class="depo-nome"><?php echo $depoimento->nome ?></div>
                                    
                                    <?php if( $depoimento->id_aluno == Session::getIdAluno() ): ?>
                                        <div class="depo-icons">
                                            <a href="#" class="depo-icon-editar" title="Editar"></a>
                                            <a href="#" class="depo-icon-excluir" title="Excluir"></a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="depo-msg"><?php echo $depoimento->mensagem ?></div>
                                    
                                    <!-- hide() -->
                                    <textarea class="depo-editar depo-textArea"><?php echo $depoimento->mensagem ?></textarea>
                                    <input class="depo-editar depo-btn-cancelar" type="button" value="Cancelar" />                                    
                                    <input class="depo-editar depo-btn-alterar" type="button" value="Alterar" />                                    
                                    <!-- -->
                                    
                                    <div class="depo-data"><?php echo $depoimento->data_depo ?></div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>                        
                    </div>
                    
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        
        <script type="text/javascript" src="js/jquery.cokidoo-textarea.js"></script>
        <script type="text/javascript" src="js/jquery.depoimento.js"></script>
    </body>
</html>