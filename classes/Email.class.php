<?php

/*
 * Envio de e-mail
 */
class Email {
    
    static function send($to, $message, $subject) { 
     
        $headers  = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
        $headers .= "To: <{$to}>" . "\r\n";
        $headers .= "From: Projeto Chance <contato@projetochance.org.br>" . "\r\n";

        return ( mail($to, $subject, $message, $headers) ); # bool       
    }
}
