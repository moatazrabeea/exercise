<?php


namespace App\model;


use App\SQLiteConnection;


class Customers
{
    public static function getALL($data=array()){

        $pdo = (new SQLiteConnection())->connect();

        $sql="SELECT * FROM Customer";

        if (!empty($data['filter_name'])) {
            $sql .= " WHERE Customer.name LIKE '" .$data['filter_name'] . "%'";
                 if (!empty($data['filter_phone'])) {
                $sql .= " AND Customer.phone LIKE '" .$data['filter_phone'] . "%'";
                   }
        }
        elseif (!empty($data['filter_phone'])){
            $sql .= " WHERE Customer.phone LIKE '" .$data['filter_phone'] . "%'";
        }


        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }
        }
            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];

        $statement=$pdo->prepare($sql);
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
    public static function getTotalPages(){
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
        return $result[0];
    }

}