<?php 
/**
 * 
 */
session_start();


$logout = isset($_GET['logout']) ? $_GET['logout'] : null;

if ( $logout ){	
    $_SESSION['id_aluno']      = null;
    $_SESSION['nome_aluno']    = null;
    $_SESSION['ultimo_acesso'] = null;	

    session_unset();
    session_destroy();

    header("Location:index?logout");
    die();	
}


//iniciamos a sessão 
//session_name("loginUsuario"); 
//session_start(); 

//antes de fazer os cálculos, comprovo que o usuário está logado 
//utilizamos o mesmo script que antes 
//if ($_SESSION["autenticado"] != "SI") { 
//    //se não está logado o envio à página de autenticação 
//    header("Location: index.php"); 
//} else { 
//    //senão, calculamos o tempo transcorrido 
//    $dataSalva = $_SESSION["ultimoAcesso"]; 
//    $agora = date("Y-n-j H:i:s"); 
//    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva)); 
//
//    //comparamos o tempo transcorrido 
//     if($tempo_transcorrido >= 600) { 
//     //se passaram 10 minutos ou mais 
//      session_destroy(); // destruo a sessão 
//      header("Location: index.php"); //envio ao usuário à página de autenticação 
//      //senão, atualizo a data da sessão 
//    }else { 
//    $_SESSION["ultimoAcesso"] = $agora; 
//   } 
//} 
?>