<?php
/**
 * 
 */
session_start();

require "_classes/DB.class.php";
require "_classes/Session.class.php";
require "_classes/FuncAux.class.php";

$email    = trim($_POST['txt_email']);
$password = trim($_POST['txt_senha']);

if ( $email == "" || $password == "" ){
    header("Location:index?portal=1");
    die();		
}

$mysqli  = DB::conectar();

$sql  = "SELECT * FROM view_aluno ";
$sql .= "WHERE ";
$sql .= "email = '".$email."' && senha = '".$password."' ";

$sql .= "LIMIT 1";

$aluno = $mysqli->query($sql);

if ( $aluno->num_rows ){		
    
    $aluno = $aluno->fetch_object();
    
    # Salva dados do aluno nas sessoes
    Session::setIdAluno($aluno->id);
    Session::setNomeAluno($aluno->nome);
    Session::setEmailAluno($aluno->email);
    Session::setUltimoAcessoAluno($aluno->ultimo_acesso);

    
    $data = FuncAux::data_hora_por_extenso();

    $mysqli = DB::conectar();	
    $mysqli->query("UPDATE aluno_main SET ultimo_acesso = '".$data."' WHERE id = ".$aluno->id);

    header("Location:portal");
    die();
} 
else {
    header("Location:index?erroLogin=1&portal=1");
    die();	
}
?>
