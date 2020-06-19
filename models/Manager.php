<?php
namespace  Ayman\Blog\Models;  
class Manager{
    protected function dbConnect(){
        try
        {
            //$dataBase = new \PDO('mysql:host=localhost;dbname=autolimo_blog;charset=utf8', 'autolimo_blog', '@Ayman010162');
            $dataBase = new \PDO('mysql:host=localhost:3308;dbname=blog;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        return $dataBase;
    }
}