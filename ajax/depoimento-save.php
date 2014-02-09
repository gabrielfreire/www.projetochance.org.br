<?php
/*
 * Salvar mensagem de depoimento
 */
session_start();
require_once "../classes/Session.class.php";
require_once "../classes/Depoimento.class.php";

$idDepo = isset( $_POST["id"] ) ? $_POST["id"] : null;


# Timezone para data
date_default_timezone_set('America/Sao_Paulo');

$depoimento = new Depoimento();
$depoimento->id       = $idDepo;
$depoimento->id_aluno = Session::getIdAluno();
$depoimento->data     = date("d/m/Y - H:i");
$depoimento->mensagem = $_POST["mensagem"];

if ( $idDepo )
    $depoimento->update();
else
    $depoimento->insert();


# Resgatar objeto
$depoimento = $depoimento->getObject();

?>

<div class="box-depo">                        
    <input type="hidden" name="id" value="<?php echo $depoimento->id_depo ?>" />
                            
    <img src="images/<?php echo $depoimento->foto ?>" alt="" title="<?php echo $depoimento->nome ?>" />

    <div class="depo-nome"><?php echo $depoimento->nome ?></div>
    
    <?php if( $depoimento->id_aluno == Session::getIdAluno() ): ?>
        <div class="depo-icons">
            <a href="#" class="depo-icon-editar" title="Editar"></a>
            <a href="#" class="depo-icon-excluir" title="Excluir"></a>
        </div>
    <?php endif; ?>

    <div class="depo-msg"><?php echo $depoimento->mensagem ?></div> 
    
    <!-- hide() -->
    <textarea class="depo-editar depo-textArea"><?php echo $depoimento->mensagem ?></textarea>
    <input class="depo-editar depo-btn-cancelar" type="button" value="Cancelar" />                                    
    <input class="depo-editar depo-btn-alterar" type="button" value="Alterar" /> 
    <!-- -->
    
    <div class="depo-data"><?php echo $depoimento->data_depo ?></div>
</div>