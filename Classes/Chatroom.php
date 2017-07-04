<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-04
 * Time: 12:23 AM
 */
class Chatroom {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //get all chatrooms
    public function getChatrooms(){

        $query = "SELECT * FROM chatrooms";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll();
        $pdostmt->closeCursor();

        return $rows;
    }

    //add a chatroom

    public function addChatroom($name, $description, $create_date, $path, $users_id){

        $query = "INSERT INTO chatrooms 
                  (name, description, create_date, path, users_id)
                  VALUES (:name, :description, :create_date, :path, :users_id)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->bindValue(':description', $description, PDO::PARAM_STR);
        $pdostmt->bindValue(':create_date', $create_date, PDO::PARAM_STR);
        $pdostmt->bindValue(':path', $path, PDO::PARAM_STR);
        $pdostmt->bindValue(':users_id', $users_id, PDO::PARAM_STR);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();

        return $row;
    }

    //get chatroom by name

    public function getChatroom($name){

        $query = "SELECT path FROM chatrooms
                  WHERE name = :name";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->execute();
        $path = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $path;
    }

    //get chatroom description

    public function getDescription($name){

        $query = "SELECT description FROM chatrooms
                  WHERE name = :name";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->execute();
        $description = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $description;
    }

    //redirect if not signed in
    public function redirect($bool){

        if(!$bool){

            header('Location: index.php');

        }

    }






}