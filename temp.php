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
        $name = "Pichai";
        $permission = "Admin";
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
        <?php
            $conn->close();
            include_once "./layout/foot.php";
        ?>
    <!-- FOOTER -->

    </div>
    <!-- Container -->
  
  
  
    
</body>
</html>