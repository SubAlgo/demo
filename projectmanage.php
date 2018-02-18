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
                   <?php
                        $p = 1;
                        if (isset($_GET['u']) ) {
                            $p = $_GET['u'];
                        }
                        $sql = "SELECT projectName, projectBudget FROM project WHERE projecttype_id = '{$p}'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "projectName :  {$row['projectName']} | projectBudget: {$row['projectBudget']} <br>";
                                if(strlen($row['projectBudget']) <= 0){
                                    echo "x = 0 <br>";
                                } else {
                                    $x = $row['projectBudget'] + 100;
                                    echo "x = {$x} <br>";
                                }
                                
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                   ?>
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