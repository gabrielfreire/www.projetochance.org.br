<?php
/*
 * Fazer upload de imagem
 */

require_once "../classes/Imagem.class.php";

$imagem = Imagem::upload( $_FILES['url'] );
//$imagem = "1362393.jpg";
?>

<style type="text/css">
    #portal-img {
        max-height: 110px;
        max-width: 110px; 
        float: left;
    }
</style>
<img src="<?php echo "../images/fotos-aluno/{$imagem}" ?>" alt="" id="portal-img" />