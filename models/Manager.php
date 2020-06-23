<?php
class Manager{
    /*
    const HOST = 'localhost';
    const USER= 'autolimo_blog';
    const PASSWORD = '@Ayman010162';
    const DBNAME = 'autolimo_blog';
    */
    
    
    const HOST = 'localhost:3308';
    const USER= 'root';
    const PASSWORD = '';
    const DBNAME = 'blog';
    
    protected static function dbConnect(){
        try
        {
            $dataBase = new \PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::USER, self::PASSWORD);
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        return $dataBase;
    }
}