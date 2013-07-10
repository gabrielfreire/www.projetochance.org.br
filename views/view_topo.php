<!------TOPO-------->
    <div id="toposite">
        <div class="centraliza">
            <div id="menusuperior">
                <li><a href="o-projeto-chance">O Projeto Chance</a>&nbsp;|&nbsp;</li>                
                <li><a href="junte-se-a-causa">Junte-se à causa</a>&nbsp;|&nbsp;</li>                
                <li><a href="localizacao">Localização</a>&nbsp;|&nbsp;</li>
                <li><a href="tv-chance">TV Chance</a>&nbsp;|&nbsp;</li>
                <div id="data"> 
                    <?php echo FuncAux::getSaudacao().", hoje é ".FuncAux::getSemana().", ".date("j")." de ".FuncAux::getMes()." de ".date("Y").""; ?>
                </div>                
            </div>     
        </div>
    </div>
    

    <!-- Div 'centraliza' e div fundo branco são fechadas na view_rodape -->
    
    <div class="centraliza">
        <div id="fundo_branco">
            <div id="logo">
                <a href="http://projetochance.org.br">
                    <img src="_imagens/logo.png" />
                </a>            
            </div>

            <div id="banner">
                <img src="_banners/banner_estatico_superior.png" alt="Banner" title="Banner do Projeto Chance" />
            </div>           


            <div id="barracentral">           
                <?php            
                $portal = isset ( $_GET['portal'] ) ? $_GET['portal'] : null; 

                if ( Session::getIdAluno() ):					
                    $portal_href = "portal";			
                else:					
                    $portal_href = "index?portal=1";
                endif;
                ?>

                <div id="menuhorizontal">
                    <a href="contato"><div>Contato</div></a>
                    <a href="<?php echo $portal_href; ?>"><div>Portal do Aluno</div></a>
                    <a href="matricula"><div>Matrícula</div></a>
                    <a href="index"><div>Home</div></a>
                </div>
                
<!--                <div id="n_visitante">
                     Inicio Codigo contador de visitas gratis opromo.com  
                    <script language="Javascript" src="http://www.opromo.com/servicos/contador/contador.php?fdb=36&site=sitehttpprojetochanceorgbr&tipo=verdana&formato=normal&tamanho=3&corfont1=003651&modulo=1" type="text/javascript"></script>
                    visitante(s) online
                     Fim Codigo contador de visitas gratis opromo.com  
                </div>                    -->
                
                <!--<div id="n_visitante">
                    <script language="Javascript" src="http://www.opromo.com/servicos/usuariosonline/useronline.php?site=sitewwwprojetochanceorgbr&corfont1=000000&texto=2&formato=normal&tipo=arial&tamanho=3&simbo=1" type="text/javascript"></script>
                </div>-->

                <?php if ( $portal && ! Session::getIdAluno() ): ?>

                    <form action="portal_action.php" method="post">                
                        <table cellspacing="0" id="tb_portal">
                            <tr>
                                <td align="right"><strong>E-mail:</strong></td>
                                <td><input type="text" name="txt_email" /></td>
                                <td rowspan="2"><input type="image" src="_imagens/seta_portal.png" /></td>
                                <td><a href="#" onclick="novaJanela('como-acessar.php')">Como acessar?</a></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Senha:</strong></td>
                                <td><input type="password" name="txt_senha" /></td>  
                                <td><a href="#" onclick="novaJanela('enviar-senha.php')">Esqueci minha senha</a></td>
                            </tr>
                        </table>                
                    </form>

                <?php else:?>          
                    <?php if ( Session::getIdAluno() ): ?>
                    
                        <table id="tb_portal_logado">
                            <tr>
                                <td>
                                    Nome: <?php echo Session::getNomeAluno(); ?><br/>                       
                                    E-mail: <?php echo Session::getEmailAluno(); ?>&nbsp;-&nbsp;<a href="matricula">(minha conta)</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="logout.php?logout=1">[&nbsp;Sair&nbsp;]</a>
                                </td>
                            </tr>                        
                        </table>                      

                    <?php else: ?>
                        <div id="busca">
                            <form action="busca" method="post">
                                <input type="text" name="txtbusca" value="Buscar no Chance" onfocus="limpar(this);" onblur="escrever(this);" />
                                <input type="submit" value="ok" />
                                <!--<input type="image" src="_imagens/btbuscar.jpg" />-->
                            </form>
                        </div>

                    <?php endif; ?>            
                <?php endif; ?>
            </div>


            <div id="esquerdo">

                <?php if ( $portal || Session::getIdAluno()): ?>                
                    <div id="busca2">
                        <form action="busca.php" method="post">
                            <input type="text" name="txtbusca" value="Buscar no Chance" 
                                   onfocus="limpar(this);" onblur="escrever(this);" />
                            <input type="submit" name="btbusca" value="OK" />
                        </form>
                    </div>

                <?php endif; ?>

                <div id="menuvertical">        
                    <!--<div><a href="universidades">Universidades</a></div>-->
                    <!--<div><a href="cursos">Cursos</a></div>-->
                    <div><a href="vestibulares">Vestibulares</a></div>
                    <div><a href="depoimentos">Depoimentos</a></div>
                    <div><a href="carreiras">Carreiras</a></div>
                    <!--<div><a href="ouvidoria">Ouvidoria</a></div>-->
                    <div><a href="parceiros">Parceiros</a></div>                    
                </div> 
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FProjetoChance&amp;width=207&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color=%23999&amp;header=true" scrolling="no" frameborder="0" id="likebox" allowTransparency="true"></iframe>
            </div>

            <div id="direito">
                <a href="fotos"><img src="_imagens/fotos.jpg" /><br /><label>Fotos</label></a><br /><br />
                <a href="tv-chance"><img src="_imagens/videos.jpg" /><br /><label>Vídeos</label></a>
            </div>
<!-------FIM DO TOPO------->
