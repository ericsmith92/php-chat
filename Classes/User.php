<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-03
 * Time: 4:47 PM
 */
class User{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //create a new user
    public function createUser($name, $email, $password){

        $query = "INSERT INTO users 
                  (name, email, password)
                  VALUES(:name, :email, :password)";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->bindValue(':email', $email, PDO::PARAM_STR);
        $pdostmt->bindValue(':password', $password, PDO::PARAM_STR);
        $row = $pdostmt->execute();
        $pdostmt->closeCursor();

    }

    //get all users
    public function getAllUsers() {

        $query = "SELECT * FROM users";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->execute();
        $users = $pdostmt->fetchAll();
        $pdostmt->closeCursor();

        return $users;
    }

    //get users Id

    public function getUserId($name){

        $query = "SELECT id FROM users
                  WHERE name = :name";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':name', $name, PDO::PARAM_STR);
        $pdostmt->execute();
        $id = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $id;
    }

    //get password from username

    public function getPass($value){

        $query = "SELECT password FROM users
                  WHERE name = :value";
        $pdostmt = $this->db->prepare($query);
        $pdostmt->bindValue(':value', $value,PDO::PARAM_STR);
        $pdostmt->execute();
        $password = $pdostmt->fetch();
        $pdostmt->closeCursor();

        return $password;

    }



    //check if user signed in

    public function isSignedIn(){

        $signedIn = isset($_SESSION['username']);

        return $signedIn;

    }

}