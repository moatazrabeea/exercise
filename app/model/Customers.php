<?php


namespace App\model;


use App\SQLiteConnection;

class Customers
{
    public static function getALL(){
        $pdo = (new SQLiteConnection())->connect();
        $statement=$pdo->prepare('SELECT * FROM Customer');
        try
        {
            $statement->execute();
        }
        catch(PDOException $e)
        {
            return false .$e->getMessage();
        }
        $result = $statement->fetchAll();
        return $result;
    }
}