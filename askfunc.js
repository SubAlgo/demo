
function askFunction() {
    if(confirm("คุณต้องการลบบัญผู้ใช้ระบบนี้ ใช่ หรือ ไม่?")) {
        return true
    } else {
        alert('ยกเลิก')
        return false
      // window.location = "//localhost/demo/usermanage.php";
    }
}
   