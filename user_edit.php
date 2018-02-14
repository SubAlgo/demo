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
        $id = $_GET['id'];
        echo $id;
        
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
                        if($chk_userid != 1 && strlen($chk_userid) != 0) {
                            echo "<div class='ui red horizontal label'>";
                            echo "<h3>{$chk_userid}</h3>";
                            echo "</div>";
                        }
                        if($insertState == 1 ) {
                            echo "<div class='ui green horizontal label'>";
                            echo "<h3>New record created successfully</h3>";
                            echo "</div>";
                        } 
                    ?>

                    <!-- SHOW PROCESS RESULT STATUS -->
                    
                    
                    <form name="myForm" action="" onsubmit="return validateForm()" method="post">
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
                                        <input type="text" name="userid" id="userid" Required placeholder="ใส่ username...">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">PASSWORD</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="password" name="password" id="password" Required placeholder="password (อย่างน้อย6ตัว)">
                                        
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">PASSWORD (again)</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">

                                        <input type="password" name="password_check" id="password_check" Required placeholder="กรอก password อีกครั้ง...">
                                    
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
                                                    echo "<option value='{$titlename['titlename_id']}'>
                                                            {$titlename['titlename_title']}
                                                          </option>";
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
                                        <input type="text" name="username" id="username" Required placeholder="กรอกชื่อ...">
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td class="collapsing">นามสกุล</td>
                                <td colspan="2" class="center aligned collapsing">
                                    <div class="ui large icon input">
                                        <input type="text" name="surname" id="surname" Required placeholder="กรอกนามสกุล...">
                                        
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