<?php

/**
 * Classe responsável pela conexão com o banco de dados
 */


abstract class DBpdo {

    private static $pdo;

    static function connection() {
        $base = "projeorg_chance";
        $host = "localhost";
        $user = "root";
        $pass = "mysql";

        # if não há conexão...
        if (empty(self::$pdo)) {
            $dsn = "mysql:dbname=$base;host=$host";
            self::$pdo = new PDO($dsn, $user, $pass); # conecta
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # apresentar erros
            self::$pdo->exec("set names utf8"); # Codificar a base de dados para UTF8 por Padrão é ISO
        }

        return self::$pdo;
    }

    static function lastInsertId() {
        return self::$pdo->lastInsertId();
    }
    
    static function close() {
        self::$pdo = null;
    }
}


