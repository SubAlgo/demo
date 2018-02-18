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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<br>";
            echo "หน่วยเสนอความต้อง : {$_POST['projectName']}";  
            echo "<br>";       
            echo "เลขที่หนังสือ : {$_POST['bookNo']}";
            echo "<br>";
            echo "วันที่ลงหนังสือ : {$_POST['projectAt']}";
            echo "<br>";
            echo "ประเภทงาน : {$_POST['projectType']}";
            echo "<br>";
            echo "จำนวนเงินงบประมาณ : {$_POST['projectBudget']}";
            echo "<br>";
            echo "ตรวจงบประมาณ : {$_POST['budgetCheck']}";
            echo "<br>";
            echo "อนุมัติหลักการ : {$_POST['principleApprove']}";
            echo "<br>";
            echo "อนุมัติ ซื้อ - จ้าง : {$_POST['processApprove']}";
            echo "<br>";
            echo "ตรวจร่าง นธน : {$_POST['tntCheck']}";
            echo "<br>";
            echo "ใบสั่งซื้อ ที่ : {$_POST['orderNo']}";
            echo "<br>";
            echo "ลงวันที่ใบสั่งซื้อ - จ้าง : {$_POST['orderAt']}";
            echo "<br>";
            echo "กำหนดส่งมอบ(ใบสั่งซื้อ) : {$_POST['orderDelivery']}";
            echo "<br>";
            echo "สัญญาจ้างที่ : {$_POST['promiseNo']}";
            echo "<br>";
            echo "ลงวันที่ สัญญาจ้าง : {$_POST['promiseAt']}";
            echo "<br>";
            echo "กำหนดส่งมอบ : {$_POST['promiseDelivery']}";
            echo "<br>";
            echo "ผูกพันงบประมาณ : {$_POST['budgetBinding']}";
            echo "<br>";
            echo "ตรวจรับ : {$_POST['checked']}";
            echo "<br>";
            echo "ส่งขอเบิกเงิน : {$_POST['withdraw']}";
            echo "<br>";

            $strD = ($_POST['projectAt']);
            echo strlen($strD);
            if(strlen($strD) >0 ){
                echo "มีค่า";
            }
            $date2 = DateTime::createFromFormat('Y-m-d', $_POST['projectAt']);
                            echo $date2->format('Y-m-d');
                            echo "<br>";
                            $date2->modify('+15 day');
                            echo $date2->format('Y-m-d');
        }
       
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
                    <form class="ui form" method="post">
                        <h2 class="ui dividing header">บันทึกโครงการ</h2>

                        <!-- row1 -->
                        <!-- หน่วยเสนอความต้องการ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>หน่วยเสนอความต้องการ</label>
                                <input type="text" name="projectName" id="projectName" placeholder="หน่วยเสนอความต้องการ...">
                            </div>
                        </div>


                        <hr>
                        <!-- row2 -->
                       <!-- เลขที่หนังสือ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>เลขที่หนังสือ</label>
                                <input type="text" name="bookNo" id="bookNo" placeholder="ที่หนังสือ...">
                            </div>
                            <div class="eight wide field">
                                <label>ลงวันที่ (ปี ค.ศ.)</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="date" name="projectAt" id="projectAt">
                                    </div>
                                                                 
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- row3 -->
                        <!-- ประเภทงาน -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ปรเภทงาน</label>
                                <select class="ui fluid search dropdown" name="projectType">
                                    <option value="1">งานซื้อ</option>
                                    <option value="2">งานจ้าง</option>
                                </select>

                            </div>
                        </div>


                        <hr>
                        <!-- row4 -->
                        <!-- งบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>จำนวนเงินงบประมาณ</label>
                                <input type="text" name="projectBudget" id="projectBudget" placeholder="จำนวนเงิน...(บาท)">
                            </div>
                            <div class="eight wide field">
                                <label>ตรวจสอบงบประมาณเมื่อ (ปี ค.ศ.)</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="date" name="budgetCheck" id="budgetCheck">
                                    </div>
                                                                      
                                </div>
                            </div>
                        </div>

                        <hr>
                        <!-- row5 -->
                        <!-- อนุมัติหลักการ -->
                        <div class="fields">  
                            <div class="eight wide field">
                                <label>อนุมัติหลักการเมื่อ (ปี ค.ศ.)</label>
                                <div class="fields">
                                    <input type="date" name="principleApprove" id="principleApprove">
                                </div>
                            </div>
                            
                        </div>


                        <hr>
                        <!-- row6 -->
                        <!-- อนุมัติ ซื้อ-จ้าง เมื่อ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>อนุมัติ ซื้อ-จ้าง (ปี ค.ศ.)</label>
                                <div class="fields">
                                    <input type="date" name="processApprove" id="processApprove">
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- row7 -->
                        <!-- ตรวจร่าง นธน.ฯ เมื่อ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ตรวจร่าง นธน.ฯ เมื่อ :</label>
                                <div class="fields">
                                    <input type="date" name="tntCheck" id="tntCheck">
                                </div>
                            </div>
                            
                        </div>


                        <hr>
                        <!-- row8 -->
                        <!-- ใบสั่งซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label>ใบสั่งซื้อ - สั่งจ้าง ที่</label>
                                <input type="text" name="orderNo" id="orderNo" placeholder="เลขที่ใบสั่งซือ - สั่งจ้าง">
                            </div>

                            <div class="eight wide field">
                                <label>ลงวันที่ (ปี ค.ศ.)</label>
                                <input type="date" name="orderAt" id="orderAt">                       
                            </div>

                            <div class="four wide field">
                                <label>กำหนดส่งมอง (วัน)</label>
                                <input type="text" name="orderDelivery" id="orderDelivery" placeholder="กำหนดส่งมอบ">
                            </div>
                        </div>


                        <hr>
                        <!-- row9 -->
                        <!-- สัญญาซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label>สัญญาซื้อ - สั่งจ้าง ที่</label>
                                <input type="text" name="promiseNo" id="promiseNo" placeholder="เลขที่สัญญาซื้อ - สั่งจ้าง">
                            </div>

                            <div class="eight wide field">
                                <label>ลงวันที่ (ปี ค.ศ.)</label>
                                <input type="date" name="promiseAt" id="promiseAt">                       
                            </div>

                            <div class="four wide field">
                                <label>กำหนดส่งมอง (วัน)</label>
                                <input type="text" name="promiseDelivery" id="promiseDelivery" placeholder="กำหนดส่งมอบ">
                            </div>
                        </div>


                        <hr>
                        <!-- row10 -->
                        <!-- ผูกพันงบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ผูกพันงบประมาณเมื่อ (ปี ค.ศ.)</label>
                                <input type="date" name="budgetBinding" id="budgetBinding">                       
                            </div>
                        </div>


                        <hr>
                        <!-- row11 -->
                        <!-- ตรวจรับ เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ตรวจรับเมื่อ (ปี ค.ศ.)</label>
                                <input type="date" name="checked" id="checked"> 
                            </div>
                        </div>

                        <hr>
                        <!-- row12 -->
                        <!-- ส่งขอเบิกเงิน เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ส่งขอเบิกเงินเมื่อ (ปี ค.ศ.)</label>
                                 <input type="date" name="withdraw" id="withdraw"> 
                            </div>
                        </div>


                        <hr>
                        
                        <div class="field" align="center">
                            <input type="submit" class="ui button positive" value="บันทึก" name="" id="">
                            <input type="button" class="ui button negative" value="ยกเลิก" name="" id="">
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