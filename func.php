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

    //functiom checkUser()
    function checkUser($conn, $user_id) {

        // trim space
        $user_id = preg_replace('/[[:space:]]+/', '', trim($user_id));

        //Check Duplicate
        $sql = "SELECT user_id FROM users WHERE user_id = '{$user_id}' ";
        $result= $conn->query($sql);      
        if($result->num_rows > 0) {
            return "USERNAME [{$user_id}] มีในระบบแล้ว";
        }
        
        //Check special character        
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user_id)>0) {
            return "ไม่อนุญาตให้ใช้ตัวอักษรพิเศษ";
        }
        
        return true;
        
    }

    function createUser($conn, $uid, $pwd, $t_name, $f_name, $l_name, $per) {
        $sql = "INSERT INTO users (user_id, user_password, titlename_id, user_name, user_surname, permission_id)
                VALUES ('{$uid}', '{$pwd}', '{$t_name}', '{$f_name}', '{$l_name}', '{$per}') ";

        if ($conn->query($sql) === TRUE) {
            //return "New record created successfully";
            return 1;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    function preuserdata($conn, $id){
        $sql = "SELECT
                    users.user_id,
                    users.titlename_id,
                    titlename.titlename_title,
                    users.user_name,
                    users.user_surname,
                    users.permission_id,
                    permission.permission_title
                FROM
                    (
                        (
                            users
                        INNER JOIN titlename ON users.titlename_id = titlename.titlename_id
                        )
                    INNER JOIN permission ON users.permission_id = permission.permission_id
                    )
                WHERE user_id = '{$id}'";
        
        $result= $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x = $row;
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