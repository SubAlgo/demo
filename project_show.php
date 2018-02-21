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
            $orderDelivery = "-";
        }

        if($promiseDelivery == 0) {
            $promiseDelivery = "-";
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
                    <h4 class="ui horizontal divider header">
                        
                        แสดงรายการโครงการ
                    </h4>
                    <table class="ui definition table">
                      <tbody>
                        <tr>
                            <td class="four wide column">หน่วยเสนอความต้องการ</td>
                            <td><?php echo $projectName; ?></td>
                        </tr>
                        <tr>
                            <td>เลขที่หนังสือ</td>
                            <td>
                                <div class="fields">
                                    <div class="field"><?php echo $bookNo; ?></div>
                                    <div class="field">[ลงวันที่ : <?php echo $projectAt; ?>]</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ประเภทงาน</td>
                            <td><?php echo $projecttype_id; ?></td>
                        </tr>
                        <tr>
                            <td>จำนวนเงินงบประมาณ</td>
                            <td><?php echo $projectBudget; ?> บาท</td>
                        </tr>
                        <tr>
                            <td>ตรวจสอบงบประมาณเมื่อ</td>
                            <td><?php echo $budgetCheck; ?></td>
                        </tr>
                        <tr>
                            <td>อนุมัติหลักการเมื่อ</td>
                            <td><?php echo $principleApprov; ?></td>
                        </tr>
                        <tr>
                            <td>อนุมัติ ซื้อ-จ้าง </td>
                            <td><?php echo $processApprove; ?></td>
                        </tr>
                        <tr>
                            <td>ตรวจร่าง นธน.ฯ เมื่อ</td>
                            <td><?php echo $tntCheck; ?></td>
                        </tr>
                        <tr>
                            <td>เลขที่ใบสั่งซื้อ - สั่งจ้าง</td>
                            <td><?php echo $orderNo; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่ลงบันทึก ใบสั่งซื้อ - สั่งจ้าง</td>
                            <td><?php echo $orderAt; ?></td>
                        </tr>
                        <tr>
                            <td>กำหนดส่งมอบ ตามใบสั่งซื้อ - สั่งจ้าง</td>
                            <td><?php echo $orderDeadline; ?></td>
                        </tr>
                        
                        <tr>
                            <td>เลขที่สัญญาซื้อ - สั่งจ้าง</td>
                            <td><?php echo $promiseNo; ?></td>
                        </tr>
                        <tr>
                            <td>วันที่ลงบันทึก สัญญาซื้อ - สั่งจ้าง</td>
                            <td><?php echo $promiseAt; ?></td>
                        </tr>
                        <tr>
                            <td>กำหนดส่งมอบ ตามสัญญาซื้อ - สั่งจ้าง</td>
                            <td><?php echo $promiseDeadline; ?></td>
                        </tr>

                        <tr>
                            <td>ผูกพันงบประมาณเมื่อ</td>
                            <td><?php echo $budgetBinding; ?></td>
                        </tr>
                        <tr>
                            <td>ตรวจรับเมื่อ</td>
                            <td><?php echo $checked; ?></td>
                        </tr>
                        <tr>
                            <td>ส่งขอเบิกเงินเมื่อ</td>
                            <td><?php echo $withdraw; ?></td>
                        </tr>
                        <tr>
                            <td>สถานะโครงการ</td>
                            <td><?php echo $projectStatus; ?></td>
                        </tr>
                      </tbody>
                    </table>
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