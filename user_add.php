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
        $select_titlename = getTitlename($conn);
        $permis = getPermission($conn);
        
        //echo json_encode($permis);
    ?>

    <title>เพิ่มผู้ใช้งานระบบ</title>
    
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

                <div align="center">
                    <form action="">
                        <table class="ui collapsing table">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    <div align="center">  เพิ่มผู้ใช้งานระบบ </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="collapsing">USERNAME</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="text" name="userid" id="userid" placeholder="ใส่ username...">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">PASSWORD</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="password" name="password" id="password"  placeholder="password (อย่างน้อย6ตัว)">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">PASSWORD (again)</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">

                                        <input type="password" name="password_check" id="password_check" placeholder="กรอก password อีกครั้ง...">
                                    
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">คำนำชื่อ</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="field">

                                        <select class="ui fluid search dropdown" name="titlename" id="titlename">
                                            <option value="">-- คำนำชื่อ --</option>
                                            <?php
                                                foreach ($select_titlename as $titlename) {
                                                    echo "<option value='{$titlename['titlename_id']}'>{$titlename['titlename_title']}</option>";
                                                }
                                            ?>
                                        </select>

                                    </div>
                                            
                                            
                                    
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">ชื่อ</td>
                                <td colspan="2" class="center aligned collapsing">

                                    <div class="ui large icon input">
                                        <input type="text" name="username" id="username" placeholder="กรอกชื่อ...">
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">นามสกุล</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="text" name="surname" id="surname" placeholder="กรอกนามสกุล...">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">ระดับสิทธิ์</td>
                                <td colspan="2" class="center aligned collapsing">
                                
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="pemis">
                                            <option value="">--เลือกระดับสิทธิ์ของผู้ใช้--</option>
                                            <?php
                                                foreach($permis as $permi ) {
                                                    echo "<option value='{$permi['permission_id']}'>
                                                            {$permi['permission_title']}
                                                          </option>";  
                                                }     
                                            ?>
                                        </select>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" class="center aligned collapsing">
                                    <input class="ui button green" type="submit" name="submit" id="submit" value="SUBMIT">
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