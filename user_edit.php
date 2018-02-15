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
        $id = $_GET['id'];
        $userdata = preuserdata($conn, $id);
    
        //print_r($userdata);
        //echo "<br>";
        //echo $userdata['titlename_id'];
        
        echo "<script src='./validate_edituser.js'></script>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $t_name = $_POST['titlename'];
            $f_name = $_POST['username'];
            $l_name = $_POST['surname'];
            $per = $_POST['permis'];

            
            echo "<br>";
            echo "id: {$id}";
            echo $_POST['titlename'];
            echo $_POST['username'];
            echo $_POST['surname'];
            echo $_POST['permis'];

            $ec = editUser($conn, $id, $t_name, $f_name, $l_name, $per);
            
            if ($ec == 1) {
                $_POST = array();
                echo '<script language="javascript">';
                    echo 'alert("UPDATE SUCCESS!!!")';
                echo '</script>';
                header("Refresh:0");
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
            include_once "./layout/admin_nav.php";
        ?>
    <!-- NAV BAR -->

    <!-- BODY -->
        <div class="ui vertical stripe segment">
            <div class="ui container">
                <div align="center">
                    
                    <!-- SHOW PROCESS RESULT STATUS -->
                    <?php
                        // $chk_userid ถูกกำหนดค่าเริ่มต้นเป็น '' ดังนั้น ถ้าจะให้โชว์ค่าอะไรสักอย่างเมื่อ $chk_userid ถูกเป็นค่า 
                        // strlen ต้องไม่เท่ากับ 0
                        // และ ถ้า userid ไม่ซ้ำ $chk_userid จะได้รับ return กลับมาเป็น 1 ดังนั้นถ้าจะ show error ค่าต้องไม่เท่ากับ 1
                       
                    ?>

                    <!-- SHOW PROCESS RESULT STATUS -->
                    
                    
                    <form name="myForm" action="" onsubmit="return validateEditForm()" method="post">
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
                                    <div class="field">

                                        <select class="ui fluid search dropdown" name="titlename" id="titlename">
                                            <option value="">-- คำนำชื่อ --</option>
                                            <?php
                                                // ในการวน loop เพื่อแสดง คำนำชื่อ จะเช็คดูว่า titlename_id เดิมคือเท่าไหร่ 
                                                //แล้วจะ selected option นั้น
                                                foreach ($select_titlename as $titlename) {
                                                    if($titlename['titlename_id'] == $userdata['titlename_id'] ){
                                                        echo "<option value='{$titlename['titlename_id']}' selected>
                                                                {$titlename['titlename_title']}
                                                              </option>";
                                                    } else {
                                                        echo "<option value='{$titlename['titlename_id']}'>
                                                                {$titlename['titlename_title']}
                                                              </option>";
                                                    }
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
                                        <input type="text" name="username" id="username" 
                                               Required placeholder="กรอกชื่อ..."
                                               value="<?php echo $userdata['user_name']; ?>"
                                        ">
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">นามสกุล</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="text" name="surname" id="surname" 
                                               Required placeholder="กรอกนามสกุล..." 
                                               value="<?php echo $userdata['user_surname']; ?>"
                                        ">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">ระดับสิทธิ์</td>
                                <td colspan="2" class="center aligned collapsing">
                                
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="permis" id="permis">
                                            <option value="">--เลือกระดับสิทธิ์ของผู้ใช้--</option>
                                            <?php
                                                foreach($permis as $permi ) {
                                                    if($permi['permission_id'] == $userdata['permission_id']) {
                                                        echo "<option value='{$permi['permission_id']}'selected>
                                                                {$permi['permission_title']} 
                                                              </option>";  
                                                    } else {
                                                        echo "<option value='{$permi['permission_id']}' >
                                                                {$permi['permission_title']} 
                                                              </option>";  
                                                    }
                                                }     
                                            ?>
                                        </select>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" class="center aligned collapsing">
                                    <input class="ui button green" type="submit" name="submit" id="submit" value="อัพเดท">
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