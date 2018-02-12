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
    // ช้เพื่อนับจำนวนผู้ใช้ทั้งหมด
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

    // function countUser() [$conn = คำสั่ง connect  DB, $permission = type ของระดับสิทธิ์]
    // ใช้เพื่อนับจำนวนผู้ใช้ตาม type ของ permission
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

    // function selectUser() [$conn = คำสั่ง connect  DB, $permission = type ของระดับสิทธิ์]
    // ใช้เพื่อ get ข้อมูลผู้ใช้ตาม type ของ permission
    function selectUser($conn, $permission) {
        $x = array();
        //$sql = "SELECT * FROM users WHERE permission_id = '{$permission}'";
       $sql = " SELECT
                    titlename.titlename_title AS titlename,
                    users.permission_id,
                    users.user_id,
                    users.user_name,
                    users.user_surname
                FROM
                    (
                        (
                            users
                        INNER JOIN titlename ON users.titlename_id = titlename.titlename_id
                        )
                    )
                WHERE users.permission_id = {$permission}";
        
        $result= $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x[] = $row;
             }
        }
        return $x;
    }

    // function getTitlename()
    function getTitlename($conn) {
        $x = array();

        $sql = "SELECT * FROM titlename ORDER BY 'titlename_id' asc";

        $result= $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x[] = $row;
             }
        }
        return $x;
    }

    //function getPermission($conn)
    function getPermission($conn) {
        $x = array();

        $sql = "SELECT * FROM permission";

        $result= $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x[] = $row;
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