<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/DB.class.php';
require_once '../_classes/ReceberDados.class.php';
require_once '../_classes/HTMLcombo.class.php';
require_once '../_classes/View.class.php';
require_once '../_classes/FuncAux.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::GET;
$id_aluno = $recDados->getVariavel("id");


$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

# View
$view = new View();


# Conexao
$mysqli = DB::conectar();


if ($id_aluno && !$recebe_form) {
    $sql  = "SELECT * FROM view_aluno WHERE id = {$id_aluno}";
    
    $view->aluno = $mysqli->query($sql)->fetch_object();  
    
    # Verifica se ja foi visto, se nao foi(status 0) edita para visualizado(status 1)
    if ($view->aluno->status == 0) {
        $sql  = "UPDATE aluno_main SET status = 1 WHERE id = ".$id_aluno;
        $mysqli->query($sql);
    }
}

if ($recebe_form) {
    
    $nome             = $recDados->getVariavel('txt_nome', true);
    $endereco         = $recDados->getVariavel('txt_endereco', true);
    $numero           = $recDados->getVariavel('txt_numero', true);
    $complemento      = $recDados->getVariavel('txt_complemento', true);
    $cep              = $recDados->getVariavel('txt_cep', true);
    $bairro           = $recDados->getVariavel('txt_bairro', true);
    $cidade           = $recDados->getVariavel('txt_cidade', true);
    $estado           = $recDados->getVariavel('txt_estado');
    $data_nascimento  = $recDados->getVariavel('txt_data_nasc', true);
    $rg               = $recDados->getVariavel('txt_rg', true);
    $cpf              = $recDados->getVariavel('txt_cpf', true);
    $estado_civil     = $recDados->getVariavel('txt_estado_civil');
    $telefone         = $recDados->getVariavel('txt_telefone', true);
    $email            = $recDados->getVariavel('txt_email', true);
    $senha            = $recDados->getVariavel('txt_senha', true);

    $ano_conclusao_em = $recDados->getVariavel('txt_ano_conclusao_em');
    $nome_inst        = $recDados->getVariavel('txt_nome_inst', true);
    $nome_cursinho    = $recDados->getVariavel('txt_nome_cursinho', true);
    $ano_prova_enem   = $recDados->getVariavel('txt_ano_prova_enem');
    
    
    $sql  = "UPDATE aluno_comple SET nome = '$nome', endereco = '$endereco', numero='$numero', ";
    $sql .= "complemento='$complemento', cep = '$cep', bairro = '$bairro', cidade='$cidade', ";
    $sql .= "estado='$estado', data_nascimento = '$data_nascimento', rg = '$rg', cpf = '$cpf', ";
    $sql .= "estado_civil = '$estado_civil', telefone = '$telefone', email='$email', senha='$senha' ";
    $sql .= "WHERE id_aluno = ".$id_aluno;

    $mysqli->query($sql);

    $sql  = "UPDATE aluno_pesq SET ano_conclusao_em = '$ano_conclusao_em', nome_inst = '$nome_inst', ";
    $sql .= "nome_cursinho='$nome_cursinho', ano_prova_enem='$ano_prova_enem' ";
    $sql .= "WHERE id_aluno = ".$id_aluno;

    $mysqli->query($sql);
    
    header("Location:alunos.php");
}

$mysqli->close();


require_once 'views/aluno_form.php';
?>

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
