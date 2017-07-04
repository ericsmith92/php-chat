<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-03
 * Time: 8:02 PM
 */

require_once "includes/header.php";

//check if signed in, if not redirect back to sign in

$bool = $user->isSignedIn();

$chatroom->redirect($bool);

//get all chatrooms
$chatrooms = $chatroom->getChatrooms();

//get size of array to use in for loop
$max = sizeof($chatrooms);

echo "<div class='banner-info'>" . "Welcome, " . $_SESSION['username'] . "!" . "</div>";

echo "<div class='form-container'>";

echo "<h2>Chatrooms</h2>";

echo "<form action='chatroom.php' method='post' id='chatroom'>";

    for($i = 0; $i < $max; $i++){

        echo "<input type='radio' name='chatroom'  value='" . $chatrooms[$i]['name'] . "' required>"
            . "<label>" . $chatrooms[$i]['name']  ."</label><br/>";
    }

echo "<input type='submit' value='Enter' name='submit'> 
</form></div>";

?>

<div class="form-container">

    <h2>Create a New Chatroom</h2>

    <form action="addChatroom.php" method="post" id="add_chatroom">
    <div>
        <label for="name">Name</label>
    </div>
        <div>
        <input id="name" type="text" name="name" placeholder="Choose a name..." required>
    </div>
    <div>
        <label for="description">Description</label>
    </div>
        <div>
        <textarea id="description" name="description" placeholder="Description..." required></textarea>
    </div>
        <input type="submit" name="submit" value="Create">
</form>

</div>

<?php
    include_once "includes/footer.php";
?>
