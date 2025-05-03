<?php
class Database{
    protected static $host = "127.0.0.1";
    protected static $username = "nfa008";
    protected static $password = "JxJOA!L!_rVrL9Lf";
    protected static $dbname = "nfa008";

    public static function getConnection(){
        try{
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}