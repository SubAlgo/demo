<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once 'inc.php' ?>

    <!-- CHECK LOGGED IN [If logged in , Will redirect ot page by permission] -->
    <?php
        if(isset($_SESSION['user_id'])) {
            redir();
        }
    ?>

    <!-- SETTING DATA -->
    <?php
        /*----- SETTING DATA -----*/
        //$title_name = "";
        //$name = "Pichai";
        //$lastname = "";
        //$permission = "Admin";
        //$permission_id  ;
    ?>

    <!-- LOGIN PROCESS[Select data from DB and set session and cookie] -->
    <?php
        /*----- LOGIN PROCESS [Select data from DB and set session and cookie] -----*/
        if(isset($_POST['submit'])) {
          
            $sql = "SELECT titlename.titlename_title as titlename, 
                           permission.permission_id , 
                           permission.permission_title ,
                           users.user_id ,
                           users.user_name , 
                           users.user_surname
                    FROM ((users
                    INNER JOIN titlename ON users.titlename_id = titlename.titlename_id)
                    INNER JOIN permission ON users.permission_id = permission.permission_id)
                    WHERE users.user_id = '{$_POST['userid']}' && users.user_password = '{$_POST['password']}' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //$title_name =
                    echo $row['permission_id'];
                    echo $row['permission_title'];
                    echo $row['user_id'];
                    echo $row['titlename'];
                    echo $row['user_name'];
                    echo $row['user_surname'];
                    
                    $_SESSION['permission']         = $row['permission_id'];
                    $_SESSION['permission_title']   = $row['permission_title'];
                    $_SESSION['user_id']            = $row['user_id'];
                    $_SESSION['titlename']          = $row['titlename'];
                    $_SESSION['user_name']          = $row['user_name'];
                    $_SESSION['user_surname']       = $row['user_surname'];

                    setcookie('userid', $row['user_id'], time()+60*15);

                    redir() ;
                }
            } else {
                
            }
            
            $conn->close();
        } 
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
            //include_once "./layout/admin_nav.php";
        ?>
    <!-- NAV BAR -->

    <!-- BODY -->
        <div class="ui vertical stripe segment">
        
            <div class="ui container">
                <div align="center">

                   <form class="ui large form" action="" method="post">
                        <div class="ui stacked segment">

                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" name="userid" placeholder="USERNAME:">
                                </div>
                            </div>


                            <div class="field">
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" placeholder="PASSWORD:">
                                </div>
                            </div>


                            <div class="field">
                                <input type="submit" name="submit" value="LOGIN"  class="ui fluid large teal submit button"> 
                            </div>

                        </div>
                
                   </form>

                </div>
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