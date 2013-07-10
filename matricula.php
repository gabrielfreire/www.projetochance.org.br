<?php 
/**
 * Formulário de matrícula recursivo.
 */
session_start();

require "_classes/DB.class.php";
require "_classes/ReceberDados.class.php";
require "_classes/HTMLcombo.class.php";
require "_classes/GerarNumero.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

//FuncAux::checaF5(); 

/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

/**
* View
*/
$view = new View();


    
if ( Session::getIdAluno() && !$recebe_form ){  
    /**
     * Coloca os dados do aluno logado nos respectivos campos...
     */
    $mysqli = DB::conectar();    

    $sql  = "SELECT * FROM view_aluno WHERE id = ".Session::getIdAluno();

    $aluno = $mysqli->query($sql)->fetch_object();

    $view->nome             = $aluno->nome;
    $view->endereco         = $aluno->endereco;
    $view->numero           = $aluno->numero;
    $view->complemento      = $aluno->complemento;
    $view->cep              = $aluno->cep;
    $view->bairro           = $aluno->bairro;
    $view->cidade           = $aluno->cidade;
    $view->estado           = $aluno->estado;
    $view->data_nascimento  = $aluno->data_nascimento;
    $view->rg               = $aluno->rg;
    $view->cpf              = $aluno->cpf;
    $view->estado_civil     = $aluno->estado_civil;
    $view->telefone         = $aluno->telefone;
    $view->email            = $aluno->email;
    $view->senha            = $aluno->senha;
    $view->confirma_senha   = $aluno->senha;

    $view->ano_conclusao_em = $aluno->ano_conclusao_em;
    $view->nome_inst        = $aluno->nome_inst;
    $view->nome_cursinho    = $aluno->nome_cursinho;
    $view->ano_prova_enem   = $aluno->ano_prova_enem;
}
else{
    /**
    * Tratando os dados...
    */
   $view->nome             = $recDados->getVariavel('txt_nome', true);
   $view->endereco         = $recDados->getVariavel('txt_endereco', true);
   $view->numero           = $recDados->getVariavel('txt_numero', true);
   $view->complemento      = $recDados->getVariavel('txt_complemento', true);
   $view->cep              = $recDados->getVariavel('txt_cep', true);
   $view->bairro           = $recDados->getVariavel('txt_bairro', true);
   $view->cidade           = $recDados->getVariavel('txt_cidade', true);
   $view->estado           = $recDados->getVariavel('txt_estado');
   $view->data_nascimento  = $recDados->getVariavel('txt_data_nasc', true);
   $view->rg               = $recDados->getVariavel('txt_rg', true);
   $view->cpf              = $recDados->getVariavel('txt_cpf', true);
   $view->estado_civil     = $recDados->getVariavel('txt_estado_civil');
   $view->telefone         = $recDados->getVariavel('txt_telefone', true);
   $view->email            = $recDados->getVariavel('txt_email', true);
   $view->senha            = $recDados->getVariavel('txt_senha', true);
   $view->confirma_senha   = $recDados->getVariavel('txt_confirma_senha', true);

   $view->ano_conclusao_em = $recDados->getVariavel('txt_ano_conclusao_em');
   $view->nome_inst        = $recDados->getVariavel('txt_nome_inst', true);
   $view->nome_cursinho    = $recDados->getVariavel('txt_nome_cursinho', true);
   $view->ano_prova_enem   = $recDados->getVariavel('txt_ano_prova_enem');
}








if ( $recebe_form ){ 
    /**
     *  Valida todos os campos!!!
     */
    if ($view->nome            == "" || 
        $view->endereco        == "" || 
        $view->numero          == "" || 
        $view->cep             == "" || 
        $view->bairro          == "" || 
        $view->cidade          == "" || 
        $view->estado          == "" || 
        $view->data_nascimento == "" || 
        $view->rg              == "" || 
        $view->cpf             == "" ||
        $view->estado_civil    == "" ||
        $view->telefone        == "" ||
        $view->email           == "" ||		 
        $view->senha           == "" ||
        $view->confirma_senha  == "" ){

        $view->msg_erro = "Preencha todos os campos obrigatórios!!";	
    }	
    elseif ( strlen($view->nome) < 3 || !strstr($view->nome, " ") ){
        $view->msg_erro = "Digite seu nome completo!!";	
    }
    elseif ( strstr($view->cep, "[a-z]") || strlen($view->cep) < 8 ){
        $view->msg_erro = "CEP inválido!!";	
    }
    elseif ( strstr($view->data_nascimento, "[a-z]") || strlen($view->data_nascimento) < 8 ){
        $view->msg_erro = "Data de nascimento inválida!!";	
    }
    elseif ( strstr($view->rg, "[a-z]") || strlen($view->rg) < 9 ){
        $view->msg_erro = "RG inválido!!";	
    }
    elseif ( strstr($view->cpf, "[a-z]") || strlen($view->cpf) < 11 ){
        $view->msg_erro = "CPF inválido!!";	
    }
    elseif ( strstr($view->telefone, "[a-z]") || strlen($view->telefone) < 8 ){
        $view->msg_erro = "Telefone inválido!!";	
    }
    elseif ( !strstr($view->email, "@") || !strstr($view->email, ".") || strlen($view->email) < 6 ){
        $view->msg_erro = "Digite um e-mail válido!!";	
    }
    elseif ( strlen($view->senha) < 4 ){
        $view->msg_erro = "Senha mínimo de 4 caracteres!!";	
    }
    elseif ( $view->senha != $view->confirma_senha ){
        $view->msg_erro = "As senhas informadas não conferem!!";	
    }
    else{
        
        /**
         * Alterando dados...
         */
        if ( Session::getIdAluno() ){
            
            $mysqli = DB::conectar();    
        
            $sql  = "UPDATE aluno_comple SET nome = '$view->nome', endereco = '$view->endereco', numero='$view->numero', ";
            $sql .= "complemento='$view->complemento', cep = '$view->cep', bairro = '$view->bairro', cidade='$view->cidade', ";
            $sql .= "estado='$view->estado', data_nascimento = '$view->data_nascimento', rg = '$view->rg', cpf = '$view->cpf', ";
            $sql .= "estado_civil = '$view->estado_civil', telefone = '$view->telefone', email='$view->email', senha='$view->senha' ";
            $sql .= "WHERE id_aluno = ".Session::getIdAluno();

            $mysqli->query($sql);

            $sql  = "UPDATE aluno_pesq SET ano_conclusao_em = '$view->ano_conclusao_em', nome_inst = '$view->nome_inst', ";
            $sql .= "nome_cursinho='$view->nome_cursinho', ano_prova_enem='$view->ano_prova_enem' ";
            $sql .= "WHERE id_aluno = ".Session::getIdAluno();

            $mysqli->query($sql);

           /**
            * Mensagem
            */
            $view->titulo = "Seus dados foram atualizados com sucesso!";     
            require_once "views/mensagem.php";
            die();
        }
        /**
         * Senão insere os dados...
         */
        else{
            
            $mysqli = DB::conectar();

            # Inserindo senha, e RA do aluno
            $ra   = GerarNumero::RA();
            $data = FuncAux::data_hora_por_extenso();   

            # Insere dados de identificação do aluno
            $sql  = "INSERT INTO aluno_main ";
            $sql .= "(ra, imagem, ultimo_acesso, data) ";
            $sql .= "VALUES ";
            $sql .= "($ra, '_imagens/sem-foto.png', NULL, '$data')";        
            $mysqli->query($sql);

            # Resgata o id inserido
            $id_aluno = $mysqli->insert_id;

            # Inserindo dados
            $sql  = "INSERT INTO aluno_comple ";		
            $sql .= "(id_aluno, nome, estado_civil, endereco, numero, complemento, cep, bairro, cidade, ";
            $sql .= "estado, data_nascimento, rg, cpf, telefone, email, senha) ";
            $sql .= "VALUES ";				
            $sql .= "($id_aluno, '$view->nome', '$view->estado_civil', '$view->endereco', '$view->numero', '$view->complemento', '$view->cep', '$view->bairro', ";
            $sql .= "'$view->cidade', '$view->estado', '$view->data_nascimento', '$view->rg', '$view->cpf', '$view->telefone', '$view->email', '$view->senha')";
            $mysqli->query($sql);

            # Inserindo pesquisa opcional
            $sql  = "INSERT INTO aluno_pesq ";
            $sql .= "(id_aluno, ano_conclusao_em, nome_inst, nome_cursinho, ano_prova_enem) ";
            $sql .= "VALUES ";
            $sql .= "($id_aluno, '$view->ano_conclusao_em', '$view->nome_inst', '$view->nome_cursinho', '$view->ano_prova_enem')";

            $mysqli->query($sql);	
            $mysqli->close();  
            
            
            /**
             * Enviando confirmaçao
             */
            # E-mail de destino
            $to       = $view->email;

            # Assunto
            $subject  = "Matricula";

            # Mensagem
            $message  = "<p><b>".FuncAux::getSaudacao(). " " .$view->nome.",</b></p>";
            $message .= "<p>Obrigado por se matricular no Projeto Chance!</p>";

            $message .= "<p>Número de matrícula: {$ra}<br />";
            $message .= "Senha do portal: {$view->senha}</p>";
            
            $message .= "<p>Este é um e-mail automático, por favor não responda.</p><br />";

            $message .= "<p>Cordialmente,</p>";

            $message .= "<p>Misael Severino da Silva<br />";
            $message .= "Presidente do Projeto Chance</p>";



            # Cabeçalhos que definem o email como sendo em formato HTML
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            # Headers adicionais
            $headers .= 'To: '.$view->nome.' <'.$view->email.'>' . "\r\n";
            $headers .= 'From: Projeto Chance <cursinho@projetochance.org.br>' . "\r\n";
            $headers .= 'Cc: misah@ig.com.br';

            $view->mail = mail($to, $subject, $message, $headers);
            $view->mail = mail($to, $subject, $message, $headers);
            
            
            /**
             * Mensagem
             */
            $view->titulo = "Matrícula efetuada com sucesso!";
            $view->frase  = "Obrigado por fazer sua matrícula no Projeto Chance, verifique sua caixa de entrada.";        
            require_once "views/mensagem.php";
            die();		
        }
    }
}


# View
require_once "views/matricula.php";
?>
