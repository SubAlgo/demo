<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once 'inc.php' ?>

    <!-- SETTING DATA -->
    <?php
        /*----- SETTING DATA -----*/
        $all_admin = selectUser($conn, 1);
        $all_superuser = selectUser($conn, 3);;
        $all_user = selectUser($conn, 2);;

        //echo $all_admin;
        echo json_encode($all_admin);
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
            include_once "./layout/admin_nav.php";
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
                    <table class="ui celled striped table">
                        <thead>
                            
                        </thead>
                  
                        <tbody>
                        <tr>
                                <td colspan="2" class="collapsing">
                                    <div align="center"> <b> User id </b> </div>
                                </td>
                                <td>
                                    <div align="center"> <b> ชื่อ - นามสกุล </b> </div>
                                </td>
                                <td colspan="2" class="right aligned collapsing" >
                                    <div align="center">  <b>แก้ไข/ลบ </b> </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div align="center"> <b>ADMIN</b> </div>
                                </td>
                            </tr>

                            <!-- Loop Show ADMIN USER -->
                            <?php
                                foreach ($all_admin as $user) {
                                    echo "<tr>";
                                        echo "<td colspan='2' class='collapsing'> 
                                                <div align='center'> {$user['user_id']} </div>
                                               </td>";

                                        echo "<td>
                                                <div align='center'> {$user['user_name']} {$user['user_surname']} </div>
                                              </td>";

                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id{$user['user_id']}' class='ui labeled icon button blue'>
                                                        <i class='right edit icon'></i>
                                                        แก้ไข
                                                    </a>
                                                </div>
                                              </td>";
                                        
                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id{$user['user_id']}' class='ui labeled icon button red'>
                                                        <i class='right edit icon'></i>
                                                        ลบ
                                                    </a>
                                                </div>
                                              </td>";

                                    echo "</tr>";
                                    
                                }
                            ?>

                            <!-- Loop Show Super user -->
                            <tr>
                                <td colspan="5">
                                    <div align="center"> <b>SUPER USER</b> </div>
                                </td>
                            </tr>
                            <?php
                                foreach ($all_superuser as $user) {
                                    echo "<tr>";
                                        echo "<td colspan='2' class='collapsing'> 
                                                <div align='center'> {$user['user_id']} </div>
                                               </td>";

                                        echo "<td>
                                                <div align='center'> {$user['user_name']} {$user['user_surname']} </div>
                                              </td>";

                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id{$user['user_id']}' class='ui labeled icon button blue'>
                                                        <i class='right edit icon'></i>
                                                        แก้ไข
                                                    </a>
                                                </div>
                                              </td>";
                                        
                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id{$user['user_id']}' class='ui labeled icon button red'>
                                                        <i class='right edit icon'></i>
                                                        ลบ
                                                    </a>
                                                </div>
                                              </td>";

                                    echo "</tr>";
                                    
                                }
                            ?>

                            <!-- Loop Show Super user -->
                            <tr>
                                <td colspan="5">
                                    <div align="center"> <b>USER</b> </div>
                                </td>
                            </tr>
                            <?php
                                foreach ($all_user as $user) {
                                    echo "<tr>";
                                        echo "<td colspan='2' class='collapsing'> 
                                                <div align='center'> {$user['user_id']} </div>
                                               </td>";

                                        echo "<td>
                                                <div align='center'> {$user['user_name']} {$user['user_surname']} </div>
                                              </td>";

                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id{$user['user_id']}' class='ui labeled icon button blue'>
                                                        <i class='right edit icon'></i>
                                                        แก้ไข
                                                    </a>
                                                </div>
                                              </td>";
                                        
                                        echo "<td class='right aligned collapsing'>
                                                <div align='center'>
                                                    <a href='./user_edit.php?id{$user['user_id']}' class='ui labeled icon button red'>
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