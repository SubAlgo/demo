
    <?php
        if (!isset($_SESSION['permission'])) {
            header("Location: //{$path}/index.php");
            die();
        } else if ($_SESSION['permission'] != 1 ) {
            redir();
        }
    ?>