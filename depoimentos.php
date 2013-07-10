<?php 
/**
 * 
 */
session_start();

require "_classes/DB.class.php";
require "_classes/ReceberDados.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

FuncAux::checaF5();

/**
* View
*/
$view = new View();


/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

/**
 * Tratando os dados...
 */
$view->nome     = $recDados->getVariavel('txt_nome', true);
$view->email    = $recDados->getVariavel('txt_email', true);
$view->mensagem = $recDados->getVariavel('txt_msg');

//var_dump((bool)$recebe_form);die();
if ( $recebe_form ){
    
    /**
     *  Valida todos os campos!!!
     */
    if ($view->nome     == "Nome ou empresa" || 
        $view->email    == "E-mail (não será divulgado)" || 
        $view->mensagem == "" ){
        
        $view->msg_erro = "Preencha todos os campos!!";
    }
    else {

       /**
        * Se estiver ok, insere os dados...
        */
        $mysqli = DB::conectar();
        
        $data = FuncAux::data_hora_por_extenso(); 
        
        # Insere dados de identificação do aluno
        $sql  = "INSERT INTO depoimentos ";
        $sql .= "(nome, email, mensagem, data) ";
        $sql .= "VALUES ";
        $sql .= "('$view->nome', '$view->email', '$view->mensagem', '$data')";        
     
        $mysqli->query($sql);
        
        $view->msg_sucesso = "Postado com sucesso!!";
        
        $view->nome     = "";
        $view->email    = "";
        $view->mensagem = "";
    }
}


/**
* Listando depoimentos...
*/
$mysqli = DB::conectar();

# Insere dados de identificação do aluno
$view->depoimentos = $mysqli->query("SELECT * FROM depoimentos ORDER BY id DESC LIMIT 5");
$mysqli->close(); 


# View
require_once "views/depoimentos.php";
?>