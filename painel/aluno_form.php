<?php
/*
 *
 */
session_start();
require_once './classes/Session.class.php';
require_once './classes/DBpdo.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}


$id_aluno = isset($_GET["id"]) ? $_GET["id"] : null;


# Conexao
$pdo = DBpdo::connection();


if ($id_aluno) {
    $sql = "SELECT * FROM aluno WHERE id = ?";

    $stmte = $pdo->prepare($sql);
    $stmte->bindParam(1, $id_aluno, PDO::PARAM_INT);
    $stmte->execute();

    $aluno = $stmte->fetch(PDO::FETCH_OBJ);
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

        <div class="data">Registrado em <?php echo $aluno->data ?></div>

        <!-- primeira parte -->
        <h4>Dados pessoais</h4>
        <table class="table-matricula">
            <tr>
                <td><label>*Nome completo</label></td>
                <td><input type="text" name="nome" id="nome" value="<?php echo $aluno->nome; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Estado civil</label></td>
                <td><input type="text" name="estado-civil" id="estado-civil" value="<?php echo $aluno->estado_civil; ?>" /></td>
            </tr>
            <tr>
                <td><label>*CEP</label></td>
                <td><input type="text" name="cep" id="cep" value="<?php echo $aluno->cep; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Endereço</label></td>
                <td><input type="text" name="endereco" id="endereco" value="<?php echo $aluno->endereco; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Nº</label></td>
                <td><input type="text" name="numero" id="numero" value="<?php echo $aluno->numero; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Bairro</label></td>
                <td><input type="text" name="bairro" id="bairro" value="<?php echo $aluno->bairro; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Cidade</label></td>
                <td><input type="text" name="cidade" id="cidade" value="<?php echo $aluno->cidade; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Estado</label></td>
                <td><input type="text" name="estado" id="estado" value="<?php echo $aluno->estado; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Data de nascimento</label></td>
                <td><input type="text" name="data-nasc" id="data-nasc" value="<?php echo $aluno->data_nasc; ?>" /></td>
            </tr>
            <tr>
                <td><label>*RG</label></td>
                <td><input type="text" name="rg" id="rg" value="<?php echo $aluno->rg; ?>" /></td>
            </tr>
            <tr>
                <td><label>*CPF</label></td>
                <td><input type="text" name="cpf" id="cpf" value="<?php echo $aluno->cpf; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Telefone</label></td>
                <td><input type="text" name="telefone" id="telefone" value="<?php echo $aluno->telefone; ?>" /></td>
            </tr>
            <tr>
                <td><label>*E-mail</label></td>
                <td><input type="text" name="email" id="email" value="<?php echo $aluno->email; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Senha do portal</label></td>
                <td><input type="password" name="senha" id="senha" value="<?php echo $aluno->senha; ?>" /></td>
            </tr>
            <tr>
                <td><label>*Confirme sua senha</label></td>
                <td><input type="password" name="confirmar-senha" id="confirmar-senha" value="<?php echo $aluno->senha; ?>" /></td>
            </tr>
        </table>

        <br/><br/>

        <!-- segunda parte -->
        <h4>Pesquisa (opcional)</h4>
        <table class="table-matricula">
            <tr>
                <td><label>Ano que concluiu/concluirá o Ensino Médio</label></td>
                <td><input type="text" name="ano-conclusao-em" id="ano-conclusao-em" value="<?php echo $aluno->ano_conclusao_em; ?>" /></td>
            </tr>
            <tr>
                <td><label>Já fez a prova do ENEM? Se sim, em que ano?</label></td>
                <td><input type="text" name="ano-prova-enem" id="ano-prova-enem" value="<?php echo $aluno->ano_prova_enem; ?>" /></td>
            </tr>
            <tr>
                <td><label>Instituição que estuda/estudou no Ensino Médio:</label></td>
                <td><input type="text" name="nome-inst" value="<?php echo $aluno->nome_inst; ?>" /></td>
            </tr>
            <tr>
                <td><label>Você já estudou em cursinho? Se sim, Qual?</label></td>
                <td><input type="text" name="nome-cursinho" value="<?php echo $aluno->nome_cursinho; ?>" /></td>
            </tr>
        </table>
    </body>
</html>
