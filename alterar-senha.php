<?php 
/**
 * 
 */
session_start();

require "_classes/DB.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

$pass_atual = isset($_POST['txt_senha_atual']) ? trim($_POST['txt_senha_atual']) : null;
$pass_nova  = isset($_POST['txt_senha_nova']) ? trim($_POST['txt_senha_nova']) : null;

/**
 * View
 */
$view = new View();
$view->pass = null;
$view->erro = null;


if ( $pass_atual && $pass_nova ){    

    $mysqli  = DB::conectar();

    $sql  = "SELECT ";
    $sql .= "a.id, b.id_aluno, b.senha FROM ";
    $sql .= "aluno_main a JOIN aluno_comple b ";

    $sql .= "ON a.id = b.id_aluno ";
    $sql .= "WHERE ";
    $sql .= "b.senha = '".$pass_atual."' && a.id = ".Session::getIdAluno()." ";

    $sql .= "LIMIT 1";

    $aluno = $mysqli->query($sql);
    
    if ( $aluno->num_rows ){
        $sql = "UPDATE aluno_comple SET senha = '$pass_nova' WHERE id_aluno = ".Session::getIdAluno();
        $view->pass = $mysqli->query($sql);
    }
    else{
        $view->erro = "Senha atual não confere!";
    }
}

# View
require_once "views/alterar-senha.php";
?>