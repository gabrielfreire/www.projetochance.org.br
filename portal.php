<?php
session_start();
require "./classes/Session.class.php";
require "./classes/Aluno.class.php";

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
                    <h1>Portal do aluno</h1>
                    
                    <?php if ( Session::getAlunoLogado() ): ?>
                    
                        <a href="#" id="sair">Sair</a>
                    
                        <div class="portal-foto">
                            <div class="portal-box-img">
                                
                                <!-- display: none -->
                                <div class="portal-box-img-editar">Alterar foto</div>
                                
                                <img src="./images/sem-foto.jpg" alt="" />
                            </div>
                            <span>Último acesso: <br/><?php echo Session::getUltimoAcessoAluno() ?></span>
                        </div>
                    
                    
                        <div class="portal-dados">
                            <div class="portal-dados-titulo">Atendimento</div>
                            
                            <div class="portal-dados-item"><a href="#">Notas e faltas</a></div>
                            <div class="portal-dados-item"><a href="#">Planos de ensino</a></div>
                            <div class="portal-dados-item"><a href="#">Horário de aulas</a></div>
                            <div class="portal-dados-item"><a href="#">Documentos pendentes</a></div>
                            <div class="portal-dados-item"><a href="#">Palestras</a></div>
                            <div class="portal-dados-item"><a href="matricula.html">Alterar dados cadastrais</a></div>
                        </div>
                        
                        <div class="portal-dados">
                            <div class="portal-dados-titulo">Dados cadastrais</div>
                            
                            <div class="portal-dados-item"><span>Nome:</span> <?php echo $aluno->nome ?></div>
                            <div class="portal-dados-item"><span>Email:</span> <?php echo $aluno->email ?></div>
                            <div class="portal-dados-item"><span>RA:</span> <?php echo $aluno->registro_aluno ?></div>
                            <div class="portal-dados-item"><span>Estado civil:</span> <?php echo $aluno->estado_civil ?></div>
                            <div class="portal-dados-item"><span>CEP:</span> <?php echo $aluno->cep ?></div>
                            <div class="portal-dados-item"><span>Endereço:</span> <?php echo $aluno->endereco ?></div>
                            <div class="portal-dados-item"><span>Número:</span> <?php echo $aluno->numero ?></div>
                            <div class="portal-dados-item"><span>Bairro:</span> <?php echo $aluno->bairro ?></div>
                            <div class="portal-dados-item"><span>Cidade:</span> <?php echo $aluno->cidade ?></div>
                            <div class="portal-dados-item"><span>Estado:</span> <?php echo $aluno->estado ?></div>
                            <div class="portal-dados-item"><span>Data de nascimento:</span> <?php echo $aluno->data_nasc ?></div>
                            <div class="portal-dados-item"><span>RG:</span> <?php echo $aluno->rg ?></div>
                            <div class="portal-dados-item"><span>CPF:</span> <?php echo $aluno->cpf ?></div>
                            <div class="portal-dados-item"><span>Telefone:</span> <?php echo $aluno->telefone ?></div>
                        </div>
                        
                    <?php endif; ?>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        <script type="text/javascript">
            $("div.portal-box-img").on({
                mouseover: function (){
                    $("div.portal-box-img-editar").show();
                },
                mouseout: function (){
                    $("div.portal-box-img-editar").hide();
                }
            });
        </script>
    </body>
</html>