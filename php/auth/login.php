<?php
include 'db_connector.php'


session_start();

$handler = new AppUser();

if (isset($_POST['login']))
{	
    $email = pg_escape_string($_POST['login_email']);
    $password = pg_escape_string($_POST['login_password']);

    $result = $handler->loginByEmail($email, $password);
            
    if(pg_num_rows($result) == 1) {
        $_SESSION['current_user'] = pg_fetch_array($result)[0];
        // Go to main form
        // header("Location: http://localhost/index.html")
    } else {
        $_SESSION['fake_login_msg'] = "Email or password are incorrect !\nCheck your data or register"
        // 
        // Go to register form
        // header("Location: http://localhost/register.html")
    }
}
