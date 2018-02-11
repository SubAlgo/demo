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

    <!-- CHECK PERMISSION ACCESS [If not admin , Will redirect ot page by permission] -->
    <?php
        //if (!isset($_SESSION['userid'])) {
        //    header("Location: //{$path}/index.php");
        //    die();
        //}
    ?>

    <!-- SETTING DATA -->
    <?php
        /*----- SETTING DATA -----*/
        $alluser = countAlluser($conn);
        $adminuser = countUser($conn, 1);
        $other_user = countUser($conn, 2);
        $super_user = countUser($conn, 3);
        
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
                <!-- รายงานภาพรวมผู้ใช้ -->
                <table class="ui table">
                    <tr>
                        <th align="center" colspan="2"><h3>รายงานภาพรวมผู้ใช้</h3></td> 
                    </tr>
                    <tr>
                        <td>จำนวนผู้ใช้ทั้งหมด</td>
                        <td> <?php echo $alluser; ?> คน</td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้ใช้ระดับ <b><u>[ADMIN]</u></b> </td>
                        <td> <?php echo $adminuser; ?> คน</td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้ใช้ระดับ <b><u>[SUPER USER]</u></b> </td>
                        <td> <?php echo $super_user; ?> คน</td>
                    </tr>
                    <tr>
                        <td>จำนวนผู้ใช้ระดับ <b><u>[USER]</u></b>  </td>
                        <td> <?php echo $other_user; ?> คน</td>
                    </tr>
                </table>


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
                        <td > <div align="center"> 10 โครงการ </div> </td>
                    </tr>
                    <tr>
                        <td>โครงการจัดซื้อ (ระหว่างดำเนินการ)</td>
                        <td> <div align="center"> 10 โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>โครงการจัดจ้าง (ระหว่างดำเนินการ)</td>
                        <td> <div align="center"> 10 โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>ยอดรวมงบประมาณ (ระหว่างดำเนินการ)</td>
                        <td> <div align="center"> 100000 บาท </div></td>
                    </tr>

                    <tr>
                        <td colspan="2"><h3>รายงานภาพรวมโครงการ (ดำเนินการเสร็จสิ้น)</h3></td> 
                    </tr>
                    <tr>
                        <td> โครงการทั้งหมด (ดำเนินการเสร็จสิ้น)</td>
                        <td > <div align="center"> 10 โครงการ </div> </td>
                    </tr>
                    <tr>
                        <td>โครงการจัดซื้อ (ดำเนินการเสร็จสิ้น)</td>
                        <td> <div align="center"> 10 โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>โครงการจัดจ้าง (ดำเนินการเสร็จสิ้น)</td>
                        <td> <div align="center"> 10 โครงการ </div></td>
                    </tr>
                    <tr>
                        <td>ยอดรวมงบประมาณ (ดำเนินการเสร็จสิ้น)</td>
                        <td> <div align="center"> 100000 บาท </div></td>
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