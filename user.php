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
        //include_once "./check_admin.php";
        userOnly();
    ?>
    

    <!-- SETTING DATA -->
    <?php
        /*----- SETTING DATA -----*/
        $alluser = countAlluser($conn);
        $adminuser = countUser($conn, 1);
        $other_user = countUser($conn, 2);
        $super_user = countUser($conn, 3);

        //------------------------โครงการระหว่างดำเนินงาน-----------------------
        $projectInprocessAll = "SELECT COUNT(projectName) as returnVal FROM project WHERE projectStatus = '1'";
        $projectInprocessAll = countProject($conn, $projectInprocessAll);

        $projectInprocessBuy = "SELECT COUNT(projectName) as returnVal FROM project WHERE projecttype_id = '1' && projectStatus = '1'";
        $projectInprocessBuy = countProject($conn, $projectInprocessBuy);

        $projectInprocessHire = "SELECT COUNT(projectName) as returnVal FROM project WHERE projecttype_id = '2' && projectStatus = '1'";
        $projectInprocessHire = countProject($conn, $projectInprocessHire);

        $projectInprocessBudget = "SELECT SUM(projectbudget) as returnVal FROM project WHERE projectStatus = '1'";
        $projectInprocessBudget = countProject($conn, $projectInprocessBudget);

        //------------------------โครงการดำเนินงานเสร็จสิ้น-----------------------
        $projectSuccessAll = "SELECT COUNT(projectName) as returnVal FROM project WHERE projectStatus = '2'";
        $projectSuccessAll = countProject($conn, $projectSuccessAll);
        
        $projectSuccessBuy = "SELECT COUNT(projectName) as returnVal FROM project WHERE projecttype_id = '1' && projectStatus = '2'";
        $projectSuccessBuy = countProject($conn, $projectSuccessBuy);

        $projectSuccessHire = "SELECT COUNT(projectName) as returnVal FROM project WHERE projecttype_id = '2' && projectStatus = '2'";
        $projectSuccessHire= countProject($conn, $projectSuccessHire);

        $projectSuccessBudget = "SELECT SUM(projectbudget) as returnVal FROM project WHERE projectStatus = '2'";
        $projectSuccessBudget = countProject($conn, $projectSuccessBudget);


        
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
            include_once "./layout/user_nav.php";
        ?>
    <!-- NAV BAR -->

    <!-- BODY -->
        <div class="ui vertical stripe segment">
            <div class="ui container">
                
                <!-- รายงานภาพรวมโครงการ  (ระหว่างดำเนินการ) -->
                <table class="ui table">
                    <tr>
                        <th align="center" colspan="2"><h3>รายงานภาพรวมโครงการ</h3></td> 
                    </tr>
                    <tr>
                        <td colspan="2"><h3>รายงานภาพรวมโครงการ (ระหว่างดำเนินการ)</h3></td> 
                    </tr>
                    <tr>
                        <td> โครงการทั้งหมด (ระหว่างดำเนินการ)</td>
                        <td > <div align="center"> <?php echo $projectInprocessAll; ?> โครงการ </div> </td>
                    </tr>
                    <tr>
                        <td>โครงการจัดซื้อ (ระหว่างดำเนินการ)</td>
                        <td> <div align="center"> <?php echo $projectInprocessBuy; ?> โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>โครงการจัดจ้าง (ระหว่างดำเนินการ)</td>
                        <td> <div align="center"> <?php echo $projectInprocessHire; ?> โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>ยอดรวมงบประมาณ (ระหว่างดำเนินการ)</td>
                        <td> <div align="center"> <?php echo $projectInprocessBudget; ?> บาท </div></td>
                    </tr>

                    <tr>
                        <td colspan="2"><h3>รายงานภาพรวมโครงการ (ดำเนินการเสร็จสิ้น)</h3></td> 
                    </tr>
                    <tr>
                        <td> โครงการทั้งหมด (ดำเนินการเสร็จสิ้น)</td>
                        <td > <div align="center"> <?php echo $projectSuccessAll; ?> โครงการ </div> </td>
                    </tr>
                    <tr>
                        <td>โครงการจัดซื้อ (ดำเนินการเสร็จสิ้น)</td>
                        <td> <div align="center"> <?php echo $projectSuccessBuy; ?> โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>โครงการจัดจ้าง (ดำเนินการเสร็จสิ้น)</td>
                        <td> <div align="center"> <?php echo $projectSuccessHire; ?> โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>ยอดรวมงบประมาณ (ดำเนินการเสร็จสิ้น)</td>
                        <td> <div align="center"> <?php echo $projectSuccessBudget; ?> บาท </div></td>
                    </tr>
                </table>
                
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