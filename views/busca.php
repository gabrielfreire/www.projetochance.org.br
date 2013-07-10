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
    	<?php
		
            $pesq   = isset($_POST['txtbusca']) ? trim($_POST['txtbusca']) : '';		
            
            /**
             * Paginas que nao pertecem as buscas
             */
            # Este script
            $atual  = "views/busca.php";

            # Views fixas
            $topo   = "views/view_topo.php";
            $rodape = "views/view_rodape.php";

            # Views de açoes
            $alt_senha    = "views/alterar-senha.php";
            $lem_senha    = "views/lembrar-senha.php";
            $como_acessar = "views/como-acessar.php";
            $mensagem     = "views/mensagem.php";            
            
            $busca  = glob("views/*.php", GLOB_BRACE);

            foreach($busca as $item){
                if ( ($item != $atual) && ($item != $topo) && ($item != $rodape) &&
                     ($item != $alt_senha) && ($item != $lem_senha) && ($item != $como_acessar) &&
                     ($item != $mensagem) ){
                    
                    $abrir = fopen($item, "r");

                    while (!feof($abrir)){
                        $lendo = fgets($abrir);
                        $lendo = strip_tags($lendo);

                        if ( stristr($lendo, $pesq ) == true ){							
                            if     (strstr($item, "-2")) $dados = "-2.php";								
                            elseif (strstr($item, "-3")) $dados = "-3.php";							
                            else   $dados = ".php";	
                                                        
                            $arq = basename(str_replace($dados, "", $item));		
                                              
                            if (strstr($arq, "-")) 
                                $nome = str_replace("-", " ", $arq);
                            else
                                $nome = $arq;
                                                        
                            $result[] = "<a href='".$arq.$dados."'><i>".$nome."</i>".
                                                    "<p>... ".substr(stristr($lendo, $pesq ), 0, 175)." ...</p></a>";							
                            unset($arq);		
                        }						
                        unset($lendo);
                    }					
                    fclose($abrir);
                }
            }

            if ( isset($result) && count($result) > 0 ){

                    echo "<h2>Resultado da busca por: $pesq</h2>";

                    $result = array_unique($result);
                    echo "<ul id=\"resultado_busca\">";
                    foreach($result as $link){
                            echo "<li>$link</li>";	
                    }
                    echo "</ul>";
            }else{
            ?>
                <span>Sua busca não obteve resultados !</span>
                <!-- <p>Faça uma pesquisa alternativa pelo Google.</p> -->
                
                <!-- SiteSearch Google -->
                <!--<FORM method="get" action="http://www.google.com.br/search">
                <TABLE bgcolor="#FFFFFF"><tr><td>
                <A HREF="http://www.google.com.br/">
                <IMG SRC="http://www.google.com.br/logos/Logo_40wht.gif" 
                border="0" ALT="Google"></A>
                </td>
                <td>
                <INPUT type="hidden" name="sitesearch" value="http://projetochance.org.br/" />
                <INPUT TYPE="text" name="q" size="31" maxlength="255" value="">
                <INPUT type="submit" name="btnG" VALUE="Pesquisar">
                
                </td></tr></TABLE>
                </FORM>-->
                <!-- SiteSearch Google -->
            <?php }	?>
	</div>   
     
	<?php require "views/view_rodape.php"; ?>
</div>

</body>
</html>
