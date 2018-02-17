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

    <title>หน้าหลัก</title>
    
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
                <div>
                    <form class="ui form">
                        <h2 class="ui dividing header">บันทึกโครงการ</h2>

                        <!-- row1 -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>หน่วยเสนอความต้องการ</label>
                                <input type="text" name="" id="" placeholder="หน่วยเสนอความต้องการ...">
                            </div>
                        </div>

                        <!-- row2 -->
                        <div class="fields">

                            <!-- ที่หนังสือ -->
                            <div class="eight wide field">
                                <label>ที่หนังสือ</label>
                                <input type="text" name="card[number]" maxlength="16" placeholder="ที่หนังสือ...">
                            </div>
                        </div>

                        <!-- row3 -->
                        <label><b>ลงวันที่</b></label>
                        <div class="inline fields">
                            <!-- วันที่ -->
                            <div class="two wide field">
                                <select class="ui fluid search dropdown" name="d">
                                    <option value="">วันที่</option>
                                    <?php
                                        for($i=1; $i<=31; $i++) {
                                            echo "<option value='{$i}'>{$i}</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <!-- เดือน -->
                            <div class="three wide field">
                                <label>เดือน</label>
                                <select class="ui fluid search dropdown" name="month">
                                    <option value="">เดือน</option>
                                    <option value="1">มกราคม</option>
                                    <option value="2">กุมภาพันธ์</option>
                                    <option value="3">มีนาคม</option>
                                    <option value="4">เมษายน</option>
                                    <option value="5">พฤษภาคม</option>
                                    <option value="6">มิถุนาคม</option>
                                    <option value="7">กรกฎาคม</option>
                                    <option value="8">สิงหาคม</option>
                                    <option value="9">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>      
                            </div>

                            <!-- ปี -->
                            <div class="three wide field">
                                <label>ปี</label>
                                <div class="field">
                                    <input type="text" name="card[expire-year]" maxlength="4" placeholder="ปี (พ.ศ.)">
                                </div>    
                            </div>

                        </div>
                            

                            
                            
                            
                            
                            

                            
                            

                        <?php
                            $tomorrow  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
                            //echo "Today is " . date("Y/m/d") . "<br>";
                            $date1 = DateTime::createFromFormat('d-m-Y', '04-1-2533');
                            echo $date1->format('d-m-Y');
                            echo "<br>";
                            $date1->modify('+15 day');
                            echo $date1->format('d-m-Y');
                        ?>
                     
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