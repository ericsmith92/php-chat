<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-03
 * Time: 5:28 PM
*/

require_once "includes/header.php";

    //check if form as been submitted
    if(isset($_POST['sign_up'])){

        //flag variable
        $formErrors = false;

        if(!empty($_POST['su_username'])){

            $username = $_POST['su_username'];


        }else{
            $formErrors = true;
        }

        if(!empty($_POST['su_email'])){

            $email = $_POST['su_email'];

        }else {
            $formErrors = true;
        }

        if(!empty($_POST['su_pass'])){

            $password = $_POST['su_pass'];
            //hash password to store in db
            $passHash = password_hash($password, PASSWORD_DEFAULT);

        }else{

            $formErrors = true;

        }


        if ($formErrors === false){
            //call createUser method
            $user->createUser($username, $email, $passHash);
            header ('Location: index.php');
        }

    }//end isset sign_up

?>