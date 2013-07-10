<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_scripts/java_script.js"></script>
</head>

<body>

<div id="site">
	
    <?php require "views/view_topo.php"; ?>
  
    <div id="content">
   
    	<?php if ( Session::getIdAluno() ): ?>
            <h1>Espaço do aluno</h1>
            <ul id="portal">
            	<li><h2>Perfil</h2></li>
                <li><p><a href="#" onclick="novaJanela('alterar-senha.php')">Alterar minha senha</a></p></li>
                <li><p><a href="matricula">Dados cadastrais</a></p></li>
                
                <li><br /><h2>Consultas</h2></li>
                <li><p><a target="_blank" href="doc-pendentes">Documentos pendentes</a></p></li>
                <li><p><a target="_blank" href="horario-aulas">Horário de aulas</a></p></li>
                <!--<li><p><a target="_blank" href="horario-provas">Horário de provas</a></p></li>
                <li><p><a target="_blank" href="notas-e-faltas">Notas e faltas</a></p></li>
                <li><p><a target="_blank" href="planos-de-ensino">Planos de ensino</a></p></li>-->
            </ul>
            
            <ul id="portal2">
            	<li><p>Bem vindo(a) <?php echo Session::getNomeAluno(); ?>!</p></li>
                <li>
                    <div id="fotoPerfil">
                        <img src="<?php echo $view->aluno->imagem ?>" alt="<?php echo Session::getNomeAluno() ?>"
                             title="<?php echo Session::getNomeAluno() ?>"/>
                        
                    </div>
                </li>
                <li>
                    <form action="portal" method="post" enctype="multipart/form-data">
                        <input type="file" name="foto" value="Procurar" /><br />
                        <input type="submit" value="ENVIAR" />
                    </form>
                </li>
                <li><p>E-mail: <?php echo Session::getEmailAluno(); ?></p></li>
                
                <?php if ( ! Session::getUltimoAcessoAluno() ): ?>            	
                        <li><p>Primeiro acesso: <?php echo date("d/m/Y") ?> às <?php echo date("H:i") ?></p></li>
                        
                <?php else: ?>					
                        <li><p>Último acesso: <?php echo Session::getUltimoAcessoAluno(); ?></p></li>              
                <?php endif; ?>
                    
            </ul>
        
        <?php else: ?>
            <p>Faça login para acessar o portal do aluno.</p>
        <?php endif; ?>
    </div>
    <?php require "views/view_rodape.php"; ?>    
</div>

</body>
</html>