<?php
  
    // function redir()
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
    }

    // function countAlluser()
    function countAlluser($conn) {
        $x;
        $sql_countAlluser = "SELECT COUNT(user_id) as c FROM users";
        $result_countAlluser = $conn->query($sql_countAlluser);

        if ($result_countAlluser->num_rows > 0) {
             while($row = $result_countAlluser->fetch_assoc()) {
                $x = $row['c'];
             }
        }
        return $x;
    }

    // function countUser()
    function countUser($conn, $permission) {
        $x;
        $sql = "SELECT COUNT(user_id) as c FROM users WHERE permission_id = '{$permission}'";
        $result= $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x = $row['c'];
             }
        }
        return $x;
    }
    


?>

<script>
    function relaodfunc() {
        location.reload();
    }
</script>