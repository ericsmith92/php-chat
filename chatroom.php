<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-05
 * Time: 6:58 PM
 */

require_once "includes/header.php";

//check if signed in, if not redirect back to sign in

$bool = $user->isSignedIn();

$chatroom->redirect($bool);

if(isset($_POST['submit'])) {

    //put chat name in session array
    $_SESSION['chatroom'] = $_POST['chatroom'];

    //call method to get path based on name
    $result = $chatroom->getChatroom($_POST['chatroom']);
    $path = $result['path'];
    $_SESSION['path'] = $path;

    //call getDescription() method on chatroom, add to Session
    $description = $chatroom->getDescription($_SESSION['chatroom']);
    $_SESSION['desc'] = $description[0];


}

    if(isset($_POST['send'])){

        //grab username to put into array
        $sender = $_SESSION['username'];
        //grab and format current DateTime
        $date = new DateTime();
        $dateFormat = $date->format('Y-m-d H:i:s');
        //grab message body
        $body = $_POST['message'];
        //put all message values into $message array
        $message = array('sender' => $sender, 'date' => $dateFormat, 'body' => $body);

        //load the appropriate JSON file and push array into messages array
        $file = file_get_contents($_SESSION['path']);
        //decode
        $fileDec = json_decode($file);
        //push array
        array_push($fileDec->messages, $message);
        //save
        file_put_contents($_SESSION['path'], json_encode($fileDec));

    }
?>

    <h2 id="chat_name"><?= $_SESSION['chatroom']; ?></h2>

    <div class="banner-info"><?= $_SESSION['desc']; ?></div>

<div id="chat_output" class="scrollbar-outer">

</div>

<div class="form-container">

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <textarea id="message" name="message" placeholder="Message..." required></textarea>
        <input type="submit" name="send" value="send" id="send">
    </form>

</div>

<a id="back_chat" href="chatrooms.php">Back To Chatrooms</a>

<?php include_once "includes/footer.php"; ?>