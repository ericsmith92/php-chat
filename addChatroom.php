<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-11
 * Time: 9:42 PM
 */

require_once "includes/header.php";

if(isset($_POST['submit'])){

    //get user id associated with username
    $id = $user->getUserId($_SESSION['username']);

    //get name and description from form
    $name = $_POST['name'];
    $description = $_POST['description'];

    //get and format current date
    $date = new DateTime();
    $dateFormat = $date->format('Y-m-d H:i:s');

    function trimReplace($string){

        $string = str_replace(' ', '', $string);

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);

    }
    /*
    //trim whitespace off chatroom name to use in path
    $nameTrim = preg_replace('/\s+/', '', $name);
    */

    $nameTrim = trimReplace($name);
    //build path string
    $path = "chats/" . $nameTrim . ".json";

    //generate and save JSON
    //set up messages array in a var

    //use stdClass
    $jsonData = new stdClass();
    $jsonData->name = $name;
    $jsonData->created = $dateFormat;
    $jsonData->creator = $id['id'];
    $jsonData->messages = [];
    $data = json_encode($jsonData);

    //store file name in var, set equal to $nameTrim, concatenate '.json' extension
    $fileName = "chats/" . $nameTrim . ".json";

    if(file_put_contents($fileName, $data)){

        echo  $fileName . " Created!";

    }else {

        echo "Error creating chat";

    }

    //call the addChatroom method and pass the parameters
    $chatroom->addChatroom($name, $description, $dateFormat, $path, $id['id']);

    header('Location: chatrooms.php');

}

require_once "includes/footer.php";

?>