<?php
$aluno = new stdClass();
$aluno->nome = "";
$aluno->estado_civil = "";
$aluno->endereco = "";
$aluno->numero = "";
$aluno->complemento = "";
$aluno->cep = "";
$aluno->bairro = "";
$aluno->cidade = "";
$aluno->estado = "";
$aluno->data_nasc = "";
$aluno->rg = "";
$aluno->cpf = "";
$aluno->telefone = "";
$aluno->email = "";
$aluno->senha = "";
$aluno->conclusao_em = "";
$aluno->nome_inst = "";
$aluno->nome_cursinho = "";
$aluno->ano_prova_enem = "";
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


                    <form action="#" method="post" id="form-matricula">
                         
                        <!-- primeira parte -->
                        <h4>Dados pessoais</h4>
                        <table>      
                            <tr>
                                <td><label>*Nome completo</label></td>
                                <td><input type="text" name="nome" value="<?php echo $aluno->nome; ?>" class="input input-xlarge" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Estado civil</label></td>
                                <td>
                                    <select name="estado-civil" class="select select-small">
                                        <option></option>
                                        <option>Casado(a)</option>
                                        <option>Solteiro(a)</option>
                                        <option>Divorciado(a)</option>
                                        <option>Viúvo(a)</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><label>*CEP</label></td>
                                <td><input type="text" name="cep" value="<?php echo $aluno->cep; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Endereço</label></td>
                                <td><input type="text" name="endereco" value="<?php echo $aluno->endereco; ?>" class="input input-xlarge" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Nº</label></td>
                                <td><input type="text" name="numero" value="<?php echo $aluno->numero; ?>" class="input input-small" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>Complemento</label></td>
                                <td><input type="text" name="complemento" value="<?php echo $aluno->complemento; ?>" class="input input-xlarge" /></td>
                            </tr>                            
                            
                            <tr>
                                <td><label>*Bairro</label></td>
                                <td><input type="text" name="bairro" value="<?php echo $aluno->bairro; ?>" class="input input-xlarge" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Cidade</label></td>
                                <td><input type="text" name="cidade" value="<?php echo $aluno->cidade; ?>" class="input input-xlarge" /></td>
                            </tr>
                            
                            <tr>         
                                <td><label>*Estado</label></td>
                                <td>
                                    <select name="estado" class="select select-medium">
                                        <option></option>
                                        <option>AC - Acre</option>
                                        <option>AL - Alagoas</option>
                                        <option>AP - Amapá</option>
                                        <option>AM - Amazonas</option>
                                        <option>BA - Bahia</option>
                                        <option>CE - Ceará</option>
                                        <option>DF - Distrito Federal</option>
                                        <option>ES - Espírito Santo</option>
                                        <option>GO - Goiás</option>
                                        <option>MA - Maranhão</option>
                                        <option>MT - Mato Grosso</option>
                                        <option>MS - Mato Grosso do Sul</option>
                                        <option>MG - Minas Gerais</option>
                                        <option>PA - Pará</option>
                                        <option>PB - Paraíba</option>
                                        <option>PR - Paraná</option>
                                        <option>PE - Pernambuco</option>
                                        <option>PI - Piauí</option>
                                        <option>RJ - Rio de Janeiro</option>
                                        <option>RN - Rio Grande do Norte</option>
                                        <option>RS - Rio Grande do Sul</option>
                                        <option>RO - Rondônia</option>
                                        <option>RR - Roraima</option>
                                        <option>SC - Santa Catarina</option>
                                        <option>SP - São Paulo</option>
                                        <option>SE - Sergipe</option>
                                        <option>TO - Tocantins</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><label>*Data de nascimento</label></td>
                                <td><input type="text" name="data-nasc" value="<?php echo $aluno->data_nasc; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*RG</label></td>
                                <td><input type="text" name="rg" value="<?php echo $aluno->rg; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*CPF</label></td>
                                <td><input type="text" name="cpf" value="<?php echo $aluno->cpf; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Telefone</label></td>
                                <td><input type="text" name="telefone" value="<?php echo $aluno->telefone; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*E-mail</label></td>
                                <td><input type="text" name="email" value="<?php echo $aluno->email; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Senha do portal</label></td>
                                <td><input type="password" name="senha" value="<?php echo $aluno->senha; ?>" class="input input-medium" /></td>
                            </tr>
                            
                            <tr>
                                <td><label>*Confirme sua senha</label></td>
                                <td><input type="password" name="confirmar-senha" value="<?php echo $aluno->senha; ?>" class="input input-medium" /></td>
                            </tr>        
                        </table>

                        
                        <!-- segunda parte -->
                        <h4>Pesquisa (opcional)</h4>
                        <table>
                            <tr>
                                <td><label>Ano que concluiu/concluirá o Ensino Médio</label></td>
                                <td>
                                    <select name="conclusao-em" class="select select-small">
                                        <option></option>
                                        <option>2014</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                        <option>2017</option>
                                        <option>2018</option>
                                        <option>2019</option>
                                        <option>2020</option>
                                    </select>
                                </td>
                            </tr>
                           
                            <tr>
                                <td><label>Já fez a prova do ENEM? Se sim, em que ano?</label></td>
                                <td>
                                     <select name="ano-prova-enem" class="select select-small">
                                         <option></option>
                                         <option>2008</option>
                                         <option>2009</option>
                                         <option>2010</option>
                                         <option>2011</option>
                                         <option>2012</option>
                                         <option>2013</option>
                                         <option>2014</option>
                                     </select>
                                 </td>
                            </tr>
                            
                            <tr>
                                <td><label>Instituição que estuda/estudou no Ensino Médio:</label></td>
                                <td><input type="text" name="nome-inst" value="<?php echo $aluno->nome_inst; ?>" class="input input-medium" /></td>
                            </tr> 
                           
                            <tr>
                                <td><label>Você já estudou em cursinho? Se sim, Qual?</label></td>
                                <td><input type="text" name="nome-cursinho" value="<?php echo $aluno->nome_cursinho; ?>" class="input input-medium" /></td>
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
    </body>
</html>