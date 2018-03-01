<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once 'inc.php' ?>

    <!-- CHECK LOGGED IN [If logged in , Will redirect ot login page] -->
    <?php
        if (!isset($_SESSION['user_id'])) {
            header("Location: //{$path}/index.php");
            die();
        }
    ?>

    <!-- CHECK PERMISSION [ADMIN] ACCESS [If not admin , Will redirect ot page by permission] -->
    <?php
        adminOnly();
    ?>

    <!-- script -->
    

    <!-- SETTING DATA -->
    <?php
        /*----- SETTING DATA -----*/
        //echo $path;
        
        $select_titlename = getTitlename($conn);
        $permis = getPermission($conn);
        $id = $_GET['id'];
        $userdata = preuserdata($conn, $id);
    
        
        echo "<script src='./askfunc.js'></script>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $ec = delUser($conn, $id);
            echo $ec;
            
            if ($ec == 1) {
                $_POST = array();
                echo '<script language="javascript">';
                echo "alert('ID: {$id}";
                echo " ถูกลบเรียบร้อยแล้ว')";
                echo '</script>';
                header( "refresh: 1; url=//{$path}/usermanage.php" );  
            }   
        }
    ?>

    <title>แก้ไขผู้ใช้</title>
    
</head>
<body>
    <!-- Container -->
    <div class="pusher">

    <!-- HEADER -->
        <?php
            include_once "./layout/header.php";
        ?>
    <!-- HEADER -->

    <!-- NAV BAR -->
        <?php
            //include_once "./layout/admin_nav.php";
            show_nav($path);
        ?>
    <!-- NAV BAR -->

    <!-- BODY -->
        <div class="ui vertical stripe segment">
            <div class="ui container">
                <div align="center">
                    
                    <form name="myForm" action=""  method="post">
                        <table class="ui collapsing table">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    <div align="center">  แก้ไขผู้ใช้งานระบบ </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="collapsing">USERNAME</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="text" name="userid" id="userid" value="<?php echo $userdata['user_id'] ?>" disabled>
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">คำนำชื่อ</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="text" name="titlename" id="titlename" value="<?php echo  $userdata['titlename_title']; ?>" disabled>   
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">ชื่อ</td>
                                <td colspan="2" class="center aligned collapsing">

                                    <div class="ui large icon input">
                                        <input type="text" name="username" id="username" 
                                               Required placeholder="กรอกชื่อ..."
                                               value="<?php echo $userdata['user_name']; ?>"
                                               disabled
                                        >
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">นามสกุล</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input 
                                            type="text" name="surname" id="surname" 
                                            value="<?php echo $userdata['user_surname']; ?>" 
                                            disabled
                                        > 
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">ระดับสิทธิ์</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input  
                                            type="text" name="permis" id="permis" 
                                            value="<?php echo $userdata['permission_title']; ?>"
                                            disabled
                                        >   
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" class="center aligned collapsing">
                                    <div>
                                        <input class="ui button negative" onclick="return askFunction()" type="submit" name="submit" id="submit" value="DELETE">
                                    </div>
                                    
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                    </form>
                    
                </div>
            </div>
        </div>
    <!-- BODY -->

    <!-- FOOTER -->
        <?php
            include_once "./layout/foot.php";
        ?>
    <!-- FOOTER -->

    </div>
    <!-- Container -->
  
  
  
    
</body>
</html>