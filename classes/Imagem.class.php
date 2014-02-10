<?php

/*
 * Classe Imagem
 */

/**
 * 
 *
 * @author gabriel
 */
class Imagem {

    
    static function upload( $arr_file, $pasta = "../images/fotos-aluno", $largura = 460 ) {

        try {
            
            $destino = $arr_file['tmp_name'];
            $nome = $arr_file['name'];
            $tipo = $arr_file['type'];
            $error = $arr_file['error'];

            if ( $error ) {
                throw new Exception( $error );
            }

            switch ($tipo) {
                case "image/jpeg":
                    $imagem = imagecreatefromjpeg($destino);
                    break;
                case "image/gif":
                    $imagem = imagecreatefromgif($destino);
                    break;
                case "image/png":
                    $imagem = imagecreatefrompng($destino);
                    break;
                default:
                    throw new Exception("Imagem inválida");
            }
            $x = imagesx($imagem);
            $y = imagesy($imagem);
            $altura = $largura * $y / $x;

            $nova_imagem = imagecreatetruecolor($largura, $altura);
            imagecopyresampled($nova_imagem, $imagem, 0, 0, 0, 0, $largura, $altura, $x, $y);
            
            $nome = md5(rand(10000, 99999))."_".$nome;
            
            switch ($tipo) {
                case "image/jpeg":
                    imagejpeg($nova_imagem, $pasta."/".$nome);
                    break;
                case "image/gif":
                    imagejpeg($nova_imagem, $pasta."/".$nome);
                    break;
                case "image/png":
                    imagejpeg($nova_imagem, $pasta."/".$nome);
                    break;
                default :
                    throw new Exception("Imagem inválida");
            }
            imagedestroy($imagem);
            imagedestroy($nova_imagem);
            
            return $nome;
            
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}
