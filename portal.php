<?php
/**
 * Página que o aluno visualiza quando está logado
 */
session_start();

require "_classes/DB.class.php";
require "_classes/ReceberDados.class.php";
require "_classes/HTMLcombo.class.php";
require "_classes/GerarNumero.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

/**
 * View
 */
$view = new View();

if ( Session::getIdAluno() ){
    
    $foto = isset($_FILES['foto']) ? $_FILES['foto'] : null;
    
    if ($foto){
        $path = FuncAux::Redimensionar($foto, 120, "_imagens/foto_alunos");
        
        $mysqli = DB::conectar();  
        
        $sql = "UPDATE aluno_main SET imagem = '$path' WHERE id = ".Session::getIdAluno();
        $mysqli->query($sql);
    }
    
    
    $mysqli = DB::conectar();    

    $sql = "SELECT * FROM aluno_main WHERE id = ".Session::getIdAluno();
    $view->aluno = $mysqli->query($sql)->fetch_object();
    
}

# View
require_once "views/portal.php";
?>
