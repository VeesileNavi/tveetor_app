<?php 


$handler = new Tveet();

if (isset($_POST['submit'])) {	
    if ($_SESSION['current_user']) {

        $text = pg_real_escape_string($this->getConnection(), $_POST['tveet_text']);
    
        $handler->createTveet($text);
    } else {
        // Go to login form
        // header("Location: http://localhost/login.html")
    }
}