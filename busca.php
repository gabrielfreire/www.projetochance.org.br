<?php
		
$pesq = isset($_GET["s"]) ? $_GET["s"] : "";		


# Este script
$atual = "busca.php";           

$busca  = glob("*.php", GLOB_BRACE);
$arr = array();


if ( trim($pesq) !== "" ) {
    foreach($busca as $item) {

        if ( $item != $atual ) {
            $abrir = fopen($item, "r");

            while (!feof($abrir)){
                $lendo = strip_tags( fgets($abrir) );

                if ( stristr($lendo, $pesq) ) {
                    $text_prev = stristr($lendo, $pesq, true);
                    $text_next = str_ireplace($pesq, "<b>".$pesq."</b>", stristr($lendo, $pesq));

                    $arq = basename( str_replace(".php", "", $item) );	
                    $nome = strstr($arq, "-") ? ucwords(str_replace("-", " ", $arq)) : ucfirst($arq);
                    
                    $texto = $text_prev . substr($text_next, 0, 175);
                    
                    $arr[] = "<a href=\"{$arq}.html\">
                                 <i>$nome</i>
                                 <p>$texto ...</p>
                              </a>"; 
                }						
                unset($lendo);
            }					
            fclose($abrir);
        }
    }
    $arr = array_unique($arr);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>.:: Projeto Chance ::.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
    </head>
    <body>
        <div id="main">    
            <?php include "./includes/header.php"; ?>

            
            <div id="content">                              
                <?php include "./includes/left.php"; ?>                
                
                <div id="sub-content">
                    
                    
                    <?php if ( count($arr) > 0 ): ?>                    
                        <h1>Resultado da busca por: <?php echo $pesq ?></h1>                        

                        <!-- listar resultados -->
                        <?php foreach($arr as $texto): ?> 
                            <div class="box-search">
                                <?php echo $texto ?>
                            </div>
                        
                        <?php endforeach; ?>
                
                        
                    <?php else: ?>
                        <span>Sua busca não obteve resultados !</span>
       
                    <?php endif; ?>
                        
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
    </body>
</html>