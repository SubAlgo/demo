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

    <!-- SETTING DATA -->
    <?php
    
        /*----- SETTING DATA -----*/
        $selectUser = selectUser($conn, 1);
        //$all_superuser = selectUser($conn, 3);
        //$all_user = selectUser($conn, 2);
        
        $user_type = "admin";

        if(isset($_GET['u'])) {
            $user_type = $_GET['u'];
        }


        if($user_type == "admin") {
            $selectUser = selectUser($conn, 1);
        } else if($user_type == "superuser") {
            $selectUser = selectUser($conn, 3);
        } else if($user_type == "user") {
            $selectUser = selectUser($conn, 2);
        }

        //echo $selectUser;
        //echo json_encode($selectUser);
    ?>

    <title>จัดการผู้ใช้ระบบ</title>
    
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
            show_nav($path)
        ?>
    <!-- NAV BAR -->

    <!-- BODY -->
        <div class="ui vertical stripe segment">
            <div class="ui container">

                <!-- link to user_add.php -->
                <div>
                    <a href="./user_add.php" class="ui labeled icon button green">
                        <i class="right add user icon"></i>
                        เพิ่มผู้ใช้
                    </a>
                </div>
                <br>

                <div>
                    <a href="./usermanage.php?u=admin" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        ADMIN
                    </a>
                    <a href="./usermanage.php?u=superuser" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        SUPER USER
                    </a>
                    <a href="./usermanage.php?u=user" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        USER
                    </a>
                </div>
                <br>


                <div>
                    <table class="ui selectable celled table">
                        <thead>
                            <tr>
                                <th colspan="5">
                                    <div align="center"> <b><?php echo strtoupper($user_type); ?></b> </div>
                                </th>
                            </tr>
                        </thead>
                  
                        <tbody>
                        <tr>
                                <td colspan="2" class="collapsing">
                                    <div align="center"> <b> USER ID </b> </div>
                                </td>
                                <td>
                                    <div align="center"> <b> ชื่อ - นามสกุล </b> </div>
                                </td>
                                <td colspan="2" class="right aligned collapsing" >
                                    <div align="center">  <b>แก้ไข/ลบ </b> </div>
                                </td>
                                
                            </tr>
                            

                            <!-- Loop Show ADMIN USER -->
                            <?php
                                foreach ($selectUser as $user) {
                                    echo "<tr>";
                                        echo "<td colspan='2' class='collapsing'> 
                                                <div align='center'> {$user['user_id']} </div>
                                               </td>";

                                        echo "<td>
                                                <div align=''>
                                                <b>
                                                    {$user['titlename']}
                                                    {$user['user_name']} 
                                                    {$user['user_surname']}
                                                </b>
                                                </div>
                                              </td>";

                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id={$user['user_id']}' class='ui labeled icon button blue'>
                                                        <i class='right edit icon'></i>
                                                        แก้ไข
                                                    </a>
                                                </div>
                                              </td>";
                                        
                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_del.php?id={$user['user_id']}' class='ui labeled icon button red'>
                                                        <i class='right edit icon'></i>
                                                        ลบ
                                                    </a>
                                                </div>
                                              </td>";

                                    echo "</tr>";
                                    
                                }
                            ?>
                        </tbody>
                    </table>
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