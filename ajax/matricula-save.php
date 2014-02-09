<?php
/*
 * Salvar formulário de matrícula
 */
session_start();
require_once "../classes/Session.class.php";
require_once "../classes/Aluno.class.php";

# Timezone para data
date_default_timezone_set('America/Sao_Paulo');

$aluno = new Aluno();
$aluno->id               = Session::getIdAluno();
$aluno->data             = date("d/m/Y - H:i");
$aluno->ultimo_acesso    = "Primeiro acesso";
$aluno->registro_aluno   = Aluno::gerarRA();
$aluno->foto             = "sem-foto.jpg";
$aluno->nome             = $_POST["nome"];
$aluno->estado_civil     = $_POST["estado-civil"];
$aluno->cep              = $_POST["cep"];
$aluno->endereco         = $_POST["endereco"];
$aluno->numero           = $_POST["numero"];
$aluno->bairro           = $_POST["bairro"];
$aluno->cidade           = $_POST["cidade"];
$aluno->estado           = $_POST["estado"];
$aluno->data_nasc        = $_POST["data-nasc"];
$aluno->rg               = $_POST["rg"];
$aluno->cpf              = $_POST["cpf"];
$aluno->telefone         = $_POST["telefone"];
$aluno->email            = $_POST["email"];
$aluno->senha            = $_POST["senha"];
$aluno->ano_conclusao_em = $_POST["ano-conclusao-em"];
$aluno->ano_prova_enem   = $_POST["ano-prova-enem"];
$aluno->nome_inst        = $_POST["nome-inst"];
$aluno->nome_cursinho    = $_POST["nome-cursinho"];

if ( Session::getAlunoLogado() )
    $aluno->update();
else
    $aluno->insert();
?>

<?php if ( Session::getAlunoLogado() ): ?>

    <blockquote class="box-msg">
        <p>Dados atualizados com sucesso!</p>
    </blockquote>
<?php else: ?>

    <blockquote class="box-msg">
        <p>Obrigado por se matricular no Projeto Chance. Aguarde, entraremos em contato!</p>
        <img src="images/logo-original.png" alt="" />
        <p>11 2866-3441<br/>
            <a href="mailto:cursinho@projetochance.org.br">cursinho@projetochance.org.br</a></p>
    </blockquote>    
<?php endif;
