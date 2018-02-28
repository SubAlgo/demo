<div class="ui menu">
    <a href="superuser.php" class="item"><b>หน้าหลัก Super user</b></a>
    
    <div class="right menu">

      <div class="item">
          <div class="item">
              <b>ผู้ใช้ระบบ :</b><?php echo "{$_SESSION['titlename']} {$_SESSION['user_name']} {$_SESSION['user_surname']}"; ?>
          </div>
              
          <div class="item">
              <b>ระดับสิทธิ์ :</b> <?php echo $_SESSION['permission_title']; ?>
          </div>

          <div >
              <a href="//<?php echo $path; ?>/logout.php" class="ui button negative">ออกจากระบบ</a>
          </div>
      </div>
    </div>
</div>