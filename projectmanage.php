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

        /*  ---------------p Value ---------------------------------
            p คือ ค่าที่จะใช้ในการกำหนดว่า จะ get value ของ projectType ไหน
            ถ้า p = 1 จะ select ข้อมูลโปรเจค ประเภท "โครงการซื้อ"
            ถ้า p = 2 จะ select ข้อมูลโปรเจค ประเภท "โครงการจ้าง"*/
        $p = 1;
        if (isset($_GET['u']) ) {
            $p = $_GET['u'];
        }


        //SELECT SUM งบประมาณโครงการตาม projectType และ projectStatus
        function getSum($conn, $p, $proStatus) {
            $sqlsum = " SELECT SUM(projectbudget) as budget 
                        FROM project 
                        WHERE projecttype_id = '{$p}' && projectStatus = '{$proStatus}' ";
            $projectbudget = $conn->query($sqlsum);
            if ($projectbudget->num_rows > 0) {
                while($row = $projectbudget->fetch_assoc()) {
                    $budget = $row['budget'];
                    return $budget;
                }
            }
        }

         //SELECT SUM งบประมาณโครงการทั้งหมดตาม projectType
        function getSumAll($conn, $p) {
            $sqlsum = "SELECT SUM(projectbudget) as budget FROM project WHERE projecttype_id = '{$p}' ";
            $projectbudget = $conn->query($sqlsum);
            if ($projectbudget->num_rows > 0) {
                while($row = $projectbudget->fetch_assoc()) {
                    $budget = $row['budget'];
                    return $budget;
                }
            }
        }

        //ปรับ Format การแสดงผลของ วัน-เดือน-ปี
        function condateFormate($x) {
            if($x == "0000-00-00" || strlen($x)== 0) {
                return "-";
            }

            $xx = explode("-", $x);
            $date1 = DateTime::createFromFormat('Y-m-d', $x);
            $date1->modify('+543 year');
            return $date1->format('d-m-Y');
        }

        //ปรับ Format การแสดงผลของ งบประมาณ
        function formatBudget($x) {
            if($x == 0 || strlen($x) == 0) {
                return '-';
            }
            return $x;
        }
    ?>

    <title>จัดการโครงการ</title>
    
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
                    <a href="./project_add.php" class="ui labeled icon button green">
                        <i class="right add user icon"></i>
                        เพิ่มโครงการ
                    </a>
                </div>
                <br>

                <div>
                    <a href="./projectmanage.php?u=1" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        โครงการซื้อ
                    </a>
                    <a href="./projectmanage.php?u=2" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        โครงการจ้าง
                    </a>
                    <a href="./projectmanage.php?u=2" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        ค้นหาตามกำหนดส่งมอบ
                    </a>
                    <a href="./projectmanage.php?u=2" class="ui labeled icon button blue">
                        <i class="right search icon"></i>
                        ค้นหาตามกำหนดสัญญา
                    </a>    
                   <?php
                        
                        
                   ?>
                    
                    <div align="center">
                    <p>
                        <h2>
                            <?php 
                                if($p == 1) {
                                    echo "โครงการซื้อ";
                                } else {
                                    echo "โครงการจ้าง";
                                }
                            ?>
                        </h2>
                    </div>
                    
                    <div align="right">
                        <h4>งบประมาณรวม: <?php echo getSumAll($conn, $p); ?> บาท</h4>
                    </div>

                    <div>
                        <h3>ระหว่างดำเนินการ [งบประมาณ: <?php echo formatBudget(getSum($conn, $p, 1)); ?> บาท]</h3>
                    </div>

                    <table class="ui sixty column celled table">
                        <thead>
                            <tr>
                                <th> <div align="center"> ลำดับ</th>
                                <th colspan='4'> <div align="center"> รายการโครงการ </div> </th>
                                <th colspan='2'> <div align="center"> กำหนดส่งมอบ </div> </th>
                                <th colspan='2'> <div align="center"> กำหนดสัญญา </div> </th>
                                <th colspan='2'> <div align="center"> งบประมาณ </div> </th>
                                <th colspan='2'> <div align="center"> แสดง </div> </th>
                                <th colspan='2'> <div align="center"> แก้ไข </div> </th>
                                <th colspan='2'> <div align="center"> ลบ </div> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $sql = "SELECT  project_id, projectName, orderDeadline, promiseDeadline, projectbudget 
                                        FROM    project 
                                        WHERE   projecttype_id = '{$p}' && projectStatus = '1'";
                                $result = $conn->query($sql);
                            
                                if ($result->num_rows > 0) {
                                    $i = 1;
                                    while($row = $result->fetch_assoc()) {
                                        //projectName, orderDeadline, promiseDeadline, budget
                                        $d = condateFormate($row['orderDeadline']);
                                        if(strlen($row['promiseDeadline'])>0){
                                            $d2 = condateFormate($row['promiseDeadline']);
                                        } else {
                                            $d2 = "-";
                                        }
                                        
                                        echo "<tr>";
                                        echo "<td> <div align='center'> {$i} </td>";
                                        echo "<td colspan='4'> <div align='center'> {$row['projectName']} </div> </td>";
                                        echo "<td colspan='2'> <div align='center'>" . condateFormate($row['orderDeadline']) . "</div> </td>";
                                        echo "<td colspan='2'> <div align='center'>" . condateFormate($row['promiseDeadline']) . " </div> </td>";
                                        echo "<td colspan='2'> <div align='center'>" . formatBudget($row['projectbudget']) . "</div> </td>";
                                        echo "<td colspan='2'> <div align='center'> <a href='project_show.php?pid={$row['project_id']}'>แสดง</a> </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> <a href='project_edit.php?pid={$row['project_id']}'>แก้ไข</a> </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> <a href='project_del.php?pid={$row['project_id']}'>ลบ</a> </div> </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                }
                                
                            ?>
                            
                        </tbody>
                    </table>
                    
                    <div>
                        <h3>ดำเนินการเสร็จสิ้น [งบประมาณ: <?php echo formatBudget(getSum($conn, $p, 2)); ?> บาท]</h3>
                    </div>
                    
                    <table class="ui sixty column celled table">
                        <thead>
                            <tr>
                                <th> <div align="center"> ลำดับ</th>
                                <th colspan='4'> <div align="center"> รายการโครงการ </div> </th>
                                <th colspan='2'> <div align="center"> กำหนดส่งมอบ </div> </th>
                                <th colspan='2'> <div align="center"> กำหนดสัญญา </div> </th>
                                <th colspan='2'> <div align="center"> งบประมาณ </div> </th>
                                <th colspan='2'> <div align="center"> แสดง </div> </th>
                                <th colspan='2'> <div align="center"> แก้ไข </div> </th>
                                <th colspan='2'> <div align="center"> ลบ </div> </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $sql = "SELECT  project_id, projectName, orderDeadline, promiseDeadline, projectbudget 
                                        FROM    project 
                                        WHERE   projecttype_id = '{$p}' && projectStatus = '2'";
                                $result = $conn->query($sql);
                            
                                if ($result->num_rows > 0) {
                                    $i = 1;
                                    while($row = $result->fetch_assoc()) {
                                        //projectName, orderDeadline, promiseDeadline, budget
                                        $d = condateFormate($row['orderDeadline']);
                                        if(strlen($row['promiseDeadline'])>0){
                                            $d2 = condateFormate($row['promiseDeadline']);
                                        } else {
                                            $d2 = "-";
                                        }
                                        
                                        echo "<tr>";
                                        echo "<td> <div align='center'> {$i} </td>";
                                        echo "<td colspan='4'> <div align='center'> {$row['projectName']} </div> </td>";
                                        echo "<td colspan='2'> <div align='center'>". condateFormate($row['orderDeadline']) . "</div> </td>";
                                        echo "<td colspan='2'> <div align='center'>" . condateFormate($row['promiseDeadline']) . " </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> {$row['projectbudget']} </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> <a href='project_show.php?pid={$row['project_id']}'>แสดง</a> </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> <a href='project_edit.php?pid={$row['project_id']}'>แก้ไข</a> </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> <a href='project_del.php?pid={$row['project_id']}'>ลบ</a> </div> </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                }
                                
                            ?>
                            
                        </tbody>    
                   </table>
                </div>
                <br>
                



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