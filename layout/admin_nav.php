<div class="ui menu">
    <a class="item">จัดการผู้ใช้</a>
    <a class="item">จัดการโครงการ/รายการ</a>
    <div class="right menu">

      <div class="item">
          <div class="item">
              <b>ผู้ใช้ระบบ :</b><?php echo "{$_SESSION['titlename']} {$_SESSION['user_name']} {$_SESSION['user_surname']}"; ?>
          </div>
              
          <div class="item">
              <b>ระดับสิทธิ์ :</b> <?php echo $_SESSION['permission_title']; ?>
          </div>

          <div >
              <a href="//<?php echo $path; ?>/logout.php" class="ui button negative">Logout</a>
          </div>
      </div>
    </div>
</div>