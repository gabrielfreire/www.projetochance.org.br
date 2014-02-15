<?php
/*
 * Fazer upload de imagem
 */

require_once "../classes/Imagem.class.php";
require_once "../classes/Aluno.class.php";


$aluno = new Aluno();
$aluno->id = $_POST["id"];
$aluno = $aluno->getObject();

//$aluno->foto = "1362393.jpg";
$aluno->foto = Imagem::upload( $_FILES['url'] );
$aluno->update();
?>

<style type="text/css">
    #portal-img {
        max-height: 110px;
        max-width: 110px; 
        float: left;
    }
</style>
<img src="<?php echo "../images/fotos-aluno/{$aluno->foto}" ?>" alt="" id="portal-img" />