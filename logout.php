<?php
    include_once('inc.php');
    
    if(!isset($_SESSION['user_id'])) {
        redir();
    } else {
        session_destroy(); 
        //unset($_SESSION['user_id']);
        //unset($_SESSION['permission']);
        setcookie('userid', null, time()-3600);
        redir();

        //header("Location: http://localhost/projeck_army/index.php");
        //exit;
    }
    
    /*
    echo "<br>";
    echo $_SESSION['userid'];
    echo "<br>";

    echo $_SESSION['permission'];
    echo "<br>";
    echo $_SESSION['userid'];
    */
?>