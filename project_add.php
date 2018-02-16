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
                <div>
                    <form class="ui form">
                        <div class="inline fields">
                            <div class="ten wide field">
                                <label>หน่วยเสนอความต้องการ</label>
                                <input type="text" name="" id="" placeholder="หน่วยเสนอความต้องการ">
                            </div>
                           
                            <div class="eight wide field">
                                <label>ประเภทงาน</label>
                                <input type="text" placeholder="Middle Name">
                            </div>
                            
                        </div>

                        <div class="fields">
                            <div class="field">
                              <label>First name</label>
                              <input type="text" placeholder="First Name">
                            </div>
                            <div class="field">
                              <label>Middle name</label>
                              <input type="text" placeholder="Middle Name">
                            </div>
                            <div class="field">
                              <label>Last name</label>
                              <input type="text" placeholder="Last Name">
                            </div>
                        </div>
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