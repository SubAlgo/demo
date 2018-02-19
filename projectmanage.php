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
                        $p = 1;
                        if (isset($_GET['u']) ) {
                            $p = $_GET['u'];
                        }

                        echo date("Y/m/d");

                        $d1=strtotime("July 04");
                        echo "d1 {$d1}";
                        
                        $d2=ceil(($d1-time())/60/60/24);
                        echo "<br>";
                        echo "There are " . $d2 ." days until 4th of July.";
                        
                        $sqlsum = "SELECT SUM(projectbudget) as budget FROM project WHERE projecttype_id = '{$p}' ";
                        $projectbudget = $conn->query($sqlsum);

                        if ($projectbudget->num_rows > 0) {
                            while($row = $projectbudget->fetch_assoc()) {
                                $budget = $row['budget'];
                            }
                        }
                        //if ($result->num_rows > 0) {
                        //    // output data of each row
                        //    
                        //    while($row = $result->fetch_assoc()) {
                        //        echo "projectName :  {$row['projectName']} | projectBudget: {$row['projectBudget']} <br>";
                        //        if(strlen($row['projectBudget']) <= 0){
                        //            echo "x = 0 <br>";
                        //        } else {
                        //            $x = $row['projectBudget'] + 100;
                        //            echo "x = {$x} <br>";
                        //        }
                        //        
                        //    }
                        //} else {
                        //    echo "0 results";
                        //}
                        //$conn->close();
                   ?>
                    
                    <div align="center"> 
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
                    


                    <?php
                        $q = "00-00-0000";
                        if($q == "00-00-0000") {
                            echo "Fuck";
                        }
                        $qq = explode("-", $q);
                        echo $qq[0];
                        echo "<br>";
                        echo $qq[1];
                        echo "<br>";
                        echo $qq[2];
                        echo "<br>";

                        function condateFormate($x) {
                            if($x == "0000-00-00") {
                                return "-";
                            }
                            $xx = explode("-", $x);

                            $date1 = DateTime::createFromFormat('Y-m-d', $x);
                            $date1->modify('+543 year');
                            return $date1->format('d-m-Y');
                        }
                        
                        
                    ?>
                    
                    <div align="right"><h4>งบประมาณรวม: <?php echo $budget; ?> บาท</h4></div>
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
                                $sql = "SELECT projectName, orderDeadline, promiseDeadline, projectbudget FROM project WHERE projecttype_id = '{$p}'";
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
                                        echo "<td colspan='2'> <div align='center'> {$d} </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> {$d2} </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> {$row['projectbudget']} </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> แสดง </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> แก้ไข </div> </td>";
                                        echo "<td colspan='2'> <div align='center'> ลบ </div> </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                }
                                $conn->close();
                            ?>
                            <!--
                            <tr>
                                <td> <div align="center"> 1 </td>
                                <td colspan='4'> <div align="center"> ซื้อรถถัง </div> </td>
                                <td colspan='2'> <div align="center"> 19 กุมภาพันธ์ 2561 </div> </td>
                                <td colspan='2'> <div align="center"> 25 กุมภาพันธ์ 2561 </div> </td>
                                <td colspan='2'> <div align="center"> 25000 </div> </td>
                                <td colspan='2'> <div align="center"> แสดง </div> </td>
                                <td colspan='2'> <div align="center"> แก้ไข </div> </td>
                                <td colspan='2'> <div align="center"> ลบ </div> </td>

                            </tr>

                            <tr>
                                <td> <div align="center"> 1 </td>
                                <td colspan='4'> <div align="center"> ซื้อรถถัง </div> </td>
                                <td colspan='2'> <div align="center"> 19 กุมภาพันธ์ 2561 </div> </td>
                                <td colspan='2'> <div align="center"> 25 กุมภาพันธ์ 2561 </div> </td>
                                <td colspan='2'> <div align="center"> 25000 </div> </td>
                                <td colspan='2'> <div align="center"> แสดง </div> </td>
                                <td colspan='2'> <div align="center"> แก้ไข </div> </td>
                                <td colspan='2'> <div align="center"> ลบ </div> </td>

                            </tr>
                            -->
                        </tbody>
                        
                   </table>
                </div>
                <br>
                



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