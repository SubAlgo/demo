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
        include_once "./check_admin.php";
    ?>

    <!-- SETTING DATA -->
    <?php
        /*----- SETTING DATA -----*/
        //Check ว่า มีค่า id ของ project ที่ต้องการจะแก้ไขหรือไม่
        if(!isset($_GET['pid'])){
            header("Location: //{$path}/projectmanage.php");
            die();
        }


        $pid = $_GET['pid'];
       
        $sql = "SELECT * FROM project WHERE project_id = '{$pid}'";
        
        $x = querySQL($conn, $sql);

        if($x == false) {
            header("Location: //{$path}/projectmanage.php");
            die();
        }
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $projectName        =   $_POST['projectName'];
            $bookNo             =   $_POST['bookNo'];
            $projectAt          =   $_POST['projectAt'];
            $projecttype_id     =   $_POST['projecttype_id'];
            $projectBudget      =   $_POST['projectBudget'];
            $budgetCheck        =   $_POST['budgetCheck'];
            $principleApprove   =   $_POST['principleApprove'];
            $processApprove     =   $_POST['processApprove'];
            $tntCheck           =   $_POST['tntCheck'];
            $orderNo            =   $_POST['orderNo'];
            $orderAt            =   $_POST['orderAt'];
            $orderDelivery      =   $_POST['orderDelivery'];
            $orderDeadline      =   "";
            $promiseNo          =   $_POST['promiseNo'];
            $promiseAt          =   $_POST['promiseAt'];
            $promiseDelivery    =   $_POST['promiseDelivery'];
            $promiseDeadline    =   "";
            $budgetBinding      =   $_POST['budgetBinding'];
            $checked            =   $_POST['checked'];
            $withdraw           =   $_POST['withdraw'];
            $projectStatus      =   $_POST['projectStatus'];

            //echo "{$projectName     }<br>"  ;
            //echo "{$bookNo          }<br>" ;
            //echo "{$projectAt       }<br>" ;
            //echo "{$projecttype_id  }<br>" ;
            //echo "{$projectBudget   }<br>" ;
            //echo "{$budgetCheck     }<br>" ;
            //echo "{$principleApprove}<br>" ;
            //echo "{$processApprove  }<br>" ;
            //echo "{$tntCheck        }<br>" ;
            //echo "{$orderNo         }<br>" ;
            //echo "{$orderAt         }<br>" ;
            //echo "{$orderDelivery   }<br>" ;
            //echo "{$orderDeadline   }<br>" ;
            //echo "{$promiseNo       }<br>" ;
            //echo "{$promiseAt       }<br>" ;
            //echo "{$promiseDelivery }<br>" ;
            //echo "{$promiseDeadline }<br>" ;
            //echo "{$budgetBinding   }<br>" ;
            //echo "{$checked         }<br>" ;
            //echo "{$withdraw        }<br>" ;
            //echo "{$projectStatus   }<br>" ;

            $ap = editProject($conn,        $pid,           $projectName,       $bookNo,            $projectAt,         $projecttype_id, 
                            $projectBudget, $budgetCheck,   $principleApprove,  $processApprove, 
                            $tntCheck,      $orderNo,       $orderAt,           $orderDelivery,     $orderDeadline, 
                            $promiseNo ,    $promiseAt,     $promiseDelivery,   $promiseDeadline, 
                            $budgetBinding, $checked,       $withdraw,          $projectStatus);

            if ($ap == 1 ) {
                unset($_POST);
                $_POST = array();
                echo '<script language="javascript">';
                echo "alert('แก้ไขโครงการเรียบร้อยแล้ว')";
               
                echo '</script>';
                
                
            }   else {
                echo '<script language="javascript">';
                echo "alert('แก้ไขโครงการผิดพลาด !!!')";
               
                echo '</script>';
            }
            //refresh เพื่อ clear method post ให้เป็น get
            header( "refresh: 1; url=//{$path}/project_edit.php?pid={$pid}" );
            
        }

        //print_r($x);
        //$x[0] คือ ค่าที่ได้มาจากการ select โดยเราจะค่า $x[0] ไปเก็บไว้ที่ $x เพื่อให้ง่ายเวลาเรียกใชข้อมูล จะได้ไม่ต้องพิมพ์ $x[0]['project_id']
        $x = $x[0];

        $project_id         = $x['project_id'];
        $projectName        = $x['projectName'];
        $bookNo             = $x['bookNo'];
        $projectAt          = $x['projectAt'];
        $projecttype_id     = $x['projecttype_id'];
        $projectBudget      = $x['projectBudget'];
        $budgetCheck        = $x['budgetCheck'];
        $principleApprov    = $x['principleApprove'];
        $processApprove     = $x['processApprove'];
        $tntCheck           = $x['tntCheck'];
        $orderNo            = $x['orderNo'];
        $orderAt            = $x['orderAt'];
        $orderDelivery      = $x['orderDelivery'];
        $orderDeadline      = $x['orderDeadline'];
        $promiseNo          = $x['promiseNo'];
        $promiseAt          = $x['promiseAt'];
        $promiseDelivery    = $x['promiseDelivery'];
        $promiseDeadline    = $x['promiseDeadline'];
        $budgetBinding      = $x['budgetBinding'];
        $checked            = $x['checked'];
        $withdraw           = $x['withdraw'];
        $projectStatus      = $x['projectStatus'];


        if($orderDelivery == 0) {
            $orderDelivery = "";
        }

        if($promiseDelivery == 0) {
            $promiseDelivery = "";
        }

        
    ?>

    <title>Edit_project</title>
    
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
                        <div align="center"><h2 class="ui dividing header">แก้ไขข้อมูลโครงการ</h2></div>
                        <p></p>

                        <!-- row1 -->
                        <!-- หน่วยเสนอความต้องการ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>หน่วยเสนอความต้องการ</label>
                                <input  type="text" name="projectName" id="projectName" Required 
                                        placeholder="หน่วยเสนอความต้องการ..." 
                                        value="<?php echo $projectName; ?>">
                            </div>
                        </div>


                        <hr>
                        <!-- row2 -->
                       <!-- เลขที่หนังสือ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>เลขที่หนังสือ</label>
                                <input type="text" name="bookNo" id="bookNo" placeholder="ที่หนังสือ..." value="<?php echo $bookNo; ?>">
                            </div>
                            <div class="eight wide field">
                                <label>ลงวันที่ (ปี ค.ศ.)</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input  type="date" name="projectAt" id="projectAt" 
                                                value="<?php echo $projectAt; ?>">
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
                                <select class="ui fluid search dropdown" name="projecttype_id">
                                    <option value="1" <?php if($projecttype_id == 1) {echo "selected";} ?> >งานซื้อ</option>
                                    <option value="2" <?php if($projecttype_id == 2) {echo "selected";} ?> >งานจ้าง</option>
                                </select>

                            </div>
                        </div>


                        <hr>
                        <!-- row4 -->
                        <!-- งบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>จำนวนเงินงบประมาณ</label>
                                <input type="text" name="projectBudget" id="projectBudget" 
                                        value="<?php 
                                                    if($projectBudget != 0) {
                                                    echo $projectBudget;
                                                    } 
                                                ?>" 
                                        placeholder="จำนวนเงิน...(บาท)"
                                >
                            </div>
                            <div class="eight wide field">
                                <label>ตรวจสอบงบประมาณเมื่อ (ปี ค.ศ.)</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="date" name="budgetCheck" id="budgetCheck" value="<?php echo $budgetCheck; ?>">
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
                                    <input  type="date" name="principleApprove" id="principleApprove" 
                                            value="<?php echo $principleApprov; ?>"
                                    >
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
                                    <input  type="date" name="processApprove" id="processApprove" 
                                            value="<?php echo $processApprove; ?>"
                                    >
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
                                    <input type="date" name="tntCheck" id="tntCheck" value="<?php echo $tntCheck; ?>">
                                </div>
                            </div>
                            
                        </div>


                        <hr>
                        <!-- row8 -->
                        <!-- ใบสั่งซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label>ใบสั่งซื้อ - สั่งจ้าง ที่</label>
                                <input  type="text" name="orderNo" id="orderNo" placeholder="เลขที่ใบสั่งซือ - สั่งจ้าง" 
                                        value="<?php echo $orderNo; ?>"
                                >
                            </div>

                            <div class="eight wide field">
                                <label>ลงวันที่ (ปี ค.ศ.)</label>
                                <input  type="date" name="orderAt" id="orderAt" 
                                        value="<?php echo $orderAt; ?>"
                                >                       
                            </div>

                            <div class="four wide field">
                                <label>กำหนดส่งมอง (วัน)</label>
                                <input  type="text" name="orderDelivery" id="orderDelivery" placeholder="กำหนดส่งมอบ" 
                                        value="<?php echo $orderDelivery; ?>"
                                >
                            </div>
                        </div>


                        <hr>
                        <!-- row9 -->
                        <!-- สัญญาซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label>สัญญาซื้อ - สั่งจ้าง ที่</label>
                                <input  type="text" name="promiseNo" id="promiseNo" placeholder="เลขที่สัญญาซื้อ - สั่งจ้าง" 
                                        value="<?php echo $promiseNo; ?>">
                            </div>

                            <div class="eight wide field">
                                <label>ลงวันที่ (ปี ค.ศ.)</label>
                                <input  type="date" name="promiseAt" id="promiseAt"
                                        value="<?php echo $promiseAt; ?>"
                                >                       
                            </div>

                            <div class="four wide field">
                                <label>กำหนดส่งมอง (วัน)</label>
                                <input  type="text" name="promiseDelivery" id="promiseDelivery" placeholder="กำหนดส่งมอบ"
                                        value="<?php echo $promiseDelivery; ?>">
                            </div>
                        </div>


                        <hr>
                        <!-- row10 -->
                        <!-- ผูกพันงบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ผูกพันงบประมาณเมื่อ (ปี ค.ศ.)</label>
                                <input  type="date" name="budgetBinding" id="budgetBinding" 
                                        value="<?php echo $budgetBinding; ?>"
                                >                       
                            </div>
                        </div>


                        <hr>
                        <!-- row11 -->
                        <!-- ตรวจรับ เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ตรวจรับเมื่อ (ปี ค.ศ.)</label>
                                <input type="date" name="checked" id="checked" value="<?php echo $checked; ?>"> 
                            </div>
                        </div>

                        <hr>
                        <!-- row12 -->
                        <!-- ส่งขอเบิกเงิน เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>ส่งขอเบิกเงินเมื่อ (ปี ค.ศ.)</label>
                                 <input type="date" name="withdraw" id="withdraw" value="<?php echo $withdraw; ?>"> 
                            </div>
                        </div>

                        <hr>
                        <!-- row13 -->
                        <!-- สถานะโครงการ : -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label>สถานะโครงการ</label>
                                <select name="projectStatus" id="projectStatus">
                                    <option <?php if($projectStatus == 1) {echo "selected";} ?>  value="1">อยู่ระหว่างดำเนินการ</option>
                                    <option <?php if($projectStatus == 2) {echo "selected";} ?>  value="2">ดำเนินการเสร็จสิ้น</option>
                                </select> 
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
            $conn->close();
            include_once "./layout/foot.php";
        ?>
    <!-- FOOTER -->

    </div>
    <!-- Container -->
  
  
  
    
</body>
</html>