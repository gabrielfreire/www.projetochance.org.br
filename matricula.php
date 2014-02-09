<?php
session_start();
require "./classes/Session.class.php";
require "./classes/HTMLcombo.class.php";
require "./classes/Aluno.class.php";

$aluno = new Aluno();

if ( Session::getIdAluno() ) {
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
                    <h1>Ficha de matrícula</h1>        


                    <form action="#" method="post" id="form-matricula" >
                        <input type="hidden" name="id" value="<?php echo $aluno->id ?>" /> 
                        
                        <!-- primeira parte -->
                        <h4>Dados pessoais</h4>
                        <table class="table-matricula">      
                            <tr>
                                <td><label>*Nome completo</label></td>
                                <td><input type="text" name="nome" id="nome" value="<?php echo $aluno->nome; ?>" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Estado civil</label></td>
                                <td>
                                    <select name="estado-civil" id="estado-civil" class="text text-small">
                                        <?php                                                     
                                        $combo    = new HTMLcombo();
                                        $combo->valor_selecionado = $aluno->estado_civil;							
                                        
                                        echo $combo->getOptions( HTMLcombo::estados_civis() );                                
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>*CEP</label></td>
                                <td><input type="text" name="cep" id="cep" value="<?php echo $aluno->cep; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*Endereço</label></td>
                                <td><input type="text" name="endereco" id="endereco" value="<?php echo $aluno->endereco; ?>" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Nº</label></td>
                                <td><input type="text" name="numero" id="numero" value="<?php echo $aluno->numero; ?>" class="text text-small" /></td>
                            </tr>                           
                            <tr>
                                <td><label>*Bairro</label></td>
                                <td><input type="text" name="bairro" id="bairro" value="<?php echo $aluno->bairro; ?>" class="text text-xlarge" /></td>
                            </tr>
                            <tr>
                                <td><label>*Cidade</label></td>
                                <td><input type="text" name="cidade" id="cidade" value="<?php echo $aluno->cidade; ?>" class="text text-xlarge" /></td>
                            </tr>
                            <tr>         
                                <td><label>*Estado</label></td>
                                <td>
                                    <select name="estado" id="estado" class="text text-medium">
                                        <?php                                                     
                                        $combo    = new HTMLcombo();
                                        $combo->valor_selecionado = $aluno->estado;							
                                        
                                        echo $combo->getOptions( HTMLcombo::estados() );                                
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>*Data de nascimento</label></td>
                                <td><input type="text" name="data-nasc" id="data-nasc" value="<?php echo $aluno->data_nasc; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*RG</label></td>
                                <td><input type="text" name="rg" id="rg" value="<?php echo $aluno->rg; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*CPF</label></td>
                                <td><input type="text" name="cpf" id="cpf" value="<?php echo $aluno->cpf; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*Telefone</label></td>
                                <td><input type="text" name="telefone" id="telefone" value="<?php echo $aluno->telefone; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*E-mail</label></td>
                                <td><input type="text" name="email" id="email" value="<?php echo $aluno->email; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*Senha do portal</label></td>
                                <td><input type="password" name="senha" id="senha" value="<?php echo $aluno->senha; ?>" class="text text-medium" /></td>
                            </tr>
                            <tr>
                                <td><label>*Confirme sua senha</label></td>
                                <td><input type="password" name="confirmar-senha" id="confirmar-senha" value="<?php echo $aluno->senha; ?>" class="text text-medium" /></td>
                            </tr>        
                        </table>

                        
                        <!-- segunda parte -->
                        <h4>Pesquisa (opcional)</h4>
                        <table class="table-matricula">
                            <tr>
                                <td><label>Ano que concluiu/concluirá o Ensino Médio</label></td>
                                <td>
                                    <select name="ano-conclusao-em" class="text text-small">
                                        <?php                                                     
                                        $combo    = new HTMLcombo();
                                        $combo->valor_selecionado = $aluno->ano_conclusao_em;							
                                        
                                        echo $combo->getOptions( HTMLcombo::anos_ensino_medio() );                                
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Já fez a prova do ENEM? Se sim, em que ano?</label></td>
                                <td>
                                     <select name="ano-prova-enem" class="text text-small">
                                        <?php                                                     
                                        $combo    = new HTMLcombo();
                                        $combo->valor_selecionado = $aluno->ano_prova_enem;							
                                        
                                        echo $combo->getOptions( HTMLcombo::anos_prova_enem() );                                
                                        ?>
                                     </select>
                                 </td>
                            </tr>
                            <tr>
                                <td><label>Instituição que estuda/estudou no Ensino Médio:</label></td>
                                <td><input type="text" name="nome-inst" value="<?php echo $aluno->nome_inst; ?>" class="text text-medium" /></td>
                            </tr> 
                            <tr>
                                <td><label>Você já estudou em cursinho? Se sim, Qual?</label></td>
                                <td><input type="text" name="nome-cursinho" value="<?php echo $aluno->nome_cursinho; ?>" class="text text-medium" /></td>
                            </tr>                           
                            <tr>
                                <td colspan="2">
                                    <input type="submit" value="Salvar" class="btn" />                                 
                                </td>                
                            </tr>
                        </table>    
                    </form>
                        
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
        
        <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="js/jquery.matricula.js"></script>
    </body>
</html>