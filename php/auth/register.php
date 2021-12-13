<?php
include 'db_connector.php'
$handler = new AppUser();

if (isset($_POST['register']))
{
    $db = $handler->getConnection();

    $email = pg_escape_string($db, $_POST['reg_email']);
    $username = pg_escape_string($db, $_POST['reg_username']);
    $password = pg_escape_string($db, $_POST['reg_password']);

    $handler->createAppUser($email, $username, $password);
    
}