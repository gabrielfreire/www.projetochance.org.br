<?php
session_start();
require_once "./classes/Session.class.php";
require_once "./classes/Aluno.class.php";
require_once "./classes/Depoimento.class.php";

$depoimento = new Depoimento();
$depoimentos = $depoimento->getObjects();


if ( Session::getAlunoLogado() ) {
    $aluno = new Aluno();
    $aluno->id = Session::getIdAluno();
    $aluno = $aluno->getObject();
}
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
                            <a href="">matrícula</a> ou realize seu <a href="">login</a> para postar algo...
                        </div>
                    <?php endif; ?>
                    

                    <div id="pai-depos">
                        <?php if ( $depoimento->getTotalRegistros() === 0): ?>

                            <div class="depo-none">Seja o primeiro a deixar o seu...</div>
                        <?php else: ?>



                            <!-- todos os depoimentos -->
                            <?php foreach ( $depoimentos as $depoimento ): ?>
                                <div class="box-depo">      
                                    <input type="hidden" name="id" value="<?php echo $depoimento->id ?>" />

                                    <img src="images/<?php echo $depoimento->foto ?>" alt="" title="<?php echo $depoimento->nome ?>" />

                                    <div class="depo-nome"><?php echo $depoimento->nome ?></div>
                                    <div class="depo-msg"><?php echo $depoimento->mensagem ?></div>                            
                                    <div class="depo-data"><?php echo $depoimento->data_depo ?></div>
                                </div>
                            <?php endforeach; ?>

                        <?php endif; ?>                        
                    </div>
                    
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        
        <script src="js/jquery.depoimento.js" type="text/javascript"></script>
    </body>
</html>