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
        $name = "Pichai";
        $permission = "Admin";
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

                <div>
                    <table class="ui celled striped table">
                        <thead>
                            <tr>
                                <th colspan="5">
                                    ADMIN
                                </th>
                            </tr>
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
                                <td colspan="2" class="collapsing">
                                    <div align="center"> admin </div>
                                </td>

                                <td>
                                    <div align="center"> นาย สสส ออออ </div>
                                </td>

                                <td class="right aligned collapsing">
                                    <div align="center">
                                        <a href="./user_edit.php?id1" class="ui labeled icon button blue">
                                            <i class="right edit icon"></i>
                                            แก้ไข
                                        </a>
                                    </div>
                                </td>

                                <td class="right aligned collapsing">
                                    <div align="center">
                                        <a href="./user_edit.php?id1" class="ui labeled icon button red">
                                            <i class="right remove user icon"></i>
                                            ลบ
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    
                            <tr>
                                <td colspan="2" class="collapsing">
                                    <div align="center"> admin </div>
                                </td>

                                <td>
                                    <div align="center"> นาย สสส ออออ </div>
                                </td>

                                <td class="right aligned collapsing">
                                    <div align="center">
                                        <a href="./user_edit.php?id1" class="ui labeled icon button blue">
                                            <i class="right edit icon"></i>
                                            แก้ไข
                                        </a>
                                    </div>
                                </td>

                                <td class="right aligned collapsing">
                                    <div align="center">
                                        <a href="./user_edit.php?id1" class="ui labeled icon button red">
                                            <i class="right remove user icon"></i>
                                            ลบ
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="collapsing">
                                    <div align="center"> admin </div>
                                </td>

                                <td>
                                    <div align="center"> นาย สสส ออออ </div>
                                </td>

                                <td class="right aligned collapsing">
                                    <div align="center">
                                        <a href="./user_edit.php?id1" class="ui labeled icon button blue">
                                            <i class="right edit icon"></i>
                                            แก้ไข
                                        </a>
                                    </div>
                                </td>

                                <td class="right aligned collapsing">
                                    <div align="center">
                                        <a href="./user_del.php?id1" class="ui labeled icon button red">
                                            <i class="right remove user icon"></i>
                                            ลบ
                                        </a>
                                    </div>
                                </td>
                            </tr>
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