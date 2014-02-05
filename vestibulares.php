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
                    <h1>Vestibulares</h1>
                    
                    
                    <h3>Veja quais são os principais vestibulares:</h3>
                    <div class="box-link">
                        <h4>FUVEST</h4>
                        <img src="images/fuvest.jpg" alt="" />
                        <p>A USP, Universidade de São Paulo é a maior instituição de ensino e pesquisa 
                            do Brasil. Possui cursos de graduação, gratuitos, em todas as áreas do 
                            conhecimento. A USP oferece 246 cursos! O acesso ocorre por meio de provas, 
                            organizado anualmente pela FUVEST, Fundação para o Vestibular.</p>
                    </div>
                    
                    <div class="box-link">
                        <h4>UNICAMP</h4>
                        <img src="images/unicamp.gif" alt="" />
                        <p>A UNICAMP, Universidade de Campinas se destaca por responder por 15% da 
                            pesquisa acadêmica do Brasil e também pelo número de artigos publicados 
                            anualmente. Seu vestibular é organizado pela COMVEST, Comissão Permanente 
                            para os vestibulares.</p>
                    </div>
                    
                    <div class="box-link">
                        <h4>UNESP</h4>
                        <img src="images/unesp.jpg" alt="" />
                        <p>A UNESP, Universidade Estadual Paulista “Júlio de Mesquita Mesquita Filha” 
                            é uma das maiores e importantes universidades do Brasil, com destaque no 
                            ensino, pesquisa e na extensão de serviços à comunidade. O processo 
                            seletivo é realizado pela VUNESP, Fundação para o Vestibular da 
                            Universidade Paulista.</p>
                    </div>
                    
                    <div class="box-link">
                        <h4>UNIFESP</h4>
                        <img src="images/unifesp.jpg" alt="" />
                        <p>Saiba como concorrer aos cursos de graduação da Universidade Federal de 
                            São Paulo:        
                            <br/><br/>
                            <strong>Vestibular UNIFESP – SISU:</strong> O SISU, Sistema de Seleção Unificado, que 
                            utiliza a nota do ENEM, como meio de ingresso para alguns cursos. 
                            <br/><br/>
                            <strong>Vestibular UNIFESP – Misto:</strong> Para alguns cursos a UNIFESP aplica uma 
                            prova complementar. A nota final do candidato ocorre da seguinte forma: 
                            junta-se as notas do ENEM e da UNIFESP, de acordo com os termos do edital.</p>
                    </div>
                    
                </div><!--sub-content-->        
            </div><!--content-->


            <?php include "./includes/footer.php"; ?>            
        </div>
    </body>
</html>