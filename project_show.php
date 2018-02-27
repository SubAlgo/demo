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
        $projectAt          = convertDate($x['projectAt']);
        $projecttype_id     = $x['projecttype_id'];
        $projectBudget      = $x['projectBudget'];
        $budgetCheck        = convertDate($x['budgetCheck']);
        $principleApprov    = convertDate($x['principleApprove']);
        $processApprove     = convertDate($x['processApprove']);
        $tntCheck           = convertDate($x['tntCheck']);
        $orderNo            = showemptyData($x['orderNo']);
        $orderAt            = convertDate($x['orderAt']);
        $orderDelivery      = $x['orderDelivery'];
        $orderDeadline      = convertDate($x['orderDeadline']);
        $promiseNo          = showemptyData($x['promiseNo']);
        $promiseAt          = convertDate($x['promiseAt']);
        $promiseDelivery    = $x['promiseDelivery'];
        $promiseDeadline    = convertDate($x['promiseDeadline']);
        $budgetBinding      = convertDate($x['budgetBinding']);
        $checked            = convertDate($x['checked']);
        $withdraw           = convertDate($x['withdraw']);
        $projectStatus      = $x['projectStatus'];

        

        

        //แปลง $projecttype -> text
        if($projecttype_id == 1) {
            $projecttype = "งานซื้อ";
        } else if ($projecttype_id == 2) {
            $projecttype = "งานจ้าง";
        }


        //แปลง $projectStatus -> text
        if($projectStatus == 1 ) {
            $projectStatus = "อยู่ระหว่างดำเนินการ";
        } else if ($projectStatus == 2) {
            $projectStatus = "ดำเนินการเสร็จสิ้น";
        }


        if($orderDelivery == 0) {
            $orderDelivery = "-";
        }

        if($promiseDelivery == 0) {
            $promiseDelivery = "-";
        }

        
    ?>

    <title>show_project</title>
    
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
                        <div align="center"><h2 class="ui dividing header">ข้อมูลโครงการ</h2></div>
                        <p></p>

                        <!-- row1 -->
                        <!-- หน่วยเสนอความต้องการ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>หน่วยเสนอความต้องการ</h3></label>
                                
                                <label><h4><?php echo $projectName; ?></h4></label>
                            </div>
                        </div>


                        <hr>
                        <!-- row2 -->
                       <!-- เลขที่หนังสือ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>เลขที่หนังสือ</h3></label>
                                <label><h4><?php echo $bookNo; ?></h4></label>
                            </div>
                            <div class="eight wide field">
                                <label><h3>ลงวันที่</h3></label>
                                <label><h4><?php echo $projectAt; ?></h4></label>                                  
                            </div>
                        </div>


                        <hr>
                        <!-- row3 -->
                        <!-- ประเภทงาน -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>ประเภทงาน</h3></label>
                                <div>
                                    <label><h4><?php echo $projecttype; ?></h4></label>
                                </div>
                                  

                            </div>
                        </div>


                        <hr>
                        <!-- row4 -->
                        <!-- งบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>จำนวนเงินงบประมาณ</h3></label>
                                <label><h4><?php echo $projectBudget; ?></h4></label>
                            </div>
                            <div class="eight wide field">
                                <label><h3>ตรวจสอบงบประมาณเมื่อ</h4></label>
                                
                                <label ><h4><?php echo $budgetCheck; ?></h4></label>
                                                                 
                                
                            </div>
                        </div>

                        <hr>
                        <!-- row5 -->
                        <!-- อนุมัติหลักการ -->
                        <div class="fields">  
                            <div class="eight wide field">
                                <label><h3>อนุมัติหลักการเมื่อ</h3></label>
                                <label><h4><?php echo $principleApprov; ?></h4></label>
                            </div>
                        </div>


                        <hr>
                        <!-- row6 -->
                        <!-- อนุมัติ ซื้อ-จ้าง เมื่อ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>อนุมัติ ซื้อ-จ้าง </h3></label>
                                
                                <label><h4><?php echo $processApprove; ?></h4></label>
                                
                            </div>
                        </div>


                        <hr>
                        <!-- row7 -->
                        <!-- ตรวจร่าง นธน.ฯ เมื่อ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>ตรวจร่าง นธน.ฯ เมื่อ :</h3></label>
                                
                                <label><h4><?php echo $tntCheck; ?></h4></label>
                                
                            </div>
                            
                        </div>


                        <hr>
                        <!-- row8 -->
                        <!-- ใบสั่งซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label><h3>ใบสั่งซื้อ - สั่งจ้าง ที่</h3></label>
                                <label><h4><?php echo $orderNo; ?></h4></label>
                            </div>

                            <div class="eight wide field">
                                <label><h3>ลงวันที่ </h3></label>
                                <label><h4><?php echo $orderAt; ?></h4></label>
                            </div>

                            <div class="four wide field">
                                <label><h3>กำหนดส่งมอบภายใน</h3></label>
                                <label><h4><?php echo "{$orderDeadline} (ระยะเวลา {$orderDelivery} วัน)"; ?></h4></label>
                            </div>
                        </div>


                        <hr>
                        <!-- row9 -->
                        <!-- สัญญาซื้อ - สั่งจ้าง ที่ -->
                        <div class="fields">
                            <div class="four wide field">
                                <label><h3>สัญญาซื้อ - สั่งจ้าง ที่</h3></label>
                                <label><h4><?php echo $promiseNo; ?></h4></label>
                            </div>

                            <div class="eight wide field">
                                <label><h3>ลงวันที่ </h3></label>
                                <label><h4><?php echo $promiseAt; ?></h4></label>
                                                       
                            </div>

                            <div class="four wide field">
                                <label><h3>กำหนดส่งมอบภายใน</h3></label>
                                <label><h4><?php echo "{$promiseDeadline} (ระยะเวลา {$promiseDelivery} วัน)"; ?></h4></label>
                            </div>
                        </div>


                        <hr>
                        <!-- row10 -->
                        <!-- ผูกพันงบประมาณ -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>ผูกพันงบประมาณเมื่อ </h3></label>
                                <label><h4><?php echo $budgetBinding; ?></h4></label>
                            </div>
                        </div>


                        <hr>
                        <!-- row11 -->
                        <!-- ตรวจรับ เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>ตรวจรับเมื่อ </h3></label>
                                <label><h4><?php echo $checked; ?></h4></label>
                            </div>
                        </div>

                        <hr>
                        <!-- row12 -->
                        <!-- ส่งขอเบิกเงิน เมื่อ: -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>ส่งขอเบิกเงินเมื่อ</h3></label>
                                 <label><h4><?php echo $withdraw; ?></h4></label>
                            </div>
                        </div>

                        <hr>
                        <!-- row13 -->
                        <!-- สถานะโครงการ : -->
                        <div class="fields">
                            <div class="eight wide field">
                                <label><h3>สถานะโครงการ</h3></label>
                                <label><h4><?php echo $projectStatus; ?></h4></label>
                                
                            </div>
                        </div>


                        <hr>
                        
                       

                        



                            
                            
                            

                            
                            

                        <?php
                            //$tomorrow  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
                            ////echo "Today is " . date("Y/m/d") . "<br>";
                            //$date1 = DateTime::createFromFormat('d-m-Y', '04-1-2533');
                            //echo $date1->format('d-m-Y');
                            //echo "<br>";
                            //$date1->modify('+15 day');
                            //echo $date1->format('d-m-Y');
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