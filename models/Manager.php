<?php
namespace  Ayman\Blog\Models;  
class Manager{
    protected function dbConnect(){
        try
        {
                $dataBase = new \PDO('mysql:host=localhost:3308;dbname=blog;charset=utf8', 'root', '');

        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        return $dataBase;
    }
}

