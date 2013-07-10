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
                window.location.href = "alunos_action_del.php?id=<?php echo $view->aluno->id ?>";
        }else{
                return false;  
        }  	
      }  
</script>
</head>
	
    <body>
                
        <form action="aluno_form.php?id=<?php echo $view->aluno->id ?>" method="post" id="form_matricula">

            <!-- /**************************************************/
                // DADOS PESSOAIS //
               /*************************************************/ -->

            <fieldset>
                <legend>Dados pessoais</legend>

                <table border="0">      
                    <tr>
                        <td class="td_texto">* Nome completo</td>
                        <td>
                            <input type="text" size="50" name="txt_nome" value="<?php echo $view->aluno->nome; ?>" maxlength="30"
                            title="Digite seu nome"  />
                        </td>
                        <td class="td_texto">* Estado civil</td>
                        <td>
                            <select name="txt_estado_civil" title="Selecione seu estado civil" >
                                <?php                                                     
                                $combo    = new HTMLcombo();
                                $combo->valor_selecionado = $view->aluno->estado_civil;							

                                echo $combo->getOptions($combo->estadoCivil());                                
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">* Endereço</td>
                        <td>
                            <input type="text" name="txt_endereco" value="<?php echo $view->aluno->endereco; ?>" maxlength="40"
                            title="Digite seu endereço"   />
                        </td>
                        <td class="td_texto">* Nº</td>
                        <td>
                            <input type="text" name="txt_numero"  value="<?php echo $view->aluno->numero; ?>" maxlength="8"
                            title="Digite o número"  />
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">Complemento</td>
                        <td>
                            <input type="text" name="txt_complemento" value="<?php echo $view->aluno->complemento; ?>" maxlength="20"
                            title="Digite o complemento" />
                        </td>

                        <td class="td_texto">* CEP</td>
                        <td>
                            <input type="text" name="txt_cep" value="<?php echo $view->aluno->cep; ?>" maxlength="9"
                            title="Digite seu CEP"  />
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">* Bairro</td>
                        <td>
                            <input type="text" name="txt_bairro" value="<?php echo $view->aluno->bairro; ?>" maxlength="30"
                            title="Digite seu bairro"  />
                        </td>

                        <td class="td_texto">* Cidade</td>
                        <td>
                            <input type="text" name="txt_cidade"  value="<?php echo $view->aluno->cidade; ?>" maxlength="30"
                            title="Digite sua cidade"  />
                        </td>
                    </tr>
                    <tr>         
                        <td class="td_texto">* Estado</td>
                        <td>
                            <select name="txt_estado" title="Selecione a estado" >
                                <?php                                                      
                                $combo    = new HTMLcombo();
                                $combo->valor_selecionado = $view->aluno->estado;							

                                echo $combo->getOptions($combo->estado());                                
                                ?>
                            </select>
                        </td>

                        <td class="td_texto">* Data de nascimento</td>
                        <td>
                            <input type="text" name="txt_data_nasc" value="<?php echo $view->aluno->data_nascimento; ?>" maxlength="15"
                            title="Digite sua data de nascimento"  />
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">* RG</td>
                        <td>
                            <input type="text" name="txt_rg" value="<?php echo $view->aluno->rg; ?>" maxlength="15"
                            title="Digite seu RG"  />
                        </td>

                        <td class="td_texto">* CPF</td>
                        <td>
                            <input type="text" name="txt_cpf" value="<?php echo $view->aluno->cpf; ?>" maxlength="15"
                            title="Digite seu CPF"  />
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">* Telefone</td>
                        <td>
                            <input type="text" name="txt_telefone" value="<?php echo $view->aluno->telefone; ?>" maxlength="15"
                            title="Digite seu telefone"  />
                        </td>
                        <td class="td_texto">* E-mail</td>
                        <td>
                            <input type="text" name="txt_email" value="<?php echo $view->aluno->email; ?>" maxlength="50"
                            title="Digite seu e-mail"  />
                        </td>
                    </tr> 
                    <tr>
                        <td class="td_texto">* Senha do portal</td>
                        <td>
                                <input type="password" name="txt_senha" value="<?php echo $view->aluno->senha; ?>" maxlength="20"
                            title="Escolha uma senha para acessar o portal no site"  />               
                        </td>
                        <td class="td_texto">* Confirme sua senha</td>
                        <td>
                            <input type="password" name="txt_confirma_senha"  value="<?php echo $view->aluno->senha; ?>" maxlength="20"
                            title="Confirme a senha escolhida"  />
                        </td>
                    </tr>        
                </table>
            </fieldset>

            
            <!-- Botoes -->
            <input type="submit" name="bt" value="Salvar" />
            <input type="button" value="Excluir" onClick="return ConfirmDel('<?php echo $view->aluno->nome ?>');" />

            
            <!-- /**************************************************/
                // PESQUISA //
               /*************************************************/ -->

             <fieldset>
                <legend>Pesquisa</legend>

                 <table border="0">
                        <tr>
                        <td class="td_texto">Concluiu/concluirá o Ensino Médio no ano:</td>
                        <td>
                            <select name="txt_ano_conclusao_em" 
                            title="Selecione o ano que concluiu ou concluirá o ensino médio">
                               <?php 

                                $combo    = new HTMLcombo();
                                $combo->valor_selecionado = $view->aluno->ano_conclusao_em;						

                                echo $combo->getOptions($combo->ano());

                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">Instituição que estuda/estudou no Ensino Médio:</td>
                        <td>
                            <input type="text" name="txt_nome_inst" value="<?php echo $view->aluno->nome_inst; ?>" maxlength="30"
                            title="Digite o nome da escola que cursou ou está cursando o ensino médio" />
                        </td>
                    </tr>      
                    <tr>
                        <td class="td_texto">Você já estudou em cursinho? Se sim, Qual?</td>
                        <td>
                            <input type="text" name="txt_nome_cursinho" maxlength="30" value="<?php echo $view->aluno->nome_cursinho; ?>"
                            title="Se já fez cursinho, digite qual" /> 	                 
                        </td>
                    </tr>
                    <tr>
                        <td class="td_texto">Já fez a prova do ENEM? Se sim, em que ano?</td>
                        <td>
                            <select name="txt_ano_prova_enem" 
                            title="Se já fez a prova do ENEM, digite o ano que realizou a prova">
                               <?php 

                                $combo    = new HTMLcombo();
                                $combo->valor_selecionado = $view->aluno->ano_prova_enem;						

                                echo $combo->getOptions($combo->anoEnem());

                                ?>  
                            </select>
                        </td>
                    </tr>
                </table>    
            </fieldset>
        </form>
    </body>
</html>
