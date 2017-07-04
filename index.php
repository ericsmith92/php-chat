<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-03
 * Time: 5:05 PM
 */

require_once "includes/header.php";

//define array to user later for username
$usernames = array();

//flag variable for form
$formErrors = false;

//check if form has been submitted
if(isset($_POST['submit'])){

    if(!empty($_POST['username'])){

        $username = $_POST['username'];

        //store username in $_SESSION array
        $_SESSION['username'] = $username;

        //grab password up here for comparison later
        $password = $user->getPass($username);

    } else {
        $formErrors = true;
    }

    if(!empty($_POST['pass'])){

        $passEntered = $_POST['pass'];

    }else {
        $formErrors = true;
    }

    //if form is valid, get all users for comparison
    if($formErrors === false) {

        $users = $user->getAllUsers();

        //loop through returned $users, put username values into arrays
        foreach ($users as $user) {

            array_push($usernames, $user['name']);

        }

        //check for matching passwords with password_verify();
        $match = password_verify($passEntered, $password[0]);

        if (in_array($username, $usernames) && $match === true) {

                header('Location: chatrooms.php');

            } else {

                $errSignIn = "<div> Invalid Username or Password </div>";
            }

        }

    }

?>

<div class="form-container">
    
    <h2>Sign-In</h2>
    
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="sign_in">
    <div>
        <label for="username">User Name</label>
    </div>
    <div>
        <input type="text" id="username" name="username" placeholder="Your username..." >
    </div>
    <div>
        <label for="pass">Password</label>
    </div>
    <div>
        <input type="password" id="pass" name="pass" placeholder="Your password..." >
    </div>
    <div>
        <input type="submit" name="submit" value="sign-in">
    </div>
</form>
</div>
<?php
    if(isset($errSignIn)){ echo $errSignIn;}
?>

<div class="form-container">

<h2>Sign-Up</h2>
<form action="signup.php" method="post" id="sign_up">
    <div>
        <label for="su_username">Pick a User Name</label>
    </div>
    <div>
        <input type="text" id="su_username" name="su_username" placeholder="Choose a username..." >
    </div>
    <div>
        <label for="su_email">Enter Your Email</label>
    </div>
    <div>
        <input type="text" id="su_email" name="su_email" placeholder="Your email..." >
    </div>
    <div>
        <label for="su_pass">Password</label>
    </div>
    <div>
        <input type="password" id="su_pass" name="su_pass" placeholder="Choose a password..." >
    </div>
    <div>
        <input type="submit" name="sign_up" value="sign-up">
    </div>
</form>
    
</div>

<?php
    include_once "includes/footer.php";
?>