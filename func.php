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
                    header("Location: http://localhost/demo/user.php");
                    die();
                    break;
                case 3:
                    header("Location: http://localhost/demo/superuser.php");
                    die();
                    break;
                default:
                    header("Location: http://localhost/demo/index.php");
                    die();
                    break;
            }
        }
    }

    function show_nav($path) {
        if($_SESSION['permission'] == 1) {
            include_once "./layout/admin_nav.php";
        } else if ($_SESSION['permission'] == 2) {
            include_once "./layout/user_nav.php";
        } else if ($_SESSION['permission'] == 3) {
            include_once "./layout/superuser_nav.php";
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

    function preuserdata($conn, $id) {
        $x="";
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

    function editUser($conn, $id, $t_name, $f_name, $l_name, $per) {
        $sql = "UPDATE  users

                SET     titlename_id  =  '{$t_name}',
                        user_name     =  '{$f_name}',
                        user_surname  =  '{$l_name}',
                        permission_id =  '{$per}'

                WHERE   user_id       =  '$id' 
                ";

        if ($conn->query($sql) === TRUE) {
            //return "New record created successfully";
            return 1;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        
    }

    function delUser($conn, $id) {
        $sql = "DELETE FROM users WHERE user_id = '{$id}'";

        if ($conn->query($sql) === TRUE) {
            //return "New record created successfully";
            return 1;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    
    //function addProject
    function addProject($conn,          $projectName,   $bookNo,            $projectAt,         $projectType, 
                        $projectBudget, $budgetCheck,   $principleApprove,  $processApprove, 
                        $tntCheck,      $orderNo,       $orderAt,           $orderDelivery,     $orderDeadline, 
                        $promiseNo ,    $promiseAt,     $promiseDelivery,   $promiseDeadline, 
                        $budgetBinding, $checked,       $withdraw,          $projectStatus) 
                        {
        if( strlen(trim($projectName)) <= 0 ) {
            return 2;
        }

        // set orderDeadline
        // if $orderAt is not null && $orderDelivery is integer
        // Do ...
        if( strlen($orderAt) > 0 && is_numeric($orderDelivery) ) {
            $ordAt = DateTime::createFromFormat('Y-m-d', $orderAt);
            //echo $promAt->format('Y-m-d');
            //echo "<br>";
            $orderDeliveryPlus = "+{$orderDelivery} day"; //"+5 day"
            $ordAt->modify($orderDeliveryPlus);
            $orderDeadline =  $ordAt->format('Y-m-d');
           // echo $promiseDeadline;
        }
        // set promiseDeadline
        // if $promiseAt is not null && $promiseDelivery is integer
        // Do ...
        if( strlen($promiseAt) > 0 && is_numeric($promiseDelivery) ) {
            $promAt = DateTime::createFromFormat('Y-m-d', $promiseAt);
            //echo $promAt->format('Y-m-d');
            //echo "<br>";
            $promiseDeliveryPlus = "+{$promiseDelivery} day"; //"+5 day"
            $promAt->modify($promiseDeliveryPlus);
            $promiseDeadline =  $promAt->format('Y-m-d');
           // echo $promiseDeadline;
        }
            
        $sql = "INSERT INTO `project` (
                                        `project_id`,
                                        `projectName`,
                                        `bookNo`,
                                        `projectAt`,
                                        `projecttype_id`,
                                        `projectBudget`,
                                        `budgetCheck`,
                                        `principleApprove`,
                                        `processApprove`,
                                        `tntCheck`,
                                        `orderNo`,
                                        `orderAt`,
                                        `orderDelivery`,
                                        `orderDeadline`,
                                        `promiseNo`,
                                        `promiseAt`,
                                        `promiseDelivery`,
                                        `promiseDeadline`,
                                        `budgetBinding`,
                                        `checked`,
                                        `withdraw`,
                                        `projectStatus`
                                      )
                VALUES(
                        NULL,
                        '{$projectName     }',
                        '{$bookNo          }',
                        '{$projectAt       }',
                        '{$projectType     }', 
                        '{$projectBudget   }',
                        '{$budgetCheck     }',
                        '{$principleApprove}',
                        '{$processApprove  }',
                        '{$tntCheck        }',
                        '{$orderNo         }',
                        '{$orderAt         }',
                        '{$orderDelivery   }',
                        '{$orderDeadline   }',
                        '{$promiseNo       }',
                        '{$promiseAt       }',
                        '{$promiseDelivery }',
                        '{$promiseDeadline }',
                        '{$budgetBinding   }',
                        '{$checked         }',
                        '{$withdraw        }',
                        '{$projectStatus   }'
                    )";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function countProject($conn, $sql) {
        //ตัวอย่างหน้าตา $sql ที่รับมา
        //"SELECT COUNT(projectName) as returnVal FROM project WHERE projectStatus = '1'";
        $x ='';
       
        $result= $conn->query($sql);
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x = $row['returnVal'];               
             }
        }
        if ($x == 0 | $x == '') {
            return '-';
        }else {
            return $x;
        }
    }

    //function getPermission($conn)
    function querySQL($conn, $sql) {
        $x = array();

        $result= $conn->query($sql);

        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
                $x[] = $row;
             }
             return $x;
        }
        return false;
    }

    //function editProject
    function editProject($conn,         $pid,           $projectName,       $bookNo,            $projectAt,         $projecttype_id, 
                        $projectBudget, $budgetCheck,   $principleApprove,  $processApprove, 
                        $tntCheck,      $orderNo,       $orderAt,           $orderDelivery,     $orderDeadline, 
                        $promiseNo ,    $promiseAt,     $promiseDelivery,   $promiseDeadline, 
                        $budgetBinding, $checked,       $withdraw,          $projectStatus) 
                        {
        if( strlen(trim($projectName)) <= 0 ) {
            return 2;
        }

        // set orderDeadline
        // if $orderAt is not null && $orderDelivery is integer
        // Do ...
        if( strlen($orderAt) > 0 && is_numeric($orderDelivery) ) {
            $ordAt = DateTime::createFromFormat('Y-m-d', $orderAt);
            //echo $promAt->format('Y-m-d');
            //echo "<br>";
            $orderDeliveryPlus = "+{$orderDelivery} day"; //"+5 day"
            $ordAt->modify($orderDeliveryPlus);
            $orderDeadline =  $ordAt->format('Y-m-d');
        }
        // set promiseDeadline
        // if $promiseAt is not null && $promiseDelivery is integer
        // Do ...
        if( strlen($promiseAt) > 0 && is_numeric($promiseDelivery) ) {
            $promAt = DateTime::createFromFormat('Y-m-d', $promiseAt);
            //echo $promAt->format('Y-m-d');
            //echo "<br>";
            $promiseDeliveryPlus = "+{$promiseDelivery} day"; //"+5 day"
            $promAt->modify($promiseDeliveryPlus);
            $promiseDeadline =  $promAt->format('Y-m-d');
           // echo $promiseDeadline;
        }
            
        $sql = "UPDATE `project`
                SET     `projectName`           = '{$projectName     }'   ,
                        `bookNo`                = '{$bookNo}'   ,
                        `projectAt`             = '{$projectAt       }'   ,
                        `projecttype_id`        = '{$projecttype_id  }'   ,
                        `projectBudget`         = '{$projectBudget   }'   ,
                        `budgetCheck`           = '{$budgetCheck     }'   ,
                        `principleApprove`      = '{$principleApprove}'   ,
                        `processApprove`        = '{$processApprove  }'   ,
                        `tntCheck`              = '{$tntCheck        }'   ,
                        `orderNo`               = '{$orderNo         }'   ,
                        `orderAt`               = '{$orderAt         }'   ,
                        `orderDelivery`         = '{$orderDelivery   }'   ,
                        `orderDeadline`         = '{$orderDeadline   }'   ,
                        `promiseNo`             = '{$promiseNo       }'   ,
                        `promiseAt`             = '{$promiseAt       }'   ,
                        `promiseDelivery`       = '{$promiseDelivery }'   ,
                        `promiseDeadline`       = '{$promiseDeadline }'   ,
                        `budgetBinding`         = '{$budgetBinding   }'   ,
                        `checked`               = '{$checked         }'   ,
                        `withdraw`              = '{$withdraw        }'   ,
                        `projectStatus`         = '{$projectStatus   }'
                WHERE project_id = '{$pid}'
                ";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    function delProject($conn, $pid) {
        $sql = "DELETE FROM project WHERE project_id = '{$pid}'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    //function แปลงรูปแบบการแสดงผลข้อมูล วัน/เดือน/ปี
    function convertDate ($x) {
        if($x == "0000-00-00") {
            return "-";
        }
        $x = explode("-", $x);

        $x[0] = $x[0] + 543;
        $x[1] = intval($x[1]);
        $x[2] = intval($x[2]);
        

        switch ($x[1]) {
            case "1":
                $x[1] = "มกราคม";
                break;
            case "2":
                $x[1] = "กุมภาพันธ์";
                break;
            case "3":
                $x[1] = "มีนาคม";
                break;
            case "4":
                $x[1] = "เมษายน";
                break;
            case "5":
                $x[1] = "พฤษภาคม";
                break;
            case "6":
                $x[1] = "มีถุนาคม";
                break;
            case "7":
                $x[1] = "กรกฎาคม";
                break;
            case "8":
                $x[1] = "สิงหาคม";
                break;
            case "9":
                $x[1] = "กันยายน";
                break;
            case "10":
                $x[1] = "ตุลาคม";
                break;
            case "11":
                $x[1] = "พฤศจิกายน";
                break;
            case "12":
                $x[1] = "ธันวาคม";
                break;
        }

        $result = $x[2] . " " . $x[1] . " พ.ศ. " . $x[0];
        return $result; 
        

    }

    function showemptyData ($x) {
        if(strlen($x) == 0) {
            $x= "-";
        }

        return $x;
    }




    


?>

<script>
    function relaodfunc() {
        location.reload();
    }
</script>