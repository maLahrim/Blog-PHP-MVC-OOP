<?php
namespace Model;
//=> Used in PostManager And CommentManager
class Manager
{
    const HOST = 'localhost:3308';
    const USER= 'root';
    const PASSWORD = '';
    const DBNAME = 'blog';

    //connect to Database
    protected static function dbConnect()
    {
        try {
            $dataBase = new \PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::USER, self::PASSWORD);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $dataBase;
    }
    // Get User Credentials
    public static function getUser()
    {
        $response  = self::dbConnect()->query('SELECT user , password FROM users ');
        $user = $response->fetch();
        return $user ;
    }
}
