<?php

/* 
 * Cabeçalho do site
 */

require "./classes/Data.class.php";
?>

<header>
    <label id="saudacao">
        <?php echo ucfirst( Data::getDiaSemana() ).", ".Data::getDia()." de ".Data::getMes()." de ".Data::getAno() ?>
    </label>
    
    <a href="index.html">
        <img src="./images/logo-original.png" alt="Logotipo" title="Projeto Chance" id="logo" />
    </a>
    
    <nav>
        <ul class="sf-menu" id="nav">
            <li><a href="#">O Projeto Chance</a>
                <ul>
                  <li><a href="palavra-do-presidente.html">Palavra do presidente</a></li>
                  <li><a href="quem-somos.html">Quem somos</a></li>
                  <li><a href="nossa-historia.html">Nossa história</a></li>
                </ul>
            </li>
            <li><a href="proposta-pedagogica.html">Proposta pedagógica</a></li>
            <li><a href="#">Vestibulares</a>
                <ul>
                  <li><a href="historia-do-vestibular.html">História do vestibular</a></li>
                  <li><a href="principais-vestibulares.html">Principais vestibulares</a></li>
                  <li><a href="agenda.html">Agenda</a></li>
                  <li><a href="leituras-obrigatorias.html">Leituras obrigatórias</a></li>
                </ul>
            </li>
            <li><a href="matricula.html">Matrícula</a></li>            
            <li><a href="galeria-de-fotos.html">Galeria de fotos</a></li>
            <li><a href="contato.html">Contato</a></li>
        </ul>
        
        <div id="box-buscar">
            <form action="busca.html" method="get">
                <input type="text" name="s" />
                <input type="submit" value="" title="Buscar no Projeto Chance" />
            </form>
        </div>
    </nav>
    
    
</header>