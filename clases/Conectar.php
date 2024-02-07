<?php
class Conectar{
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'mascotas';

    private const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    private PDO $database;

    public function __construct()
    {
        try{
        $this->database = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);

    } catch (Exception $m){
        die('Hay un error al conectar con MySQL');
    }
}

/**
 * metodo que devuelve una conexión PDO lista para poder usar
 * @return PDO
 */
public function getConectar(): PDO{
    return $this->database;
}
}
 ?>