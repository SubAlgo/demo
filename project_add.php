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
       
    ?>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.4/semantic.min.js"></script>
<script src="https://cdn.rawgit.com/mdehoog/Semantic-UI-Calendar/76959c6f7d33a527b49be76789e984a0a407350b/dist/calendar.min.js"></script>
  

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
                        <!-- หน่วยเสนอความต้องการ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>หน่วยเสนอความต้องการ</label>
                                <input type="text" name="" id="" placeholder="หน่วยเสนอความต้องการ...">
                            </div>
                        </div>


                        <hr>
                        <!-- row2 -->
                        <!-- ประเภทงาน -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ปรเภทงาน</label>
                                <select class="ui fluid search dropdown" name="d">
                                    <option value="1">งานซื้อ</option>
                                    <option value="/">งานจ้าง</option>
                                </select>

                            </div>
                        </div>


                        <hr>
                        <!-- row3 -->
                       <!-- เลขที่หนังสือ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>เลขที่หนังสือ</label>
                                <input type="text" name="" id="" placeholder="ที่หนังสือ...">
                            </div>
                            <div class="eight wide field">
                                <label>ลงวันที่ (วัน-เดือน-ปี)</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="date" name="" id="">
                                    </div>
                                    <div class="field">
                                        2
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- row4 -->
                        <!-- งบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>จำนวนเงินงบประมาณ</label>
                                <input type="text" name="" id="" placeholder="จำนวนเงิน...(บาท)">
                            </div>
                            <div class="eight wide field">
                                <label>ตรวจสอบงบประมาณเมื่อ :</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="date" name="" id="">
                                    </div>
                                    <div class="field">
                                        2
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- row5 -->
                        <!-- อนุมัติหลักการ -->
                        <div class="fields">
                            
                            <div class="eight wide field">
                                <label>อนุมัติหลักการ เมื่อ :</label>
                                <div class="fields">
                                    <input type="date" name="" id="">
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- row6 -->
                        <!-- อนุมัติ ซื้อ-จ้าง เมื่อ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>อนุมัติ ซื้อ-จ้าง เมื่อ</label>
                                <div class="fields">
                                    <input type="date" name="" id="">
                                </div>
                            </div>
                            <div class="eight wide field">
                                            
                            </div>
                            
                        </div>


                        <hr>
                        <!-- row7 -->
                        <!-- ตรวจร่าง นธน.ฯ เมื่อ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ตรวจร่าง นธน.ฯ เมื่อ :</label>
                                <div class="three fields">
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="d">
                                            <option value="">วันที่</option>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                    echo "<option value='{$i}'>{$i}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="field">
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
                                    <div class="field">
                                        <input type="text" name="" id="" maxlength="4" placeholder="ปี พ.ศ. [ตัวอย่าง: 2561]">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- row8 -->
                        <!-- ใบสั่งซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label>ใบสั่งซื้อ - สั่งจ้าง ที่</label>
                                <input type="text" name="" id="" placeholder="เลขที่ใบสั่งซือ - สั่งจ้าง">
                            </div>

                            <div class="eight wide field">
                                <label>ลงวันที่</label>
                                <div class="three fields">
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="d">
                                            <option value="">วันที่</option>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                    echo "<option value='{$i}'>{$i}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="field">
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
                                    <div class="field">
                                        <input type="text" name="" id="" maxlength="4" placeholder="ปี พ.ศ. [ตัวอย่าง: 2561]">
                                    </div>
                                </div>
                            </div>

                            <div class="four wide field">
                                <label>กำหนดส่งมอง (วัน)</label>
                                <input type="text" name="" id="" placeholder="กำหนดส่งมอบ">
                            </div>
                        </div>


                        <hr>
                        <!-- row9 -->
                        <!-- สัญญาซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label>สัญญาซื้อ - สั่งจ้าง ที่</label>
                                <input type="text" name="" id="" placeholder="เลขที่สัญญาซื้อ - สั่งจ้าง">
                            </div>

                            <div class="eight wide field">
                                <label>ลงวันที่</label>
                                <div class="three fields">
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="d">
                                            <option value="">วันที่</option>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                    echo "<option value='{$i}'>{$i}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="field">
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
                                    <div class="field">
                                        <input type="text" name="" id="" maxlength="4" placeholder="ปี พ.ศ. [ตัวอย่าง: 2561]">
                                    </div>
                                </div>
                            </div>

                            <div class="four wide field">
                                <label>กำหนดส่งมอง (วัน)</label>
                                <input type="text" name="" id="" placeholder="กำหนดส่งมอบ">
                            </div>
                        </div>


                        <hr>
                        <!-- row10 -->
                        <!-- ผูกพันงบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ผูกพันงบประมาณ เมื่อ :</label>
                                <div class="three fields">
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="d">
                                            <option value="">วันที่</option>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                    echo "<option value='{$i}'>{$i}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="field">
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
                                    <div class="field">
                                        <input type="text" name="" id="" maxlength="4" placeholder="ปี พ.ศ. [ตัวอย่าง: 2561]">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- row11 -->
                        <!-- ตรวจรับ เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ตรวจรับ เมื่อ :</label>
                                <div class="three fields">
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="d">
                                            <option value="">วันที่</option>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                    echo "<option value='{$i}'>{$i}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="field">
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
                                    <div class="field">
                                        <input type="text" name="" id="" maxlength="4" placeholder="ปี พ.ศ. [ตัวอย่าง: 2561]">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- row12 -->
                        <!-- ส่งขอเบิกเงิน เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ส่งขอเบิกเงิน เมื่อ :</label>
                                <div class="three fields">
                                    <div class="field">
                                        <select class="ui fluid search dropdown" name="d">
                                            <option value="">วันที่</option>
                                            <?php
                                                for($i=1; $i<=31; $i++) {
                                                    echo "<option value='{$i}'>{$i}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="field">
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
                                    <div class="field">
                                        <input type="text" name="" id="" maxlength="4" placeholder="ปี พ.ศ. [ตัวอย่าง: 2561]">
                                    </div>
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