<?php

/*
 * Funções auxiliares
 */

/**
 * Description of FuncAux
 *
 * @author Gabriel
 */
class FuncAux {
    
    /**
     * Verifica se página foi atualizada(f5)
     */
    static function checaF5(){
        if( $_SERVER['REQUEST_METHOD']=='POST' ){  
            $request = md5( implode( $_POST ) );  

            if( isset( $_SESSION['last_request'] ) && $_SESSION['last_request']==$request ){  
                header("Location:index");
                die();  
            }  
            else{  
                $_SESSION['last_request'] = $request;  
            }  
        }  
    }
    
    static function data_hora_por_extenso(){
        
        FuncAux::retDefaultTimeZone();

        $data = date("d/m/Y")." às ".date("H:i")."h";
        
        return $data;
    }
    
    static public function getSaudacao(){
        
        FuncAux::retDefaultTimeZone();

        $hora = date("H");

        switch($hora){
            case $hora >= 04 && $hora < 12:
                $saudacao = "Boa dia";	
                break;
            case $hora >= 12 && $hora <= 18:
                $saudacao = "Boa tarde";	
                break;
            case $hora > 18 && $hora <= 23:
                $saudacao = "Boa noite";	
                break;
            case $hora >= 00 && $hora < 04:
                $saudacao = "Boa noite";	
                break;
        }
        return $saudacao;
    }

    static public function getSemana(){
        
            FuncAux::retDefaultTimeZone();

            $semana["0"] = "domingo";
            $semana["1"] = "segunda-feira";
            $semana["2"] = "terça-feira";
            $semana["3"] = "quarta-feira";
            $semana["4"] = "quinta-feira";
            $semana["5"] = "sexta-feira";
            $semana["6"] = "sábado";

            return $semana[date("w")];
    }

    static public function getMes(){
        
            FuncAux::retDefaultTimeZone();
        
            $mes["01"] = "janeiro";
            $mes["02"] = "fevereiro";
            $mes["03"] = "março";
            $mes["04"] = "abril";
            $mes["05"] = "maio";
            $mes["06"] = "junho";
            $mes["07"] = "julho";
            $mes["08"] = "agosto";
            $mes["09"] = "setembro";
            $mes["10"] = "outubro";
            $mes["11"] = "novembro";
            $mes["12"] = "dezembro";

            return $mes[date("m")];
    }
    
    
    public static function retDefaultTimeZone(){
        setlocale(LC_ALL, 'ptb', 'portuguese-brazil', 'pt-br', 'bra', 'brazil');
        date_default_timezone_set('America/Sao_Paulo');
    }
    
    /**
     * 
     * @param type $imagem
     * @param type $largura
     * @param type $pasta
     * @return string
     */
    static public function Redimensionar($imagem, $largura, $pasta){
        
        try{
		
            //$name = md5(uniqid(rand(),true));
            $name = Session::getIdAluno()."_".rand(100000, 999999)."_".Session::getNomeAluno();
        
            switch ($imagem['type']){
                case "image/jpeg":
                    $img = imagecreatefromjpeg($imagem['tmp_name']);
                    break;
                case "image/gif":
                    $img = imagecreatefromgif($imagem['tmp_name']);
                    break;
                case "image/png":
                    $img = imagecreatefrompng($imagem['tmp_name']);
                    break;
                default :
                    throw new Exception("invalida");
                    break;
            }	
            $x   = imagesx($img);
            $y   = imagesy($img);
            $altura = ($largura * $y)/$x;

            $nova = imagecreatetruecolor($largura, $altura);
            imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);

            switch ($imagem['type']){
                case "image/jpeg":
                    $local="$pasta/$name".".jpg";
                    imagejpeg($nova, $local);
                    break;
                case "image/gif":
                    $local="$pasta/$name".".gif";
                    imagejpeg($nova, $local);
                    break;
                case "image/png":
                    $local="$pasta/$name".".png";
                    imagejpeg($nova, $local);
                    break;
                default :
                    throw new Exception("invalida");
                    break;
            }	
            imagedestroy($img);
            imagedestroy($nova);	
            
            return $local;
        }
        catch (Exception $exc){
            echo "<script>alert('Imagem inválida!')</script>";
        }
    }
}
?>
