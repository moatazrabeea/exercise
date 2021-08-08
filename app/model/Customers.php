<?php


namespace App\model;


use App\SQLiteConnection;

class Customers
{
    public static function getALL($start,$limit){

        if ($start < 0) {
            $start = 0;
        }
        $pdo = (new SQLiteConnection())->connect();
        $statement=$pdo->prepare("SELECT * FROM Customer LIMIT ".(int)$start." ,".(int)$limit);
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
    public static function getTotalPages($limit){
        $total_pages_sql = "SELECT COUNT(*) FROM Customer";
        $pdo = (new SQLiteConnection())->connect();
        $statement=$pdo->prepare($total_pages_sql);
        try
        {
            $statement->execute();
        }
        catch(PDOException $e)
        {
            return false .$e->getMessage();
        }
        $result = $statement->fetch();
        $total_pages = ceil($result[0] / $limit);
        return $total_pages;
    }
}