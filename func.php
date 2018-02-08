  <?php

  function redir() {

    if(empty($_SESSION['permission'])) {
        header("Location: http://localhost/demo/index.php");
        die();
    }
      
    if(!empty($_SESSION['permission'])) {
    switch ($_SESSION['permission']) {
        case 1:
            header("Location: http://localhost/demo/admin.php");
            //header("Location: /{$link}/admin.php");
            die();
            break;
        case 2:
            header("Location: http://localhost/demo/superuser.php");
            die();
            break;
        case 3:
            header("Location: http://localhost/demo/user.php");
            die();
            break;
        default:
            header("Location: http://localhost/demo/index.php");
            die();
            break;
    }
}
        
//echo "PT {$link}";

        }
?>

<script>
    function relaodfunc() {
        location.reload();
    }
</script>