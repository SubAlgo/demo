<?php
    /*
        Algo การ check
        1. ดูว่ามีการกำหนดค่า permission หรือ ไม่
        2. เช็คดูสิทธิการอนุญาติการเข้าถึง
    */

    function ckPermission() {
        if (!isset($_SESSION['permission'])) {
            header("Location: //{$path}/index.php");
            die();
        }
    }

    function adminOnly() {
        ckPermission();

        if ($_SESSION['permission'] != 1 ) {
            redir();
        }
    }

    function adminANDuser() {
        ckPermission();

        if ($_SESSION['permission'] == 1 || $_SESSION['permission'] == 2 ) {
            return;
        } else {
            redir();
        }
        
    }

    function userOnly() {
        ckPermission();
        if ($_SESSION['permission'] != 2 ) {
            redir();
        }
    }

?>