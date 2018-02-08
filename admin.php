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
                test tests
            </div>
        </div>
    <!-- BODY -->

    <!-- FOOTER -->
        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div align="center">
                    ระบบการจัดการฐานข้อมูลจัดซื้อ - จัดจ้าง
                    <br>
                    โรงงานวัตถุระเบิดทหารฯ
                </div>
            </div>
        </div>
    <!-- FOOTER -->

    </div>
    <!-- Container -->
  
  
  
    
</body>
</html>