<?php
session_start();

//Function definations *****************
// validate_or_redirect() ******for enforcing that only logged user can access the page
// check_and_createsession() ***** check validity of userid/password and create new session for given user
// logout_clear_session() ****** when user click on logout button this function clears user session data


function validate_or_redirect()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . 'login.php');
        die();
    }
}

function check_and_createsession()
{
    // if the user is already loged in;
    if(isset($_SESSION['user_id']))
        header('Location: ' . 'dashboard.php');
    
    // if user is not loged in;
    if (isset($_POST['user_id'])) {
        include_once 'lib_dbConnection.php';

        $sql = "SELECT * FROM `causelist_user` where `user_id`='" . $_POST['user_id'] . "'";
        $result = $conn->query($sql);
        $r=$result->fetch_assoc();
        
       

        if ( password_verify($_POST['user_pwd'], $r['password'])) {
            $_SESSION['user_id'] = $_POST['user_id'];
            header('Location: ' . 'dashboard.php');
            die();
        }
    }
}

function logout_clear_session()
{
    unset($_SESSION["user_id"]);
    header('Location: ' . 'login.php');
    die();
}

// if (isset($_SESSION['user_id'])) {
//     header('Location: '.'current_next_controller.php');
//     die();
// }
// elseif(isset($_POST['user_id'])) {
//     include 'lib_dbConnection.php';

//     $sql = "SELECT * FROM `users` where `user_id`='".$_POST['user_id']."' and `user_pwd`='".$_POST['user_pwd']."'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $_SESSION['user_id']=$_POST['user_id'];
//         header('Location: '.'current_next_controller.php');
//         die();
//     }
// }

?>