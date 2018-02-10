<div class="ui menu">
    <a href="admin.php" class="item"><b>หน้าหลัก admin</b></a>
    <a href="usermanage.php" class="item"><b>จัดการผู้ใช้</b></a>
    <a class="item"><b>จัดการโครงการ/รายการ</b></a>
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